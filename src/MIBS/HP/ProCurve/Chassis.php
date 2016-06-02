<?php

namespace Cityware\Snmp\MIBS\HP\ProCurve;

/**
 * A class for performing SNMP V2 queries on HP ProCurve devices
 */
class Chassis extends \Cityware\Snmp\MIBS\Foundry
{

    const OID_SERIAL_NUMBER          = '.1.3.6.1.4.1.11.2.36.1.1.2.9.0';


    /**
     * Get the device's serial number
     *
     * @return string The chassis serial number
     */
    public function serialNumber()
    {
        return $this->getSNMP()->get( self::OID_SERIAL_NUMBER );
    }
}
