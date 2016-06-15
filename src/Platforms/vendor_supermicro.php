<?php

if (preg_match('/^Supermicro Switch/', $sysDescr) or preg_match('/^SSE-/', $sysDescr) or preg_match('/^SBM-/', $sysDescr)) {
    $this->setVendor('Super Micro Computer, Inc');
    $this->setModel('Generic');
    $this->setOs('Supermicro Switch');
}