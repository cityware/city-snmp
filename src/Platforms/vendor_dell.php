<?php

// Works with sysDescr such as:
//
// 'Dell Force10 OS Operating System Version: 1.0 Application Software Version: 8.3.12.1 Series: S4810 Copyright (c) 1999-2012 by Dell Inc. All Rights Reserved. Build Time: Sun Nov 18 11:05:15 2012'
// 'Dell Force10 OS Operating System Version: 2.0 Application Software Version: 9.3(0.0) Series: S4810 Copyright (c) 1999-2014 by Dell Inc. All Rights Reserved. Build Time: Thu Jan 2 02:14:08 2014'

if (substr($sysDescr, 0, 12) == 'Dell Force10 ') {
    if (preg_match('/^Dell Force10 OS Operating System Version: ([\d\.]+) Application Software Version:\s([0-9\(\)\.]+)\sSeries:\s([A-Z0-9]+)\sCopyright \(c\) \d+-\d+ by Dell Inc. All Rights Reserved. Build Time:\s[A-Za-z0-9]+\s(([a-zA-Z]+)\s(\d+)\s((\d\d):(\d\d):(\d\d))\s(\d+))$/', $sysDescr, $matches)) {
        $this->setVendor('Dell Force10');
        $this->setModel($matches[3]);
        $this->setOs("FTOS {$matches[1]}");
        $this->setOsVersion($matches[2]);
        $this->setOsDate(new \DateTime("{$matches[6]}/{$matches[5]}/{$matches[11]}:{$matches[7]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone('UTC'));
    }

    try {
        $this->setSerialNumber($this->getSNMPHost()->get('.1.3.6.1.2.1.47.1.1.1.1.11.2'));
    } catch (Exception $e) {
        $this->setSerialNumber('(error)');
    }
} else if (preg_match('/^Dell Color Laser/', $sysDescr) or preg_match('/^Dell Laser Printer/', $sysDescr) or preg_match('/^Dell.*MFP/', $sysDescr)) {
    $this->setVendor('Dell');
    $this->setModel('Dell Laser Printer');
    $this->setOs('Dell Printer');
}
