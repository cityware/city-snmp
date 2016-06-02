<?php

namespace Cityware\Snmp\Cache;

/**
 * basic (array) cache implementation
 *
 * @copyright Copyright (c) 2012, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class Basic extends \Cityware\Snmp\Cache
{

    /**
     * An array to store results - a temporary cache
     * @var array An array to store results - a temporary cache
     */
    protected $_cache;


    /**
     * Cache constructor.
     *
     * For basic cache, takes no parameters.
     *
     * @return \Cityware\Snmp\Cache\Basic An instance of the cache ($this) for  fluent interfaces
     */
    public function __construct()
    {
        $_cache = array();

        return $this;
    }



    /**
     * Load a named value from the cache (or null if not present)
     *
     * @param string $var The name of the value to load
     * @return mixed|null The value from the cache or null
     */
    public function load( $var )
    {
        if( isset( $this->_cache[ $var ] ) )
            return $this->_cache[ $var ];

        return null;
    }


    /**
     * Save a named value to the cache
     *
     * @param string $var The name of the value to save
     * @param mixed  $val The value to save
     * @return mixed The value (as passed)
     */
    public function save( $var, $val )
    {
        return $this->_cache[ $var ] = $val;
    }

    /**
     * Clear a named value from the cache
     *
     * @param string $var The name of the value to clear
     */
    public function clear( $var )
    {
        if( isset( $this->_cache[ $var ] ) )
            unset( $this->_cache[ $var ] );
    }


    /**
     * Clear all values from the cache
     *
     */
    public function clearAll()
    {
        $this->_cache = array();
    }

}

