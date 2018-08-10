<?php

/* = custom post type release
===================================================*/
add_action('init', 'qantumthemes_radiochannel_register_type');  
if(!function_exists('qantumthemes_radiochannel_register_type')){
function qantumthemes_radiochannel_register_type() {	
	$labelsradio = array(
		'name' => esc_attr__("Radio channels","onair2"),
		'singular_name' => esc_attr__("Radio channel","onair2"),
		'add_new' => esc_attr__('Add new channel',"onair2"),
		'add_new_item' => esc_attr__("Add new radio channel","onair2"),
		'edit_item' => esc_attr__("Edit radio channel","onair2"),
		'new_item' => esc_attr__("New radio channel","onair2"),
		'all_items' => esc_attr__('All radio channels',"onair2"),
		'view_item' => esc_attr__("View radio channel","onair2"),
		'search_items' => esc_attr__("Search radio channels","onair2"),
		'not_found' =>  esc_attr__("No radio channels found","onair2"),
		'not_found_in_trash' => esc_attr__("No radio channels found in Trash","onair2"), 
		'parent_item_colon' => '',
		'menu_name' => esc_attr__("Radio channels","onair2")
	);
	$args = array(
		'labels' => $labelsradio,
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
		'menu_icon' => 'dashicons-media-audio',
		'supports' => array('title', 'thumbnail','editor', 'page-attributes' )
	); 
    if(function_exists('ttg_custom_post_type')){
        ttg_custom_post_type( "radiochannel" , $args );
    }	
}}

/* = Fields
===================================================*/
$radio_details = array(
	array(
		'label' => 'MP3 Stream URL',		
		'id'    => 'mp3_stream_url',
		'type'  => 'text'
		),
	array(
		'label' => 'Radio subtitle',		
		'id'    => 'qt_radio_subtitle',
		'type'  => 'text'
		),

	array(
		'label' => 'Radio background',		
		'id'    => 'qt_radio_background',
		'type'  => 'image'
		),

	array(
		'label' => 'Radio logo',		
		'id'    => 'qt_radio_logo',
		'type'  => 'image'
		),
	array(
		'label' => 'Header logo',		
		'id'    => 'qt_header_logo',
		'type'  => 'image'
		),
	array(
		'label' => 'SHOUTCast XMl Feed HOST',		
		'id'    => 'qtradiofeedHost',
		'type'  => 'text'
		),
	array(
		'label' => 'SHOUTCast XMl Feed PORT',		
		'id'    => 'qtradiofeedPort',
		'type'  => 'text'
		),
	array(
		'label' => 'SHOUTCast Channel (default 1)',		
		'id'    => 'qtradiofeedChannel',
		'type'  => 'text'
		),
	array(
		'label' => 'IceCast json URL',		
		'id'    => 'qticecasturl',
		'type'  => 'text',
		'desc' => 'Important! Needs to be in your same protocol of the website! If your site is in https you have to put the URL with https and your icecast server needs to support this'
		),
	array(
		'label' => 'IceCast mountpoint ',		
		'id'    => 'qticecastMountpoint',
		'desc'  => 'including "/"',
		'type'  => 'text'
		),
	array(
		'label' => 'IceCast channel',		
		'desc'  => 'only for Icecast radios with multi-channel feed',
		'id'    => 'qticecastChannel',
		'type'  => 'text'
		),

	array(
		'label' => 'Radio.co radio ID',		
		'id'    => 'qtradiodotco',
		'type'  => 'text',
		'desc' => 'For Radio.co users, find the ID in the streaming URL, example: https://streamer.radio.co/[YOUR ID]/listen#.mp3'
		),
	array(
		'label' => 'Airtime Pro',		
		'id'    => 'qtairtime',
		'type'  => 'text',
		'desc' => 'For AirTime Pro users add your API url (http://[YOUR ID].airtime.pro/api/live-info-v2)'
		),
	array(
		'label' => 'Radionomy',		
		'id'    => 'qtradionomy',
		'type'  => 'text',
		'desc' => 'Please build the URL using your radionomy UID and API Key <BR> (http://api.radionomy.com/currentsong.cfm?radiouid=[USER ID HERE]&apikey=[API KEY HERE]&callmeback=yes&type=xml&cover=yes)'
		),
	array(
		'label' => 'Plain text',		
		'id'    => 'qttextfeed',
		'type'  => 'text',
		'desc' => 'If you have a URL displaying a plain text as ARTIST NAME - SONG TITLE add the URL in this field.'
		),
	
);
if (class_exists('custom_add_meta_box')){
	$radiochannel_details_box = new custom_add_meta_box( 'radio_details', 'Radio channel details', $radio_details, 'radiochannel', true );
}



