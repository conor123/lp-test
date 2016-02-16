<?php
//http://www.codeproject.com/Articles/582953/Working-with-XML-in-PHP

$xml = <<<XML
<node id = "1">
   <node_name>One</node_name>
   <node id = "2">
      <node_name>Two A</node_name>
   </node>
   <node id = "3">
      <node_name>Two B</node_name>
   </node>
   <node id = "4">
      <node_name>Two C</node_name>
      <node id = "5">
         <node_name>Three A</node_name>
      </node>
   </node>
</node>

XML;

$dom = new DomDocument();

$dom->loadXML($xml);

$domxpath = new DomXpath($dom);

$query = "//node[@id = 5]";

$query = "//ancestor::node";

$query = "//ancestor::node[@id = 5]";

$results = $domxpath->query($query);

//var_dump($results);

foreach ($results as $key => $DOMElement) {
   //
   echo "> Class: " . get_class($DOMElement) 
     . " | V: " . trim($DOMElement->nodeValue) 
     . " |NP| " . $DOMElement->getNodePath() . PHP_EOL;
     //
   echo ">> " . $DOMElement->parentNode->getNodePath() . PHP_EOL;
   //var_dump($DOMElement->firstChild->parentNode);
   //print_r($DOMElement->parentNode->firstChild->nodeValue);

   echo ">>> " . $DOMElement->parentNode->childNodes[1]->nodeValue . PHP_EOL;

   //echo ">>> " . $DOMElement->ownerDocument->saveXML() . PHP_EOL;
}
