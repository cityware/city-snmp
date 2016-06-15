<?php
if (strstr($sysDescr, 'Canon MF') || strstr($sysDescr, 'Canon iR')) {
    $this->setVendor('Canon');
    $this->setModel('Generic');
    $this->setOs('Canon Printer');
}