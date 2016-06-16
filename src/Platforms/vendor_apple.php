<?php
if (preg_match('/^Apple AirPort/', $sysDescr) or preg_match('/^Apple Base Station/', $sysDescr) or preg_match('/^Base Station V3.84/', $sysDescr)) {
    $this->setVendor('Apple Inc');
    $this->setModel('Generic');
    $this->setOs('Apple AirPort');
}