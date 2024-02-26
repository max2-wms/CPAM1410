<?php 
/**
 * @package WordPress
 * @subpackage onair2
 * @version 1.0.0
 * Used by shortcodes autocomplete
*/




if(!function_exists('onair2_autocomplete')) {
function onair2_autocomplete( $post_type = 'post' ) {
	$posts = get_posts( array(
		'posts_per_page' 	=> -1,
		'post_type'			=> $post_type,
	));
	$result = array();
	
	foreach ( $posts as $post )	{
		$result[] = array(
			'value' => $post->ID,
			'label' => $post->post_title,
		);
	}
	return $result;
}}