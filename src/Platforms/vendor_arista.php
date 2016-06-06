<?php

// Author: Elisa Jasinska https://github.com/fooelisa
// Following block works with sysDescr such as:
//
// "Arista Networks EOS version 4.14.2F running on an Arista Networks DCS-7504"

if (substr($sysDescr, 0, 7) == 'Arista ') {
    preg_match('/Arista Networks EOS version (.+) running on an Arista Networks (.+)$/', $sysDescr, $matches);

    $this->setVendor('Arista');
    $this->setModel(isset($matches[2]) ? $matches[2] : 'Uknown' );
    $this->setOs('EOS');
    $this->setOsVersion(isset($matches[1]) ? $matches[1] : 'Unknown' );
    $this->setOsDate(null);
}
