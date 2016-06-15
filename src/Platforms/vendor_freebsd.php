<?php

if (strstr($sysDescr, 'Voswall')) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('Voswall');
} else if (strstr($sysDescr, 'm0n0wall')) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('m0n0wall');
} else if (strstr($sysDescr, 'pfSense')) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('pfSense');
} else if (strstr($sysDescr, 'FreeBSD')) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('FreeBSD');
}