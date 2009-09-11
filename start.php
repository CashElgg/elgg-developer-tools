<?php
/*******************************************************************************
 * Extra Development Tools
 *
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 ******************************************************************************/

	function elgg_dev_tools_init()
	{
		// if enabled, we include this for every user
		require_once dirname(__FILE__) . '/includes/ElggDevTools.php';
		ElggDevTools::launcher();
		 
		extend_view('css', 'elgg_dev_tools/css');
		 
		return true;
	}
	
	/**
	 * page handler for nicer urls 
	 */
	function elgg_dev_tools_page_handler()
	{
		global $CONFIG;
		include $CONFIG->pluginspath . "elgg_dev_tools/index.php";
		return true;
	}
	
	/**
	 * Add admin menu item
	 */
	function elgg_dev_tools_pagesetup()
	{
		if (get_context() == 'admin') {
			global $CONFIG;
			add_submenu_item(elgg_echo('elgg_dev_tools:adminlink'), $CONFIG->wwwroot . 'pg/elgg_dev_tools/');
		}
		 
		return true;
	}
	
	register_elgg_event_handler('plugins_boot', 'system', 'elgg_dev_tools_init', 1);
	register_elgg_event_handler('pagesetup', 'system', 'elgg_dev_tools_pagesetup');
	
	register_page_handler('elgg_dev_tools','elgg_dev_tools_page_handler');
	
	register_action("elgg_dev_tools/updatesettings", false, $CONFIG->pluginspath ."elgg_dev_tools/actions/updatesettings.php", true);
?>