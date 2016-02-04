<?php
define("ROOT_DIR", __DIR__ . DIRECTORY_SEPARATOR);

define("DATA_INPUT_DIR", ROOT_DIR . "data" . DIRECTORY_SEPARATOR . "input" . DIRECTORY_SEPARATOR);

define("DATA_OUPUT_DIR", ROOT_DIR . "data" . DIRECTORY_SEPARATOR . "output" . DIRECTORY_SEPARATOR);

define("FUNCTIONS_DIR", ROOT_DIR . "lib" . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR);

require FUNCTIONS_DIR . "rendering.functions.php";

require FUNCTIONS_DIR . "processing.functions.php";

//$filename = "out.html";

$output_directory = DATA_OUPUT_DIR;

//$content = array();

$destinations_file = DATA_INPUT_DIR . "bigger-destinations.xml";

$taxonomy_file = DATA_INPUT_DIR . "bigger-taxonomy.xml";

$start = microtime(true);

$xml = file_get_contents($taxonomy_file);

$dom = new DOMDocument;

$dom->preserveWhiteSpace = false;
//$dom = DOMDocument::loadXML($xml);
$dom->LoadXML($xml);

$xpath = new DOMXPath($dom);

//print_r($xpath);die;

process_destinations($destinations_file, $xpath, $output_directory);

echo "> Completed in " . (microtime(true) - $start) . "s" . PHP_EOL;