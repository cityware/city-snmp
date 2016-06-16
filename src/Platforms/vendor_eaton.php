<?php
if (preg_match('/^Eaton 5PX/', $sysDescr)) {
    $this->setVendor('Eaton Corporation');
    $this->setModel('Generic');
    $this->setOs('Eaton UPS');
}