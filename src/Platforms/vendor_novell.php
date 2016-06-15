<?php

if (strstr($sysDescr, 'Novell NetWare')) {
    $os = 'netware';
    $this->setVendor('Novell');
    $this->setModel('Generic');
    $this->setOs('NetWare');
}