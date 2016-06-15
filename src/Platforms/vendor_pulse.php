<?php
if (strstr($sysDescr, 'Pulse Connect Secure')) {
    $this->setVendor('Pulse Secure');
    $this->setModel('Generic');
    $this->setOs('Pulse');
}