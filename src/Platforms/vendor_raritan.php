<?php

if (strstr($sysDescr, 'Raritan') or strstr($sysDescr, 'PX2')) {
    $this->setVendor('Raritan');
    $this->setModel('Generic');
    $this->setOs('Raritan');
}