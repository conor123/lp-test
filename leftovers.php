<?php


                //$xpath = new DOMXPath($dom);

                //$query = "//node_name";//Query all child nodes where att = x

                //$node_names = $xpath->query($query);

                //echo "All 2: " . $node_names->nodeValue . PHP_EOL;// All the sub nodes

                //var_dump($node_names);



                //echo "TX: " . $dom->textContent . PHP_EOL;

                // echo "KIDS: ";

                // $kids = preg_split("/[\s,]+/", $dom->textContent);

                // var_dump($kids);

       //          $xpath = new DOMXPath($dom);

       //          $query = "//node[@atlas_node_id=$atlas_node_id]";//Query all child nodes where att = x

   				// $current_node = $xpath->query($query);

   				// $children = array();

			    //$children = $current_node[0]->firstChild->childNodes;

			    //echo $current_node[0]->firstChild->nodeValue . PHP_EOL;//Africa
			 //    foreach($current_node as $item){
				// 	foreach ($item->childNodes as $child) {

				// 		echo "Child: " . $child->firstChild->nodeValue . PHP_EOL;

				// 		$children[] = $child->firstChild->nodeValue;
				// 	}
				// }
			                
                //$root = $dom->documentElement;


                //echo "Parent: " . $node->firstChild->nodeValue . PHP_EOL;

	        	//echo "EL: " . $atlas_node_id . PHP_EOL;

	        	//$destinations[$atlas_node_id]['nav-up'] = "<ul><li><a href = \"up.html\">UP</a></li></ul>";
	        	//$destinations[$atlas_node_id]['nav-down'] = "<ul><li><a href = \"down.html\">Down</a></li></ul>"; 
	        	
	        	//return;
	        	//$destination['title'] = $reader->getAttribute("title");

	        	// GET NAVIGATION
	        	//$navigation = get_fast_navigation($tax_xpath, $destination['atlas_id']);
	        	//$navigation = get_dummy_navigation($xpath, $destination['atlas_id']);
	        	//$destination['nav-up'] = $navigation['nav-up'];
                //$destination['nav-down'] = $navigation['nav-down'];

	         	// GET CONTENT
	        	
                




      //           $children = $root->childNodes;

      //           //echo "Class: " . get_class($children) . PHP_EOL;die;

      //           //print_r($children);die;
      //           foreach ($children as $key => $child) {
      //           	echo "Child: " . $child->firstChild->nodeValue . PHP_EOL;
                	
      //           }

      //           //die;
      //           $tax_xpath = new DomXpath($dom);

      //           $query = "//node";//Query all child nodes where att = x

    		// 	$results = $tax_xpath->query($query);// Returns dom node list


  				// echo "Class: " . get_class($results) . PHP_EOL;die;

    			// foreach ($results as $key => $value) {
    			// 	echo "R: " . $value->firstChild->nodeValue . PHP_EOL;
    			// }

    			//print_r( "R: " . ($results[0]->nodeValue)) . PHP_EOL;
    			

    			//die;

    // 			foreach($node as $item){
				// 	foreach ($item->childNodes as $child) {

				// 		$children[] = $child->firstChild->nodeValue;
				// 	}
				// }

				// var_dump($children);

    //             foreach($dom->childNodes as $child){

    //             	echo "C: " . $child->firstChild->nodeValue;
					
				// }

				//var_dump($results);
				//die;

       //          $parents = array();

    			// $parents = recursive_parent_nodes($dom, $parents);

    			//var_dump($parents);

    			//die;

                //$result = $xp->query("//node[@atlas_node_id=$atlas_node_id]");

				// //var_dump($result[0]->xpath("..")[0]->node_name->asXml);

				// //echo "Node Name:: " . $result[0]->node_name . PHP_EOL;

				// if (!is_null($result[0])) {
				// 	$parent = $result[0]->xpath("..")[0]->node_name;
				// } else {
				// 	continue;
				// }

				// //echo "Parent Node Name: " . $parent . PHP_EOL;

				// //$query = "//node[@atlas_node_id=$atlas_node_id]";//Query all child nodes where att = x
				// # code...

				// $destination_data['nav-up'] = "<ul><li><a href = \"$parent.html\">$parent</a></li></ul>";

				// $destination_data['nav-up'] = "<ul><li><a href = \"$parent.html\">$parent</a></li></ul>";

				// // DOWN

				// //$result = $tax_xml->xpath("//node[@atlas_node_id=$atlas_node_id]");
				// $nav_down = "<ul>";
				// foreach ($result[0]->children() as $children) {

				// 	foreach ($children as $node => $child) {
				// 		if ($node == "node_name") {
				// 			$nav_down .= "<li><a href = \"$child.html\">$child</a></li>";
				// 			//$destination_data['nav-down'] .= $child;
				// 			continue;
				// 		}

				// 		//echo  ? "Child: " . $child. PHP_EOL : null;
				// 	}
					
				// 	//continue;
				// 	//var_dump($child[0]);die;
				// }

				// $nav_down .= "</ul>";

				// $destination_data['nav-down'] = $nav_down;



                //$introductory = $xp->query("//introductory/introduction/overview");
                //$destination['introductory'] = str_replace("\n", "<br />", $introductory->item(0)->nodeValue);
                //$destination['introductory'] = $introductory->item(0)->nodeValue;
                //$history = $xp->query("//history/history/history");
                //$destination['history'] = isset($history->item(0)->nodeValue) ? str_replace("\n", "<br />", $history->item(0)->nodeValue) : null;
                //$destination['history'] = isset($history->item(0)->nodeValue) ? $history->item(0)->nodeValue : null;
                
                // RENDER & WRITE
       //          $html = render_html($destination);
       //          $filename = $destination['title'] . ".html";
       //          write_html_to_disk($html, $filename, $output_directory);
	    		// unset($destination);

	    		//$destinations[$destination_id] = $destination;
	        }

	    }//Switch

	}

	//$tax_xml = new SimpleXMLElement(file_get_contents($taxonomy_file));




	// foreach ($destinations as $atlas_node_id => &$destination_data) {

	// 	// UP

	// 	//echo ">>> ID: " . $atlas_node_id . PHP_EOL;

	// 	$result = $tax_xml->xpath("//node[@atlas_node_id=$atlas_node_id]");

	// 	//var_dump($result[0]->xpath("..")[0]->node_name->asXml);

	// 	//echo "Node Name:: " . $result[0]->node_name . PHP_EOL;

	// 	if (!is_null($result[0])) {
	// 		$parent = $result[0]->xpath("..")[0]->node_name;
	// 	} else {
	// 		continue;
	// 	}

		

	// 	//echo "Parent Node Name: " . $parent . PHP_EOL;

	// 	//$query = "//node[@atlas_node_id=$atlas_node_id]";//Query all child nodes where att = x
	// 	# code...

	// 	$destination_data['nav-up'] = "<ul><li><a href = \"$parent.html\">$parent</a></li></ul>";

	// 	// DOWN

	// 	//$result = $tax_xml->xpath("//node[@atlas_node_id=$atlas_node_id]");
	// 	$nav_down = "<ul>";
	// 	foreach ($result[0]->children() as $children) {

	// 		foreach ($children as $node => $child) {
	// 			if ($node == "node_name") {
	// 				$nav_down .= "<li><a href = \"$child.html\">$child</a></li>";
	// 				//$destination_data['nav-down'] .= $child;
	// 				continue;
	// 			}

	// 			//echo  ? "Child: " . $child. PHP_EOL : null;
	// 		}
			
	// 		//continue;
	// 		//var_dump($child[0]);die;
	// 	}

	// 	$nav_down .= "</ul>";

	// 	$destination_data['nav-down'] = $nav_down;

		



	// }

	//return $destinations;

	

    //$current_node = $tax_xpath->query($query);