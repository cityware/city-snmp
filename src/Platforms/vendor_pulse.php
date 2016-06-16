<?php

if (preg_match('/^Pulse Connect Secure/', $sysDescr)) {
    $this->setVendor('Pulse Secure');
    $this->setModel('Generic');
    $this->setOs('Pulse');
}