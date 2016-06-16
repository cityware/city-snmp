<?php

if (preg_match('/^3Com Switch/', $sysDescr) or preg_match('/^3Com SuperStack/', $sysDescr) or preg_match('/^3Com Baseline/', $sysDescr)) {
    $this->setVendor('3Com Corporation');
    $this->setModel('Generic');
    $this->setOs('3Com');
}