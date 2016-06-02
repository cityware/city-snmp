<?php

/*
    Copyright (c) 2012-2016, Open Source Solutions Limited, Dublin, Ireland
    All rights reserved.

    Contact: Barry O'Donovan - barry (at) opensolutions (dot) ie
             http://www.opensolutions.ie/

    This file is part of the Cityware\Snmp package.

        Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:

        * Redistributions of source code must retain the above copyright
          notice, this list of conditions and the following disclaimer.
        * Redistributions in binary form must reproduce the above copyright
          notice, this list of conditions and the following disclaimer in the
          documentation and/or other materials provided with the distribution.
        * Neither the name of Open Source Solutions Limited nor the
          names of its contributors may be used to endorse or promote products
          derived from this software without specific prior written permission.

    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
    ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
    WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
    DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY
    DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
    (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
    LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
    ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
    (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
    SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

namespace Cityware\Snmp\MIBS\Cisco;

/**
 * A class for performing SNMP V2 queries on Cisco devices
 *
 * @copyright Copyright (c) 2012-2016, Open Source Solutions Limited, Dublin, Ireland
 * @author Luis Alberto Herrero <laherre@unizar.es>
 */
class PAGP extends \Cityware\Snmp\MIBS\Cisco
{

    const OID_PAGP_GROUPIFINDEX                 = '1.3.6.1.4.1.9.9.98.1.1.1.1.8';
    
    /**
     *
     * @return associative array with the physic interface index (key) and the agregation port ifindex (value)
     *   if key == value OR value == 0 not agregation
     */
    public function groupIfIndex() {
        return $this->getSNMP()->subOidWalk( self::OID_PAGP_GROUPIFINDEX, 15 );
    }
    
    /**
     * Gets an associate array of PAGP ports with the [id] => name of it's constituent ports
     *
     * E.g.:
     *    [5048] => Array
     *        (
     *            [10111] => GigabitEthernet1/0/11
     *            [10112] => GigabitEthernet1/0/12
     *        )
     *
     * @return array Associate array of LAG ports with the [id] => name of it's constituent ports
     */
    public function getPAGPPorts()
    {
        $ports = array();

        foreach( $this->groupIfIndex() as $portId => $aggPortId )
            if( $aggPortId != 0 &&  $portId != $aggPortId)
                $ports[ $aggPortId ][$portId] = $this->getSNMP()->useIface()->names()[$portId];

        return $ports;
    }

}
