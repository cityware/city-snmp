<?php

namespace Cityware\Snmp;


/**
 * A class for parsing device / host / platform details
 *
 * @copyright Copyright (c) 2012 - 2013, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Platform
{
    /**
     * The platform vendor
     *
     * @var string The platform vendor
     */
    protected $_vendor = 'Unknown';

    /**
     * The platform model
     *
     * @var string The platform model
     */
    protected $_model = 'Unknown';

    /**
     * The platform operating system
     *
     * @var string The platform operating system
     */
    protected $_os = 'Unknown';

    /**
     * The platform operating system version
     *
     * @var string The platform operating system version
     */
    protected $_osver = 'Unknown';

    /**
     * The platform operating system (compile) date
     *
     * @var string The platform operating system (compile) date
     */
    protected $_osdate = null;

    /**
     * The platform serial number
     *
     * @var string The platform serial number
     */
    protected $_serial = '(not implemented)';

    /**
     * The \Cityware\Snmp\SNMP object
     *
     * @var string The \Cityware\Snmp\SNMP object
     */
    protected $_snmpHost;


    /**
     * The constructor.
     *
     * @param SNMP $snmpHost The SNMP Host object
     * @return Platform An instance of $this (for fluent interfaces)
     */
    public function __construct( $snmpHost )
    {
        $this->setSNMPHost( $snmpHost );

        $this->parse();

        return $this;
    }



    public function parse()
    {
        // query the platform for it's description and parse it for details

        $sysDescr    = $this->getSNMPHost()->useSystem()->description();

        try {
            $sysObjectId =  $this->getSNMPHost()->useSystem()->systemObjectID();
        } catch( Exception $e ){
            $sysObjectId = null;
        }
        
        // there's possibly a better way to do this...?
        foreach( glob(  __DIR__ . '/Platforms/vendor_*.php' ) as $f )
            include( $f );
    }

    /**
     * Set the SNMPT Host
     *
     * @param \Cityware\Snmp\SNMP $s The SNMP Host object
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setSNMPHost( $s )
    {
        $this->_snmpHost = $s;
        return $this;
    }

    /**
     * Get the SNMPHost object
     *
     * @return \Cityware\Snmp\SNMP The SNMP object
     */
    public function getSNMPHost()
    {
        return $this->_snmpHost;
    }

    /**
     * Set vendor
     *
     * @param string $s
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setVendor( $s )
    {
        $this->_vendor = $s;
        return $this;
    }

    /**
     * Set model
     *
     * @param string $s
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setModel( $s )
    {
        $this->_model = $s;
        return $this;
    }

    /**
     * Set operating system
     *
     * @param string $s
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setOs( $s )
    {
        $this->_os = $s;
        return $this;
    }

    /**
     * Set OS version
     *
     * @param string $s
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setOsVersion( $s )
    {
        $this->_osver = $s;
        return $this;
    }

    /**
     * Set OS date
     *
     * @param string $s
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setOsDate( $s )
    {
        $this->_osdate = $s;
        return $this;
    }

    /**
     * Set the serial number
     *
     * @param string $s
     * @return \Cityware\Snmp\Platform For fluent interfaces
     */
    public function setSerialNumber( $s )
    {
        $this->_serial = $s;
        return $this;
    }

    /**
     * Get vendor
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->_vendor;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * Get operating system
     *
     * @return string
     */
    public function getOs()
    {
        return $this->_os;
    }

    /**
     * Get OS version
     *
     * @return string
     */
    public function getOsVersion()
    {
        return $this->_osver;
    }

    /**
     * Get OS date
     *
     * return \DateTime
     */
    public function getOsDate()
    {
        return $this->_osdate;
    }

    /**
     * Get the serial number
     *
     * return string
     */
    public function getSerialNumber()
    {
        return $this->_serial;
    }

}
