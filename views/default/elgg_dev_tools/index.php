<?php 
/*******************************************************************************
 * Admin Form View
 * 
 * This is the form that the admin uses to change elgg dev tools options
 * 
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 ******************************************************************************/

$simplecache_flag = $vars['config']->simplecache_enabled;
$viewscache_flag = $vars['config']->viewpath_cache_enabled;
$firephp_flag = (int) get_plugin_setting('enablefirephp', 'elgg_developer_tools');
$displayerrors_flag = (int) get_plugin_setting('displayerrors', 'elgg_developer_tools');
$debug_flag = (int) $vars['config']->debug;




echo '<div class="contentWrapper">';

/******************** build form *******************************/

$form_body = "<fieldset><legend>" . elgg_echo('elgg_dev_tools:legend') . "</legend>";
$form_body .= '<p>' . elgg_echo('elgg_dev_tools:explanation') . '</p>';

/** simple cache **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:simplecache:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$simplecache_flag, 'internalname'=>'usesimplecache', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:simplecache:explanation') . '</em></p>';
/** end simple cache **/

/** views cache **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:viewscache:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$viewscache_flag, 'internalname'=>'useviewscache', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:viewscache:explanation') . '</em></p>';
/** end views cache **/

/** display errors **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:displayerrors:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$displayerrors_flag, 'internalname'=>'displayerrors', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:displayerrors:explanation') . '</em></p>';
/** end display errors **/

/** firephp **/
$form_body .= '<p><h4>' . elgg_echo('elgg_dev_tools:enablefirephp:question') . '</h4>';

/** helper - see if fire php extension is installed - sometimes is wrong - drat **/
if ($value) {
    if (class_exists('FirePHP')) {
        $fb = FirePHP::getInstance(TRUE);
        if (!$fb->detectClientExtension()) {
            $form_body .= '<em class="error" id="firephperror">' . elgg_echo('elgg_dev_tools:enablefirephp:warning') . '</em><br />';
        }
    } 
}

$form_body .= elgg_view('input/radio', array('value'=>$firephp_flag, 'internalname'=>'enablefirephp', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:enablefirephp:explanation') . '</em></p>';
/** end firephp **/


/** debug **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:debug:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$debug_flag, 'internalname'=>'debug', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:debug:explanation') . '</em></p>';
/** end debug **/


$form_body .= '</fieldset>';

$form_body .= elgg_view('input/submit', array('value'=>elgg_echo('elgg_dev_tools:formbutton')));

echo elgg_view('input/form', array('body'=>$form_body, 'action'=>$CONFIG->wwwroot . 'action/elgg_dev_tools/updatesettings', 'internalid'=>'elgg_dev_tools_form'));

echo '</div>';