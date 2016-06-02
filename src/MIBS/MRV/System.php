<?php

namespace Cityware\Snmp\MIBS\MRV;

/**
 * A class for performing SNMP V2 queries on MRV devices
 *
 * Specifically written for the LX-40xx series console servers
 *
 * @see http://service.mrv.com/downloads/mibs5.3.2.zip
 * @see http://service.mrv.com/support/tech_docs/36/974
 *
 * @copyright Copyright (c) 2013, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class System extends \Cityware\Snmp\MIB
{

    const OID_MRV_OS_IMAGE = '.1.3.6.1.4.1.33.100.1.1.1.0';
    const OID_MRV_MODEL    = '.1.3.6.1.4.1.33.100.1.1.12.0';

    /**
     * Returns the operating system image name
     *
     * @return string The operating system image name
     */
    public function osImage()
    {
        return $this->getSNMP()->get( self::OID_MRV_OS_IMAGE );
    }

    /**
     * Returns the hardware model
     *
     * @return string The hardware model
     */
    public function model()
    {
        return $this->getSNMP()->get( self::OID_MRV_MODEL );
    }

}
