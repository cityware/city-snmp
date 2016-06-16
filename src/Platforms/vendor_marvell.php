<?php

if (preg_match('/^Neyland 24T/', $sysDescr) or preg_match('/^AT-8000/', $sysDescr)) {
    $this->setVendor('Marvell Technology Group');
    $this->setModel('Generic');
    $this->setOs('RadLan');
}