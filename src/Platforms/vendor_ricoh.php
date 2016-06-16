<?php

if (preg_match('/^RICOH Aficio/', $sysDescr) or preg_match('/^RICOH Network Printer/', $sysDescr)) {
    $this->setVendor('Ricoh');
    $this->setModel('Generic');
    $this->setOs('Ricoh');
}