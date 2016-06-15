<?php

if (strstr($sysDescr, 'Ethernet Routing Switch') or strstr($sysDescr, 'ERS-')) {
    $this->setVendor('Avaya');
    $this->setModel('Generic');
    $this->setOs('Avaya ERS');
}