<?php

namespace Cityware\Snmp\MIBS\Linux;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Memory extends \Cityware\Snmp\MIB {

    const OID_MEMORY = '.1.3.6.1.4.1.2021.4';
    const OID_TOTAL_SWAP_SIZE = '.1.3.6.1.4.1.2021.4.3';
    const OID_AVALIABLE_SWAP_SIZE = '.1.3.6.1.4.1.2021.4.4';
    const OID_TOTAL_RAM_IN_MACHINE = '.1.3.6.1.4.1.2021.4.5';
    const OID_AVALIABLE_RAM_REAL = '.1.3.6.1.4.1.2021.4.6';
    const OID_TOTAL_MEMORY = '.1.3.6.1.4.1.2021.4.11';
    const OID_TOTAL_RAM_BUFFERED = '.1.3.6.1.4.1.2021.4.14';
    const OID_TOTAL_CACHED_MEMORY = '.1.3.6.1.4.1.2021.4.15';

    /**
     * Returns Full Data
     * @return int
     */
    public function returnFullData() {

        $aMemory = $this->getSNMP()->realWalk1d(self::OID_MEMORY);

        $aReturn = Array();
        $aReturn['total_swap_size'] = $aMemory[self::OID_TOTAL_SWAP_SIZE][0];
        $aReturn['avaliable_swap_size'] = $aMemory[self::OID_AVALIABLE_SWAP_SIZE][0];
        $aReturn['total_ram_machine'] = $aMemory[self::OID_TOTAL_RAM_IN_MACHINE][0];
        $aReturn['avaliable_ram_real'] = $aMemory[self::OID_AVALIABLE_RAM_REAL][0];
        $aReturn['total_memory'] = $aMemory[self::OID_TOTAL_MEMORY][0];
        $aReturn['total_ram_buffered'] = $aMemory[self::OID_TOTAL_RAM_BUFFERED][0];
        $aReturn['total_cached_memory'] = $aMemory[self::OID_TOTAL_CACHED_MEMORY][0];
        $aReturn['total_memory_used'] = $aReturn['total_ram_machine'] - ($aReturn['avaliable_ram_real'] + $aReturn['total_cached_memory'] + $aReturn['total_ram_buffered']);
        $aReturn['total_swap_used'] = $aReturn['total_swap_size'] - $aReturn['avaliable_swap_size'];
        $aReturn['perc_memory_used'] = round((($aReturn['total_memory_used'] * 100) / $aReturn['total_ram_machine']), 2);
        
        if ($aReturn['avaliable_swap_size'] < $aReturn['total_swap_size']) {
            $aReturn['perc_swap_used'] = round((($aReturn['total_swap_used'] * 100) / $aReturn['total_swap_size']), 2);
        } else {
            $aReturn['perc_swap_used'] = 0;
        }

        return $aReturn;
    }

    /**
     * Returns in bytes a Total Swap Size
     * @return int
     */
    public function totalSwapSize() {
        return $this->getSNMP()->get(self::OID_TOTAL_SWAP_SIZE . ".0");
    }

    /**
     * Returns in bytes a Avaliable Swap Space
     * @return int
     */
    public function avaliableSwapSpace() {
        return $this->getSNMP()->get(self::OID_AVALIABLE_SWAP_SIZE . ".0");
    }

    /**
     * Returns in bytes a Total RAM in Machine
     * @return int
     */
    public function totalRamInMachine() {
        return $this->getSNMP()->get(self::OID_TOTAL_RAM_IN_MACHINE . ".0");
    }

    /**
     * Returns in bytes a Total RAM used
     * @return int
     */
    public function totalRamUsed() {
        return $this->getSNMP()->get(self::OID_TOTAL_RAM_USED . ".0");
    }

    /**
     * Returns in bytes a Total RAM free
     * @return int
     */
    public function totalRamFree() {
        return $this->getSNMP()->get(self::OID_TOTAL_RAM_FREE . ".0");
    }

    /**
     * Returns in bytes a Total RAM buffered
     * @return int
     */
    public function totalRamBuffered() {
        return $this->getSNMP()->get(self::OID_TOTAL_RAM_BUFFERED . ".0");
    }

    /**
     * Returns in bytes a Total Cached Memory
     * @return int
     */
    public function totalCachedMemory() {
        return $this->getSNMP()->get(self::OID_TOTAL_CACHED_MEMORY . ".0");
    }

}
