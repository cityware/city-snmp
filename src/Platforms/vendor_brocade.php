<?php

// Works with sysDescr such as:
//
// 'Brocade Communications Systems, Inc. FESX624+2XG, IronWare Version 07.3.00cT3e1 Compiled on Apr 25 2012 at 17:01:00 labeled as SXS07300c'
// 'Brocade Communication Systems, Inc. TurboIron-X24, IronWare Version 04.2.00b Compiled on Oct 22 2010 at 15:15:36 labeled as TIS04200b'
// 'Brocade Communications Systems, Inc. Stacking System ICX7450-48, IronWare Version 08.0.30dT213 Compiled on Nov  3 2015 at 22:16:04 labeled as SPR08030d'
// 'Brocade NetIron CES, IronWare Version V5.2.0cT183 Compiled on Oct 28 2011 at 02:58:44 labeled as V5.2.00c'
// 'Brocade NetIron MLX (System Mode: MLX), IronWare Version V5.4.0cT163 Compiled on Mar 25 2013 at 17:08:16 labeled as V5.4.00c'
// 'Brocade MLXe (System Mode: MLX), IronWare Version V5.7.0dT163 Compiled on Sep 23 2015 at 09:35:50 labeled as V5.7.00db'

if (substr($sysDescr, 0, 8) == 'Brocade ') {
    if (preg_match('/Brocade Communication[s]* Systems, Inc. [(Stacking System)]*(.+),\s([a-zA-Z]+)\sVersion\s(.+)\sCompiled\son\s(([a-zA-Z]+)\s+(\d+)\s(\d+)\s)at\s((\d\d):(\d\d):(\d\d))\slabeled\sas\s(.+)/', $sysDescr, $matches)) {
        $this->setVendor('Brocade');
        $this->setModel($matches[1]);
        $this->setOs($matches[2]);
        $this->setOsVersion($matches[3]);
        $this->setOsDate(new \DateTime("{$matches[6]}/{$matches[5]}/{$matches[7]}:{$matches[8]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone('UTC'));
    } else if (preg_match('/Brocade ((NetIron )?[a-zA-Z0-9]+).*IronWare\sVersion\s(.+)\s+Compiled\s+on\s+(([a-zA-Z]+)\s+(\d+)\s+(\d+)\s+)at\s+((\d\d):(\d\d):(\d\d))\s+labeled\s+as\s+(.+)/', $sysDescr, $matches)) {
        $this->setVendor('Brocade');
        $this->setModel($matches[1]);
        $this->setOs('IronWare');
        $this->setOsVersion($matches[3]);
        $this->setOsDate(new \DateTime("{$matches[6]}/{$matches[5]}/{$matches[7]}:{$matches[8]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone('UTC'));
    } else if (preg_match('/Foundry Networks, Inc. (.+),\sIronWare\sVersion\s(.+)\sCompiled\son\s(([a-zA-Z]+)\s(\d+)\s(\d+)\s)at\s((\d\d):(\d\d):(\d\d))\slabeled\sas\s(.+)/', $sysDescr, $matches)) {
        $this->setVendor('Brocade');
        $this->setModel($matches[1]);
        $this->setOs('IronWare');
        $this->setOsVersion($matches[2]);
        $this->setOsDate(new \DateTime("{$matches[5]}/{$matches[4]}/{$matches[6]}:{$matches[7]} +0000"));
        $d->setTimezone(new \DateTimeZone('UTC'));
        $this->getOsDate()->setTimezone(new \DateTimeZone('UTC'));
    } else if (strstr($sysDescr, "Brocade VDX")) {
        $this->setVendor('Brocade');
        $this->setModel('Generic');
        $this->setOs("NOS");
    }

    try {
        $this->setSerialNumber($this->getSNMPHost()->useFoundry_Chassis()->serialNumber());
    } catch (Exception $e) {
        $this->setSerialNumber('(error)');
    }
} else if (preg_match('/^Vyatta/', $sysDescr)) {
    $this->setVendor('Brocade');
    $this->setModel('Generic');
    $this->setOs("Vyatta");
} else if (preg_match('/^Vyatta VyOS/', $sysDescr) || preg_match('/^VyOS/i', $sysDescr)) {
    $this->setVendor('Brocade');
    $this->setModel('Generic');
    $this->setOs("VyOS");
}