<?php

class ElggInspector {
	
	public function getCoreViews()
	{
		global $CONFIG;
		
		$coreViews = $this->recurseFileTree($CONFIG->viewpath . "default/");
		
		// remove base path and php extension 
		array_walk($coreViews, create_function('&$v,$k', 'global $CONFIG; $v = substr($v, strlen($CONFIG->viewpath . "default/"), -4);'));
	}
	
	
	protected function recurseFileTree($dir)
	{		
		$view_list = array();
		
		$handle = opendir($dir);
		while ($file = readdir($handle))
		{
			if ($file[0] == '.')
			{
				
			}
			else if (is_dir($dir . $file))
			{
				$view_list = array_merge($view_list, $this->recurseFileTree($dir . $file. "/"));
			}
			else
			{
				$extension = strrchr(trim($file, "/"), '.');
				if ($extension === ".php")
				{	
					$view_list[] = $dir . $file;
				}
			}
		}
		closedir($handle);
				
		return $view_list;
	}		
	
}

?>