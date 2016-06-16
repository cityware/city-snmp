<?php
if (preg_match('/^PacketShaper/', $sysDescr)) {
    $this->setVendor('Blue Coat');
    $this->setModel('Generic');
    $this->setOs('PacketShaper');
}