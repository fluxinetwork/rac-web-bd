<?php
define('GOOGLE_ANALYTICS_ID', '');
define('POST_EXCERPT_LENGTH', 40);

function add_powers_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_powers_to_pages' );
