<?php
/*******************************************************************************
 * Build a plugin skeleton
 * 
 * 
 * @package Elgg Developer Tools
 * @author Cash Costello
 ******************************************************************************/

	require_once dirname(dirname(__FILE__)) . '/includes/ElggDevTools.php';

	admin_gatekeeper();
	action_gatekeeper();

	global $CONFIG;
	
	$user = get_loggedin_user();
	
	$plugin_name = get_input('plugin_name');
	if (!$plugin_name)
	{
		forward('pg/elgg_dev_tools/builder/');
	}
	
	$pages = get_input('pages');
	$widget = get_input('widget');
	$plugin_settings = get_input('plugin_settings');
	$user_settings = get_input('user_settings');
	$css = get_input('css');
	
	// make the base directory
	$base_dir = $CONFIG->pluginspath . $plugin_name . "/";
	if (!mkdir($base_dir))
	{
		register_error();
		forward('pg/elgg_dev_tools/builder/');	
	}
	
	// make all the primary subdirs
	$dirs = array('actions', 'graphics', 'languages', 'lib', 'pages', 'views');
	foreach ($dirs as $dir)
	{
		if (!mkdir($base_dir . $dir))
		{
			register_error();
			forward('pg/elgg_dev_tools/builder/');	
		}		
	}
	
	
	$params = array('name' => $plugin_name,
					'author' => $user->name, );

	$template_dir = $CONFIG->pluginspath . "elgg_dev_tools/templates/";
	
	// start.php
	if (!ElggDevTools::createFile($base_dir . "start.php", $template_dir . "start.php", $params))
	{
		
	}
	
	// manifest.xml
	if (!ElggDevTools::createFile($base_dir . "manifest.xml", $template_dir . "manifest.xml", $params))
	{
		
	}
	
	// plugin settings
	
	// user settings

	// widget
	
	// primary pages
	
	system_message(sprintf(elgg_echo("elgg_dev_tools:message:successfulbuild"), $plugin_name));
	forward($CONFIG->wwwroot . 'pg/admin/plugins/');
?>