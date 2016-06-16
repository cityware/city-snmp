<?php

if (preg_match('/^EPSON Built-in/', $sysDescr)) {
    $this->setVendor('EPSON Corporation');
    $this->setModel('Generic');
    $this->setOs('EPSON');
}
