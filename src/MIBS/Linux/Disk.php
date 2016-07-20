<?php

namespace Cityware\Snmp\MIBS\Linux;

/**
 * A class for performing SNMP V2 queries on generic devices
 */
class Disk extends \Cityware\Snmp\MIB {
    
    /** Disk Data **/
    const OID_DISK = '.1.3.6.1.4.1.2021.9.1';
    
    const OID_DISK_INDEX = '.1.3.6.1.4.1.2021.9.1.1';
    const OID_DISK_PATH = '.1.3.6.1.4.1.2021.9.1.2';
    const OID_DISK_DEVICE = '.1.3.6.1.4.1.2021.9.1.3';
    const OID_DISK_MINIMUM = '.1.3.6.1.4.1.2021.9.1.4';
    const OID_DISK_MIN_PERCENT  = '.1.3.6.1.4.1.2021.9.1.5';
    const OID_DISK_TOTAL = '.1.3.6.1.4.1.2021.9.1.6';
    const OID_DISK_AVALIABLE = '.1.3.6.1.4.1.2021.9.1.7';
    const OID_DISK_USED = '.1.3.6.1.4.1.2021.9.1.8';
    const OID_DISK_USED_PERCENT = '.1.3.6.1.4.1.2021.9.1.9';
    const OID_DISK_NODE_PERCENT = '.1.3.6.1.4.1.2021.9.1.10';
    const OID_DISK_TOTAL_LOW = '.1.3.6.1.4.1.2021.9.1.11';
    const OID_DISK_TOTAL_HIGH = '.1.3.6.1.4.1.2021.9.1.12';
    const OID_DISK_AVALIABLE_LOW = '.1.3.6.1.4.1.2021.9.1.13';
    const OID_DISK_AVALIABLE_HIGH = '.1.3.6.1.4.1.2021.9.1.14';
    const OID_DISK_USED_LOW = '.1.3.6.1.4.1.2021.9.1.15';
    const OID_DISK_USED_HIGH = '.1.3.6.1.4.1.2021.9.1.16';
    
    const OID_DISK_ERROR_FLAG = '.1.3.6.1.4.1.2021.9.1.100';
    const OID_DISK_ERROR_MSG = '.1.3.6.1.4.1.2021.9.1.101';
    
    /** Disk IO **/
    const OID_DISK_IO = '.1.3.6.1.4.1.2021.13.15.1.1';
    
    const OID_DISK_IO_INDEX = '.1.3.6.1.4.1.2021.13.15.1.1.1';
    const OID_DISK_IO_DEVICE = '.1.3.6.1.4.1.2021.13.15.1.1.2';
    const OID_DISK_IO_READ = '.1.3.6.1.4.1.2021.13.15.1.1.3';
    const OID_DISK_IO_WRITE = '.1.3.6.1.4.1.2021.13.15.1.1.4';
    const OID_DISK_IO_READ_ACCESS = '.1.3.6.1.4.1.2021.13.15.1.1.5';
    const OID_DISK_IO_WRITE_ACCESS = '.1.3.6.1.4.1.2021.13.15.1.1.6';
    const OID_DISK_IO_LOAD1MIN = '.1.3.6.1.4.1.2021.13.15.1.1.9';
    const OID_DISK_IO_LOAD5MIN = '.1.3.6.1.4.1.2021.13.15.1.1.10';
    const OID_DISK_IO_LOAD15MIN = '.1.3.6.1.4.1.2021.13.15.1.1.11';
    const OID_DISK_IO_READX = '.1.3.6.1.4.1.2021.13.15.1.1.12';
    const OID_DISK_IO_WRITEX = '.1.3.6.1.4.1.2021.13.15.1.1.13';
    
