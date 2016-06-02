<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class System extends \Cityware\Snmp\MIB
{
    const OID_SYSTEM_DESCRIPTION = '.1.3.6.1.2.1.1.1.0';
    const OID_SYSTEM_OBJECT_ID   = '.1.3.6.1.2.1.1.2.0';
    const OID_SYSTEM_UPTIME      = '.1.3.6.1.2.1.1.3.0';
    const OID_SYSTEM_CONTACT     = '.1.3.6.1.2.1.1.4.0';
    const OID_SYSTEM_NAME        = '.1.3.6.1.2.1.1.5.0';
    const OID_SYSTEM_LOCATION    = '.1.3.6.1.2.1.1.6.0';
    const OID_SYSTEM_SERVICES    = '.1.3.6.1.2.1.1.7.0';

    /**
     * Returns the system description of the device
     *
     * @return string The system description of the device
     */
    public function description()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_DESCRIPTION );
    }

    /**
     * Returns the system object ID
     *
     * "The vendor's authoritative identification of the
     * network management subsystem contained in the
     * entity.  This value is allocated within the SMI
     * enterprises subtree (1.3.6.1.4.1) and provides an
     * easy and unambiguous means for determining `what
     * kind of box' is being managed.  For example, if
     * vendor `Flintstones, Inc.' was assigned the
     * subtree 1.3.6.1.4.1.4242, it could assign the
     * identifier 1.3.6.1.4.1.4242.1.1 to its `Fred
     * Router'."
     *
     * @return string The system object ID
     */
    public function systemObjectID()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_OBJECT_ID );
    }



    /**
     * Returns the system uptime of the device
     *
     * "The time (in hundredths of a second) since the
     * network management portion of the system was last
     * re-initialized."
     *
     * @return int The system uptime of the device (in timeticks)
     */
    public function uptime()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_UPTIME );
    }

    /**
     * Returns the system contact of the device
     *
     * @return string The system contact of the device
     */
    public function contact()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_CONTACT );
    }

    /**
     * Returns the system name of the device
     *
     * @return string The system name of the device
     */
    public function name()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_NAME );
    }

    /**
     * Returns the system location of the device
     *
     * @return string The system location of the device
     */
    public function location()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_LOCATION );
    }

    /**
     * Returns the system services of the device
     *
     * "A value which indicates the set of services that
     * this entity primarily offers.
     *
     * The value is a sum.  This sum initially takes the
     * value zero, Then, for each layer, L, in the range
     * 1 through 7, that this node performs transactions
     * for, 2 raised to (L - 1) is added to the sum.  For
     * example, a node which performs primarily routing
     * functions would have a value of 4 (2^(3-1)).  In
     * contrast, a node which is a host offering
     * application services would have a value of 72
     * (2^(4-1) + 2^(7-1)).  Note that in the context of
     * the Internet suite of protocols, values should be
     * calculated accordingly:
     *
     *     layer  functionality
     *         1  physical (e.g., repeaters)
     *         2  datalink/subnetwork (e.g., bridges)
     *         3  internet (e.g., IP gateways)
     *         4  end-to-end  (e.g., IP hosts)
     *         7  applications (e.g., mail relays)
     *
     * For systems including OSI protocols, layers 5 and
     * 6 may also be counted."
     *
     * @return string The system services of the device
     */
    public function services()
    {
        return $this->getSNMP()->get( self::OID_SYSTEM_SERVICES );
    }


    /**
     * Gets all system values as an associate array
     *
     * The keys of the array are contact, description, location,
     *     name, services, uptime
     *
     * @return array All system values as an associate array
     */
    public function getAll()
    {
        $system = array();

        $system[ 'contact' ]     = $this->contact();
        $system[ 'description' ] = $this->description();
        $system[ 'location' ]    = $this->location();
        $system[ 'name' ]        = $this->name();
        $system[ 'services' ]    = $this->services();
        $system[ 'uptime' ]      = $this->uptime();

        return $system;
    }
}
