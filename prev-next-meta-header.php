<?php
/*
Plugin Name: Prev Next Meta Header
Plugin URI: http://www.seocom.es
Description: Adds the prev/next meta tag to our blog header
Version: 1.0.1
Author: David Garcia
Author URI: https://www.seocom.es
*/

class prev_next_meta_header {
	function prev_next_meta_header()
	{
		$this->__construct();
	}
	
	function __construct()
	{
		add_action('wp_head', array(&$this,'wp_head') );
	}

	function wp_head()
	{
		if ( is_single() )
		{
			return;
		}

		global $paged;
		if ( get_previous_posts_link() ):?>
		<link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>">
		<?php
		endif;
		if ( get_next_posts_link() ):?>
		<link rel="next" href="<?php echo get_pagenum_link( $paged + 1 ); ?>">
		<?php
		endif;
	}
}

$prev_next_meta_header = new prev_next_meta_header();