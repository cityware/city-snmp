<?php

if (preg_match('/^Voswall/', $sysDescr)) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('Voswall');
} else if (preg_match('/^m0n0wall/', $sysDescr)) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('m0n0wall');
} else if (preg_match('/^pfSense/', $sysDescr)) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('pfSense');
} else if (preg_match('/^FreeBSD/', $sysDescr)) {
    $this->setVendor('FreeBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('FreeBSD');
}