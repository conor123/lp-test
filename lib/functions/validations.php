<?php
/*
* Funcitons
*/

function is_valid_xml( $xml ) 
{
    libxml_use_internal_errors( true );
     
    $doc = new DOMDocument('1.0', 'utf-8');
     
    $doc->loadXML( $xml );
     
    $errors = libxml_get_errors();

    //var_dump( $errors );
     
    return empty( $errors );
}