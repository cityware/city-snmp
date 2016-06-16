<?php

if (preg_match('/D-Link DES-/', $sysDescr) or preg_match('/Dlink DES-/', $sysDescr) or preg_match('/^DES-/', $sysDescr) or preg_match('/^DGS-/', $sysDescr)) {
    $this->setVendor('DLink Corporation');
    $this->setModel('Generic');
    $this->setOs('DLink');
} else if (preg_match('/D-Link .* AP/', $sysDescr) or preg_match('/D-Link DAP-/', $sysDescr) or preg_match('/D-Link Access Point/', $sysDescr)) {
    $this->setVendor('DLink Corporation');
    $this->setModel('Generic');
    $this->setOs('DLink AP');
}

