<?php  
/**
 * Create customizer fields for the kirki framework.
 * @package Kirki
 */




Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'image',
	'settings'    => 'qt_404_backgroundimage',
	'label'       => esc_attr__( 'Error page background image', "onair2" ),
	'section'     => 'qt_404',
	'description' => esc_attr__( 'JPG min 1600x500px / max 250Kb', "onair2" ),
	'priority'    => 10
));


/* = Header section
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'image',
	'settings'    => 'qt_logo_header',

	'label'       => esc_attr__( 'Logo header', "onair2" ),
	'section'     => 'qt_header_section',
	'description' => esc_attr__( 'Max height: 68px', "onair2" ),
	'priority'    => 10
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'image',
	'settings'    => 'qt_header_backgroundimage',
	'label'       => esc_attr__( 'Default header background image', "onair2" ),
	'section'     => 'qt_header_section',
	'description' => esc_attr__( 'JPG min 1600x500px / max 250Kb', "onair2" ),
	'priority'    => 10
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_header_color',
	'label'       => esc_attr__( 'Background color', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => '#000000',
	'priority'    => 0
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_sticky_menu',
	'label'       => esc_html__( 'Sticky menu', "onair2" ),
	'description' => esc_attr__( 'Stick the menu on scroll', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => '0',
	'priority'    => 0
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_headerbutton_listen',
	'label'       => esc_html__( 'Display "listen" button', "onair2" ),
	'description' => esc_attr__( 'Enable the player button to open the radio sidebar', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => '0',
	'priority'    => 90
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_headerbutton_popup',
	'label'       => esc_html__( 'Display "popup" button', "onair2" ),
	'description' => esc_attr__( 'Requires to set a popup URL. Add a popup button to link any external page', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => '0',
	'priority'    => 90
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'text',
	'settings'    => 'qt_popup_url', // Used for sharing functions
	'label'       => esc_attr__( 'Popup URL', "onair2" ),
	'section'     => 'qt_header_section',
	'description' => esc_attr__( 'Create a page using Popup template or link to any external URL', "onair2" ),
	'priority'    => 91
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_headerbutton_search',
	'description' => esc_attr__( 'Add "search" button', "onair2" ),
	'label'       => esc_html__( 'Display "search" button', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => '0',
	'priority'    => 92
));

/* = Radio player section
=============================================*/
Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_playerbar_version',
	'label'       => esc_html__( 'Player design', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'  => esc_attr__( 'Classic', "onair2" ),
		'2' => esc_attr__( 'Header bar', "onair2" )
	)
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_playerbar_openstate',
	'label'       => esc_html__( 'Header bar player initial state (desktop only)', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'  => esc_attr__( 'Open', "onair2" ),
		'0' => esc_attr__( 'Closed', "onair2" )
	)
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_player_background',
	'label'       => esc_attr__( 'Player background color', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '#000000',
	'priority'    => 0
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_display_radioname',
	'label'       => esc_html__( 'Display radio name in player', "onair2" ),
	'description'       => esc_html__( 'Show or hide the name of the radio in the player', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1' => esc_attr__( 'Display', "onair2" ),
		'2'  => esc_attr__( 'Hide', "onair2" ),
	)
));

