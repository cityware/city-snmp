<?php
if (preg_match('/^Avocent/', $sysDescr) or preg_match('/^AlterPath/', $sysDescr)) {
    $this->setVendor('Avocent Corporation');
    $this->setModel('Generic');
    $this->setOs('Avocent');
}