<?php 
/* Custom Subtitles for Pages Edited from the Admin */

if(!function_exists('have_bootplate_subtitle')) {
	function have_bootplate_subtitle() {
		//return true;
		return false;
	}
}

if(!function_exists('get_bootplate_subtitle')) {
	function get_bootplate_subtitle() {
		// All the work will be here.
		return '';
	}
}

if(!function_exists('bootplate_subtitle')) {
	function bootplate_subtitle() {
		echo get_bootplate_subtitle();
	}
}

if(!function_exists('the_bootplate_subtitle')) {
	// Alias for the same one above.
	function the_bootplate_subtitle() {
		echo get_bootplate_subtitle();
	}
}
?>