<?php
if (preg_match('/^VMware ESX/', $sysDescr) or preg_match('/^VMware-vCenter-Server-Appliance/', $sysDescr)) {
    $this->setVendor('VMware');
    $this->setModel('Generic');
    $this->setOs('VMware');
}