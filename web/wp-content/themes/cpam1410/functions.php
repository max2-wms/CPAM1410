<?php

	function get_first_image($post_ID, $fullsize=false, $max_dims=false){
		$thumbargs = array(
		'post_type' => 'attachment',
		'post_status' => null,
		'post_parent' => $post_ID
		);
		$thumbs = get_posts($thumbargs);
		if ($thumbs) {
			$num = count($thumbs)-1;
			return get_attachment_innerHTML($thumbs[$num]->ID, $fullsize, $max_dims);
		}
	}
	
	function aldenta_get_images($size = 'small') {
		global $post;
		return get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	}
	
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
?>