<?php

if (preg_match('/^Novell NetWare/', $sysDescr)) {
    $this->setVendor('Novell');
    $this->setModel('Generic');
    $this->setOs('NetWare');
}