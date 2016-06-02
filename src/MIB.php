<?php

namespace Cityware\Snmp;

/**
 * Parent class for all "MIB" extensions.
 *
 * @copyright Copyright (c) 2012, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class MIB
{
    /**
     * Instance for the SNMP object
     */
    private $_snmp = null;


    /**
     * Set the SNMP instance
     *
     * @param \Cityware\Snmp\SNMP $snmp the SNMP instance
     * @return \Cityware\Snmp\MIB An instance of this class for fluent interfaces
     */
    public function setSNMP( $snmp )
    {
        $this->_snmp = $snmp;
    }

    /**
     * Get the SNMP instance
     *
     * @return \Cityware\Snmp\SNMP Instance of the SNMP object
     */
    public function getSNMP()
    {
        return $this->_snmp;
    }

}
