<?php

if (preg_match('/^Xerox Phaser/', $sysDescr) or preg_match('/^Xerox WorkCentre/', $sysDescr) or preg_match('/^FUJI XEROX DocuPrint/', $sysDescr)) {
    $this->setVendor('Xerox Corporation');
    $this->setModel('Generic');
    $this->setOs('Xerox');
}