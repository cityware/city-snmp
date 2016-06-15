<?php

// Works with sysDescr such as:
//
// 'Cisco IOS Software, s72033_rp Software (s72033_rp-ADVENTERPRISE_WAN-VM), Version 12.2(33)SXI5, RELEASE SOFTWARE (fc2)'
//
// 'Cisco Internetwork Operating System Software IOS (tm) C2950 Software (C2950-I6Q4L2-M), Version 12.1(13)EA1, RELEASE SOFTWARE.*'

if (substr($sysDescr, 0, 18) == 'Cisco IOS Software') {
    preg_match('/Cisco IOS Software, (.+) Software \((.+)\), Version\s([0-9A-Za-z\(\)\.]+), RELEASE SOFTWARE\s\((.+)\)/', $sysDescr, $matches);

    $this->setVendor('Cisco Systems');
    try {
        $this->setModel($this->getSNMPHost()->useEntity()->physicalName()[1]);
    } catch (\Cityware\Snmp\Exception $e) {
        $this->setModel('Unknown');
    }
    $this->setOs('IOS');
    $this->setOsVersion($matches[3]);
    $this->setOsDate(null);
} else if (substr($sysDescr, 0, 48) == 'Cisco Internetwork Operating System Software IOS') {
    $sysDescr = trim(preg_replace('/\s+/', ' ', $sysDescr));
    preg_match('/Cisco(.+)C2950 Software(.+)Version\s([0-9A-Za-z\(\)\.]+),\sRELEASE SOFTWARE.*/', $sysDescr, $matches);

    $this->setVendor('Cisco Systems');
    $this->setModel('C2950');
    $this->setOs('IOS');
    $this->setOsVersion($matches[3]);
    $this->setOsDate(null);
} else if (substr($sysDescr, 0, 21) == 'Cisco IOS XR Software') {
    // 'Cisco IOS XR Software (Cisco ASR9K Series),  Version 4.3.2[Default]\r\nCopyright (c) 2013 by Cisco Systems, Inc., referer: http://10.0.35.20/ixp/switch/add-by-snmp'

    preg_match('/Cisco IOS XR Software \((.+ Series)\),\s+Version\s([0-9A-Za-z\(\)\.\[\]]+)\s+Copyright \(c\) [0-9]+ by Cisco Systems, Inc.*/', $sysDescr, $matches);
    $this->setVendor('Cisco Systems');
    $this->setModel($matches[1]);
    $this->setOs('IOS XR');
    $this->setOsVersion($matches[2]);
    $this->setOsDate(null);
} else if (preg_match('/^Meraki MX/', $sysDescr)) {
    $this->setVendor('Cisco Systems');
    $this->setModel('Generic');
    $this->setOs('Meraki MX');
} else if (preg_match('/^Meraki MS/', $sysDescr)) {
    $this->setVendor('Cisco Systems');
    $this->setModel('Generic');
    $this->setOs('Meraki MS');
} else if (preg_match('/^Meraki MR/', $sysDescr)) {
    $this->setVendor('Cisco Systems');
    $this->setModel('Generic');
    $this->setOs('Meraki MR');
} else if (strstr($sysDescr, 'NX-OS(tm)')) {
    $this->setVendor('Cisco Systems');
    $this->setModel('Generic');
    $this->setOs('NX-OS');
} else if (strstr($sysDescr, 'SAN-OS')) {
    $this->setVendor('Cisco Systems');
    $this->setModel('Generic');
    $this->setOs('SAN-OS');
}
