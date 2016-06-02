<?php

namespace Cityware\Snmp\MIBS\Extreme\SwMonitor;

/**
 * A class for performing SNMP V2 queries on Extreme devices
 *
 * These OIDs are from the private.extremenetworks.extremeAgent.extremeSwMonitor.extremeSwMonitorCpu tree
 *
 * @copyright Copyright (c) 2013 - 2014, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Cpu extends \Cityware\Snmp\MIBS\Extreme\SwMonitor
{

    const OID_TOTAL_UTILIZATION       = '.1.3.6.1.4.1.1916.1.32.1.2.0';

    /**
     * Total CPU utlization (percentage) as of last sampling.
     *
     * @return int Total CPU utlization (percentage) as of last sampling.
     */
    public function totalUtilization()
    {
        return $this->getSNMP()->get( self::OID_TOTAL_UTILIZATION );
    }


}
