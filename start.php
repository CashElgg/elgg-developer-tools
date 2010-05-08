<?php
/**
 * Elgg Development Tools
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 * @author Aaron Saray (102degrees.com)
 */

/**
 * Dev Tools initialization
 */
function elgg_dev_tools_init() {
	global $CONFIG;

	// if enabled, we include this for every user
	require_once dirname(__FILE__) . '/includes/ElggDevTools.php';
	ElggDevTools::launcher();

	extend_view('css', 'elgg_dev_tools/css');

	register_elgg_event_handler('pagesetup', 'system', 'elgg_dev_tools_pagesetup');

	register_page_handler('elgg_dev_tools', 'elgg_dev_tools_page_handler');

	register_action("elgg_dev_tools/updatesettings", FALSE, $CONFIG->pluginspath ."elgg_dev_tools/actions/updatesettings.php", TRUE);
	register_action("elgg_dev_tools/buildplugin", FALSE, $CONFIG->pluginspath ."elgg_dev_tools/actions/buildplugin.php", TRUE);
}

/**
 * page handler for nicer urls
 */
function elgg_dev_tools_page_handler($page) {
	global $CONFIG;

	// only include javascript on dev tools pages
	extend_view('metatags', 'header/elgg_dev_tools');

	$tab = $page[0];
	if (!$tab) {
		$tab = "settings";
	}

	set_input("tab", $tab);
	require $CONFIG->pluginspath . "elgg_dev_tools/index.php";

	return TRUE;
}

/**
 * Add admin menu item
 */
function elgg_dev_tools_pagesetup() {
	if (get_context() == 'admin') {
		global $CONFIG;
		add_submenu_item(elgg_echo('elgg_dev_tools:adminlink'), $CONFIG->wwwroot . 'pg/elgg_dev_tools/');
	}
}

/**
 * Write out page creation time (PHP + MySQL time)
 */
function elgg_dev_tools_shutdown_hook() {
	global $CONFIG, $START_MICROTIME;

	// run if debug is turned off and timing is turned on
	if (!isset($CONFIG->debug) || !$CONFIG->debug) {
		$creation_time = (float)(microtime(TRUE) - $START_MICROTIME);
		error_log("Page {$_SERVER['REQUEST_URI']} generated in $creation_time seconds");
	}
}

/**
 * Post-process a view to add a wrapper div
 */
function elgg_dev_tools_outline_views($hook, $entity_type, $returnvalue, $params) {
	global $CONFIG;

	if (elgg_get_viewtype() != "default") {
		return;
	}

	$excluded_bases = array('css', 'js', 'input', 'output', 'embed', 'pageshells', 'metatags', 'icon',);

	$excluded_views = array('page_elements/header', 'page_elements/header_contents', 'page_elements/footer',
			'riverdashboard/js', );

	$view = $params['view'];

	$view_hierarchy = explode('/',$view);
	if (in_array($view_hierarchy[0], $excluded_bases)) {
		return;
	}

	if (in_array($view, $excluded_views)) {
		return;
	}

	if ($returnvalue) {
		$return_data = "<div id='view-$view'>" . $returnvalue . "</div>";
	}

	return $return_data;
}


// start the ElggDevTools as soon as possible (it is not recommended for other plugins to do this!)
elgg_dev_tools_init();
//register_elgg_event_handler('init', 'system', 'elgg_dev_tools_init', 1);