    /**
     * Returns Full Data Io
     * @return int
     */
    public function returnFullDataIo() {
        
        $aDiskIo = $this->getSNMP()->realWalk1d(self::OID_DISK_IO);
        
        
        $aReturn = Array();
        $aReturn['index'] = $aDiskIo[self::OID_DISK_IO_INDEX];
        $aReturn['device'] = $aDiskIo[self::OID_DISK_IO_DEVICE];
        $aReturn['disk_io_read'] = $aDiskIo[self::OID_DISK_IO_READ];
        $aReturn['disk_io_write'] = $aDiskIo[self::OID_DISK_IO_WRITE];
        $aReturn['disk_io_read_access'] = $aDiskIo[self::OID_DISK_IO_READ_ACCESS];
        $aReturn['disk_io_write_access'] = $aDiskIo[self::OID_DISK_IO_WRITE_ACCESS];
        $aReturn['disk_io_load1Min'] = $aDiskIo[self::OID_DISK_IO_LOAD1MIN];
        $aReturn['disk_io_load5Min'] = $aDiskIo[self::OID_DISK_IO_LOAD5MIN];
        $aReturn['disk_io_load15Min'] = $aDiskIo[self::OID_DISK_IO_LOAD15MIN];
        //$aReturn['disk_io_readx'] = $aDiskIo[self::OID_DISK_IO_READX];
        //$aReturn['disk_io_writex'] = $aDiskIo[self::OID_DISK_IO_WRITEX];
        $aReturn['counter_max_value'] = 4294967295;
        
        return $aReturn;
    }
    
    /**
     * Returns Full Data
     * @return int
     */
    public function returnFullData() {
        
        $aDisk = $this->getSNMP()->realWalk1d(self::OID_DISK);
        $aDiskIo = $this->getSNMP()->realWalk1d(self::OID_DISK_IO);
        
        $aReturn = Array();
        $aReturn['index'] = $aDisk[self::OID_DISK_INDEX];
        $aReturn['device'] = $aDisk[self::OID_DISK_DEVICE];
        $aReturn['path'] = $aDisk[self::OID_DISK_PATH];
        $aReturn['minimum_size'] = $aDisk[self::OID_DISK_MINIMUM];
        $aReturn['minimum_percent'] = $aDisk[self::OID_DISK_MIN_PERCENT];
        $aReturn['total_size'] = $aDisk[self::OID_DISK_TOTAL];
        $aReturn['avaliable_size'] = $aDisk[self::OID_DISK_AVALIABLE];
        $aReturn['used_size'] = $aDisk[self::OID_DISK_USED];
        $aReturn['used_percent'] = $aDisk[self::OID_DISK_USED_PERCENT];
        $aReturn['free_percent'] = $this->freePercentCalculation($aReturn['used_percent']);
        $aReturn['node_percent'] = $aDisk[self::OID_DISK_NODE_PERCENT];
        $aReturn['total_low'] = $aDisk[self::OID_DISK_TOTAL_LOW];
        $aReturn['total_high'] = $aDisk[self::OID_DISK_TOTAL_HIGH];
        $aReturn['avaliable_low'] = $aDisk[self::OID_DISK_AVALIABLE_LOW];
        $aReturn['avaliable_high'] = $aDisk[self::OID_DISK_AVALIABLE_HIGH];
        $aReturn['used_low'] = $aDisk[self::OID_DISK_USED_LOW];
        $aReturn['used_high'] = $aDisk[self::OID_DISK_USED_HIGH];
        $aReturn['error_flag'] = $aDisk[self::OID_DISK_ERROR_FLAG];
        $aReturn['error_msg'] = $aDisk[self::OID_DISK_ERROR_MSG];
        $aReturn['disk_io'] = $aDiskIo;
        return $aReturn;
    }
    
    

    /**
     * Calculation Free Percent Disk Path
     * @param array $usedPercent
     * @return array
     */
    private function freePercentCalculation(array $usedPercent = array()) {
        $aReturn = array();
        foreach ($usedPercent as $keyUsedPercent => $valueUsedPercent) {
            $aReturn[$keyUsedPercent] = ($valueUsedPercent > 0) ? (100 - $valueUsedPercent): 100;
        }
        return $aReturn;
    }

