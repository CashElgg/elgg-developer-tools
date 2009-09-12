<?php
/*******************************************************************************
 * %name%
 *
 * @author %author%
 ******************************************************************************/

	function %name%_init()
	{
		global $CONFIG;
				
		return true;
	}
	
	
	register_elgg_event_handler('init', 'system', '%name%_init');
?>