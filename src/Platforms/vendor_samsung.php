<?php

if (preg_match('/^Samsung CLX/', $sysDescr) or preg_match('/^Samsung SCX/', $sysDescr)) {
    $this->setVendor('Samsung Electronics');
    $this->setModel('Generic');
    $this->setOs('Samsung Printer');
}