<?php

if (strstr($sysDescr, 'APC Web/SNMP Management Card') or strstr($sysDescr, 'APC Switched Rack PDU') or strstr($sysDescr, 'APC MasterSwitch PDU') or strstr($sysDescr, 'APC Metered Rack PDU')) {
    $this->setVendor('American Power Conversion Corp');
    $this->setModel('Generic');
    $this->setOs('APC');
}