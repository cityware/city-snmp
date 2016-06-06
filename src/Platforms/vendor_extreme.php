<?php

// Works with sysDescr such as:
//
// 'ExtremeXOS (X460-48t) version 15.2.2.7 v1522b7-patch1-1 by release-manager on Tue Nov 20 17:14:11 EST 2012'
// 'ExtremeXOS (X460-48x) version 15.2.2.7 v1522b7-patch1-6 by release-manager on Thu Jan 31 11:11:52 EST 2013'
// 'ExtremeXOS (X670V-48x) version 15.2.2.7 v1522b7-patch1-6 by release-manager on Thu Jan 31 11:11:52 EST 2013'
// 'ExtremeXOS version 12.5.3.9 v1253b9 by release-manager on Tue Apr 26 20:36:04 PDT 2011'

if (substr($sysDescr, 0, 11) == 'ExtremeXOS ') {
    $this->setVendor('Extreme Networks');
    $this->setOs('ExtremeXOS');

    if (substr($sysDescr, 0, 18) == 'ExtremeXOS version') {
        preg_match('/ExtremeXOS\sversion\s([a-zA-Z0-9\.\-]+\s[a-zA-Z0-9\.\-]+)\sby\srelease-manager\son\s([a-zA-Z]+)\s([a-zA-Z]+)\s(\d+)\s((\d\d):(\d\d):(\d\d))\s([a-zA-Z]+)\s(\d\d\d\d)/', $sysDescr, $matches);

        $this->setOsVersion($matches[1]);
        $this->setOsDate(new \DateTime("{$matches[4]}/{$matches[3]}/{$matches[10]}:{$matches[5]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($matches[9]));

        // the model is not included in the system description here so we need to pull it out of the entity MIB
        // this may need to be checked on a model by model basis.
        // Works for:
        $this->setModel($this->getSNMPHost()->get('.1.3.6.1.2.1.47.1.1.1.1.2.1'));
    } else if (substr($sysDescr, 0, 12) == 'ExtremeXOS (') {
        preg_match('/ExtremeXOS\s\((.+)\)\sversion\s([a-zA-Z0-9\.\-]+\s[a-zA-Z0-9\.\-]+)\sby\srelease-manager\son\s([a-zA-Z]+)\s([a-zA-Z]+)\s(\d+)\s((\d\d):(\d\d):(\d\d))\s([a-zA-Z]+)\s(\d\d\d\d)/', $sysDescr, $matches);

        $this->setModel($matches[1]);
        $this->setOsVersion($matches[2]);
        $this->setOsDate(new \DateTime("{$matches[5]}/{$matches[4]}/{$matches[11]}:{$matches[6]} +0000"));
        $this->getOsDate()->setTimezone(new \DateTimeZone($matches[10]));
    } else {
        $this->setModel('Unknown');
        $this->setOsVersion('Unknown');
        $this->setOsDate(null);
    }

    try {
        $this->setSerialNumber($this->getSNMPHost()->useExtreme_Chassis()->systemID());
    } catch (Exception $e) {
        $this->setSerialNumber('(error)');
    }
}

