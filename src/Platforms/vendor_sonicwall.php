<?php
if (strstr($sysDescr, 'SonicWALL')) {
    $this->setVendor('SonicWALL');
    $this->setModel('Generic');
    $this->setOs('SonicWALL');
}