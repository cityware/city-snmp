<?php
if (strstr($sysDescr, 'Lexmark ')) {
    $this->setVendor('Lexmark');
    $this->setModel('Generic');
    $this->setOs('Lexmark Printer');
}