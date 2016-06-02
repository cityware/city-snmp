<?php

namespace Cityware\Snmp;

/**
 * A class for timing PHP scripts
 */
class Timer
{
    /** @type double The start time */
    static private $_start = null;

    /** @var double The elapsed time */
    static private $_time  = null;

    static public function start()
    {
        self::$_start = microtime( true );
    }

    static public function end()
    {
        self::$_time = microtime( true ) - self::$_start;
    }

    static public function time()
    {
        return self::$_time;
    }

}
