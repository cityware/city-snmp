<?php

namespace Cityware\Snmp\MIBS\Linux;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Processes extends \Cityware\Snmp\MIB {

    const OID_HR_SW_RUN_TABLE = '.1.3.6.1.2.1.25.4.2.1';
    const OID_HR_SW_RUN_PERF_TABLE = '.1.3.6.1.2.1.25.5.1.1';
    const OID_SOFTWARE_RUN_INDEX = '.1.3.6.1.2.1.25.4.2.1.1';
    const OID_SOFTWARE_RUN_NAME = '.1.3.6.1.2.1.25.4.2.1.2';
    const OID_SOFTWARE_RUN_ID = '.1.3.6.1.2.1.25.4.2.1.3';
    const OID_SOFTWARE_RUN_PATH = '.1.3.6.1.2.1.25.4.2.1.4';
    const OID_SOFTWARE_RUN_PARAMETERS = '.1.3.6.1.2.1.25.4.2.1.5';
    const OID_SOFTWARE_RUN_TYPE = '.1.3.6.1.2.1.25.4.2.1.6';
    const OID_SOFTWARE_RUN_STATUS = '.1.3.6.1.2.1.25.4.2.1.7';
    const OID_SOFTWARE_RUN_CPU_USED = '.1.3.6.1.2.1.25.5.1.1.1';
    const OID_SOFTWARE_RUN_MEMORY_USED = '.1.3.6.1.2.1.25.5.1.1.2';
    
    private $hrSWRunTable, $hrSWRunPerfTable;

    /**
     * Returns Softwatre Run Full Data
     * @return int
     */
    public function softwareRunFullData() {
        
        $aReturn = Array();
        $aReturn['index'] = $this->softwareRunIndex();
        $aReturn['name'] = $this->softwareRunName();
        $aReturn['id'] = $this->softwareRunId();
        $aReturn['path'] = $this->softwareRunPath();
        $aReturn['parameters'] = $this->softwareRunParameters();
        $aReturn['type'] = $this->softwareRunType();
        $aReturn['status'] = $this->softwareRunStatus();
        $aReturn['cpu'] = $this->softwareRunCpuUsed();
        $aReturn['memory'] = $this->softwareRunMemoryUsed();
        return $aReturn;
    }
    
    /**
     * Returns Softwatre Run Index
     * @return int
     */
    public function softwareRunIndex() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_INDEX);
    }

    /**
     * Returns Softwatre Run Name
     * @return int
     */
    public function softwareRunName() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_NAME);
    }

    /**
     * Returns Softwatre Run ID
     * @return int
     */
    public function softwareRunId() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_ID);
    }

    /**
     * Returns Softwatre Run Path
     * @return int
     */
    public function softwareRunPath() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_PATH);
    }

    /**
     * Returns Softwatre Run Parameters
     * @return int
     */
    public function softwareRunParameters() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_PARAMETERS);
    }

    /**
     * Returns Softwatre Run Type
     * @return int
     */
    public function softwareRunType() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_TYPE);
    }

    /**
     * Returns Softwatre Run Status
     * @return int
     */
    public function softwareRunStatus() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_STATUS);
    }

    /**
     * Returns Softwatre Run CPU Used
     * @return int
     */
    public function softwareRunCpuUsed() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_CPU_USED);
    }

    /**
     * Returns Softwatre Run Memmory Used
     * @return int
     */
    public function softwareRunMemoryUsed() {
        return $this->getSNMP()->walk1d(self::OID_SOFTWARE_RUN_MEMORY_USED);
    }

    /**
     * Convert Software Run Type Number to Type Name
     * @param integer $processTypeNum
     * @return string
     */
    public function typeNumConvertName($processTypeNum) {

        switch ($processTypeNum) {
            case 1:
                $return = 'Unknown';
                break;
            case 2:
                $return = 'Operating System';
                break;
            case 3:
                $return = 'Device Driver';
                break;
            case 4:
                $return = 'Application';
                break;

            default:
                $return = 'Unknown';
                break;
        }

        return $return;
    }
    
    /**
     * Convert Software Run Status Number to Type Name
     * @param integer $processTypeNum
     * @return string
     */
    public function statusNumConvertName($processTypeNum) {

        switch ($processTypeNum) {
            case 1:
                $return = 'Running';
                break;
            case 2:
                $return = 'Runnable (Waiting for resource)';
                break;
            case 3:
                $return = 'Not Runnable (Loaded but waiting for event)';
                break;
            case 4:
                $return = 'Invalid (Not loaded)';
                break;

            default:
                $return = 'Invalid';
                break;
        }

        return $return;
    }

}
