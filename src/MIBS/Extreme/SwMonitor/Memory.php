<?php

namespace Cityware\Snmp\MIBS\Extreme\SwMonitor;

/**
 * A class for performing SNMP V2 queries on Extreme devices
 *
 * These OIDs are from the private.extremenetworks.extremeAgent.extremeSwMonitor.extremeSwMonitorMemory tree
 */
class Memory extends \Cityware\Snmp\MIBS\Extreme\SwMonitor
{

    const OID_SYSTEM_SLOT_ID      = '.1.3.6.1.4.1.1916.1.32.2.2.1.1';
    const OID_SYSTEM_TOTAL        = '.1.3.6.1.4.1.1916.1.32.2.2.1.2';
    const OID_SYSTEM_FREE         = '.1.3.6.1.4.1.1916.1.32.2.2.1.3';
    const OID_SYSTEM_USAGE        = '.1.3.6.1.4.1.1916.1.32.2.2.1.4';
    const OID_USER_USAGE          = '.1.3.6.1.4.1.1916.1.32.2.2.1.5';


    /**
     * Slot Id of the memory monitored.
     *
     * @return array Slot Id of the memory monitored.
     */
    public function slotIds()
    {
        return $this->getSNMP()->walk1d( self::OID_SYSTEM_SLOT_ID );
    }

    /**
     * Total amount of DRAM in Kbytes in the system.
     *
     * @return array Total amount of DRAM in Kbytes in the system. Indexed by slot ID.
     */
    public function systemTotal()
    {
        return $this->getSNMP()->walk1d( self::OID_SYSTEM_TOTAL );
    }

    /**
     * Total amount of free memory in Kbytes in the system.
     *
     * @return array Total amount of free memory in Kbytes in the system. Indexed by slot ID.
     */
    public function systemFree()
    {
        return $this->getSNMP()->walk1d( self::OID_SYSTEM_FREE );
    }

    /**
     * Total amount of memory used by system services in Kbytes in the system.
     *
     * @return array Total amount of memory used by system services in Kbytes in the system. Indexed by slot ID.
     */
    public function systemUsage()
    {
        return $this->getSNMP()->walk1d( self::OID_SYSTEM_USAGE );
    }

    /**
     * Total amount of memory used by applications in Kbytes in the system.
     *
     * @return array Total amount of memory used by applications in Kbytes in the system.
     */
    public function userUsage()
    {
        return $this->getSNMP()->walk1d( self::OID_USER_USAGE );
    }


    /**
     * Percentage of memory used per slot
     *
     * @return array Integer percentage of memory used
     */
    public function percentUsage()
    {
        $total = $this->systemTotal();
        $free  = $this->systemFree();

        $usage = [];

        foreach( $total as $slotId => $amount ) {
            $usage[ $slotId ] = intval( ceil( ( ( $amount - $free[ $slotId ] ) * 100 ) / $amount ) );
        }

        return $usage;
    }

}
