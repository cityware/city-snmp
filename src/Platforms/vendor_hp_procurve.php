<?php

// Works with sysDescr such as:
//
// 'ProCurve J4903A Switch 2824, revision I.08.98, ROM I.08.07 (/sw/code/build/mako(ts_08_5))'

if (substr($sysDescr, 0, 9) == 'ProCurve ') {
    if (preg_match('/ProCurve (\w+) Switch (\w+).*, revision ([A-Z0-9\.]+), ROM ([A-Z0-9\.]+ .*)/', $sysDescr, $matches)) {
        $this->setVendor('Hewlett-Packard');
        $this->setModel("Procurve Switch {$matches[2]} ({$matches[1]})");
        $this->setOs('ProCurve');
        $this->setOsVersion($matches[3]);
        $this->setOsDate(null);
        //$this->getOsDate()->setTimezone( new \DateTimeZone( 'UTC' ) );
    }

    try {
        $this->setSerialNumber($this->getSNMPHost()->useHP_ProCurve_Chassis()->serialNumber());
    } catch (Exception $e) {
        $this->setSerialNumber('(error)');
    }
}
