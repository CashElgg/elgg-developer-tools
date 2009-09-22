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
	
	$inspector = new ElggInspector();
	
	$views = $inspector->getCoreViews();

	echo '<div id="demo1">';
	edt_display_tree($views);
	echo '</div>';
		
	
/*
	//var_dump($CONFIG->views->simplecache);
	
	//var_dump($CONFIG->views->locations);
*/	
	
?>
<!--  
<div id="demo1">
	<ul>
		<li>Root node 1
			<ul>
				<li>Custom icon</li>
				<li>Child node 2</li>
				<li>Some other child node 111</li>
			</ul>
		</li>
		<li>Root node 2</li>
	</ul>
</div>
-->