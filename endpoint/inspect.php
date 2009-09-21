<?php
/*******************************************************************************
 * Ajax endpoint for inspection
 *
 * 
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 ******************************************************************************/

	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
	require_once dirname(dirname(__FILE__)) . '/includes/ElggInspector.php';
	
	global $CONFIG;
	
	admin_gatekeeper();
	
	$inspector = new ElggInspector();
	
	$views = $inspector->getCoreViews();

	
/*
	//var_dump($CONFIG->views->simplecache);
	
	//var_dump($CONFIG->views->locations);
	
	//var_dump($CONFIG->views->extensions);
	echo '<div id="demo1">';
	echo "<ul>";
	
	foreach ($CONFIG->views->locations['default'] as $k => $v)
	{
		echo "<li>{$k}";
		echo "<ul>";
		echo "<li>{$v}</li>";
		if (isset($CONFIG->views->extensions[$k]))
		{
			foreach ($CONFIG->views->extensions[$k] as $p => $view)
			{
				echo "<li>{$view}</li>";
			}	
		}
		echo "</ul>";
		echo "</li>";
	}
	
	echo "</ul>";
	echo "</div>";
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