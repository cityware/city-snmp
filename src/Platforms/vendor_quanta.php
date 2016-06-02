<?php

// From: https://github.com/inex/IXP-Manager/issues/210 - very limited information

if( strtolower( substr( $sysDescr, 0, 18 ) ) == 'fastpath switching' )
{
    $this->setVendor( 'Quanta' );
    $this->setModel( "Quanta" );
    $this->setOs( 'VxWorks' );
    $this->setOsVersion( null );
    $this->setOsDate( null );

    try {
        $this->setSerialNumber( $this->getSNMPHost()->get( '.1.3.6.1.2.1.47.1.1.1.1.11.1' ) );
    } catch( Exception $e ) {
        $this->setSerialNumber( '(error)' );
    }
}
