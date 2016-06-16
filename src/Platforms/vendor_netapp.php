<?php

if (preg_match('/^NetApp/', $sysDescr)) {
    $this->setVendor('NetApp');
    $this->setModel('Generic');
    $this->setOs('NetApp');
}