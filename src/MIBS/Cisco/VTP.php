<?php

namespace Cityware\Snmp\MIBS\Cisco;

/**
 * A class for performing SNMP V2 queries on Cisco devices
 *
 * @copyright Copyright (c) 2012, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class VTP extends \Cityware\Snmp\MIBS\Cisco
{


    const OID_VTP_VLAN_STATUS          = '.1.3.6.1.4.1.9.9.46.1.3.1.1.2.1';
    const OID_VTP_VLAN_TYPE            = '.1.3.6.1.4.1.9.9.46.1.3.1.1.3.1';
    const OID_VTP_VLAN_NAME            = '.1.3.6.1.4.1.9.9.46.1.3.1.1.4.1';


    const OID_STP_X_RSTP_PORT_ROLE     = '.1.3.6.1.4.1.9.9.82.1.12.2.1.3'; // add '.$VID'; integer


    /**
     * Constant for possible value of VTP VLAN status.
     * @see vlanStates()
     */
    const VTP_VLAN_STATE_OPERATIONAL = 1;

    /**
     * Constant for possible value of VTP VLAN status.
     * @see vlanStates()
     */
    const VTP_VLAN_STATE_SUSPENDED = 2;

    /**
     * Constant for possible value of VTP VLAN status.
     * @see vlanStates()
     */
    const VTP_VLAN_STATE_MTU_TOO_BIG_FOR_DEVICE = 3;

    /**
     * Constant for possible value of VTP VLAN status.
     * @see vlanStates()
     */
    const VTP_VLAN_STATE_MTU_TOO_BIG_FOR_TRUNK = 4;

    /**
     * Text representation of VTP VLAN status.
     *
     * @see vlanStates()
     * @var array Text representations of VTP VLAN status.
     */
    public static $VTP_VLAN_STATES = array(
        self::VTP_VLAN_STATE_OPERATIONAL            => 'operational',
        self::VTP_VLAN_STATE_SUSPENDED              => 'suspended',
        self::VTP_VLAN_STATE_MTU_TOO_BIG_FOR_DEVICE => 'mtuTooBigForDevice',
        self::VTP_VLAN_STATE_MTU_TOO_BIG_FOR_TRUNK  => 'mtuTooBigForTrunk'
    );

    /**
     * Get the device's VTP VLAN States (indexed by VLAN ID)
     *
     * @see $VTP_VLAN_STATES
     * @see VTP_VLAN_STATE_OPERATIONAL and others
     *
     * @param boolean $translate If true, return the string representation via self::$VTP_VLAN_TYPES
     * @return array The device's VTP VLAN States (indexed by VLAN ID)
     */
    public function vlanStates( $translate = false )
    {
        $states = $this->getSNMP()->walk1d( self::OID_VTP_VLAN_STATUS );

        if( !$translate )
            return $states;

        return $this->getSNMP()->translate( $states, self::$VTP_VLAN_STATES );
    }




    /**
     * Constant for possible value of VTP VLAN type.
     * @see vlanTypes()
     */
    const VTP_VLAN_TYPE_ETHERNET = 1;

    /**
     * Constant for possible value of VTP VLAN type.
     * @see vlanTypes()
     */
    const VTP_VLAN_TYPE_FDDI = 2;

    /**
     * Constant for possible value of VTP VLAN type.
     * @see vlanTypes()
     */
    const VTP_VLAN_TYPE_TOKEN_RING = 3;

    /**
     * Constant for possible value of VTP VLAN type.
     * @see vlanTypes()
     */
    const VTP_VLAN_TYPE_FDDI_NET = 4;

    /**
     * Constant for possible value of VTP VLAN type.
     * @see vlanTypes()
     */
    const VTP_VLAN_TYPE_TR_NET = 5;

    /**
     * Constant for possible value of VTP VLAN type.
     * @see vlanTypes()
     */
    const VTP_VLAN_TYPE_DEPRECATED = 6;

    /**
     * Text representation of VTP VLAN types.
     *
     * @see vlanTypes()
     * @var array Text representations of VTP VLAN types.
     */
    public static $VTP_VLAN_TYPES = array(
        self::VTP_VLAN_TYPE_ETHERNET    => 'ethernet',
        self::VTP_VLAN_TYPE_FDDI        => 'fddi',
        self::VTP_VLAN_TYPE_TOKEN_RING  => 'tokenRing',
        self::VTP_VLAN_TYPE_FDDI_NET    => 'fddiNet',
        self::VTP_VLAN_TYPE_TR_NET      => 'trNet',
        self::VTP_VLAN_TYPE_DEPRECATED  => 'deprecated'
    );

    /**
     * Get the device's VTP VLAN Types (indexed by VLAN ID)
     *
     * @see $VTP_VLAN_TYPES
     * @see VTP_VLAN_TYPE_ETHERNET and others
     *
     * @param boolean $translate If true, return the string representation via self::$VTP_VLAN_TYPES
     * @return array The device's VTP VLAN types (indexed by VLAN ID)
     */
    public function vlanTypes( $translate = false )
    {
        $types = $this->getSNMP()->walk1d( self::OID_VTP_VLAN_TYPE );

        if( !$translate )
            return $types;

        return $this->getSNMP()->translate( $types, self::$VTP_VLAN_TYPES );
    }

    /**
     * Get the device's VTP VLAN names (indexed by VLAN ID)
     *
     * @return array The device's VTP VLAN names (indexed by VLAN ID)
     */
    public function vlanNames()
    {
        return $this->getSNMP()->walk1d( self::OID_VTP_VLAN_NAME );
    }



}
