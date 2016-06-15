<?php
if (strstr($sysDescr, 'Apple AirPort') or strstr($sysDescr, 'Apple Base Station') or strstr($sysDescr, 'Base Station V3.84')) {
    $this->setVendor('Apple Inc');
    $this->setModel('Generic');
    $this->setOs('Apple AirPort');
}