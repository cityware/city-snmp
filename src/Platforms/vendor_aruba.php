<?php
if (strstr($sysDescr, 'ArubaOS')) {
    $this->setVendor('Aruba Networks');
    $this->setModel('Generic');
    $this->setOs('ArubaOS');
}