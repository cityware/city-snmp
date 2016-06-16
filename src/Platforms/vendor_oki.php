<?php

if (preg_match('/^OKI OkiLAN/', $sysDescr)) {
    $this->setVendor('Oki Electric Industry');
    $this->setModel('Generic');
    $this->setOs('OkiLAN');
}