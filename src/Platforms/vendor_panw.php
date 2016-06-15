<?php
if (strstr($sysDescr, 'Palo Alto Networks')) {
    $this->setVendor('Palo Alto Networks');
    $this->setModel('Generic');
    $this->setOs('PAN-OS');
}