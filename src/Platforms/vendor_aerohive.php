<?php
if (stristr($sysDescr, 'HiveOS')) {
    $this->setVendor('Aerohive Networks');
    $this->setModel('Generic');
    $this->setOs('HiveOS');
}