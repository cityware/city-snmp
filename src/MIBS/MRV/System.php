<?php

/*
    Copyright (c) 2013, Open Source Solutions Limited, Dublin, Ireland
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

namespace Cityware\Snmp\MIBS\MRV;

/**
 * A class for performing SNMP V2 queries on MRV devices
 *
 * Specifically written for the LX-40xx series console servers
 *
 * @see http://service.mrv.com/downloads/mibs5.3.2.zip
 * @see http://service.mrv.com/support/tech_docs/36/974
 *
 * @copyright Copyright (c) 2013, Open Source Solutions Limited, Dublin, Ireland
 * @author Barry O'Donovan <barry@opensolutions.ie>
 */
class System extends \Cityware\Snmp\MIB
{

    const OID_MRV_OS_IMAGE = '.1.3.6.1.4.1.33.100.1.1.1.0';
    const OID_MRV_MODEL    = '.1.3.6.1.4.1.33.100.1.1.12.0';

    /**
     * Returns the operating system image name
     *
     * @return string The operating system image name
     */
    public function osImage()
    {
        return $this->getSNMP()->get( self::OID_MRV_OS_IMAGE );
    }

    /**
     * Returns the hardware model
     *
     * @return string The hardware model
     */
    public function model()
    {
        return $this->getSNMP()->get( self::OID_MRV_MODEL );
    }

}
