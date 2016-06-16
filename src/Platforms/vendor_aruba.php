<?php
if (preg_match('/^ArubaOS/', $sysDescr)) {
    $this->setVendor('Aruba Networks');
    $this->setModel('Generic');
    $this->setOs('ArubaOS');
}