<?php

if (strstr($sysDescr, 'Xerox Phaser') or strstr($sysDescr, 'Xerox WorkCentre') or stristr($sysDescr, 'FUJI XEROX DocuPrint')) {
    $this->setVendor('Xerox Corporation');
    $this->setModel('Generic');
    $this->setOs('Xerox');
}