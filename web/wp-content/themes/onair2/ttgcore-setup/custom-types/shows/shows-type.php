<?php

add_action('init', 'qantumthemes_shows_register_type');  
if(!function_exists('qantumthemes_shows_register_type')){
function qantumthemes_shows_register_type() {
	$labelsshow = array(
		'name' => esc_attr__("Shows","onair2"),
        'singular_name' => esc_attr__("Shows","onair2"),
        'add_new' => esc_attr__("Add new","onair2"),
        'add_new_item' => esc_attr__("Add new show","onair2"),
        'edit_item' => esc_attr__("Edit show","onair2"),
        'new_item' => esc_attr__("New show","onair2"),
        'all_items' => esc_attr__("All shows","onair2"),
        'view_item' => esc_attr__("View show","onair2"),
        'search_items' => esc_attr__("Search show","onair2"),
        'not_found' => esc_attr__("No shows found","onair2"),
        'not_found_in_trash' => esc_attr__("No shows found in trash","onair2"),
        'menu_name' => esc_attr__("Shows","onair2")
	);
	$args = array(
		'labels' => $labelsshow,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 50,
		'page-attributes' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_menu' => true,
		'rewrite' => true,
		'menu_icon' =>  'dashicons-pressthis',
		'supports' => array('title', 'thumbnail','editor', 'excerpt', 'revisions', 'page-attributes', 'author'   )
	); 
     if(function_exists('ttg_custom_post_type')){
        ttg_custom_post_type( "shows" , $args );
    }

	/* ============= create custom taxonomy for the shows ==========================*/
	$labels = array(
	    'name' => esc_html__( 'Genres',"onair2" ),
	    'singular_name' => esc_html__( 'Genre',"onair2" ),
	    'search_items' =>  esc_html__( 'Search by genre',"onair2" ),
	    'popular_items' => esc_html__( 'Popular genres',"onair2" ),
	    'all_items' => esc_html__( 'All shows',"onair2" ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => esc_html__( 'Edit genre',"onair2" ), 
	    'update_item' => esc_html__( 'Update genre',"onair2" ),
	    'add_new_item' => esc_html__( 'Add New genre',"onair2" ),
	    'new_item_name' => esc_html__( 'New genre Name',"onair2" ),
	    'separate_items_with_commas' => esc_html__( 'Separate genres with commas',"onair2" ),
	    'add_or_remove_items' => esc_html__( 'Add or remove genres',"onair2" ),
	    'choose_from_most_used' => esc_html__( 'Choose from the most used genres',"onair2" ),
	    'menu_name' => esc_html__( 'Genres',"onair2" )
  	); 
	$args = array(
	    'hierarchical' => false,
	    'labels' => $labels,
	    'show_ui' => true,
	    'update_count_callback' => '_update_post_term_count',
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'genre' )
	);
	if(function_exists('ttg_custom_taxonomy')){
        ttg_custom_taxonomy('genre','shows', $args );
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
		'label' => 'Custom header background',		
		'id'    => 'qt_customheader_bg',
		'type'  => 'image'
		),
   	array(
		'label' => esc_attr__('Subtitle',"onair2"),
		'description' => esc_attr__('Used in parallax header',"onair2"),
		'id'    => 'subtitle',
		'type'  => 'text'
		)
   	, array(
		'label' =>  esc_attr__('Subtitle 2',"onair2"),
		'description' => esc_attr__('Used in the parallax header',"onair2"),
		'id'    => 'subtitle2',
		'type'  => 'text'
		)
    , array(
		'label' => esc_attr__('Short show description',"onair2"),
		'description' => esc_attr__('Used in the schedule',"onair2"),
		'id'    => 'show_incipit',
		'type'  => 'editor'
		)
    , array(
		'label' => esc_attr__('Podcast archive',"onair2"),
		'description' => esc_attr__('Choose a podcast category to display in the show page',"onair2"),
		'id'    => 'show_podcastfilter',
		'taxtype' => 'podcastfilter',
		'type'  => 'tax_select_disassociated'
		)
    , array(
		'label' => esc_attr__('News archive',"onair2"),
		'description' => esc_attr__('Choose a podcast category to display in the show page',"onair2"),
		'id'    => 'show_category',
		'taxtype' => 'category',
		'type'  => 'tax_select_disassociated'
		)
    , array(
		'label' => esc_attr__('Related team members',"onair2"),
		'description' => esc_attr__('Display related people based on Member Type',"onair2"),
		'id'    => 'show_membertype',
		'taxtype' => 'membertype',
		'type'  => 'tax_select_disassociated'
		)
    , array(
		'label' => esc_attr__('Charts archive',"onair2"),
		'description' => esc_attr__('Choose a podcast category to display in the show page',"onair2"),
		'id'    => 'show_chartcategory',
		'taxtype' => 'chartcategory',
		'type'  => 'tax_select_disassociated'
		)
    , array(
		'label' => esc_attr__('Events archive',"onair2"),
		'description' => esc_attr__('Choose a event category to display in the show page',"onair2"),
		'id'    => 'show_eventslist',
		'taxtype' => 'eventtype',
		'type'  => 'tax_select_disassociated'
		)
    ,array( // Repeatable & Sortable Text inputs
		'label'	=> esc_attr__('Associated team members',"onair2"), // <label>
		'desc'	=> esc_attr__('Manually pick associated team members',"onair2"), // description
		'id'	=> 'show_members_pick', // field id and name
		'type'	=> 'repeatable', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			array(
				'label' => esc_html__("Choose a member","onair2"),
				'id'	=> 'showmember', // field id and name
				'type' => 'post_chosen',
				'posttype' => 'members'
			)
		)
	)
   	
);
if (class_exists('custom_add_meta_box')){
	$sample_box = new custom_add_meta_box( 'shows_meta', 'Show details', $fields, 'shows', true );
}



