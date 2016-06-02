<?php

namespace Cityware\Snmp\MIBS\Cisco;

/**
 * A class for performing SNMP V2 queries on Cisco devices
 *
 * @copyright Copyright (c) 2012-2016, Open Source Solutions Limited, Dublin, Ireland
 * @author Luis Alberto Herrero <laherre@unizar.es>
 */
class PAGP extends \Cityware\Snmp\MIBS\Cisco
{

    const OID_PAGP_GROUPIFINDEX                 = '1.3.6.1.4.1.9.9.98.1.1.1.1.8';
    
    /**
     *
     * @return associative array with the physic interface index (key) and the agregation port ifindex (value)
     *   if key == value OR value == 0 not agregation
     */
    public function groupIfIndex() {
        return $this->getSNMP()->subOidWalk( self::OID_PAGP_GROUPIFINDEX, 15 );
    }
    
    /**
     * Gets an associate array of PAGP ports with the [id] => name of it's constituent ports
     *
     * E.g.:
     *    [5048] => Array
     *        (
     *            [10111] => GigabitEthernet1/0/11
     *            [10112] => GigabitEthernet1/0/12
     *        )
     *
     * @return array Associate array of LAG ports with the [id] => name of it's constituent ports
     */
    public function getPAGPPorts()
    {
        $ports = array();

        foreach( $this->groupIfIndex() as $portId => $aggPortId )
            if( $aggPortId != 0 &&  $portId != $aggPortId)
                $ports[ $aggPortId ][$portId] = $this->getSNMP()->useIface()->names()[$portId];

        return $ports;
    }

}
