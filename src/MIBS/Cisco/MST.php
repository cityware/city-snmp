<?php

namespace Cityware\Snmp\MIBS\Cisco;

/**
 * A class for performing SNMP V2 queries on Cisco devices
 */
class MST extends \Cityware\Snmp\MIBS\Cisco
{

    const OID_STP_X_MST_MAX_INSTANCE_NUMBER = '.1.3.6.1.4.1.9.9.82.1.11.1.0'; 
    const OID_STP_X_MST_REGION_NAME         = '.1.3.6.1.4.1.9.9.82.1.11.2.0'; 
    const OID_STP_X_MST_REGION_REVISION     = '.1.3.6.1.4.1.9.9.82.1.11.3.0'; 
    
    
    /**
     * Returns the maximum MST instance number
     *
     * > "The maximum MST (Multiple Spanning Tree) instance id, 
     * > that can be supported by the device for Cisco proprietary
     * > implementation of the MST Protocol.
     * > 
     * > This object is deprecated and replaced by stpxSMSTMaxInstanceID."
     *
     * @deprecated Use \Cityware\Snmp\MIBS\Cisco\SMST::maxInstanceID()
     * @return string The maximum MST instance number
     */
    public function maxInstanceNumber()
    {
        return $this->getSNMP()->get( self::OID_STP_X_MST_MAX_INSTANCE_NUMBER );
    }
    
    /**
     * Returns the operational MST region name.
     *
     * @return string The operational MST region name
     */
    public function regionName()
    {
        return $this->getSNMP()->get( self::OID_STP_X_MST_REGION_NAME );
    }
    
    /**
     * Returns the operational MST region revision.
     *
     * @deprecated Use \Cityware\Snmp\MIBS\Cisco\SMST::regionRevision()
     * @return string The operational MST region revision
     */
    public function regionRevision()
    {
        return $this->getSNMP()->get( self::OID_STP_X_MST_REGION_REVISION );
    }
    
    
    /**
     * Get the device's MST port roles (by given instance id)
     *
     * Only ports participating in MST for the given instance id are returned.
     *
     * > "An entry containing the port role information for the RSTP
     * > protocol on a port for a particular Spanning Tree instance."
     *
     * The original OIDs for this are deprecated:
     *
     * > stpxMSTPortRoleTable - 1.3.6.1.4.1.9.9.82.1.11.12
     * > 
     * > "A table containing a list of the bridge ports for a 
     * > particular MST instance. This table is only instantiated 
     * > when the stpxSpanningTreeType is mst(4). 
     * > 
     * > This table is deprecated and replaced with 
     * > stpxRSTPPortRoleTable."
     *
     *
     * @see RSTP::portRoles()
     * @param int $iid The MST instance ID to query port roles for
     * @param boolean $translate If true, return the string representation via RSTP::$STP_X_RSTP_PORT_ROLES
     * @return array The device's MST port roles (by given instance id)
     */
    public function portRoles( $iid, $translate = false )
    {
        return $this->getSNMP()->useCisco_RSTP()->portRoles( $iid, $translate );
    }



}
