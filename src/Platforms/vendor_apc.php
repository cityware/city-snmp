<?php

if (preg_match('/^APC Web\/SNMP Management Card/', $sysDescr) or 
        preg_match('/^APC Switched Rack PDU/', $sysDescr) or 
        preg_match('/^APC MasterSwitch PDU/', $sysDescr) or 
        preg_match('/^APC Metered Rack PDU/', $sysDescr)) {
    $this->setVendor('American Power Conversion Corp');
    $this->setModel('Generic');
    $this->setOs('APC');
}