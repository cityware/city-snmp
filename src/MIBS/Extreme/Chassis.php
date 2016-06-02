<?php

namespace Cityware\Snmp\MIBS\Extreme;

/**
 * A class for performing SNMP V2 queries on Extreme devices
 *
 * @copyright Copyright (c) 2013 - 2014, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Chassis extends \Cityware\Snmp\MIBS\Extreme
{

    const OID_SYSTEM_ID          = '.1.3.6.1.4.1.1916.1.1.1.16.0';


    /**
     * Get the device's system id
     *
     * @return string The system ID (includes the serial number)
     */
    public function systemID()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_ID );
    }


}




