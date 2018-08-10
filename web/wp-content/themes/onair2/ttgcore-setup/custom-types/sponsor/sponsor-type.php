<?php

add_action('init', 'qantumthemes_sponsor_register_type');  
function qantumthemes_sponsor_register_type() {
	$labels = array(
		'name' => esc_html__("Sponsors","onair2"),
		'singular_name' => esc_html__("Sponsors","onair2"),
		'add_new' => 'Add new ',
		'add_new_item' => 'Add new '.__("sponsor","onair2"),
		'edit_item' => 'Edit '.__("sponsor","onair2"),
		'new_item' => 'New '.__("sponsor","onair2"),
		'all_items' => 'All '.__("sponsors","onair2"),
		'view_item' => 'View '.__("sponsor","onair2"),
		'search_items' => 'Search '.__("sponsor","onair2"),
		'not_found' =>  'No '.__("sponsors","onair2").' found',
		'not_found_in_trash' => 'No '.__("sponsors","onair2").' found in Trash', 
		'parent_item_colon' => '',
		'menu_name' =>__("Sponsors","onair2")
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'member_ui' => true, 
		'member_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'page-attributes' => true,
		'member_in_nav_menus' => true,
		'member_in_admin_bar' => true,
		'member_in_menu' => true,
		'menu_icon' =>  'dashicons-forms',
		'supports' => array('title', 'thumbnail','page-attributes', 'revisions', 'editor'  )
	); 
    if(function_exists('ttg_custom_post_type')){
    	ttg_custom_post_type( "qtsponsor" , $args );
    }
    $event_meta_boxfields = array(
		array(
			'label' => esc_attr__('Link url', "onair2"),
			'id'    => 'linkurl',
			'type'  => 'text'
		)
	);
	if(class_exists("custom_add_meta_box")){
		$event_meta_box= new custom_add_meta_box( 'sponsor_customtab', esc_attr__('Sponsor details', "onair2"), $event_meta_boxfields, 'qtsponsor', true );
	}

}