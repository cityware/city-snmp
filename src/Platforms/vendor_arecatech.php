<?php
if (preg_match('/^Raid Subsystem V/', $sysDescr)) {
    $this->setVendor('Areca Technology Corporation');
    $this->setModel('Generic');
    $this->setOs('Areca');
}