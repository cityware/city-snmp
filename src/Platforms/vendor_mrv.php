<?php

// Following block works with sysDescr such as:
//
// 'LX Console Manager, s/w version=5.3.2'

if (substr($sysDescr, 0, 18) == 'LX Console Manager') {
    preg_match('/LX Console Manager,\ss\/w\sversion=([0-9a-zA-Z\.]+)$/', $sysDescr, $matches);

    $this->setVendor('MRV');
    $this->setModel($this->getSNMPHost()->useMRV_System()->model());
    $this->setOs($this->getSNMPHost()->useMRV_System()->osImage());
    $this->setOsVersion($matches[1]);
    $this->setOsDate(null);
}

