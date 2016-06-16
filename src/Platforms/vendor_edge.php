<?php

if (preg_match('/^EdgeOS/', $sysDescr)) {
    $this->setVendor('Edge');
    $this->setModel('Generic');
    $this->setOs('EdgeOS');
}
