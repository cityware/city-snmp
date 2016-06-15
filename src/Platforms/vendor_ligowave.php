<?php

if (strstr($sysDescr, 'Deliberant')) {

    $this->setVendor('LigoWave');
    $this->setModel('Generic');
    $this->setOs('Deliberant');
} else if (preg_match('/^NFT 2N/', $sysDescr)) {

    $this->setVendor('LigoWave');
    $this->setModel('Generic');
    $this->setOs('Infinity');
} else if (preg_match('/^LigoPTP/', $sysDescr)) {
    
    $this->setVendor('LigoWave');
    $this->setModel('Generic');
    $this->setOs('Ligo OS');
}