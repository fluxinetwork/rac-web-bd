<?php
/**
 * Image sizes
 */
function custom_setup() {
  add_theme_support( 'post-thumbnails', array( 'post', 'page', 'planche' ) );
}
add_action('after_setup_theme', 'custom_setup');

/* clean accents */
add_filter('sanitize_file_name', 'remove_accents' );

/* remove p around img */
function filter_ptags_on_images($content) {
	return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'filter_ptags_on_images');





