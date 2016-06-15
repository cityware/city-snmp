<?php

if (preg_match('/8VD-X20/', $sysDescr) or preg_match('/SensorProbe/i', $sysDescr)) {
    if (preg_match('/8VD-X20/', $sysDescr)) {
        $os = 'Minkels RMS';
    }

    if (preg_match('/SensorProbe/i', $sysDescr)) {
        $os = 'AKCP';
    }
    $this->setVendor('AKCP Data Center Monitoring');
    $this->setModel('Generic');
    $this->setOs($os);
}