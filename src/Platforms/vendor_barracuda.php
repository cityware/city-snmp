<?php
if(preg_match('/^Barracuda Load Balancer/', $sysDescr) or preg_match('/^Barracuda Load Balancer ADC/', $sysDescr)) {
    $this->setVendor('Barracuda');
    $this->setModel('Generic');
    $this->setOs('Barracuda Load Balancer');
} else if (preg_match('/^Barracuda Spam Firewall/', $sysDescr)) {
    $this->setVendor('Barracuda');
    $this->setModel('Generic');
    $this->setOs('Barracuda Spam Firewall');
}

