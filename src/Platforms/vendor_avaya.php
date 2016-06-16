<?php
if (preg_match('/^Ethernet Routing Switch/', $sysDescr) or preg_match('/^ERS-/', $sysDescr)) {
    $this->setVendor('Avaya');
    $this->setModel('Generic');
    $this->setOs('Avaya ERS');
}