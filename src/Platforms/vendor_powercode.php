<?php

if (preg_match('/^Powercode BMU/', $sysDescr)) {
    $this->setVendor('Powercode');
    $this->setModel('Generic');
    $this->setOs('Powercode');
}