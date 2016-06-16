<?php

if (preg_match('/^Blade Network Technologies/', $sysDescr) or preg_match('/^BNT /', $sysDescr)) {
    $this->setVendor('IBM System Networking');
    $this->setModel('Blade');
    $this->setOs('BNT');
} else if (preg_match('/^IBM Networking Operating System/', $sysDescr) or preg_match('/^IBM Flex System Fabric/', $sysDescr)) {
    $this->setVendor('IBM System Networking');
    $this->setModel('IBM System');
    $this->setOs('IBM OS');
}