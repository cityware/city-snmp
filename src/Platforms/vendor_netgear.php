<?php

// Following block works with sysDescr such as:
//
// 'FS728TP'
// THIS IS JUST FOR TESTING AGAINST A SHITE SWITCH IN THE OFFICE
//
// DO NOT USE THIS AS A TEMPLATE!!!

if ($sysDescr == 'FS728TP') {
    preg_match('/LX Console Manager,\ss\/w\sversion=([0-9a-zA-Z\.]+)$/', $sysDescr, $matches);

    $this->setVendor('Netgear');
    $this->setModel($sysDescr);
    $this->setOs('Netgear');
    $this->setOsVersion($this->getSNMPHost()->get('.1.3.6.1.4.1.4526.17.2.4.0'));
    $this->setOsDate(null);
}

