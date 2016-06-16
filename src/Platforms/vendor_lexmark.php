<?php
if (preg_match('/^Lexmark/', $sysDescr)) {
    $this->setVendor('Lexmark');
    $this->setModel('Generic');
    $this->setOs('Lexmark Printer');
}