<?php

// Works with sysDescr such as:
//
// 'Alcatel-Lucent OS9600/OS9700-CFM 6.4.3.520.R01 GA, April 08, 2010.'
// 'Alcatel-Lucent OS6850-P24 6.4.3.520.R01 GA, April 08, 2010.'

if( substr( $sysDescr, 0, 14 ) == 'Alcatel-Lucent' )
{
    $this->setVendor( 'Alcatel-Lucent' );
    $this->setOs( 'AOS' );

    if( substr( $sysDescr, 0, 18 ) == 'Alcatel-Lucent OS9' ) {
        preg_match( '/Alcatel-Lucent (OS.+CFM) ([0-9A-Za-z\(\)\.]+) GA,\s([a-zA-Z]+)\s(\d+),\s(\d+)\./',
            $sysDescr, $matches );

        $this->setModel( explode("/", $matches[1])[0] );

        $this->setOsVersion( $matches[2] );
        $this->setOsDate( new \DateTime( "{$matches[5]}-{$matches[3]}-{$matches[4]}" ) );
        $this->getOsDate()->setTimezone( new \DateTimeZone( 'UTC' ) );
    } else if ( substr( $sysDescr, 0, 18 ) == 'Alcatel-Lucent OS6' ) {
        preg_match( '/Alcatel-Lucent (OS.+) ([0-9A-Za-z\(\)\.]+) GA,\s([a-zA-Z]+)\s(\d+),\s(\d+)\./',
            $sysDescr, $matches );

        $this->setModel( $matches[1] );

        $this->setOsVersion( $matches[2] );
        $this->setOsDate( new \DateTime( "{$matches[5]}-{$matches[3]}-{$matches[4]}" ) );
        $this->getOsDate()->setTimezone( new \DateTimeZone( 'UTC' ) );
    } else {
        $model = $this->getSNMPHost()->get( '.1.3.6.1.2.1.47.1.1.1.1.13.1' );

        if ( !empty ( $model ) ) {
            $this->setModel( $model );

            preg_match( '/Alcatel-Lucent ([0-9A-Za-z\(\)\.]+) GA,\s([a-zA-Z]+)\s(\d+),\s(\d+)\./',
                $sysDescr, $matches );

            $this->setOsVersion( $matches[1] );
            $this->setOsDate( new \DateTime( "{$matches[4]}-{$matches[2]}-{$matches[3]}" ) );
            $this->getOsDate()->setTimezone( new \DateTimeZone( 'UTC' ) );
        } else {
            $this->setModel( 'Unknown' );
            $this->setOsVersion( 'Unknown' );
            $this->setOsDate( null );
        }
    }
}