Kirki::add_field( 'qt_config', array(
   	'type'        => 'editor',
   	'settings'     => 'qt_playerbar_ads_desktop',
	'section'    => 'qt_radioplayer_section',
	'label'       => esc_html__( 'Player ads slot desktop', "vlogger" ),
	'description' => esc_html__("No javascript! Supports shortcodes. To add AdSense or other js adverts use proper shortcode plugins.","vlogger"),
	'priority'    => 1000,
));
Kirki::add_field( 'qt_config', array(
   	'type'        => 'editor',
   	'settings'     => 'qt_playerbar_ads_mobile',
	'section'    => 'qt_radioplayer_section',
	'label'       => esc_html__( 'Player ads slot mobile', "vlogger" ),
	'description' => esc_html__("No javascript! Supports shortcodes. To add AdSense or other js adverts use proper shortcode plugins.","vlogger"),
	'priority'    => 1000,
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'QT_timing_settings',
	'label'       => esc_html__( 'Time format for schedule', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '12',
	'priority'    => 10,
	'choices'     => array(
		'24'  => esc_attr__( '24h format', "onair2" ),
		'12' => esc_attr__( '12h format', "onair2" )
	)
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_autoplay',
	'label'       => esc_html__( 'Autoplay', "onair2" ),
	'description'       => esc_html__( 'Attention: autoplay is a very bad usability choice, use the function at your own risk. It may severely annoy your visitors and make you loose audience.', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 30,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	)
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_use_proxy',
	'label'       => esc_html__( 'Use SSL proxy', "onair2" ),
	'description'       => esc_html__( 'If your site is in HTTPS enable this option, so the calls to the ShoutCAST stats will be routed server-side avoiding XSS restrictions. Your server security settings may be blocking this. In that case talk with your provider. Blocked call: ?qtproxycall=http://....', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 30,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	)
));



Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_autoplay_on_popup',
	'label'       => esc_html__( 'Autoplay only on popup player', "onair2" ),
	'description'       => esc_html__( 'Enable autoplay only in the popup player', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 30,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	)
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_playerswitch',
	'label'       => esc_html__( 'Player switch: works only with autoplay enabled.', "onair2" ),
	'description'       => esc_html__( 'Enable a quick play and pause switch submenu.', "onair2" ),

	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 31,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	)
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_auto_updater',
	'label' => esc_attr__( 'Enable Now OnAir auto updater', "onair2" ),
	'description'       => esc_html__( 'Now on air shortcode and upcoming shows shortcode will update automatically every 120 seconds', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 92
));



Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'QT_monthly_schedule',
	'label'       => esc_html__( 'Enable montly schedule (choose week per schedule)', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 999,
	'description'       => esc_html__( 'If you enable this, for each Schedule you can choose a week of the month. If no week is enabled, no schedule will appear. You need this only if your schedule have different shows for each week of the month. Leave disabled if every week you have the same schedule.', "onair2" ),
));




Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_radiochannel_autoselect',
	'label'       => esc_html__( 'Switch player when opening channel page', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 999,
	'description'       => esc_html__( 'When opening a radio channel single page, the player will automatically switch to this channel.', "onair2" ),
));

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'text',
	'settings'    => 'qt_playerswitch_label',
	'label'       => esc_attr__( 'Player switch header label', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => 'Listen',
	'priority'    => 10
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'text',
	'settings'    => 'qt_popup_label',
	'label'       => esc_attr__( 'Popup header label', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => 'Popup',
	'priority'    => 10
));

