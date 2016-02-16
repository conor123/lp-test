<?php

function process_destinations($destinations_file)
{
	$destinations = array();

	$destination = array();

	$reader = new XMLReader();

	$reader->open($destinations_file);

	while ($reader->read()) {
	    switch ($reader->nodeType) {
	        case (XMLREADER::ELEMENT):
	        if ($reader->localName == "destination") {

	        	// GET ID
	        	//$destination['atlas_id'] = $reader->getAttribute("atlas_id");
	        	$destination_id = $reader->getAttribute("atlas_id");
	        	$destination['title'] = $reader->getAttribute("title");

	        	// GET NAVIGATION
	        	//$navigation = get_fast_navigation($tax_xpath, $destination['atlas_id']);
	        	//$navigation = get_dummy_navigation($xpath, $destination['atlas_id']);
	        	//$destination['nav-up'] = $navigation['nav-up'];
                //$destination['nav-down'] = $navigation['nav-down'];

	        	// GET CONTENT
	        	$node = $reader->expand();
	        	//echo $node->asXML;die;
                $dom = new DomDocument();
                $dom->appendChild($dom->importNode($node,true));
                $xp = new DomXpath($dom);

                $introductory = $xp->query("//introductory/introduction/overview");
                //$destination['introductory'] = str_replace("\n", "<br />", $introductory->item(0)->nodeValue);
                $destination['introductory'] = $introductory->item(0)->nodeValue;
                $history = $xp->query("//history/history/history");
                //$destination['history'] = isset($history->item(0)->nodeValue) ? str_replace("\n", "<br />", $history->item(0)->nodeValue) : null;
                $destination['history'] = isset($history->item(0)->nodeValue) ? $history->item(0)->nodeValue : null;
                
                // RENDER & WRITE
       //          $html = render_html($destination);
       //          $filename = $destination['title'] . ".html";
       //          write_html_to_disk($html, $filename, $output_directory);
	    		// unset($destination);

	    		$destinations[$destination_id] = $destination;
	        }

	    }//Switch

	}

	return $destinations;

}


function process_navigation(&$destinations, $taxonomy_file)
{
	$reader = new XMLReader();

	$reader->open($taxonomy_file);

	while ($reader->read()) {

		$reader_node = $reader->expand();
	    $dom = new DomDocument();
	    $n = $dom->importNode($reader_node,true);
	    $dom->appendChild($n);// Dome Element

	    $xp = new DOMXPath($dom);

	    $query = "//ancestor::node[@atlas_node_id=355632]";//Query all child nodes where att = x
		    
	    $results = $xp->query($query);

	    $parents = array();

	    $parents = recursive_parent_nodes($results->item(0)->parentNode->childNodes[1], $parents);

	    var_dump($parents);die;

	    // foreach ($results as $key => $DOMElement) {

	    // 	//echo "X >>> " . $DOMElement->nodeValue . PHP_EOL;

	    // 	//echo "Y >>> " . $DOMElement->parentNode->childNodes[1]->nodeValue . PHP_EOL;

	    // 	foreach ($DOMElement->parentNode->childNodes as $key => $value) {
	    // 		//$parents[] = trim($value->nodeValue);

	    // 		if (!empty(trim($value->firstChild->nodeValue))) {
	    // 			echo !empty(trim($value->firstChild->nodeValue)) ? "Y >>> " . trim($value->firstChild->nodeValue) . PHP_EOL : "";
	    // 		}
	    // 	}
	    // }
	   
	    

	    //$query = "parent::node()";
	    
	    //$results = $node->xpath($query);
	    // var_dump($results);
	    // var_dump($results->item(0));


		if ($reader->localName == "node" && $reader->nodeType == XMLREADER::ELEMENT ) {

		    //$node = new SimpleXMLElement($reader->readOuterXML());
			$node = simplexml_import_dom($dom);

		    //echo "> Parent: " . $node->node_name . " : " . $reader->getAttribute("geo_id") . PHP_EOL;

		    $atlas_node_id = $reader->getAttribute("atlas_node_id");

		    /* 
		    * Drill Down
		    */
		    $nav_down = "<ul>";

		    // echo "> Child: " . $node->node->node_name . PHP_EOL;

		    
		    

			foreach ($node->children() as $key => $child) {

				//echo "Class: " . get_class($child) . PHP_EOL; // SimpleXMLElement

				if ($child->getName() === "node") {
					//echo "Element Type <" . $child->getName() . "> | " . $child->node_name . " || " . $child['geo_id'] . PHP_EOL;

					$nav_down .= "<li><a href = \"$child->node_name.html\">" . $child->node_name . "</a></li>";
				}
			}

			$nav_down .= "</ul>";

			/* 
		    * Drill UP
		    */

		    //$depth = $reader->depth; # parent elements depth

		    // echo "Class: " . get_class($reader_node) . " | " . $reader_node->nodeValue . PHP_EOL;

		    //$xp = new DOMXPath($dom);



		    

		    //var_dump($current_node->item(0)->nodeValue);



		    //print_r($current_node[0]->nodeValue);die;

		    //echo $current_node[0]->firstChild->nodeValue . PHP_EOL;//Africa

		    // $parents = array();

		    // $parents = recursive_parent_nodes($current_node->item(0), $parents);

		    // var_dump($parents);



			//


			$nav_up = "<ul>";

			echo "> Node: " . $node->node_name . " : " . $reader->getAttribute("geo_id") . " || " . $reader->depth . PHP_EOL;

			$nav_up .= "<li><a href = \"$node->node_name.html\">" . $node->node_name . "</a></li>";


			$nav_up .= "</ul>";




			// Update Destinations
			$destinations[$atlas_node_id]['nav-down'] =  $nav_down;

			$destinations[$atlas_node_id]['nav-up'] =  $nav_up;
			//die;
		}


	}

	//var_dump($destinations);
}

