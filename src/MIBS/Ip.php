<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on generic devices
 *
 * @copyright Copyright (c) 2012 - 2016, Open Source Solutions Limited, Dublin, Ireland
 * @author Luis Alberto Herrero <laherre@unizar.es>
 */
class Ip extends \Cityware\Snmp\MIB
{
    const OID_IP_NET_TO_MEDIA_PHY_ADDRESS                = '.1.3.6.1.2.1.4.22.1.2';
    const OID_IP_ADDRESS                                 = '.1.3.6.1.2.1.4.20.1.1';
    
    /** Returns an associative array of IpAddresses of device
     *
     * e.g.	[10.0.0.1] => 10.0.0.1
     *
     * @return array Associative of IP ADDRESS (value) to ip address (key)
     */
    public function ipAddressList() {
        return $this->getSNMP()->subOidWalk(self::OID_IP_ADDRESS, 11, -1 );
    }
    
    /**
     * IP Addresses listen by this device and mac associated to the ip
     *   also the interface index (if) where listen. Usually interface could
     *   by virtual interface (VLAN)
     * @return array [ 'if.ip' => 'mac' ]
      */
    public function ipMacIf() {
        return $this->getSNMP()->subOidWalk(self::OID_IP_NET_TO_MEDIA_PHY_ADDRESS, 11, -1 );
    }
}
