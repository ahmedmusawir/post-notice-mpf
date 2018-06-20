<?php 

/**
* PLUGIN ACTIVATION CLASS
*/
class PostNoticeMPFActivate
{
	function __construct()
	{
		# code...
	}

	public static function activate() {

		flush_rewrite_rules();
	}
}
