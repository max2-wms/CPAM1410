<?php
add_action('init', 'qantumthemes_event_register_type'); 
if(!function_exists('qantumthemes_event_register_type')){
function qantumthemes_event_register_type() {
	$labelsevent = array(
        'name' => esc_attr__("Event","onair2"),
        'singular_name' => esc_attr__("Event","onair2"),
        'add_new' => esc_attr__("Add new","onair2"),
        'add_new_item' => esc_attr__("Add new event","onair2"),
        'edit_item' => esc_attr__("Edit event","onair2"),
        'new_item' => esc_attr__("New event","onair2"),
        'all_items' => esc_attr__("All events","onair2"),
        'view_item' => esc_attr__("View event","onair2"),
        'search_items' => esc_attr__("Search event","onair2"),
        'not_found' => esc_attr__("No events found","onair2"),
        'not_found_in_trash' => esc_attr__("No events found in trash","onair2"),
        'menu_name' => esc_attr__("Events","onair2")
    );
  	$args = array(
        'labels' => $labelsevent,
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
         'menu_icon' => 'dashicons-calendar-alt',
    	'page-attributes' => true,
    	'show_in_nav_menus' => true,
    	'show_in_admin_bar' => true,
    	'show_in_menu' => true,
        'supports' => array('title','thumbnail','editor','page-attributes')
  	); 
    if(function_exists('ttg_custom_post_type')){
    	ttg_custom_post_type( "event" , $args );
    }
  
	$labels = array(
		'name' => esc_attr__( 'Event type',"onair2" ),
		'singular_name' => esc_attr__( 'Types',"onair2" ),
		'search_items' =>  esc_attr__( 'Search by genre',"onair2" ),
		'popular_items' => esc_attr__( 'Popular genres',"onair2" ),
		'all_items' => esc_attr__( 'All events',"onair2" ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_attr__( 'Edit Type',"onair2" ), 
		'update_item' => esc_attr__( 'Update Type',"onair2" ),
		'add_new_item' => esc_attr__( 'Add New Type',"onair2" ),
		'new_item_name' => esc_attr__( 'New Type Name',"onair2" ),
		'separate_items_with_commas' => esc_attr__( 'Separate Types with commas',"onair2" ),
		'add_or_remove_items' => esc_attr__( 'Add or remove Types',"onair2" ),
		'choose_from_most_used' => esc_attr__( 'Choose from the most used Types',"onair2" ),
		'menu_name' => esc_attr__( 'Event types',"onair2" ),
	);
    $args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'eventtype' )
	);
    if(function_exists('ttg_custom_taxonomy')){
		ttg_custom_taxonomy('eventtype','event',$args	);
	} 
}}


if(!function_exists('qantumthemes_add_eventmetas')){
function qantumthemes_add_eventmetas (){
	$event_meta_boxfields = array(
	    array(
			'label' => esc_attr__('Date', "onair2"),
			'id'    =>  'eventdate',
			'type'  => 'date'
		),
		array(
			'label' => esc_attr__('Time (24h format)', "onair2"),
			'id'    =>  'eventtime',
			'type'  => 'time'
		),
		array(
			'label' => esc_attr__('Date end [required for Google Calendar]', "onair2"),
			'id'    =>  'eventdateend',
			'type'  => 'date'
		),
		array(
			'label' => esc_attr__('Time end (24h format) [required for Google Calendar]', "onair2"),
			'id'    =>  'eventtimeend',
			'type'  => 'time'
		),
		array(
			'label' => esc_attr__('Add to google calendar (requires end date and time)', "onair2"),
			'id'    =>  'addtogooglecal',
			'type'  => 'checkbox'
		),
		array(
			'label' => esc_attr__('Facebook Event Link', "onair2"),
			'id'    => 'eventfacebooklink',
			'type'  => 'text'
		),
		array( // Repeatable & Sortable Text inputs
			'label'	=> esc_attr__('Ticket Buy Links', "onair2"), // <label>
			'desc'	=> 'Add one for each link to external websites',esc_attr__('Street', "onair2") ,// description
			'id'	=> 'eventrepeatablebuylinks', // field id and name
			'type'	=> 'repeatable', // type of field
			'sanitizer' => array( // array of sanitizers with matching kets to next array
				'featured' => 'meta_box_santitize_boolean',
				'title' => 'sanitize_text_field',
				'desc' => 'wp_kses_data'
			),
			'repeatable_fields' => array ( // array of fields to be repeated
				'custom_buylink_anchor' => array(
					'label' => esc_attr__('Ticket buy text', "onair2"),
					'desc'	=> '(example: This website, or Ticket One, or something else)',
					'id' => 'cbuylink_anchor',
					'type' => 'text'
				),
				'custom_buylink_url' => array(
					'label' => esc_attr__('Ticket buy link ', "onair2"),
					'id' => 'cbuylink_url',
					'type' => 'text'
				)
			)
		)  
	);
	if(class_exists("custom_add_meta_box")){
		$event_meta_box= new custom_add_meta_box( 'event_customtab', esc_attr__('Event details', "onair2"), $event_meta_boxfields, 'event', true );
	}
}}
add_action('init', 'qantumthemes_add_eventmetas');  





