    /**
     * Returns Integer reference number (row number) for the disk mib
     * @return int
     */
    public function diskIndex() {
        return $this->getSNMP()->walk1d(self::OID_DISK_INDEX);
    }
    
    /**
     * Returns Path where the disk is mounted
     * @return string
     */
    public function diskPath() {
        return $this->getSNMP()->walk1d(self::OID_DISK_PATH);
    }
    
    /**
     * Returns Path of the device for the partition
     * @return string
     */
    public function diskDevice() {
        return $this->getSNMP()->walk1d(self::OID_DISK_DEVICE);
    }
    
    /**
     * Returns Minimum Space Required on the Disk
     * @return int
     */
    public function diskMinimumSize() {
        return $this->getSNMP()->walk1d(self::OID_DISK_MINIMUM);
    }
    
    /**
     * Returns Percentage of minimum space required on the disk
     * @return int
     */
    public function diskMinSizePercent() {
        return $this->getSNMP()->walk1d(self::OID_DISK_MIN_PERCENT);
    }
    
    /**
     * Returns Total size of the disk/partion 
     * @return int
     */
    public function diskTotalSize() {
        return $this->getSNMP()->walk1d(self::OID_DISK_TOTAL);
    }
    
    /**
     * Returns Available space on the disk
     * @return int
     */
    public function diskAvaliableSize() {
        return $this->getSNMP()->walk1d(self::OID_DISK_AVALIABLE);
    }
    
    /**
     * Returns Used space on the disk
     * @return int
     */
    public function diskUsedSize() {
        return $this->getSNMP()->walk1d(self::OID_DISK_USED);
    }
    
    /**
     * Returns Percentage of space used on disk
     * @return int
     */
    public function diskUsedSizePercent() {
        return $this->getSNMP()->walk1d(self::OID_DISK_USED_PERCENT);
    }
    
    /**
     * Returns Percentage of inodes used on disk
     * @return int
     */
    public function diskNodePercent() {
        return $this->getSNMP()->walk1d(self::OID_DISK_NODE_PERCENT);
    }
    
    /**
     * Returns Total size of the disk/partion 
     * @return int
     */
    public function diskTotalLow() {
        return $this->getSNMP()->walk1d(self::OID_DISK_TOTAL_LOW);
    }
    
    /**
     * Returns Total size of the disk/partion 
     * @return int
     */
    public function diskTotalHigh() {
        return $this->getSNMP()->walk1d(self::OID_DISK_TOTAL_HIGH);
    }
    
    /**
     * Returns Available space on the disk
     * @return int
     */
    public function diskUAvaliableLow() {
        return $this->getSNMP()->walk1d(self::OID_DISK_AVALIABLE_LOW);
    }
    
    /**
     * Returns Available space on the disk 
     * @return int
     */
    public function diskUAvaliableHigh() {
        return $this->getSNMP()->walk1d(self::OID_DISK_AVALIABLE_HIGH);
    }
    
    /**
     * Returns Used space on the disk 
     * @return int
     */
    public function diskUsedLow() {
        return $this->getSNMP()->walk1d(self::OID_DISK_USED_LOW);
    }
    
    /**
     * Returns Used space on the disk 
     * @return int
     */
    public function diskUsedHigh() {
        return $this->getSNMP()->walk1d(self::OID_DISK_USED_HIGH);
    }
    
    /**
     * Returns Error flag signaling that the disk or partition is under the minimum required space configured for it
     * @return int
     */
    public function diskErrorFlag() {
        return $this->getSNMP()->walk1d(self::OID_DISK_ERROR_FLAG);
    }
    
    /**
     * Returns A text description providing a warning and the space left on the disk
     * @return int
     */
    public function diskErrorMsg() {
        return $this->getSNMP()->walk1d(self::OID_DISK_ERROR_MSG);
    }
    
    /**
     * Returns A text description providing a warning and the space left on the disk
     * @return int
     */
    public function diskIo() {
        return $this->getSNMP()->realWalk1d(self::OID_DISK_IO);
    }
    
    
}
