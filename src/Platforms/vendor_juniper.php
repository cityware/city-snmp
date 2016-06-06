<?php

// Verified against SRX- and EX- series devices
//
// Sample sysDescr:
// "Juniper Networks, Inc. ex4500-40f Ethernet Switch, kernel JUNOS 12.3R3.4, Build date: 2013-06-14 01:37:19 UTC Copyright (c) 1996-2013 Juniper Networks, Inc."

if (substr($sysDescr, 0, 22) == 'Juniper Networks, Inc.') {
    preg_match('/(Juniper Networks), Inc. ([^\s]+) .* kernel ([^\s]+) ([^\s,]+)/', $sysDescr, $matches);
    $this->setVendor($matches[1]);
    $this->setModel($matches[2]);
    $this->setOs($matches[3]);
    $this->setOsVersion($matches[4]);

    if (preg_match('/Build date: (\d\d\d\d-\d\d-\d\d) (\d\d:\d\d:\d\d) ([A-Za-z]+)/', $sysDescr, $d)) {
        $this->setOsDate(new \DateTime("{$d[1]} {$d[2]} +00:00"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($d[3]));
    }
}

