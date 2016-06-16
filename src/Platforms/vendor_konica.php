<?php

if (preg_match('/^KONICA MINOLTA/', $sysDescr)) {
    $this->setVendor('Konica Minolta');
    $this->setModel('Generic');
    $this->setOs('Konica');
}