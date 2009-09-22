<?php

class ElggInspector {
	
	public function getCoreViews()
	{
		global $CONFIG;
		
		$coreViews = $this->recurseFileTree($CONFIG->viewpath . "default/");
		
		// remove base path and php extension 
		array_walk($coreViews, create_function('&$v,$k', 'global $CONFIG; $v = substr($v, strlen($CONFIG->viewpath . "default/"), -4);'));
		
		// setup views array before adding extensions and plugin views
		$views = array();
		foreach ($coreViews as $view)
			$views[$view] = array($CONFIG->viewpath . "default/" . $view . ".php");

		// add plugins and handle overrides
		foreach ($CONFIG->views->locations['default'] as $view => $location)
		{
			$views[$view] = array($location . $view . ".php");
		}
		
		// now extensions
		foreach ($CONFIG->views->extensions as $view => $extensions)
		{
			$view_list = array();
			foreach ($extensions as $priority => $ext_view)
			{
				if (isset($views[$ext_view]))
					$view_list[] = $views[$ext_view][0];	
			}
			if (count($view_list) > 0)
				$views[$view] = $view_list;
		}
/*
		if (isset($CONFIG->views->extensions[$k]))
		{
			foreach ($CONFIG->views->extensions[$k] as $p => $view)
			{
				echo "<li>{$view}</li>";
			}	
		}
*/			
		ksort($views);
		
		return $views;
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