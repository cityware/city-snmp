<?php

namespace Cityware\Snmp\MIBS;

/**
 * A class for performing SNMP V2 queries on Asterisk
 *
 * @see https://wiki.asterisk.org/wiki/display/AST/Asterisk+MIB+Definitions
 * @copyright Copyright (c) 2012, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Asterisk extends \Cityware\Snmp\MIB
{

    const OID_ASTERISK_VERSION_STRING = '.1.3.6.1.4.1.22736.1.1.1.0';
    const OID_ASTERISK_VERSION_TAG    = '.1.3.6.1.4.1.22736.1.1.2.0';

    const OID_ASTERISK_UP_TIME         = '.1.3.6.1.4.1.22736.1.2.1.0';
    const OID_ASTERISK_RELOAD_TIME     = '.1.3.6.1.4.1.22736.1.2.2.0';
    const OID_ASTERISK_PID             = '.1.3.6.1.4.1.22736.1.2.3.0';
    const OID_ASTERISK_CONTROL_SOCKET  = '.1.3.6.1.4.1.22736.1.2.4.0';
    const OID_ASTERISK_CALLS_ACTIVE    = '.1.3.6.1.4.1.22736.1.2.5.0';
    const OID_ASTERISK_CALLS_PROCESSED = '.1.3.6.1.4.1.22736.1.2.6.0';

    const OID_ASTERISK_MODULES         = '.1.3.6.1.4.1.22736.1.3.1.0';

    /**
     * Returns the version of Asterisk
     *
     * > Text version string of the version of Asterisk that
	 * > the SNMP Agent was compiled to run against.
     *
     * @return string The version of Asterisk
     */
    public function version()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_VERSION_STRING );
    }

    /**
     * Returns the Subversion (SVN) revision of Asterisk
     *
     * > SubVersion revision of the version of Asterisk that
     * > the SNMP Agent was compiled to run against -- this is
     * > typically 0 for release-versions of Asterisk.
     *
     * @return int The SVN revision of Asterisk
     */
    public function tag()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_VERSION_TAG );
    }

    /**
     * Returns the time ticks (100th sec) since Asterisk was started
     *
     * > Time ticks since Asterisk was started.
     *
     * @return int Time ticks since Asterisk was started
     */
    public function uptime()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_UP_TIME );
    }

    /**
     * Returns the time ticks (100th sec) since the Asterisk config was reload
     *
     * > Time ticks since Asterisk was last reloaded.
     *
     * @return int Time ticks since the Asterisk config was reload
     */
    public function reloadTime()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_RELOAD_TIME );
    }

    /**
     * Returns the process ID of the Asterisk instance
     *
     * > The process id of the running Asterisk process.
     *
     * @return int The process ID of the Asterisk instance
     */
    public function pid()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_PID );
    }

    /**
     * Returns the path for the control socket for giving Asterisk commands
     *
     * > The control socket for giving Asterisk commands.
     *
     * @return string The control socket for giving Asterisk commands
     */
    public function controlSocket()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_CONTROL_SOCKET );
    }

    /**
     * Returns the number of calls currently active on the Asterisk PBX.
     *
     * > The number of calls currently active on the Asterisk PBX.
     *
     * @return int The number of calls currently active on the Asterisk PBX.
     */
    public function callsActive()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_CALLS_ACTIVE );
    }

    /**
     * Returns the total number of calls processed through the Asterisk PBX since last restart.
     *
     * > The total number of calls processed through the Asterisk PBX since last restart.
     *
     * @return int The total number of calls processed through the Asterisk PBX since last restart.
     */
    public function callsProcessed()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_CALLS_PROCESSED );
    }

    /**
     * Returns the number of modules currently loaded into Asterisk.
     *
     * > Number of modules currently loaded into Asterisk.
     *
     * @return int The number of modules currently loaded into Asterisk
     */
    public function modules()
    {
        return $this->getSNMP()->get( self::OID_ASTERISK_MODULES );
    }



}
