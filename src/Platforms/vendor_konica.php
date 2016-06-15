<?php
if (strstr($sysDescr, 'KONICA MINOLTA ')) {
    $this->setVendor('Konica Minolta');
    $this->setModel('Generic');
    $this->setOs('Konica');
}