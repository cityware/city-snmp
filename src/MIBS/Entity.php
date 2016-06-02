<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Entity extends \Cityware\Snmp\MIB
{
    const OID_ENTITY_PHYSICAL_DESCRIPTION    = '.1.3.6.1.2.1.47.1.1.1.1.2';
    const OID_ENTITY_PHYSICAL_CLASS          = '.1.3.6.1.2.1.47.1.1.1.1.5';
    const OID_ENTITY_PHYSICAL_PARENT_REL_POS = '.1.3.6.1.2.1.47.1.1.1.1.6';
    const OID_ENTITY_PHYSICAL_NAME           = '.1.3.6.1.2.1.47.1.1.1.1.7';
    const OID_ENTITY_PHYSICAL_SERIALNUM      = '.1.3.6.1.2.1.47.1.1.1.1.11';
    const OID_ENTITY_PHYSICAL_ALIAS          = '.1.3.6.1.2.1.47.1.1.1.1.14';


    /**
     * Returns an associate array of entPhysicalDescr
     *
     * e.g.
     *
     *     [1] = STRING: "Cisco Systems Catalyst 6500 9-slot Chassis System"
     *     [2] = STRING: "Cisco Systems Catalyst 6500 9-slot Physical Slot"
     *     [3] = STRING: "Cisco Systems Catalyst 6500 9-slot Physical Slot"
     *     [4] = STRING: "Cisco Systems Catalyst 6500 9-slot Physical Slot"
     *
     *
     *
     * @return array Associate array of entPhysicalDescr
     */
    public function physicalDescription()
    {
        return $this->getSNMP()->walk1d( self::OID_ENTITY_PHYSICAL_DESCRIPTION );
    }

    /**
     * Returns an associate array of entPhysicalName
     *
     * e.g.
     *
     *     [1] = STRING: "WS-C6509-E"
     *     [2] = STRING: "Physical Slot 1"
     *     [3] = STRING: "Physical Slot 2"
     *     [4] = STRING: "Physical Slot 3"
     *
     *
     *
     * @return array Associate array of entPhysicalName
     */
    public function physicalName()
    {
        return $this->getSNMP()->walk1d( self::OID_ENTITY_PHYSICAL_NAME );
    }

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_CHASSIS = 3;

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_CONTAINER = 5;

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_POWER_SUPPLY = 6;

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_FAN = 7;

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_SENSOR = 8;

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_MODULE = 9;

    /**
     * Physical entitly class type
     * @var Physical entitly class type
     */
    const PHYSICAL_CLASS_PORT = 10;


    /**
     * Translator array for physical class types
     * @var array Translator array for physical class types
     */
    public static $ENTITY_PHSYICAL_CLASS = array(
        self::PHYSICAL_CLASS_CHASSIS      => 'chassis',
        self::PHYSICAL_CLASS_CONTAINER    => 'container',
        self::PHYSICAL_CLASS_POWER_SUPPLY => 'powerSupply',
        self::PHYSICAL_CLASS_FAN          => 'fan',
        self::PHYSICAL_CLASS_SENSOR       => 'sensor',
        self::PHYSICAL_CLASS_MODULE       => 'module',
        self::PHYSICAL_CLASS_PORT         => 'port'
    );

    /**
     * Returns an associate array of entPhysicalClass
     *
     * e.g.  [1005] => 10 / port
     *
     *
     * @param boolean $translate If true, return the string representation via self::$ENTITY_PHSYICAL_CLASS
     * @return array Associate array of entPhysicalClass
     */
    public function physicalClass( $translate = false )
    {
        $classes = $this->getSNMP()->walk1d( self::OID_ENTITY_PHYSICAL_CLASS );

        if( !$translate )
            return $classes;

        return $this->getSNMP()->translate( $classes, self::$ENTITY_PHSYICAL_CLASS );
    }


    /**
     * Returns an associate array of entPhysicalParentRelPos
     *
     * e.g.  [1005] => 1
     *
     *
     * @return array Associate array of entPhysicalParentRelPos
     */
    public function physicalParentRelPos()
    {
        return $this->getSNMP()->walk1d( self::OID_ENTITY_PHYSICAL_PARENT_REL_POS );
    }

    /**
     * Returns an associate array of physical aliases
     *
     * e.g.  [1005] => 10001
     *
     *
     * @return array Associate array of physical aliases
     */
    public function physicalAlias()
    {
        return $this->getSNMP()->walk1d( self::OID_ENTITY_PHYSICAL_ALIAS );
    }


    /**
     * Utility function for MIBS\Cisco\RSTP::rstpPortRole() to try and translate a port index
     * into a port ID
     *
     * Makes a number of assumptions including that it has to be of type port, that the ID must be >10000,
     * etc.
     *
     * @return Array of relative positions to port IDs
     */
    public function relPosToAlias()
    {
        $rtn = [];
        $aliases = $this->physicalAlias();
        foreach( $this->physicalParentRelPos() as $index => $pos )
        {
            if( isset( $aliases[ $index ] ) && strlen( $aliases[ $index ] )
                    && is_numeric( $aliases[ $index ] ) && $aliases[ $index ] > 10000
                    && !isset( $rtn[ $pos ] ) && $this->physicalClass()[ $index ] == self::PHYSICAL_CLASS_PORT )
                $rtn[ $pos ] = $aliases[ $index ];
        }

        return $rtn;
    }
    
    /**
     * Returns an associate array of entPhysicalSerialNum
     *
     * e.g.
     *
     *     [1001] = STRING: "FOC16829FD54"
     *     [1002] = STRING: ""
     *     [1003] = STRING: ""
     *     [1004] = STRING: ""
     *
     * @return array Associate array of entPhysicalSerialNum
     */
    public function physicalSerialNum()
    {
        return $this->getSNMP()->walk1d( self::OID_ENTITY_PHYSICAL_SERIALNUM );
    }


}
