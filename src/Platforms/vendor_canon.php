<?php
if (preg_match('/^Canon MF/', $sysDescr) or preg_match('/^Canon iR/', $sysDescr)) {
    $this->setVendor('Canon');
    $this->setModel('Generic');
    $this->setOs('Canon Printer');
}