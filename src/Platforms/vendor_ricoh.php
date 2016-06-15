<?php
if (strstr($sysDescr, 'RICOH Aficio') or stristr($sysDescr, 'RICOH Network Printer')) {
    $this->setVendor('Ricoh');
    $this->setModel('Generic');
    $this->setOs('Ricoh');
}