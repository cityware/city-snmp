<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class LAG extends \Cityware\Snmp\MIB {

    /**
     * The identifier value (port ID) of the Aggregator that this Aggregation Port is currently attached
     * to. Zero indicates that the Aggregation Port is not currently attached to an Aggregator.
     */
    const OID_LAG_PORT_ATTACHED_ID = '.1.2.840.10006.300.43.1.2.1.1.13';

    /**
     *  Boolean value indicating whether the Aggregator represents an Aggregate (`TRUE') or an Individual link (`FALSE')
     */
    const OID_LAG_AGGREGATE_OR_INDIVIDUAL = '.1.2.840.10006.300.43.1.2.1.1.24';

    /**
     * Returns an associate array of port IDs with a boolean value to indicate if it's an aggregate port (true)
     * or an individual port (false).
     *
     * @return array Associate array of port IDs with a boolean value to indicate if it's an aggregate port (true) or not
     */
    public function isAggregatePorts() {
        return $this->getSNMP()->ppTruthValue($this->getSNMP()->walk1d(self::OID_LAG_AGGREGATE_OR_INDIVIDUAL));
    }

    /**
     * Returns an associate array of port IDs with the ID of the aggregate port that
     * they are a member of (else 0 if not a LAG port)
     *
     *
     * @return array Associate array of port IDs with the ID of the aggregate port that they are a member of
     */
    public function portAttachedIds() {
        return $this->getSNMP()->walk1d(self::OID_LAG_PORT_ATTACHED_ID);
    }

    /**
     * Gets an associate array of LAG ports with the [id] => name of it's constituent ports
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
    public function getLAGPorts() {
        $ports = array();

        foreach ($this->portAttachedIds() as $portId => $aggPortId)
            if ($aggPortId != 0)
                $ports[$aggPortId][$portId] = $this->getSNMP()->useIface()->names()[$portId];

        return $ports;
    }

    /**
     * Utility function to identify configured but unattached LAG ports
     *
     * @return array Array of indexed port ids (array index, not value) of configured but unattached LAG ports
     */
    public function findFailedLAGPorts() {
        // find all configured LAG ports
        $lagPorts = $this->isAggregatePorts();

        // find all attached ports
        $attachedPorts = $this->portAttachedIds();

        foreach ($lagPorts as $portId => $isLAG) {
            if (!$isLAG) {
                unset($lagPorts[$portId]);
                continue;
            }

            if ($attachedPorts[$portId] != 0)
                unset($lagPorts[$portId]);
        }

        // we should be left with configured but unattached LAG ports
        return( $lagPorts );
    }

}
