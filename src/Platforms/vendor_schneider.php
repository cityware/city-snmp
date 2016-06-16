<?php

if (preg_match('/^MGE Switched PDU/', $sysDescr)) {
    $this->setVendor('Schneider Electric');
    $this->setModel('Generic');
    $this->setOs('MGE PDU');
} else if (preg_match('/^Pulsar M/', $sysDescr) or preg_match('/^Galaxy /', $sysDescr) or preg_match('/^Evolution /', $sysDescr) or preg_match('/^MGE UPS SYSTEMS - Network Management Proxy/', $sysDescr)) {
    $this->setVendor('Schneider Electric');
    $this->setModel('Generic');
    $this->setOs('MGE UPS');
}