/* = Footer section
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'text',
	'settings'    => 'qt_footer_text',
	'label'       => esc_attr__( 'Footer text', "onair2" ),
	'section'     => 'qt_footer_section',
	'default'     => '',
	'priority'    => 10
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'toggle',
	'settings'    => 'qt_footer_widgets',
	'label'       => esc_attr__( 'Show footer widgets', "onair2" ),
	'section'     => 'qt_footer_section',
	'default'     => '1',
	'priority'    => 11
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'image',
	'settings'    => 'qt_footer_backgroundimage',
	'label'       => esc_attr__( 'Footer widgets background image', "onair2" ),
	'section'     => 'qt_footer_section',
	'description' => esc_attr__( 'JPG 1600x500px', "onair2" ),
	'priority'    => 10
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'image',
	'settings'    => 'qt_logo_footer',
	'label'       => esc_attr__( 'Logo footer', "onair2" ),
	'section'     => 'qt_footer_section',
	'priority'    => 10
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'toggle',
	'settings'    => 'qt_sponsor_fx',
	'label'       => esc_attr__( 'Sponsor hover saturation effect', "onair2" ),
	'section'     => 'qt_footer_section',
	 'default'     => 0,
	'priority'    => 10
));

/* = Social section
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_amazon', 'type' => 'text', 'label' => esc_attr__( 'Amazon', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_beatport', 'type' => 'text', 'label' => esc_attr__( 'Beatport', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_bebo', 'type' => 'text', 'label' => esc_attr__( 'Bebo', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_behance', 'type' => 'text', 'label' => esc_attr__( 'Behance', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_blogger', 'type' => 'text', 'label' => esc_attr__( 'Blogger', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_facebook', 'type' => 'text', 'label' => esc_attr__( 'Facebook', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_flickr', 'type' => 'text', 'label' => esc_attr__( 'Flickr', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_googleplus', 'type' => 'text', 'label' => esc_attr__( 'Googleplus', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_instagram', 'type' => 'text', 'label' => esc_attr__( 'Instagram', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_itunes', 'type' => 'text', 'label' => esc_attr__( 'Itunes', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_juno', 'type' => 'text', 'label' => esc_attr__( 'Juno', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_lastfm', 'type' => 'text', 'label' => esc_attr__( 'Lastfm', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_linkedin', 'type' => 'text', 'label' => esc_attr__( 'Linkedin', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_mixcloud', 'type' => 'text', 'label' => esc_attr__( 'Mixcloud', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_space', 'type' => 'text', 'label' => esc_attr__( 'Myspace', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_pinterest', 'type' => 'text', 'label' => esc_attr__( 'Pinterest', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_reverbnation', 'type' => 'text', 'label' => esc_attr__( 'Reverbnation', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_resident-advisor', 'type' => 'text', 'label' => esc_attr__( 'Resident-advisor', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_rss', 'type' => 'text', 'label' => esc_attr__( 'RSS', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_snapchat', 'type' => 'text', 'label' => esc_attr__( 'Snapchat', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_soundcloud', 'type' => 'text', 'label' => esc_attr__( 'Soundcloud', "onair2" ), 'section' => 'qt_social_section',));

Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_skype', 'type' => 'text', 'label' => esc_attr__( 'Skype', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_triplevision', 'type' => 'text', 'label' => esc_attr__( 'Triplevision', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_tumblr', 'type' => 'text', 'label' => esc_attr__( 'Tumblr', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_twitch', 'type' => 'text', 'label' => esc_attr__( 'Twitch', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_twitter', 'type' => 'text', 'label' => esc_attr__( 'Twitter', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_vimeo', 'type' => 'text', 'label' => esc_attr__( 'Vimeo', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_whatpeopleplay', 'type' => 'text', 'label' => esc_attr__( 'Whatpeopleplay', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_wordpress', 'type' => 'text', 'label' => esc_attr__( 'Wordpress', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_youtube', 'type' => 'text', 'label' => esc_attr__( 'Youtube', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_whatsapp', 'type' => 'text', 'label' => esc_attr__( 'Whatsapp [nnumbers only]', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_vk', 'type' => 'text', 'label' => esc_attr__( 'VK', "onair2" ), 'section' => 'qt_social_section',));



/* = Events section
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_events_hideold',
	'label'       => esc_attr__( 'Show past events', "onair2" ),
	'section'     => 'qt_revent_section',
	'description' => esc_attr__( 'Based on the event date attribute', "onair2" ),
	'default'     => '0',
	'priority'    => 10,
	'choices'     => array(
			'0' => esc_attr__( 'Yes: show past events', "onair2" ),
			'1' => esc_attr__( 'No: hide past events', "onair2" )
		)
));

/* = Advanced settings
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'toggle',
	'settings'    => 'qt_enable_debug',
	'label'       => esc_attr__( 'Enable debug settings', "onair2" ),
	'description' => esc_attr__( 'Load separated JS instead of minified version and enable console output for javascript. Use in case of issues or custom theme versions', "onair2" ),
	'section'     => 'qt_dev_section',
	'default'     => 0,
	'priority'    => 100
));

/* = Typography section
=============================================*/

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'typography',
	'settings'    => 'qt_typography_text',
	'label'       => esc_attr__( 'Basic ', "onair2" ),
	'section'     => 'qt_typography',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body, html',
			'property' => 'font-family'
		),
	),
) );

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'typography',
	'settings'    => 'qt_typography_text_bold',
	'label'       => esc_attr__( 'Bold texts ', "onair2" ),
	'section'     => 'qt_typography',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '700',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'strong',
			'property' => 'font-family'
		),
	),
) );

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'typography',
	'settings'    => 'qt_typography_headings',
	'label'       => esc_attr__( 'Headings', "onair2" ),
	'section'     => 'qt_typography',
	'default'     => array(
		'font-family'    => 'Khand',
		'variant'        => '500',
		'letter-spacing' => '0.05em',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'uppercase'
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6, .qt-btn, .qt-capfont, caption, .qt-title ',
			'property' => 'font-family'
		),
	),
) );

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'typography',
	'settings'    => 'qt_typography_menu',
	'label'       => esc_attr__( 'Menu', "onair2" ),
	'section'     => 'qt_typography',
	'default'     => array(
		'font-family'    => 'Khand',
		'variant'        => '400',
		'letter-spacing' => '0.05em',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'uppercase'
	),
	'priority'    => 11,
	'output'      => array(
		array(
			'element' => '.qt-menubar-top, .qt-menubar, .qt-side-nav, .qt-menu-footer',
			'property' => 'font-family'
		),
	),
) );
Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_typography_menu_size',
	'label'       => esc_html__( 'Menu font size', "onair2" ),
	'section'     => 'qt_typography',
	'default'     => 'm',
	'priority'    => 11,
	'choices'     => array(
		'm'  => esc_attr__( 'Normal', "onair2" ),
		's' => esc_attr__( 'Smaller', "onair2" ),
		'l' => esc_attr__( 'Bigger', "onair2" )
	)
));



/* = Colors section
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_primary_color',
	'label'       => esc_attr__( 'Primary', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#454955',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_primary_color_light',
	'label'       => esc_attr__( 'Primary light', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#565c68',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_primary_color_dark',
	'label'       => esc_attr__( 'Primary dark', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#101010',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_color_accent',
	'label'       => esc_attr__( 'Accent', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#dd0e34',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_color_accent_hover',
	'label'       => esc_attr__( 'Accent hover', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#ff0442',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_color_secondary',
	'label'       => esc_attr__( 'Secondary', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#64c9d9',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_color_secondary_hover',
	'label'       => esc_attr__( 'Secondary hover', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#58a4b0',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_color_background',
	'label'       => esc_attr__( 'Page background', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#f7f7f9',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_color_paper',
	'label'       => esc_attr__( 'Paper background', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#ffffff',
	'priority'    => 0
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'qt_textcolor_original',
	'label'       => esc_attr__( 'Text', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#000000',
	'priority'    => 0
));




