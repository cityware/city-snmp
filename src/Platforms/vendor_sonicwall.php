<?php

if (preg_match('/^SonicWALL/', $sysDescr)) {
    $this->setVendor('SonicWALL');
    $this->setModel('Generic');
    $this->setOs('SonicWALL');
}