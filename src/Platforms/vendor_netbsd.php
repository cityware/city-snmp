<?php
if (preg_match('/^NetBSD/', $sysDescr)) {
    $this->setVendor('NetBSD Foundation');
    $this->setModel('Generic');
    $this->setOs('NetBSD');
}