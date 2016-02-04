<?php
/**
* @title:  LP Batch Processing Application
* @about:  to take two input files from a legacy Content Management Sysetm (CMS) and render html pages
*/

define("ROOT_DIR", __DIR__);

require ROOT_DIR . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR . "validations.php";

/*
* Take input files from the command line & validate
*/

echo ">>> Lonely Planet Batch Processor Running..." . PHP_EOL;;

$usage = ">>> ERROR! USAGE: php main.php -t <taxonomy>.xml -d <destinations>.xml" . PHP_EOL
  . "Exiting!" . PHP_EOL;

$exit_level = 0; // 0: OK; 1: WARNING; 2: ERROR - can be read by a monitoring program

$cli_parameters = getopt("t:d:o:");

if (!is_valid_xml( $taxonomy_file = file_get_contents( $cli_parameters["t"] ) ) 
	|| !is_valid_xml( $destinations_file = file_get_contents( $cli_parameters["d"] ) )){

	$exit_level = 2;

	echo $usage;

	exit($exit_level);
}

echo "> Input files OK! Processing..." . PHP_EOL . PHP_EOL;

// Output dir as param

//print_r($destinations_xml);
//print_r($taxonomy_xml);



/*
* Processing
*/

// $doc = new DOMDocument('1.0', 'utf-8');
     
// $doc->loadXML( $taxonomy_xml );

//var_dump($doc);

$xml_destinations = simplexml_load_string($destinations_file);
$xml_taxonomy = simplexml_load_string($destinations_file);

print_r($xml_destinations);
//$json = json_encode($xml);
//$array = json_decode($json,TRUE);

//print_r($xml->taxonomy);// whole tree

// echo "> taxonomy_name: " . $xml->taxonomy->taxonomy_name . PHP_EOL;// World

// echo "> node_name: " . $xml->taxonomy->node->node_name . PHP_EOL;// Africa

// echo "> node['atlas_node_id']: " . $xml->taxonomy->node['atlas_node_id'] . PHP_EOL;

// echo "> node['ethyl_content_object_id']: " . $xml->taxonomy->node['ethyl_content_object_id'] . PHP_EOL;

// echo "> node['geo_id']: " . $xml->taxonomy->node['geo_id'] . PHP_EOL;

// echo "> child node_name: " . $xml->taxonomy->node->node->node_name . PHP_EOL;// Africa

// echo "> node['geo_id']: " . $xml->taxonomy->node->node['geo_id'] . PHP_EOL;

// $database = array();

// foreach ($xml as $key => $value) {

// 	$taxonomy_name = $value->taxonomy_name ;

// 	echo "Tx Node Name: " . $taxonomy_name . PHP_EOL;

// 	$database[$taxonomy_name] = array(); // taxonomy => MD array

// 	foreach ($value as $key => $value) { // Continent
		
		

// 		//$database [$taxonomy_name]['Continent'] = $node;
// 	}
// }

//var_dump($database);


// foreach ($array as $key => $value) {
// 	foreach ($variable as $key => $value) {
// 		# code...
// 	}
// }





/*
* Finally
*/
echo PHP_EOL . ">>> Program Terminated!" . PHP_EOL;

exit($exit_level);

/*
* Funcitons
*/

// function is_valid_xml( $xml ) 
// {
//     libxml_use_internal_errors( true );
     
//     $doc = new DOMDocument('1.0', 'utf-8');
     
//     $doc->loadXML( $xml );
     
//     $errors = libxml_get_errors();

//     //var_dump( $errors );
     
//     return empty( $errors );
// }