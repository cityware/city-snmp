<?php

namespace Cityware\Snmp\MIBS\Linux;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Host extends \Cityware\Snmp\MIB {
    /* System OID´s */

    const OID_SYSTEM = '.1.3.6.1.2.1.25.1';
    const OID_SYSTEM_UPTIME = '.1.3.6.1.2.1.25.1.1';
    const OID_SYSTEM_NUM_USERS = '.1.3.6.1.2.1.25.1.5';
    const OID_SYSTEM_PROCESSES = '.1.3.6.1.2.1.25.1.6';
    const OID_SYSTEM_MAX_PROCESSES = '.1.3.6.1.2.1.25.1.7';

    /* Storage OID´s */
    const OID_STORAGE = '.1.3.6.1.2.1.25.2';
    const OID_STORAGE_MEMORY_SIZE = '.1.3.6.1.2.1.25.2.2';
    const OID_STORAGE_INDEX = '.1.3.6.1.2.1.25.2.3.1.1';
    const OID_STORAGE_TYPE = '.1.3.6.1.2.1.25.2.3.1.2';
    const OID_STORAGE_DESCR = '.1.3.6.1.2.1.25.2.3.1.3';
    const OID_STORAGE_ALLOCATION_UNITS = '.1.3.6.1.2.1.25.2.3.1.4';
    const OID_STORAGE_SIZE = '.1.3.6.1.2.1.25.2.3.1.5';
    const OID_STORAGE_USED = '.1.3.6.1.2.1.25.2.3.1.6';

    /**
     * Returns Full Data
     * @return int
     */
    public function returnFullData() {

        $aStorageSystem = $this->returnFullDataSystem();
        $aStorageStorage = $this->returnFullDataStorage();

        $aReturn = Array();
        $aReturn['system'] = $aStorageSystem;
        $aReturn['storage'] = $aStorageStorage;

        return $aReturn;
    }

    /**
     * Returns Full Data
     * @return int
     */
    public function returnFullDataSystem() {

        $aStorage = $this->getSNMP()->realWalk1d(self::OID_SYSTEM);

        $aReturn = Array();
        $aReturn['uptime'] = $aStorage[self::OID_SYSTEM_UPTIME][0] / 100;
        $aReturn['num_users'] = $aStorage[self::OID_SYSTEM_NUM_USERS][0];
        $aReturn['processes'] = $aStorage[self::OID_SYSTEM_PROCESSES][0];
        $aReturn['max_processes'] = $aStorage[self::OID_SYSTEM_MAX_PROCESSES][0];

        return $aReturn;
    }

    /**
     * Returns Full Data Storage
     * @return int
     */
    public function returnFullDataStorage() {

        $aStorage = $this->getSNMP()->realWalk1d(self::OID_STORAGE);

        $aReturn = Array();
        $aReturn['memory_size'] = $aStorage[self::OID_STORAGE_MEMORY_SIZE][0];


        $aReturn['index'] = $aStorage[self::OID_STORAGE_INDEX];
        $aReturn['type'] = $aStorage[self::OID_STORAGE_TYPE];
        $aReturn['description'] = $aStorage[self::OID_STORAGE_DESCR];
        $aReturn['allocation_units'] = $aStorage[self::OID_STORAGE_ALLOCATION_UNITS];
        $aReturn['size'] = $aStorage[self::OID_STORAGE_SIZE];
        $aReturn['used'] = $aStorage[self::OID_STORAGE_USED];

        return $aReturn;
    }

    /**
     * Returns Storage Index
     * @return int
     */
    public function storageIndex() {
        return $this->getSNMP()->walk1d(self::OID_STORAGE_INDEX);
    }

    /**
     * Returns Storage Type
     * @return int
     */
    public function storageType() {
        return $this->getSNMP()->walk1d(self::OID_STORAGE_TYPE);
    }

    /**
     * Returns Storage Description
     * @return int
     */
    public function storageDescr() {
        return $this->getSNMP()->walk1d(self::OID_STORAGE_DESCR);
    }

    /**
     * Returns Storage Allocation Units
     * @return int
     */
    public function storageAllocationUnits() {
        return $this->getSNMP()->walk1d(self::OID_STORAGE_ALLOCATION_UNITS);
    }

    /**
     * Returns Storage Size
     * @return int
     */
    public function storageSize() {
        return $this->getSNMP()->walk1d(self::OID_STORAGE_SIZE);
    }

    /**
     * Returns Storage Used
     * @return int
     */
    public function storageUsed() {
        return $this->getSNMP()->walk1d(self::OID_STORAGE_USED);
    }

}
