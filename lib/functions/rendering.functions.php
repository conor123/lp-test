<?php

function render_html($content)
{
	$history_title = is_null($content['history']) ? '' : '<h2>History</h2>';

	$html = '<!DOCTYPE html>
	<html>
	  <head>
	    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <title>Lonely Planet</title>
	    <link href="static/all.css" media="screen" rel="stylesheet" type="text/css">
	  </head>

	  <body>
	    <div id="container">
	      <div id="header">
	        <div id="logo"></div>
	        <h1>Lonely Planet: ' . $content['title'] . '</h1>
	      </div>

	      <div id="wrapper">
	        <div id="sidebar">
	          <div class="block">
	            <h3>Navigation</h3>
	            <div class="content">
	              <div class="inner">' . $content['nav-down']
	                
	              . '</div>
	            </div>
	          </div>
	        </div>

	        <div id="main">
	          <div class="block">
	            <div class="secondary-navigation">'. $content['nav-up'] .
	              
	              '<div class="clear"></div>
	            </div>
	            <div class="content">
	              <div class="inner">
	                <h2>Introduction</h2>'. $content['introductory'] .
	                $history_title . $content['history'] .
	          		  
	              '</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </body>
	</html>
	';

	return $html;
}

function write_html_to_disk($html, $filename, $directory)
{
	$fh = fopen($directory . $filename, "w");

	fwrite($fh, $html);

	fclose($fh);
}