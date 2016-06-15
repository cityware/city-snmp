<?php
if (stristr($sysDescr, 'NetApp')) {
    $this->setVendor('NetApp');
    $this->setModel('Generic');
    $this->setOs('NetApp');
}