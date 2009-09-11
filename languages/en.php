<?php
/*******************************************************************************
 * Elgg Dev Tools Language File
 *
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 ******************************************************************************/

/** build new array **/
$english = array(
/** generics **/
	'elgg_dev_tools:title'                    => 'Elgg Development Tools',
	'elgg_dev_tools:adminlink'                => 'Elgg Developer Tools',
	'elgg_dev_tools:message:successfulupdate' => 'The Developer Settings have been updated.',
	'elgg_dev_tools:yes'                      => 'Yes',
	'elgg_dev_tools:no'                       => 'No',

/** form elements **/
	'elgg_dev_tools:legend'                	  => 'Developer Settings',
	'elgg_dev_tools:explanation'              => 'Control your development and debugging settings below. Some of these are also available from the Site Administration section of Elgg.',
	'elgg_dev_tools:formbutton'               => 'Update Settings',
	'elgg_dev_tools:formexplanation'          => 'The following options should help make your Elgg hacking easier!',

/** simple cache **/
	'elgg_dev_tools:simplecache:question'     => 'Use simple cache?',
	'elgg_dev_tools:simplecache:explanation'  => 'The simple cache handles caching javascript and css files. You will usually want to turn this off when developing a plugin.',

/** views cache **/
	'elgg_dev_tools:viewscache:question'     => 'Use views filepath cache?',
	'elgg_dev_tools:viewscache:explanation'  => 'The views cache records the location of each view. If you are adding views to a plugin, you definitely want this off.',

/** display errors **/
	'elgg_dev_tools:displayerrors:question'   => 'Display errors?',
	'elgg_dev_tools:displayerrors:explanation'=> "This controls whether PHP warnings and errors are written to the browser screen. This is normally set in php.ini and is overwritten by Elgg's .htaccess file to be off.",

/** fire php **/
	'elgg_dev_tools:enablefirephp:question'   => 'Enable FirePHP logging?',
	'elgg_dev_tools:enablefirephp:explanation'=> 'Enable the FirePHP logging class - useful for ajax development.  See <a href="http://firephp.org">firephp.org</a>.',
	'elgg_dev_tools:enablefirephp:warning'    => "FirePHP is saying that you don't have the FirePHP Firefox extension installed.  If you really don't, check out <a href=\"http://firephp.org\">firephp.org</a> to get it.  Otherwise, just ignore this message.",

/** debug **/
	'elgg_dev_tools:debug:question'           => 'Enable debug?',
	'elgg_dev_tools:debug:explanation'        => "This writes a tremendous amount of data to your server's error log concerning SQL queries. It is rarely useful because there are no logging levels.",

);

add_translation("en",$english);
?>