<?php

if (preg_match('/^VRP (R) Software/', $sysDescr) or preg_match('/^VRP Software Version/', $sysDescr) or preg_match('/^Software Version VRP/', $sysDescr) or preg_match('/^Versatile Routing Platform Software/', $sysDescr)) {
    $this->setVendor('Huawei');
    $this->setModel('Generic');
    $this->setOs('VRP');
}