function get_navigation($tax_xpath, $atlas_node_id)
{
	//echo "Nav: " . PHP_EOL;

	//print_r($xpath);die;

	$query = "//node[@atlas_node_id=$atlas_node_id]";//Query all child nodes where att = x

    $current_node = $tax_xpath->query($query);

    //print_r($current_node[0]->nodeValue);die;

    //echo $current_node[0]->firstChild->nodeValue . PHP_EOL;//Africa

    $parents = array();

    $parents = recursive_parent_nodes($current_node->item(0), $parents);

    //echo $parents[0];die;

    $len = (count($parents));

    //echo $len - 1;

    //print_r($parents);die;
    //var_dump($parents);die;

    $nav_up = "<ul>";

    for ($i = $len - 1; $i > 0 ; $i--) {

    	//echo $parents[$i-1];die;

    	$nav_up .= "<li><a href='" . $parents[$i] . ".html" . "'>" . $parents[$i]. "</a></li>";
    }

    $nav_up .= "</ul>";

    $navigation['nav-up'] = $nav_up;



    //print_r($nav_up);die;

    $children = array();

    //$children = $current_node[0]->firstChild->childNodes;

    //echo $current_node[0]->firstChild->nodeValue . PHP_EOL;//Africa
    foreach($current_node as $item){
		foreach ($item->childNodes as $child) {

			$children[] = $child->firstChild->nodeValue;
		}
	}
	//var_dump($children);die;

	$nav_down = "<ul>";

	foreach ($children as $child) {
		$nav_down .= "<li><a href='" . $child . ".html" . "'>" . $child. "</a></li>";
	}

	$nav_down .= "</ul>";

	//var_dump($nav_down);die;

	

	$navigation['nav-down'] = $nav_down;

	return $navigation;
}

/**
* @args 
*/
function recursive_parent_nodes($node, $parents)
{	
	echo "> CHECK: " . $node->parentNode->nodeValue . PHP_EOL;

	if (empty($node->parentNode->parentNode->parentNode)) {

		echo "> Top Node!" . PHP_EOL;

		//var_dump($parents);

		return $parents;

	} else {
		//echo "> Adding to parents: " . $node->firstChild->nodeValue . PHP_EOL;

		$parents[] = $node->childNodes[1]->nodeValue;
		//var_dump($parents);
		$node = $node->parentNode;

		return recursive_parent_nodes($node, $parents);
	}
}



/*
* DUMMY
*/
function get_dummy_navigation($taxonomy_file, $destination)
{
	$navigation['nav-up'] = '
	<ul>
	  <li><a href="Africa.html">Africa</a></li>
	  <li><a href="South Africa.html">South Africa</a></li>
	</ul>
	';
	$navigation['nav-down'] = '
	<ul>
	  <li><a href="Africa.html">Kestrel</a></li>
	  <li><a href="Africa.html">Mount Julian</a></li>
	</ul>
	';

	return $navigation;
}
