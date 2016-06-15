<?php

if (strstr($sysDescr, 'Samsung CLX') || strstr($sysDescr, 'Samsung SCX')) {
    $this->setVendor('Samsung Electronics');
    $this->setModel('Generic');
    $this->setOs('Samsung Printer');
}