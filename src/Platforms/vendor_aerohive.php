<?php
if (preg_match('/^HiveOS/', $sysDescr)) {
    $this->setVendor('Aerohive Networks');
    $this->setModel('Generic');
    $this->setOs('HiveOS');
}