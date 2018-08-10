<?php  

/*
*	Page special attributes
*	=============================================================
*/

if(!function_exists("qantumthemes_add_special_fields")){
function qantumthemes_add_special_fields() {
    $qt_design_settings = array (
    	array (
			'label' =>  esc_attr__('Hide header',"onair2"),
			'desc' => esc_attr__('Header with featured image and title will be hidden',"onair2"),
			'id' =>  'qt_post_hide_header',
			'type' => 'checkbox'
		)
		,array (
			'label' =>  esc_attr__('Add footer sponsors',"onair2"),
			'id' =>  'qt_footer_sponsors',
			'type' => 'checkbox'
		)
		,array (
			'label' => esc_attr__('Form title',"onair2"),
			'id' =>  'qt_contacts_form_title',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		) 
		,array (
			'label' => esc_attr__('Contacts title',"onair2"),
			'id' =>  'qt_contacts_data_title',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		) 
		,array (
			'label' => esc_attr__('Map title',"onair2"),
			'id' =>  'qt_contacts_map_title',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		) 
		,array (
			'label' => esc_attr__('Contacts recipient email address',"onair2"),
			'desc' => esc_attr__('Email address where you want to receive the messages. No form shown if blank.',"onair2"),
			'id' =>  'qt_contacts_recipient',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)
		,array (
			'label' => esc_attr__('Message subject',"onair2"),
			'desc' => esc_attr__('Subject of the email you will receive from the contact form',"onair2"),
			'id' =>  'qt_contacts_subject',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)
		,array (
			'label' => esc_attr__('Privacy terms page link',"onair2"),
			'desc' => esc_attr__('URL of page with the privacy terms',"onair2"),
			'id' =>  'qt_contacts_privacy',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)   

		,array (
			'label' => esc_attr__('Phone number',"onair2"),
			'id' =>  'qt_contacts_phone',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)  
		,array (
			'label' => esc_attr__('Email address',"onair2"),
			'id' =>  'qt_contacts_email',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)  
		,array (
			'label' => esc_attr__('Address',"onair2"),
			'id' =>  'qt_contacts_address',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)
		,array (
			'label' => esc_attr__('Address line 2',"onair2"),
			'id' =>  'qt_contacts_address2',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)
		,array (
			'label' => esc_attr__('Google maps embed URL',"onair2"),
			'desc' => esc_attr__("ATTENTION, NOT THE IFRAME TAG, ONLY THE URL! More info at","onair2"). " https://support.google.com/maps/answer/144361?co=GENIE.Platform%3DDesktop&hl=en",
			'id' =>  'qt_contacts_map',
			'pagetemplate' => 'page-contacts.php',
			'type' => 'text'
		)               
    );
    if(post_type_exists('page')){
        if(function_exists('custom_meta_box_field')){
            $main_box = new custom_add_meta_box('qt_design_settings', 'Design customization', $qt_design_settings, 'page', true );
        }
    }
}}

add_action('init', 'qantumthemes_add_special_fields');  