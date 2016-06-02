<?php

namespace Cityware\Snmp\MIBS\Asterisk;

/**
 * A class for performing SNMP V2 queries on Asterisk
 *
 * @see https://wiki.asterisk.org/wiki/display/AST/Asterisk+MIB+Definitions
 * @copyright Copyright (c) 2012, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Indications extends \Cityware\Snmp\MIB
{

    const OID_ASTERISK_INDICATIONS_COUNT   = '.1.3.6.1.4.1.22736.1.4.1.0';

    const OID_ASTERISK_DEFAULT_INDICATION  = '.1.3.6.1.4.1.22736.1.4.2.0';

    const OID_ASTERISK_INDICATIONS_COUNTRY     = '.1.3.6.1.4.1.22736.1.4.3.1.2';
    const OID_ASTERISK_INDICATIONS_DESCRIPTION = '.1.3.6.1.4.1.22736.1.4.3.1.4';

    /**
     * Returns the number of indications defined in Asterisk
     *
     * > Number of indications currently defined in Asterisk.
     *
     * @return int The number of indications defined in Asterisk
     */
    public function number()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_INDICATIONS_COUNT );
    }


    /**
     * Returns the default indication zone to use.
     *
     * > Default indication zone to use.
     *
     * @return string The default indication zone to use
     */
    public function defaultZone()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_DEFAULT_INDICATION );
    }

    /**
     * Returns an array of ISO country codes for the defined indications zones (indexed by SNMP table entry)
     *
     * > Country for which the indication zone is valid,
     * > typically this is the ISO 2-letter code of the country.
     *
     * @return array An array of ISO country codes for the defined indications zones (indexed by SNMP table entry)
     */
    public function countryCodes()
    {
        return $this->getSNMP()->walk1d( self::OID_ASTERISK_INDICATIONS_COUNTRY );
    }

    /**
     * Returns an array of indications zone descriptions (indexed by SNMP table entry)
     *
     * > Description of the indication zone, usually the full
     * > name of the country it is valid for.
     *
     * @return array An array of indications zone descriptions
     */
    public function descriptions()
    {
        return $this->getSNMP()->walk1d( self::OID_ASTERISK_INDICATIONS_DESCRIPTION );
    }




}
