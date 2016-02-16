<?php
//http://www.codeproject.com/Articles/582953/Working-with-XML-in-PHP

$file = "data/input/taxonomy.xml";

$start = microtime(true);

$reader = new XMLReader();

$reader->open($file);

while ($reader->read()) {

   //echo ">>> Reading..." . PHP_EOL;

	if ($reader->localName == "node" && XMLREADER::ELEMENT == $reader->nodeType) {

      $node = new SimpleXMLElement($reader->readOuterXML());

      echo "> Parent: " . $node->node_name . " : " . $reader->getAttribute("geo_id") . PHP_EOL;

      // echo "> Child: " . $node->node->node_name . PHP_EOL;

      $node = $reader->expand();
      $dom = new DomDocument();
      $n = $dom->importNode($node,true);
      $dom->appendChild($n);
      $node = simplexml_import_dom($dom);

      foreach ($node->children() as $key => $child) {

         //echo "Class: " . get_class($child) . PHP_EOL; // SimpleXMLElement

         if ($child->getName() === "node") {
            echo "Element Type <" . $child->getName() . "> | " . $child->node_name . " || " . $child['geo_id'] . PHP_EOL;
         }
      }

	}

}

$time = microtime(true) - $start;
//print "> R: " . $result->item(0)->nodeValue . PHP_EOL;
print "> T: " . $time . "s" . PHP_EOL;

