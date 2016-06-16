<?php

if (preg_match('/^Raritan/', $sysDescr) or preg_match('/^PX2/', $sysDescr)) {
    $this->setVendor('Raritan');
    $this->setModel('Generic');
    $this->setOs('Raritan');
}