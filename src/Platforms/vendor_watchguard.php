<?php
if (preg_match('/^(XTM|FBX)/i', $sysDescr)) {
    $this->setVendor('WatchGuard Technologies');
    $this->setModel('Generic');
    $this->setOs('Fireware OS');
}