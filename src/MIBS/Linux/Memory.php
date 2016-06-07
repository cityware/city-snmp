<?php

namespace Cityware\Snmp\MIBS\Linux;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Memory extends \Cityware\Snmp\MIB {

    const OID_TOTAL_SWAP_SIZE = '.1.3.6.1.4.1.2021.4.3.0';
    const OID_AVALIABLE_SWAP_SPACE = '.1.3.6.1.4.1.2021.4.4.0';
    const OID_TOTAL_RAM_IN_MACHINE = '.1.3.6.1.4.1.2021.4.5.0';
    const OID_TOTAL_RAM_USED = '.1.3.6.1.4.1.2021.4.6.0';
    const OID_TOTAL_RAM_FREE = '.1.3.6.1.4.1.2021.4.11.0';
    const OID_TOTAL_RAM_SHARED = '.1.3.6.1.4.1.2021.4.13.0';
    const OID_TOTAL_RAM_BUFFERED = '.1.3.6.1.4.1.2021.4.14.0';
    const OID_TOTAL_CACHED_MEMORY = '.1.3.6.1.4.1.2021.4.15.0';

    /**
     * Returns in bytes a Total Swap Size
     * @return int
     */
    public function totalSwapSize() {
        return ($this->getSNMP()->get(self::OID_TOTAL_SWAP_SIZE) * 1024);
    }

    /**
     * Returns in bytes a Avaliable Swap Space
     * @return int
     */
    public function avaliableSwapSpace() {
        return ($this->getSNMP()->get(self::OID_AVALIABLE_SWAP_SPACE) * 1024);
    }

    /**
     * Returns in bytes a Total RAM in Machine
     * @return int
     */
    public function totalRamInMachine() {
        return ($this->getSNMP()->get(self::OID_TOTAL_RAM_IN_MACHINE) * 1024);
    }

    /**
     * Returns in bytes a Total RAM used
     * @return int
     */
    public function totalRamUsed() {
        return ($this->getSNMP()->get(self::OID_TOTAL_RAM_USED) * 1024);
    }

    /**
     * Returns in bytes a Total RAM free
     * @return int
     */
    public function totalRamFree() {
        return ($this->getSNMP()->get(self::OID_TOTAL_RAM_FREE) * 1024);
    }

    /**
     * Returns in bytes a Total RAM shared
     * @return int
     */
    public function totalRamShared() {
        return ($this->getSNMP()->get(self::OID_TOTAL_RAM_SHARED) * 1024);
    }

    /**
     * Returns in bytes a Total RAM buffered
     * @return int
     */
    public function totalRamBuffered() {
        return ($this->getSNMP()->get(self::OID_TOTAL_RAM_BUFFERED) * 1024);
    }

    /**
     * Returns in bytes a Total Cached Memory
     * @return int
     */
    public function totalCachedMemory() {
        return ($this->getSNMP()->get(self::OID_TOTAL_CACHED_MEMORY) * 1024);
    }

}
