<?php

if (stristr($sysDescr, 'Blade Network Technologies') or preg_match('/^BNT /', $sysDescr)) {
    $this->setVendor('IBM System Networking');
    $this->setModel('Blade');
    $this->setOs('BNT');
} else if (stristr($sysDescr, 'IBM Networking Operating System') || stristr($sysDescr, 'IBM Flex System Fabric')) {
    $this->setVendor('IBM System Networking');
    $this->setModel('IBM System');
    $this->setOs('IBM OS');
}