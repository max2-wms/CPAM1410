<?php

add_action('init', 'qantumthemes_schedule_register_type');  
function qantumthemes_schedule_register_type() {
	$labelsschedule = array(
		'name' => esc_attr__("Schedule","onair2"),
        'singular_name' => esc_attr__("Schedule","onair2"),
        'add_new' => esc_attr__("Add new","onair2"),
        'add_new_item' => esc_attr__("Add new schedule","onair2"),
        'edit_item' => esc_attr__("Edit schedule","onair2"),
        'new_item' => esc_attr__("New schedule","onair2"),
        'all_items' => esc_attr__("All schedules","onair2"),
        'view_item' => esc_attr__("View schedule","onair2"),
        'search_items' => esc_attr__("Search schedule","onair2"),
        'not_found' => esc_attr__("No schedule found","onair2"),
        'not_found_in_trash' => esc_attr__("No schedule found in trash","onair2"),
        'menu_name' => esc_attr__("Schedule","onair2")
	);
	$args = array(
		'labels' => $labelsschedule,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 50,
		'page-attributes' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_menu' => true,
		'menu_icon' =>   'dashicons-clipboard',
		'supports' => array('title','page-attributes', 'thumbnail')
	); 
	if(function_exists('ttg_custom_post_type')){
    	ttg_custom_post_type( "schedule" , $args );
    }
	


    /* ============= create custom taxonomy  ==========================*/
	$labels = array(
	    'name' => esc_html__( 'Schedule filter',"onair2"),
	    'singular_name' => esc_html__( 'Schedule filter',"onair2"),
	    'search_items' =>  esc_html__( 'Search by schedule filter',"onair2" ),
	    'popular_items' => esc_html__( 'Popular filters',"onair2" ),
	    'all_items' => esc_html__( 'All schedule filters',"onair2" ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => esc_html__( 'Edit schedule filter',"onair2" ), 
	    'update_item' => esc_html__( 'Update schedule filter',"onair2" ),
	    'add_new_item' => esc_html__( 'Add schedule filter',"onair2" ),
	    'new_item_name' => esc_html__( 'New schedule filter',"onair2" ),
	    'separate_items_with_commas' => esc_html__( 'Separate schedule filters with comma',"onair2" ),
	    'add_or_remove_items' => esc_html__( 'Add or remove schedule filters',"onair2" ),
	    'choose_from_most_used' => esc_html__( 'Choose from the most used schedule filters',"onair2" ),
	    'menu_name' => esc_html__( 'Schedule filter',"onair2" ),
	); 

	$args = array(
		    'hierarchical' => true,
		    'labels' => $labels,
		    'show_ui' => true,
		    'update_count_callback' => '_update_post_term_count',
		    'query_var' => true,
		    'rewrite' => array( 'slug' => 'schedulefilter' )
	);
    if(function_exists('ttg_custom_taxonomy')){
		ttg_custom_taxonomy('schedulefilter','schedule',$args	);
	} 
}

/*
*
*	Meta boxes ===========================================================================
*
*	======================================================================================
*/






$week_schedule = array(
	array(
		'label' => 'Week of the month',
		'description' => 'Use to display this schedule only on the following week',
		'id'    => 'month_week',
		'type'  => 'checkbox_group',
		'options' => array( 
	   array('label'=> esc_attr__("1st Week","onair2"), 'value' => '1'),
	   array('label'=> esc_attr__("2nd Week","onair2"), 'value' => '2'),
	   array('label'=> esc_attr__("3rd Week","onair2"), 'value' => '3'),
	   array('label'=> esc_attr__("4th Week","onair2"), 'value' => '4'),
	   array('label'=> esc_attr__("5th Week","onair2"), 'value' => '5')
	   )
	)
);	



$fields = array(
	
    array(
		'label' => 'Happens only on a specific day (optional)',
		'description' => 'Used to identify the current show',
		'id'    => 'specific_day',
		'type'  => 'date'
		),
    array(
		'label' => 'Day of the week (Recursive)',
		'description' => 'Used to identify the current show',
		'id'    => 'week_day',
		'type'  => 'checkbox_group',
		'options' => array( 
           array('label'=> esc_html__("Monday","onair2"), 'value' => 'mon'),
           array('label'=> esc_html__("Tuesday","onair2"), 'value' => 'tue'),
           array('label'=> esc_html__("Wednesday","onair2"), 'value' => 'wed'),
           array('label'=> esc_html__("Thursday","onair2"), 'value' => 'thu'),
           array('label'=> esc_html__("Friday","onair2"), 'value' => 'fri'),
           array('label'=> esc_html__("Saturday","onair2"), 'value' => 'sat'),
           array('label'=> esc_html__("Sunday","onair2"), 'value' => 'sun')
           )
		),
	array( // Repeatable & Sortable Text inputs
		'label'	=> 'Shows', // <label>
		'desc'	=> 'Add here the shows', // description
		'id'	=> 'track_repeatable', // field id and name
		'type'	=> 'repeatable', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			'show_id' => array(
				'label' => esc_html__('Show',"onair2"),
				'id' => 'show_id',
				'posttype' => 'shows',
				'type' => 'post_chosen'
			),
			'show_time' => array(
				'label' => esc_html__('Time (HH:MM)',"onair2"),
				'id' => 'show_time',
				'type' => 'time'
			)
			,'show_end' => array(
				'label' => esc_html__('Time end (HH:MM)',"onair2"),
				'id' => 'show_time_end',
				'type' => 'time'
			)
		)
	)
);

if(get_theme_mod('QT_monthly_schedule', '0' )){
	$fields = array_merge($week_schedule,$fields);
}


if (class_exists('custom_add_meta_box')) {
	$sample_box = new custom_add_meta_box( 'schedule_shows', 'Schedule shows', $fields, 'schedule', true );
}



