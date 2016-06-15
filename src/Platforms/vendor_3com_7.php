<?php

if (strstr($sysDescr, '3Com Switch ') or strstr($sysDescr, '3Com SuperStack') or strstr($sysDescr, '3Com Baseline')) {
    $this->setVendor('3Com Corporation');
    $this->setModel('Generic');
    $this->setOs('3Com');
}