<?php 

/**
* PLUGIN DEACTIVATION CLASS
*/
class PostNoticeMPFDeactivate
{
	function __construct()
	{
		# code...
	}

	public static function deactivate() {

		flush_rewrite_rules();

	}

}
