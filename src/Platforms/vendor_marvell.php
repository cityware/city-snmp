<?php
if (strstr($sysDescr, 'Neyland 24T') or strstr($sysDescr, 'AT-8000')) {
    $this->setVendor('Marvell Technology Group');
    $this->setModel('Generic');
    $this->setOs('RadLan');
}