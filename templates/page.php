<?php

	// include the Elgg engine
	include_once dirname(dirname(dirname(__FILE__))) . "/engine/start.php"; 

	// maybe logged in users only?
	//gatekeeper();
	
	// get any input
	//$param = get_input('param');

	$title = elgg_echo('%%plugin_name%%:pagetitle');
	
	// create content for main column
	$content = elgg_view_title($title);
	$content .= "hello, world";
	
	// layout the sidebar and main column using the default sidebar
	$body = elgg_view_layout('two_column_left_sidebar', '', $content);

	// create the complete html page and send to browser
	page_draw($title, $body);
?>