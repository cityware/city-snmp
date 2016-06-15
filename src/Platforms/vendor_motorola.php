<?php
if (preg_match('/^CANOPY/', $sysDescr) or preg_match('/^CMM/', $sysDescr)) {
    $this->setVendor('Motorola');
    $this->setModel('Generic');
    $this->setOs('Canopy');
}