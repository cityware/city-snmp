<?php

namespace Cityware\Snmp\MIBS\Cisco;

/**
 * A class for performing SNMP V2 queries on Cisco devices
 */
class RSTP extends \Cityware\Snmp\MIBS\Cisco
{


    const OID_STP_X_RSTP_PORT_ROLE     = '.1.3.6.1.4.1.9.9.82.1.12.2.1.3'; // add '.$VID'; integer


    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_DISABLED = 1;

    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_ROOT = 2;

    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_DESIGNATED = 3;

    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_ALTERNATE = 4;

    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_BACKUP = 5;

    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_BOUNDARY = 6;

    /**
     * Constant for possible value of STP extensions RSTP Port Role
     * @see rstpPortRole()
     */
    const STP_X_RSTP_PORT_ROLE_MASTER = 6;

    /**
     * Text representation of STP extensions RSTP Port Roles
     *
     * @see rstpPortRole()
     * @var array Text representations of STP extensions RSTP Port Role.
     */
    public static $STP_X_RSTP_PORT_ROLES = array(
        self::STP_X_RSTP_PORT_ROLE_DISABLED    => 'disabled',
        self::STP_X_RSTP_PORT_ROLE_ROOT        => 'root',
        self::STP_X_RSTP_PORT_ROLE_DESIGNATED  => 'designated',
        self::STP_X_RSTP_PORT_ROLE_ALTERNATE   => 'alternate',
        self::STP_X_RSTP_PORT_ROLE_BACKUP      => 'backUp',
        self::STP_X_RSTP_PORT_ROLE_BOUNDARY    => 'boundary',
        self::STP_X_RSTP_PORT_ROLE_MASTER      => 'master'
    );

    /**
     * Array of port states that indicate traffic is/can pass
     * @var Array of port states that indicate traffic is/can pass
     */
    public static $STP_X_RSTP_PASSING_PORT_ROLES = array(
        self::STP_X_RSTP_PORT_ROLE_ROOT        => 'root',
        self::STP_X_RSTP_PORT_ROLE_DESIGNATED  => 'designated'
    );

    /**
     * Get the device's RSTP port roles (by given vlan id)
     *
     * Only ports participating in RSTP for the given VLAN id are returned.
     *
     * This function will also convert STP port IDs to the device proper port IDs.
     * E.g. sample output:
     *
     * Array
     * (
     *    [10101] => 3
     *    [10103] => 3
     *    [10105] => 3
     *    [5048] => 2
     * )
     *
     *
     * @see $STP_X_RSTP_PORT_ROLES
     * @see STP_X_RSTP_PORT_ROLE_ROOT and others
     *
     * @param int $vid The RSTP VLAN ID to query port roles for
     * @param boolean $translate If true, return the string representation via self::$STP_X_RSTP_PORT_ROLES
     * @return array The device's RSTP port roles (by given vlan id)
     */
    public function portRoles( $vid, $translate = false )
    {
        $roles = $this->getSNMP()->walk1d( self::OID_STP_X_RSTP_PORT_ROLE . ".{$vid}" );

        // convert STP port IDs to switch port IDs
        $croles = array();
        $basePortIfIndexes = $this->getSNMP()->useBridge()->basePortIfIndexes();
        $relPosToAliases   = $this->getSNMP()->useEntity()->relPosToAlias();
        foreach( $roles as $k => $v )
        {
            if( isset( $basePortIfIndexes[ $k ] ) )
                $croles[ $basePortIfIndexes[ $k ] ] = $v;
            else if( isset( $relPosToAliases[ $k ] ) )
            {
                // and and get port ID from MIBS\Entity
                // TODO Find a better way to translate these?
                $croles[ $relPosToAliases[ $k ] ] = $v;
            }
            else
                $croles[ 'UNKNOWN-' . $k ] = $v;
        }

        if( !$translate )
            return $croles;

        return $this->getSNMP()->translate( $croles, self::$STP_X_RSTP_PORT_ROLES );
    }



}
