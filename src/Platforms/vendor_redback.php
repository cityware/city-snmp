<?php

if (preg_match('/Redback/', $sysDescr)) {
    $this->setVendor('Redback Networks');
    $this->setModel('Generic');
    $this->setOs('Redback');
}