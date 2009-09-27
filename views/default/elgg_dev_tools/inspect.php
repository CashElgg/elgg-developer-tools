<?php 
/*******************************************************************************
 * Inpsect View
 * 
 * Inspect global variables of Elgg
 * 
 * @package Elgg Developer Tools
 * @author Cash Costello
 ******************************************************************************/

global $CONFIG;

echo '<p>' . elgg_echo('elgg_dev_tools:inspect:explanation') . '</p>';

echo elgg_view('input/pulldown', array( 'internalname' => 'inspect_type',
										'options_values' => array(	'Views' => 'Views', 
																	'Events' => 'Events',
																	'Plugin Hooks' => 'Plugin Hooks',
																) ));

echo '<br />';

echo elgg_view('input/button', array(	'value' => elgg_echo('Submit'),
										'js' => 'onclick="edtInspectSubmit()"' ));
?>
<div id="edt_inspect_results"></div>

<script type="text/javascript">
function edtInspectSubmit()
{
	var inspect_type = $(".input-pulldown").val();
	
	$.ajax({
		type: "GET",
		url: "<?php echo $CONFIG->wwwroot . 'mod/elgg_dev_tools/endpoint/inspect.php'; ?>",
		data: {type: inspect_type},
		cache: false,
		success: function(data){
			$("#edt_inspect_results").html(data);
			$("#elgg_dev_tools_inspect").tree();
		}
	});
}
</script>
