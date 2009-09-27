<?php
/*******************************************************************************
 * Ajax endpoint for inspection
 *
 * 
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 ******************************************************************************/

	/**
	 * Writes an ordered list from an associative array of indexed arrays
	 * @param $data
	 */
	function edt_display_tree($data)
	{
		echo "<ul>";
		foreach ($data as $key => $arr)
		{
			echo "<li>{$key}";
			echo "<ul>";
			foreach ($arr as $value)
				echo "<li>{$value}</li>";
			echo "</ul>";
			echo "</li>";
		}
		echo "</ul>";		
	}


	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
	require_once dirname(dirname(__FILE__)) . '/includes/ElggInspector.php';
	
	global $CONFIG;
	
	admin_gatekeeper();
	
	$inspect_type = get_input('type');
	
	$inspector = new ElggInspector();
	
	$views = $inspector->getCoreViews();

	echo '<br />';
	echo '<h3>' . $inspect_type . '</h3>'; 
	echo '<hr />';
	echo '<div id="elgg_dev_tools_inspect">';
	edt_display_tree($views);
	echo '</div>';
		
	
/*
	//var_dump($CONFIG->views->simplecache);
	
	//var_dump($CONFIG->views->locations);
*/	
	
?>