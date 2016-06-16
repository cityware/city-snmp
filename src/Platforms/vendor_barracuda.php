<?php

if (stristr($sysDescr, 'Barracuda Load Balancer') || stristr($sysDescr, 'Barracuda Load Balancer ADC')) {
    $this->setVendor('Barracuda');
    $this->setModel('Generic');
    $this->setOs('Barracuda Load Balancer');
} else if (stristr($sysDescr, 'Barracuda Spam Firewall')) {
    $this->setVendor('Barracuda');
    $this->setModel('Generic');
    $this->setOs('Barracuda Spam Firewall');
}

