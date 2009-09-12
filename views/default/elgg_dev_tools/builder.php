<?php 
/*******************************************************************************
 * Plugin Builder Form View
 * 
 * This is the form that the admin uses to build a plugin skeleton
 * 
 * @package Elgg Developer Tools
 * @author Cash Costello
 ******************************************************************************/


/******************** build form *******************************/

$form_body = '<p>' . elgg_echo('elgg_dev_tools:builder:explanation') . '</p>';

// plugin name
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:plugin_name') . ":</b> ";
$form_body .= elgg_view('input/text', array('value'=>$plugin_name, 'internalname'=>'plugin_name', 'class' => 'elgg_dev_tools_textbox'));
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:plugin_name:explanation') . '</em></p>';
// plugin name

// pages
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:pages') . ":</b> ";
$form_body .= elgg_view('input/text', array('value'=>$pages, 'internalname'=>'pages', 'class' => 'elgg_dev_tools_textbox'));
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:pages:explanation') . '</em></p>';
// pages

// actions
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:actions') . ":</b> ";
$form_body .= elgg_view('input/text', array('value'=>$actions, 'internalname'=>'actions', 'class' => 'elgg_dev_tools_textbox'));
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:actions:explanation') . '</em></p>';
// actions

// plugin settings
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:plugin_settings') . ":</b> ";
$form_body .= "<input type=\"checkbox\" name=\"plugin_settings\" value=\"{$plugin_settings}\" />";
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:plugin_settings:explanation') . '</em></p>';
// plugin settings

// user settings
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:user_settings') . ":</b> ";
$form_body .= "<input type=\"checkbox\" name=\"user_settings\" value=\"{$user_settings}\" />";
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:user_settings:explanation') . '</em></p>';
// user settings

// widget
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:widget') . ":</b> ";
$form_body .= "<input type=\"checkbox\" name=\"widget\" value=\"{$widget}\" />";
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:widget:explanation') . '</em></p>';
// widget

// css
$form_body .= "<p><b>" . elgg_echo('elgg_dev_tools:css') . ":</b> ";
$form_body .= "<input type=\"checkbox\" name=\"css\" value=\"{$css}\" />";
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:css:explanation') . '</em></p>';
// css

$form_body .= "<br /><br />";

$form_body .= elgg_view('input/submit', array('value'=>elgg_echo('elgg_dev_tools:builder:formbutton')));

echo elgg_view('input/form', array('body'=>$form_body, 'action'=>$CONFIG->wwwroot . 'action/elgg_dev_tools/buildplugin', 'internalid'=>'elgg_dev_tools_form'));

?>