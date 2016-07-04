<?php

namespace Cityware\Snmp\MIBS\Linux;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Cpu extends \Cityware\Snmp\MIB {

    const OID_CPU = '.1.3.6.1.4.1.2021.11';
    const OID_LOAD = '.1.3.6.1.4.1.2021.10.1.3';
    const OID_LOAD_INT = '.1.3.6.1.4.1.2021.10.1.5';

    const OID_1_MINUTE_LOAD = '.1.3.6.1.4.1.2021.10.1.3.1';
    const OID_5_MINUTE_LOAD = '.1.3.6.1.4.1.2021.10.1.3.2';
    const OID_15_MINUTE_LOAD = '.1.3.6.1.4.1.2021.10.1.3.3';
        
    const OID_UCD_SNMPD_LALOAD_INT_1  = '.1.3.6.1.4.1.2021.10.1.5.1';
    const OID_UCD_SNMPD_LALOAD_INT_5 = '.1.3.6.1.4.1.2021.10.1.5.2';
    const OID_UCD_SNMPD_LALOAD_INT_15 = '.1.3.6.1.4.1.2021.10.1.5.3';
    
    const OID_PERCENTAGE_OF_USER_CPU_TIME = '.1.3.6.1.4.1.2021.11.9.0';
    const OID_PERCENTAGES_OF_SYSTEM_CPU_TIME = '.1.3.6.1.4.1.2021.11.10.0';
    const OID_PERCENTAGES_OF_IDLE_CPU_TIME = '.1.3.6.1.4.1.2021.11.10.0';
    
    const OID_RAW_USER_CPU_TIME = '.1.3.6.1.4.1.2021.11.50.0';
    const OID_RAW_NICE_CPU_TIME = '.1.3.6.1.4.1.2021.11.51.0';
    const OID_RAW_SYSTEM_CPU_TIME = '.1.3.6.1.4.1.2021.11.52.0';
    const OID_RAW_IDLE_CPU_TIME = '.1.3.6.1.4.1.2021.11.53.0';

    /**
     * Returns Float Number witch Load CPU in One Minute
     * @return float
     */
    public function loadOneMinute() {
        return (float) $this->getSNMP()->get(self::OID_1_MINUTE_LOAD);
    }

    /**
     * Returns Float Number witch Load CPU in Five Minutes
     * @return float
     */
    public function loadFiveMinutes() {
        return (float) $this->getSNMP()->get(self::OID_5_MINUTE_LOAD);
    }

    /**
     * Returns Float Number witch Load CPU in Fifteen Minutes
     * @return float
     */
    public function loadFifteenMinutes() {
        return (float) $this->getSNMP()->get(self::OID_15_MINUTE_LOAD);
    }

    /**
     * Returns Integer Number witch Load CPU in One Minute
     * @return Integer
     */
    public function loadIntOneMinute() {
        return $this->getSNMP()->get(self::OID_UCD_SNMPD_LALOAD_INT_1);
    }

    /**
     * Returns Integer Number witch Load CPU in Five Minutes
     * @return Integer
     */
    public function loadIntFiveMinutes() {
        return $this->getSNMP()->get(self::OID_UCD_SNMPD_LALOAD_INT_5);
    }

    /**
     * Returns Integer Number witch Load CPU in Fifteen Minutes
     * @return Integer
     */
    public function loadIntFifteenMinutes() {
        return $this->getSNMP()->get(self::OID_UCD_SNMPD_LALOAD_INT_15);
    }

    /**
     * Returns Percentage of User CPU Time
     * @return float
     */
    public function percentageOfUserCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_PERCENTAGE_OF_USER_CPU_TIME);
    }

    /**
     * Returns Percentage of System CPU Time
     * @return float
     */
    public function percentageOfSystemCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_PERCENTAGES_OF_SYSTEM_CPU_TIME);
    }

    /**
     * Returns Percentage of Idle CPU Time
     * @return float
     */
    public function percentageOfIdleCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_PERCENTAGES_OF_IDLE_CPU_TIME);
    }

    /**
     * Returns Raw User CPU Time
     * @return float
     */
    public function rawUserCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_RAW_USER_CPU_TIME);
    }

    /**
     * Returns Raw Nice CPU Time
     * @return float
     */
    public function rawNiceCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_RAW_NICE_CPU_TIME);
    }

    /**
     * Returns Raw System CPU Time
     * @return float
     */
    public function rawSystemCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_RAW_SYSTEM_CPU_TIME);
    }

    /**
     * Returns Raw Idle CPU Time
     * @return float
     */
    public function rawIdleCpuTime() {
        return (float) $this->getSNMP()->get(self::OID_RAW_IDLE_CPU_TIME);
    }

    /**
     * Return calculation Threshoud alert CPU
     * @param integer $numSlots
     * @param integer $numCores
     * @param string $ht
     * @return array
     */
    public function threshoudCalculation($numSlots = 1, $numCores = 1, $ht= 'N') {
        $totalCpu = ($ht == 'S') ? (($numSlots * $numCores) * 2) : ($numSlots * $numCores);

        $aReturn = Array();
        $aReturn['warning'] = Array();
        $aReturn['critical'] = Array();

        $aReturn['warning']['load1min'] = round(($totalCpu * 0.7), 2);
        $aReturn['warning']['load5min'] = round(($totalCpu * 0.65), 2);
        $aReturn['warning']['load15min'] = round(($totalCpu * 0.6), 2);

        $aReturn['critical']['load1min'] = round(($totalCpu * 1.0), 2);
        $aReturn['critical']['load5min'] = round(($totalCpu * 0.9), 2);
        $aReturn['critical']['load15min'] = round(($totalCpu * 0.8), 2);

        return $aReturn;

}
}
