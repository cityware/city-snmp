<?php

if (stristr($sysDescr, 'Barracuda Load Balancer') || stristr($sysDescr, 'Barracuda Load Balancer ADC')) {
    $os = 'Barracuda Load Balancer';
} else if (stristr($sysDescr, 'Barracuda Spam Firewall')) {
    $os = 'Barracuda Spam Firewall';
}

$this->setVendor('Barracuda');
$this->setModel('Generic');
$this->setOs($os);
