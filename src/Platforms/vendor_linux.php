<?php

// Works with sysDescr such as:
// Cumulus
// Linux switch.ixleeds.net 3.2.46-1+deb7u1+cl1 #3.2.46-1+deb7u1+cl1 SMP Fri Feb 7 13:15:34 PST 2014 ppc
// Ubuntu
// Linux ixleeds1 3.11.0-23-generic #40-Ubuntu SMP Wed Jun 4 21:05:23 UTC 2014 x86_64

if (substr($sysDescr, 0, 6) == 'Linux ') {
    if (preg_match('/Linux ([^ ]+) ([^ ]+)\+([^ ]+) #([^ ]+) SMP ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+)/', $sysDescr, $matches)) {
        $this->setVendor('Cumulus Networks');
        $this->setModel('Generic');
        $this->setOs('Linux');
        $this->setOsVersion($matches[2]);
        $this->setOsDate(new \DateTime("{$matches[7]}/{$matches[6]}/{$matches[10]}:{$matches[8]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($matches[9]));
    } else if (preg_match('/Linux ([^ ]+) ([^ ]+)-([^ ]+) #[^ ]+-([^ ]+) SMP ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) (.*)/', $sysDescr, $matches)) {
        $this->setVendor($matches[4]);
        $this->setModel('Generic');
        $this->setOs('Linux');
        $this->setOsVersion($matches[2]);
        $this->setOsDate(new \DateTime("{$matches[7]}/{$matches[6]}/{$matches[10]}:{$matches[8]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($matches[9]));
    } else {

        $matches = explode(" ", $sysDescr);
        $this->setVendor($matches[3]);
        $this->setModel('Generic');
        $this->setOs('Linux');
        $this->setOsVersion($matches[2]);
        $this->setOsDate(new \DateTime("{$matches[7]}/{$matches[6]}/{$matches[10]}:{$matches[8]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($matches[9]));
    }
}
