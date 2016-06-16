<?php

if (preg_match('/^Perle MCR-MGT/', $sysDescr)) {
    $this->setVendor('Perle');
    $this->setModel('Generic');
    $this->setOs('Perle');
}