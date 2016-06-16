<?php

if (preg_match('/^KYOCERA/', $sysDescr)) {
    $this->setVendor('Kyocera Group');
    $this->setModel('Generic');
    $this->setOs('Kyocera');
}