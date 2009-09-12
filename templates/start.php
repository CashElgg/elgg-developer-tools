<?php
/*******************************************************************************
 * %%plugin_name%%
 *
 * @author %%author%%
 ******************************************************************************/

	function %%plugin_name%%_init()
	{
		global $CONFIG;
				
		return true;
	}
	
	
	register_elgg_event_handler('init', 'system', '%%plugin_name%%_init');
?>