<?php

if (preg_match('/^Palo Alto Networks/', $sysDescr)) {
    $this->setVendor('Palo Alto Networks');
    $this->setModel('Generic');
    $this->setOs('PAN-OS');
}    