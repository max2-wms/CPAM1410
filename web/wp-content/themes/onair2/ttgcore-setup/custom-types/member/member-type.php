<?php

add_action('init', 'qantumthemes_member_register_type');  
if (!function_exists('qantumthemes_member_register_type')){
function qantumthemes_member_register_type() {
	$labelsmember = array(
		'name' => esc_attr__("Team","onair2"),
		'singular_name' => esc_attr__("Team","onair2"),
		'add_new' => esc_attr__("Add new","onair2"),
		'add_new_item' => esc_attr__("Add new team member","onair2"),
		'edit_item' => esc_attr__("Edit team member","onair2"),
		'new_item' => esc_attr__("New team member","onair2"),
		'all_items' => esc_attr__("All team members","onair2"),
		'view_item' => esc_attr__("View team member","onair2"),
		'search_items' => esc_attr__("Search team member","onair2"),
		'not_found' => esc_attr__("No team member found","onair2"),
		'not_found_in_trash' => esc_attr__("No team member found in trash","onair2"),
		'menu_name' => esc_attr__("Team","onair2")
	);
	$args = array(
		'labels' => $labelsmember,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'member_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'page-attributes' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_menu' => true,
		'menu_icon' =>  'dashicons-businessman',
		'supports' => array('title', 'thumbnail','page-attributes','editor', 'revisions'  )
	); 
	if(function_exists('ttg_custom_post_type')){
		ttg_custom_post_type( "members" , $args );
	}

	/* ============= create custom taxonomy for the members ==========================*/
	$labels = array(
		'name' => esc_html__( 'Types',"onair2" ),
		'singular_name' => esc_html__( 'Type',"onair2" ),
		'search_items' =>  esc_html__( 'Search by Type',"onair2" ),
		'popular_items' => esc_html__( 'Popular Types',"onair2" ),
		'all_items' => esc_html__( 'All members',"onair2" ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Type',"onair2" ), 
		'update_item' => esc_html__( 'Update Type',"onair2" ),
		'add_new_item' => esc_html__( 'Add New Type',"onair2" ),
		'new_item_name' => esc_html__( 'New Type Name',"onair2" ),
		'separate_items_with_commas' => esc_html__( 'Separate Types with commas',"onair2" ),
		'add_or_remove_items' => esc_html__( 'Add or remove Types',"onair2" ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Types',"onair2" ),
		'menu_name' => esc_html__( 'Member types',"onair2" )
	); 
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'membertype' )
	);
	if(function_exists('ttg_custom_taxonomy')){
		ttg_custom_taxonomy('membertype','members', $args	);
	}
}}

/*
*
*	Meta boxes ===========================================================================
*
*	======================================================================================
*/

$fields = array(
	array(
		'label' => 'Short bio',
		'id'    => 'member_incipit',
		'type'  => 'editor'
		)
	,array(
		'label' => 'Role in the company',
		'id'    => 'member_role',
		'type'  => 'text'
		)
	,array(
		'label' => 'Facebook link',
		'id'    => 'QT_facebook',
		'type'  => 'text'
		)
	,array(
		'label' => 'Twitter link',
		'id'    => 'QT_twitter',
		'type'  => 'text'
		)
	,array(
		'label' => 'Pinterest link',
		'id'    => 'QT_pinterest',
		'type'  => 'text'
		)
	,array(
		'label' => 'Vimeo link',
		'id'    => 'QT_vimeo',
		'type'  => 'text'
		)
	,array(
		'label' => 'Wordpress link',
		'id'    => 'QT_wordpress',
		'type'  => 'text'
		)
	,array(
		'label' => 'Youtube link',
		'id'    => 'QT_youtube',
		'type'  => 'text'
		)
	,array(
		'label' => 'Soundcloud link',
		'id'    => 'QT_soundcloud',
		'type'  => 'text'
		)
	,array(
		'label' => 'Myspace link',
		'id'    => 'QT_myspace',
		'type'  => 'text'
		)
	,array(
		'label' => 'Itunes link',
		'id'    => 'QT_itunes',
		'type'  => 'text'
		)
	,array(
		'label' => 'Mixcloud link',
		'id'    => 'QT_mixcloud',
		'type'  => 'text'
		)
	,array(
		'label' => 'Resident Advisor link',
		'id'    => 'QT_resident-advisor',
		'type'  => 'text'
		)
	,array(
		'label' => 'ReverbNation link',
		'id'    => 'QT_reverbnation',
		'type'  => 'text'
		)
	,array(
		'label' => 'Instagram link',
		'id'    => 'QT_instagram',
		'type'  => 'text'
	)
	,array( // Repeatable & Sortable Text inputs
		'label'	=> esc_attr__('Associated shows',"onair2"), // <label>
		'desc'	=> esc_attr__('Manually pick shows to display in the member page',"onair2"), // description
		'id'	=> 'members_show_pick', // field id and name
		'type'	=> 'repeatable', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			array(
				'label' => esc_html__("Choose a show","onair2"),
				'id'	=> 'membershow', // field id and name
				'type' => 'post_chosen',
				'posttype' => 'shows'
			)
		)
	)


	
	
);
if(class_exists('custom_add_meta_box')) {
	$sample_box = new custom_add_meta_box( 'members_meta', 'member details', $fields, 'members', true );
}