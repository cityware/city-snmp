<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Bridge extends \Cityware\Snmp\MIB {

    const OID_BRIDGE_BASE_PORT_IF_INDEX    = '.1.3.6.1.2.1.17.1.4.1.2';
    const OID_BRIDGE_MAC_ADDRESS           = '.1.3.6.1.2.1.17.4.3.1.1';
    const OID_BRIDGE_MAC_ADDRESS_BASE_PORT = '.1.3.6.1.2.1.17.4.3.1.2';

    /**
     * Returns an associate array of STP port IDs (key) to interface IDs (value)
     *
     * e.g.  [22] => 10122
     *
     * @param $baseport int base port to ask for
     * @return array Associate array of STP port IDs (key) to interface IDs (value) or only for $baseport if supplied
     */
    public function basePortIfIndexes($baseport = null)
    {
        $oid = self::OID_BRIDGE_BASE_PORT_IF_INDEX;
        if ($baseport) {
            $oid .= "." . $baseport;
        }
        return $this->getSNMP()->subOidWalk($oid, 12);
    }

    /**
     * Returns array Associative MAC ADDRESSES (value) to unique index (key)
     * NOTE: unique index (key) is the decimal macaddress
     *   (ex. 0.0.136.54.152.12 is 00:00:88:36:98:0C
     *
     * e.g.	[0.0.136.54.152.12] => 00008836980C
     *
     * @return array Associative MAC ADDRESSES (value) to unique index (key)
     */
    public function macAddressList() {
        return $this->getSNMP()->subOidWalk(self::OID_BRIDGE_MAC_ADDRESS, 12, -1);
    }

    /**
     * Returns array Associative of BasePort (value) to unique index (key)
     * for mac address listed in self::macAddressList()
     *  Use basePortIfIndexes to obtain interface
     * NOTE: unique index (key) is the decimal macaddress
     *   (ex. 0.0.136.54.152.12 is 00:00:88:36:98:0C
     *
     * e.g.	[0.0.136.54.152.12] => 2
     *
     *
     * @param $decimalmac string macaddress in decimal format (see NOTE) to search for
     * @return array Associative of BasePort (value) to unique index (key)
     *   for mac address listed in self::macAddressList() or only for $decimalmac if supplied
     */
    public function macAddressBasePort($decimalmac = null) {
        $oid = self::OID_BRIDGE_MAC_ADDRESS_BASE_PORT;
        if ($decimalmac) {
            $oid .= "." . $decimalmac;
        }
        return $this->getSNMP()->subOidWalk($oid, 12, -1);
    }

}
