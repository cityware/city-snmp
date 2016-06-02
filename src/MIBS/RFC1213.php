<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class RFC1213 extends \Cityware\Snmp\MIB
{
    const OID_RFC1213_PHYSADDRESS                  = '.1.3.6.1.2.1.3.1.1.2';
    
    /**
     *
     * NOTE- must use "community@vlan" as  community
     *
     * @param $ifindex
     * @return associative array for macaddress in this device
     *      [
     *          "ifindex.instance.ip" => macaddress
     *      ]
     * (instance usually "1", ifindex the vlan_ifindex if vlan )
     * ex.
     *      [
     *          "53.1.10.0.1.5" => "0008E4F1F322",
     *      ]
     *  if $ifindex only search for this ifindex, if $ifindex and $ip search for both
     */
    public function physAddress($ifindex = null, $ip = null) {
        
        $oid = self::OID_RFC1213_PHYSADDRESS;
        
        if ($ifindex) {
            $oid .= "." . $ifindex;
            if ($ip) {
                $oid .= ".1." . $ip;
            }
        }
        return $this->getSNMP()->subOidWalk($oid, 11, -1);
    }

}
