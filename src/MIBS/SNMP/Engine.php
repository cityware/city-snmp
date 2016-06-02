<?php

namespace Cityware\Snmp\MIBS\SNMP;

/**
 * A class for performing SNMP V2 queries
 *
 * @copyright Copyright (c) 2013, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Engine extends \Cityware\Snmp\MIB
{
    const OID_TIME          = '.1.3.6.1.6.3.10.2.1.3.0';

    /**
     * Get the SNMP engine time
     *
     *
     * > "The number of seconds since the value of the snmpEngineBoots object last changed.
     * > When incrementing this objects value would cause it to exceed its maximum, snmpEngineBoots
     * > is incremented as if a re-initialization had occurred, and this objects value consequently
     * > reverts to zero."
     *
     * @see http://tools.cisco.com/Support/SNMP/do/BrowseOID.do?local=en&translate=Translate&objectInput=1.3.6.1.6.3.10.2.1.2#oidContent
     *
     * @return int The SNMP engine time
     */
    public function time()
    {
        return $this->getSNMP()->get( self::OID_TIME );
    }

}
