<?php

if (preg_match('/AXIS .* Network Camera/', $sysDescr) or preg_match('/AXIS .* Video Server/', $sysDescr)) {
    $this->setVendor('Axis Communications');
    $this->setModel('Generic');
    $this->setOs('AXIS Cam');
} else if (preg_match('/^AXIS .* Network Document Server/', $sysDescr)) {
    $this->setVendor('Axis Communications');
    $this->setModel('Generic');
    $this->setOs('AXIS DOC Server');
}