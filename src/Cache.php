<?php

namespace Cityware\Snmp;


/**
 * An abstract cache for storing results of SNMP queries .
 *
 * See the implementation in \Cityware\Snmp\Cache\Basic for proper examples and documentation.
 *
 * @see \Cityware\Snmp\Cache\Basic
 */
abstract class Cache
{

    abstract protected function save( $varName, $varValue );
    abstract protected function load( $varName );
    abstract protected function clear( $varName );
    abstract protected function clearAll();

}


