<?php

if (strstr($sysDescr, 'MGE Switched PDU')) {
    $this->setVendor('Schneider Electric');
    $this->setModel('Generic');
    $this->setOs('MGE PDU');
} else if (strstr($sysDescr, 'Pulsar M') or preg_match('/^Galaxy /', $sysDescr) or preg_match('/^Evolution /', $sysDescr) or $sysDescr == 'MGE UPS SYSTEMS - Network Management Proxy') {
    $this->setVendor('Schneider Electric');
    $this->setModel('Generic');
    $this->setOs('MGE UPS');
}