<?php
if (preg_match('/Brother NC-.*h,/', $sysDescr)) {
    $this->setVendor('Brother Industries');
    $this->setModel('Generic');
    $this->setOs('Brother');
}