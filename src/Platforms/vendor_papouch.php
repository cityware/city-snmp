<?php

if (preg_match('/^SNMP TME/', $sysDescr) or preg_match('/^TME/', $sysDescr)) {
    $this->setVendor('Papouch S.R.O.');
    $this->setModel('Generic');
    $this->setOs('Papouch TME');
}