$fields2 = array(
	array(
	'label' => 'Email',
	'id'    => 'at', // email
	'type'  => 'text'
	),
	array(
	'label' => 'Website',
	'id'    => 'earth', //website
	'type'  => 'text'
	),
	array(
	'label' => 'Facebook',
	'id'    => 'facebook',
	'type'  => 'text'
	),

	array(
	'label' => 'Flickr',
	'id'    => 'flickr',
	'type'  => 'text'
	),
	array(
	'label' => 'Google+',
	'id'    => 'googleplus',
	'type'  => 'text'
	),
	array(
	'label' => 'Itunes',
	'id'    => 'itunes',
	'type'  => 'text'
	),
		array(
	'label' => 'Instagram',
	'id'    => 'instagram',
	'type'  => 'text'
	),
	array(
	'label' => 'LastFM',
	'id'    => 'lastfm',
	'type'  => 'text'
	),
	array(
	'label' => 'Linkedin',
	'id'    => 'linkedin',
	'type'  => 'text'
	),
	array(
	'label' => 'Mixcloud',
	'id'    => 'mixcloud',
	'type'  => 'text'
	),
	array(
	'label' => 'Pinterest',
	'id'    => 'pinterest',
	'type'  => 'text'
	),

	array(
	'label' => 'Soundcloud',
	'id'    => 'soundcloud',
	'type'  => 'text'
	),
		array(
	'label' => 'Spotify',
	'id'    => 'spotify',
	'type'  => 'text'
	),
	array(
	'label' => 'Twitter',
	'id'    => 'twitter',
	'type'  => 'text'
	),
	array(
		'label' => 'Twitch',
		'id'    => 'twitch',
		'type'  => 'text'
	),

	array(
	'label' => 'Youtube',
	'id'    => 'youtube',
	'type'  => 'text'
	),


);
if (class_exists('custom_add_meta_box')){
	$sample_box2 = new custom_add_meta_box( 'shows_social', 'Social network pages', $fields2, 'shows', true );
}
