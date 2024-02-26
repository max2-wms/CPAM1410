<?php

add_action('init', 'qantumthemes_podcast_register_type');  
if(!function_exists('qantumthemes_podcast_register_type')){
function qantumthemes_podcast_register_type() {
	$labelspodcast = array(
		'name' => esc_attr__("Podcast","onair2"),
		'singular_name' => esc_attr__("Podcast","onair2"),
		'add_new' => esc_attr__("Add new","onair2"),
		'add_new_item' => esc_attr__("Add new podcast","onair2"),
		'edit_item' => esc_attr__("Edit podcast","onair2"),
		'new_item' => esc_attr__("New podcast","onair2"),
		'all_items' => esc_attr__("All podcasts","onair2"),
		'view_item' => esc_attr__("View podcast","onair2"),
		'search_items' => esc_attr__("Search podcast","onair2"),
		'not_found' => esc_attr__("No podcasts found","onair2"),
		'not_found_in_trash' => esc_attr__("No podcasts found in trash","onair2"),
		'menu_name' => esc_attr__("Podcasts","onair2")
	);
	$args = array(
		'labels' => $labelspodcast,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 30,
		'page-attributes' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_menu' => true,
		 'menu_icon' => 'dashicons-megaphone',
		'supports' => array('title', 'thumbnail','editor' ,'comments')
	); 
	if(function_exists('ttg_custom_post_type')){
		ttg_custom_post_type( "podcast" , $args );
	}

	/* ============= create custom taxonomy for the podcasts ==========================*/
	$labels = array(
		'name' => esc_attr__( 'Podcast filters',"onair2" ),
		'singular_name' => esc_attr__( 'Filter',"onair2" ),
		'search_items' =>  esc_attr__( 'Search by filter',"onair2" ),
		'popular_items' => esc_attr__( 'Popular filters',"onair2" ),
		'all_items' => esc_attr__( 'All Podcasts',"onair2" ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_attr__( 'Edit Filter',"onair2" ), 
		'update_item' => esc_attr__( 'Update Filter',"onair2" ),
		'add_new_item' => esc_attr__( 'Add New Filter',"onair2" ),
		'new_item_name' => esc_attr__( 'New Filter Name',"onair2" ),
		'separate_items_with_commas' => esc_attr__( 'Separate Filters with commas',"onair2" ),
		'add_or_remove_items' => esc_attr__( 'Add or remove Filters',"onair2" ),
		'choose_from_most_used' => esc_attr__( 'Choose from the most used Filters',"onair2" ),
		'menu_name' => esc_attr__( 'Filters',"onair2" ),
	); 
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'podcastfilter' )
	);
	if(function_exists('ttg_custom_taxonomy')){
		ttg_custom_taxonomy('podcastfilter','podcast', $args );
	}
}}




$podcast_tab_custom = array(
	array(
		'label' => 'Custom header background',		
		'id'    => 'qt_customheader_bg',
		'type'  => 'image'
		),
	array(
		'label' => esc_attr__( 'Artist Name', "onair2" ),
		'id'    => '_podcast_artist',
		'type'  => 'text'
		),
	array(
		'label' => esc_attr__( 'Date', "onair2" ),
		'id'    => '_podcast_date',
		'type'  => 'date'
		),
	array(
		'label' => esc_attr__( 'Mixcloud, Soundcloud or MP3 url.', "onair2" ),
		'id'    => '_podcast_resourceurl',
		'type'  => 'text'
		),
	 array(
		'label' => esc_attr__( 'Related show', "onair2" ),
		'id'    => '_podcast_show',
		'type' => 'post_chosen',
		'posttype' => 'shows'
		)
);




if (class_exists('custom_add_meta_box')){
	$podcast_tab_custom_box = new custom_add_meta_box( 'podcast_customtab', esc_attr__('Podcast details', "onair2"), $podcast_tab_custom, 'podcast', true );
}
