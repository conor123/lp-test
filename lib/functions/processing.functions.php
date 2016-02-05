<?php

function process_destinations($destinations_file, $xpath, $output_directory)
{
	$destinations = array();

	$destination = array();

	$reader = new XMLReader();

	$reader->open($destinations_file);

	while ($reader->read()) {
	    switch ($reader->nodeType) {
	        case (XMLREADER::ELEMENT):
	        if ($reader->localName == "destination") {

	        	$destination['atlas_id'] = $reader->getAttribute("atlas_id");

	        	$destination['title'] = $reader->getAttribute("title");

	        	$navigation = get_navigation($xpath, $destination['atlas_id']);

	        	$node = $reader->expand();
	        	//echo $node->asXML;
                $dom = new DomDocument();
                $n = $dom->importNode($node,true);
                $dom->appendChild($n);
                $xp = new DomXpath($dom);

                $introductory = $xp->query("/destination/introductory");

                $destination['nav-up'] = $navigation['nav-up'];

                $destination['nav-down'] = $navigation['nav-down'];

                //$destination['introductory'] = str_replace("\n", "<br />", $introductory->item(0)->nodeValue);
                $destination['introductory'] = $introductory->item(0)->nodeValue;
                $history = $xp->query("/destination/history");
                //$destination['history'] = isset($history->item(0)->nodeValue) ? str_replace("\n", "<br />", $history->item(0)->nodeValue) : null;
                $destination['history'] = isset($history->item(0)->nodeValue) ? $history->item(0)->nodeValue : null;
                

                $html = render_html($destination);

                $filename = $destination['title'] . ".html";

                write_html_to_disk($html, $filename, $output_directory);

	    		unset($destination);
	        }

	    }//Switch

	}

}

function get_navigation($xpath, $atlas_node_id)
{
	//echo "Nav: " . PHP_EOL;

	//print_r($xpath);die;

	$query = "//node[@atlas_node_id=$atlas_node_id]";//Query all child nodes where att = x

    $current_node = $xpath->query($query);

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


function recursive_parent_nodes($node, $parents)
{	
	//echo "> CHECK: " . $node->parentNode->nodeValue . PHP_EOL;

	if (empty($node->parentNode->parentNode->parentNode)) {

		//echo "> Top Node!" . PHP_EOL;

		//var_dump($parents);

		return $parents;

	} else {

		$parents[] = $node->firstChild->nodeValue;
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