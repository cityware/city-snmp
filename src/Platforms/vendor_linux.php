<?php

// Works with sysDescr such as:
// Cumulus
// Linux switch.ixleeds.net 3.2.46-1+deb7u1+cl1 #3.2.46-1+deb7u1+cl1 SMP Fri Feb 7 13:15:34 PST 2014 ppc
// Ubuntu
// Linux ixleeds1 3.11.0-23-generic #40-Ubuntu SMP Wed Jun 4 21:05:23 UTC 2014 x86_64

if (substr($sysDescr, 0, 6) == 'Linux ') {
    $matches = explode(" ", $sysDescr);

    if ($matches[4] == 'SMP') {
        $this->setVendor('Cumulus Networks');
        $this->setModel($matches[5]);
    } else {
        $this->setVendor($matches[4]);
        $this->setModel('Generic');
        $this->setOsDate(new \DateTime("{$matches[7]}/{$matches[6]}/{$matches[10]}:{$matches[8]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($matches[9]));
    }
    $os = 'linux';
    $this->setOsVersion($matches[2]);
}
if (isset($os) and $os == 'linux') {
    if (preg_match('/^endian/', $sysDescr)) {
        $this->setOs('Endian Linux');
    } elseif (preg_match('/Cisco Small Business/', $sysDescr)) {
        $this->setOs('Cisco Smb Linux');
    } else {
        $this->setOs('Linux');
    }
}