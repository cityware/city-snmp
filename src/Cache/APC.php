<?php

namespace Cityware\Snmp\Cache;

/**
 * APC cache implementation
 */
class APC extends \Cityware\Snmp\Cache
{
    /**
     * Default time to live for cache variables in seconds
     * @var int Default time to live for cache variables in seconds  (defaults to 300s - 5 mins)
     */
    protected $_ttl = 300;

    /**
     * Prefix to use for caching items
     * @var string Prefix to use for caching items
     */
    protected $_prefix = 'Cityware_Snmp_';

    /**
     * Cache constructor.
     *
     * For basic cache, takes no parameters.
     *
     * @param int $ttl Set the default ttl
     * @param string $prefix Set the default prefix for caching variable names
     * @return \Cityware\Snmp\Cache\Basic An instance of the cache ($this) for  fluent interfaces
     */
    public function __construct( $ttl = 300, $prefix = 'Cityware_Snmp_' )
    {
        // do we have APC?
        if( !ini_get( 'apc.enabled' ) )
            throw new \Cityware\Snmp\Exception( 'APC is not installed or not enabled' );

        $this->_ttl    = $ttl;
        $this->_prefix = $prefix;

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
        $success = true;
        $val = apc_fetch( $this->_prefix . $var, $success );

        if( $success === false )
            return null;

        return $val;
    }



    /**
     * Save a named value to the cache
     *
     * @param string $var The name of the value to save
     * @param mixed  $val The value to save
     * @return mixed The value (as passed)
     */
    public function save( $var, $val  )
    {
        return $this->save( $var, $val, null );
    }

    /**
     * Save a named value to the cache
     *
     * @param string $var The name of the value to save
     * @param mixed  $val The value to save
     * @param int $ttl The time to live of the variable if you want to override the default
     * @return mixed The value (as passed)
     */
    public function save( $var, $val, $ttl = null )
    {
        if( $ttl === null )
            $ttl = $this->_ttl;

        if( apc_store( $this->_prefix . $var, $val, $ttl ) )
            return $val;

        return null;
    }

    /**
     * Clear a named value from the cache
     *
     * @param string $var The name of the value to clear
     */
    public function clear( $var )
    {
        apc_delete( $this->_prefix . $var );
    }


    /**
     * Clear all values from the cache
     *
     */
    public function clearAll()
    {
        foreach ( new APCIterator( 'user', '/^' . $this->_prefix . '/') as $var )
            apc_delete( $var );
    }

}

