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
Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_chart_reorder',
	'label'       => esc_html__( 'Auto reorder by vote', "onair2" ),
	'description' => esc_attr__( 'Automatically display chart tracks based on the tracks votes', "onair2" ),
	'section'     => 'qt_charts_section',
	'default'     => '0',
	'priority'    => 0
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
	'priority'    => 11
));

Kirki2_Kirki::add_field( 'qt_config', [
	'type'        => 'slider',
	'settings'    => 'header_padding',
	'label'       => esc_html__( 'Header padding', 'onair2' ),
	'section'     => 'qt_header_section',
	'priority'    => 11,
	'default'    => 250,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 90,
		'max'  => 300,
		'step' => 1,
	],
	'output'    => array(
		array(
			'element'       => '  .qt-pageheader ',
			'property'      => 'padding',
			'value_pattern' => esc_attr( ' $px 0' ),
			'media_query' => '@media (min-width: 1200px)'
		),
	),
] );



Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_sticky_menu',
	'label'       => esc_html__( 'Sticky menu', "onair2" ),
	'description' => esc_attr__( 'Stick the menu on scroll', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => '0',
	'priority'    => 90
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'menu_align',
	'label'       => esc_html__( 'Menu align', "onair2" ),
	'section'     => 'qt_header_section',
	'default'     => false,
	'transport' => 'auto',
	'priority'    => 90,
	'choices'     => array(
		false  => esc_attr__( 'default', "onair2" ),
		'left' => esc_attr__( 'Left', "onair2" ),
		'right' => esc_attr__( 'Right', "onair2" ),
		'center' => esc_attr__( 'Center', "onair2" ),
	),
	'output'    => array(
		array(
			'element'       => '  .qt-desktopmenu ',
			'property'      => 'text-align',
			'media_query' => '@media (min-width: 1200px)'
		),
	),
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
	'type'        => 'switch',
	'settings'    => 'qt_radio_stop',
	'label'       => esc_html__( 'Completely stop stream on pause', "onair2" ),
	'description' => esc_attr__( 'Pausing a radio will completely disconnect from the stream.', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 0
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_songinfo_menu',
	'label'       => esc_html__( 'Song information in menu', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => false,
	'priority'    => 0,
	'choices'     => array(
		false  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	),
));


Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_playerbar_artwork',
	'label'       => esc_html__( 'Artwork', "onair2" ),
	'description'       => esc_html__( 'Requires a working radio title', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => false,
	'priority'    => 1,
	'choices'     => array(
		false  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	),
	'active_callback' => [
		[
			'setting'   => 'qt_songinfo_menu',
			'operator'  => '==',
			'value'     => '1',
		]
	],
));

Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_playerbar_title',
	'label'       => esc_html__( 'Titles', "onair2" ),
	'description'       => esc_html__( 'Requires a working radio title', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 1,
	'choices'     => array(
		false  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	),
	'active_callback' => [
		[
			'setting'   => 'qt_songinfo_menu',
			'operator'  => '==',
			'value'     => '1',
		]
	],
));


Kirki::add_field( 'qt_config', array(
	'type'        => 'radio',
	'settings'    => 'qt_playerbar_version',
	'label'       => esc_html__( 'Player design', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'  => esc_attr__( 'Classic sidebar player', "onair2" ),
		'2' => esc_attr__( 'Header bar player', "onair2" ),
		'3' => esc_attr__( 'Play pause switch single channel', "onair2" )
	)
));

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'settings'    => 'btnplaycolor',
	'label'       => esc_attr__( 'Play button background', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'priority'    => 1,
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'       => 'nav.qt-menubar ul.qt-desktopmenu a.qt-header-play-btn',
			'property'      => 'background-color',
			'suffix' => '!important'
		)
	),
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
	'priority'    => 1,
	'output'    => array(
		array(
			'element'       => '#qtplayercontainer',
			'property'      => 'color',
		)
	),
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
	'type'        => 'switch',
	'settings'    => 'qt_autoplay',
	'label'       => esc_html__( 'Autoplay', "onair2" ),
	'description'       => esc_html__( 'Attention: autoplay is a very bad usability choice, use the function at your own risk. It may severely annoy your visitors and make you loose audience.', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 20,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	)
));


Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_playerswitch',
	'label'       => esc_html__( 'Player switch: works only with autoplay enabled.', "onair2" ),
	'description'       => esc_html__( 'Enable a quick play and pause switch submenu.', "onair2" ),

	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 20,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	),
));


Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_use_proxy',
	'label'       => esc_html__( 'Use SSL proxy', "onair2" ),
	'description'       => esc_html__( 'You can try this option if the player cannot display song titles correctly. Your server security settings may be blocking this. In that case talk with your provider. Blocked call: ?qtproxycall=', "onair2" ),
	'section'     => 'qt_radioplayer_section',
	'default'     => '0',
	'priority'    => 30,
	'choices'     => array(
		'0'  => esc_attr__( 'Disable', "onair2" ),
		'1' => esc_attr__( 'Enable', "onair2" )
	)
));



Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
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
	'type'        => 'switch',
	'settings'    => 'qt_auto_updater',
	'label' => esc_attr__( 'Enable Now OnAir auto updater', "onair2" ),
	'description'       => esc_html__( 'Now on air shortcode and upcoming shows shortcode will update automatically every 120 seconds', "onair2" ),
	'section'     => 'qt_radioplayer_section',
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
	'type'        => 'editor',
	'settings'    => 'qt_footer_text',
	'label'       => esc_attr__( 'Footer text', "onair2" ),
	'section'     => 'qt_footer_section',
	'default'     => '',
	'priority'    => 10
));
Kirki::add_field( 'qt_config', array(
	'type'        => 'switch',
	'settings'    => 'qt_top',
	'label'       => esc_html__( 'Scroll top link', "onair2" ),
	'description' => esc_attr__( 'Display an arrow to scroll top', "onair2" ),
	'section'     => 'qt_footer_section',
	'default'     => '0',
	'priority'    => 0
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
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_spotify', 'type' => 'text', 'label' => esc_attr__( 'Spotify', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_triplevision', 'type' => 'text', 'label' => esc_attr__( 'Triplevision', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_tumblr', 'type' => 'text', 'label' => esc_attr__( 'Tumblr', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_twitch', 'type' => 'text', 'label' => esc_attr__( 'Twitch', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_twitter', 'type' => 'text', 'label' => esc_attr__( 'Twitter', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_vimeo', 'type' => 'text', 'label' => esc_attr__( 'Vimeo', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_whatpeopleplay', 'type' => 'text', 'label' => esc_attr__( 'Whatpeopleplay', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_wordpress', 'type' => 'text', 'label' => esc_attr__( 'Wordpress', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_youtube', 'type' => 'text', 'label' => esc_attr__( 'Youtube', "onair2" ), 'section' => 'qt_social_section',));
Kirki2_Kirki::add_field( 'qt_config', array( 'settings' => 'qt_whatsapp', 'type' => 'text', 'label' => esc_attr__( 'Whatsapp [numbers only]', "onair2" ), 'section' => 'qt_social_section',));
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
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'toggle',
	'settings'    => 'qt_html5audio_disable',
	'label'       => esc_attr__( 'Disable forced activation of html5 audio', "onair2" ),
	'description' => esc_attr__( 'Enable in case of issues with external audio plugins', "onair2" ),
	'section'     => 'qt_dev_section',
	'priority'    => 100
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'toggle',
	'settings'    => 'qt_autoembed_disable',
	'label'       => esc_attr__( 'Disable automatic Youtube and Soundcloud embedding', "onair2" ),
	'description' => esc_attr__( 'If you enable this option, the links to Youtube and Soundcloud will no longer be transformed in embedded objects', "onair2" ),
	'section'     => 'qt_dev_section',
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
			'property' => 'font-family',
			'suffix' => '!important'
		),
	),
) );

Kirki2_Kirki::add_field( 'qt_config', [
	'type'        => 'slider',
	'settings'    => 'header_captio_size',
	'label'       => esc_html__( 'Header font size', 'onair2' ),
	'section'     => 'qt_typography',
	// 'default'     => 12,
	'priority'    => 10,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 40,
		'max'  => 190,
		'step' => 1,
	],
	'output'    => array(
		array(
			'element'       => ' #onair2Body .qt-pageheader h1 ',
			'property'      => 'font-size',
			'value_pattern' => esc_attr( ' $px' ),
			'media_query' => '@media (min-width: 1200px)'
		),
	),
] );


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
			'element' => '.qt-menubar-top, .qt-menubar, .qt-side-nav, .qt-menu-footer, .qt-menubar ul a ',
			'property' => 'font-family'
		),
	),
) );



Kirki2_Kirki::add_field( 'qt_config', [
	'type'        => 'slider',
	'settings'    => 'menu_size',
	'label'       => esc_html__( 'Menu font size', 'onair2' ),
	'section'     => 'qt_typography',
	// 'default'     => 12,
	'priority'    => 12,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 12,
		'max'  => 22,
		'step' => 1,
	],
	'output'    => array(
		array(
			'element'       => ' #onair2Body nav ul.qt-desktopmenu li.menu-item a ',
			'property'      => 'font-size',
			'value_pattern' => esc_attr( ' $px' ).'; line-height:65px;',
			'media_query' => '@media (min-width: 1200px)'
		),
		array(
			'element'       => ' #onair2Body nav ul.qt-desktopmenu .sub-menu li.menu-item a ',
			'property'      => 'font-size',
			'value_pattern' => esc_attr( ' $px' ).'; line-height:2.5em;',
			'media_query' => '@media (min-width: 1200px)'
		),
	),
] );




/* = Colors section
=============================================*/
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_primary_color',
	'label'       => esc_attr__( 'Primary', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#454955',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '.qt-content-primary, .qt-menubar-top',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_primary_color_light',
	'label'       => esc_attr__( 'Primary light', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#565c68',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '.qt-content-primary-light',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_primary_color_dark',
	'label'       => esc_attr__( 'Primary dark', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#101010',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '.qt-content-primary-dark, .qt-menubar , .qt-mobile-menu, .qt-desktopmenu a',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_color_accent',
	'label'       => esc_attr__( 'Accent', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#dd0e34',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '.qt-main a, .qt-content-main a, a.qt-logo-text span, .tabs .tab a, .qt-pageheader h1 a, .qt-pageheader h2 a, .qt-pageheader h3 a, .qt-pageheader h4 a, .qt-pageheader h5 a, .qt-pageheader h6 a , #onair2Body .qt-pageheader h4 a',
			'property'      => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '.qt-body.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .qt-accent, .qt-btn-primary, .btn-primary, nav.qt-menubar ul.qt-desktopmenu a:hover, .qt-btn-primary, .tabs .indicator, .pagination li.active, .give-btn, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button , input[type="submit"]',
			'property'      => 'background-color',
			
		),

		array(
			'element' => 'nav.qt-menubar ul.qt-desktopmenu a:hover',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '
			.qt-menubar ul.qt-desktopmenu > li.current_menu_ancestor::after, 
			.qt-menubar ul.qt-desktopmenu > li.current_menu_ancestor > a::after,
			.qt-menubar ul.qt-desktopmenu > li.current_page_item::after, 
			.qt-menubar ul.qt-desktopmenu > li.current_page_item > a::after, 
			.qt-menubar ul.qt-desktopmenu > li.current_page_item > a::before, 
			.qt-menubar ul.qt-desktopmenu > li.current-menu-ancestor > a::after, 
			.qt-menubar ul.qt-desktopmenu > li.current-menu-ancestor > a::before, 
			.qt-menubar ul.qt-desktopmenu > li.current-menu-ancestor::after, 
			.qt-menubar ul.qt-desktopmenu>li.current_page_item:hover::after,
			.qt-pageheader .qt-caption ',
			'property'      => 'border-color',
			'suffix' => '!important'
		)
	),
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_color_accent_hover',
	'label'       => esc_attr__( 'Accent hover', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#ff0442',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => 'a:hover, .tabs .tab a:hover, .qt-pageheader h1 a:hover, .qt-pageheader h2 a:hover, .qt-pageheader h3 a:hover, .qt-pageheader h4 a:hover, .qt-pageheader h5 a:hover, .qt-pageheader h6 a:hover',
			'property'      => 'color'
		),
		array(
			'element'       => '.qt-btn-primary:hover, .btn-primary:hover, .qt-sharepage a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, a.qt-link-layer ',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_color_secondary',
	'label'       => esc_attr__( 'Secondary', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#64c9d9',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '.qt-content-aside a, .qt-footer a, .qt-tags a, .qt_color_secondary, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price',
			'property'      => 'color',
			'suffix' => '!important'
		),
		array(
			'element'       => '.qt-secondary, .qt-btn-secondary, .btn-secondary, .qt-side-nav li li a, .slick-slider .slick-arrow::after, .slick-slider .slick-dots li.slick-active button,
.woocommerce span.onsale, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_color_secondary_hover',
	'label'       => esc_attr__( 'Secondary hover', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#58a4b0',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => ' #onair2Body .qt-menubar-top a:hover, .qt-content-aside a:hover, .qt-footer a:hover, .qt-tags a:hover, .qt_color_secondary:hover ',
			'property'      => 'color',
			'suffix' => '!important'
		),
		array(
			'element'       => '.qt-btn-secondary:hover, .btn-secondary:hover, .qt-secondary:hover, .qt-btn-secondary:hover, .btn-secondary:hover, .qt-side-nav li li a:hover, .slick-slider .slick-arrow:hover::after, .slick-slider .slick-dots li.slick-active button:hover, .qt-tags a:hover ',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'btn_txt_color',
	'label'       => esc_attr__( 'Buttons text color', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#ffffff',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '#onair2Body  .qt-btn-secondary, #onair2Body .qt-btn-secondary:hover,#onair2Body  .qt-btn, #onair2Body .qt-btn:hover, .qt-tags a:hover,  .woocommerce a.button',
			'property'      => 'color',
			'suffix' => '!important'
		),
	),
));
Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_color_background',
	'label'       => esc_attr__( 'Page background', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#f7f7f9',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => '',
			'property'      => 'color',
			'suffix' => '!important'
		),
		array(
			'element'       => 'body, html, .qt-body',
			'property'      => 'background-color',
			'suffix' => '!important'
		),
	),
));


Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_color_paper',
	'label'       => esc_attr__( 'Paper background', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#ffffff',
	'priority'    => 0,
	'output'    => array(
		array(
			'element'       => 	'.qt-negative h1, .qt-negative h2, .qt-negative h3, .qt-negative h4, .qt-negative h5, .qt-negative h6, .qt-negative h1 a, .qt-negative h2 a, .qt-negative h3 a, .qt-negative h4 a, .qt-negative h5 a, .qt-negative h6 a , .qt-widget-onair.qt-card > .qt-caption-med span',
			'property'      => 'color',
			'suffix' => '!important'
		),
		array(
			'element'       => '.qt-body.woocommerce li.product, .give-form-wrap, .qt-paper, .qt-card, .qt-card-s,  .qt-negative .qt-caption-med span, a.rsswidget, input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local],  input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea, table.striped>tbody>tr:nth-child(odd), table.bordered>thead>tr, table.bordered>tbody>tr, .qt-negative .qt-caption-small span ',
			'property'      => 'background-color',
		),
		array(
			'element'	=> 		'.qt-negative, .qt-content-primary-dark,.qt-content-primary,.qt-content-primary-light,.qt-btn-primary, .btn-primary,.qt-secondary, .qt-btn-secondary, .btn-secondary,  nav.qt-menubar ul.qt-desktopmenu a:hover, .qt-side-nav a , .qt-sharepage a, .qt-caption-med span , .qt-caption-small span, a.rsswidget, .qt-text-neg, .qt-logo-text, .qt-negative .qt-btn-ghost, .qt-text-neg .qt-btn-ghost ',
			'property'      => 'color',
		),
		array(
			'element'	=> 		'.qt-content-primary h3 a',
			'property'      => 'color',
			'suffix'	=> '!important'
		),
		array(
			'element'=> '.qt-menubar ul.qt-desktopmenu > li::after, .qt-menubar ul.qt-desktopmenu > li > a::after, .qt-menubar ul.qt-desktopmenu > li > a::before , .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover > a::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover > a::before, .qt-negative .qt-btn-ghost, .qt-negative .qt-widgets .qt-caption-small, .qt-caption-small , .qt-negative .qt-caption-small',
			'property'      => 'border-color',	
		),
		array(
			'element' => ' .qt-negative .qt-caption-small',
			'property'      => 'border-color',	
		),
		array(
			'element' => ' .qt-mobile-menu, .qt-menu-social a ',
			'property'      => 'color',	
			'value_pattern' => '$A5'
		),
		array(
			'element' => ' .qt-content-primary > .qt-titles > h2, .qt-content-primary > .qt-titles > h3, .qt-content-primary > .qt-titles > h4 ',
			'property'      => 'color',	
			'value_pattern' => '$A5'
		)


		
	),
));

Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_textcolor_original',
	'label'       => esc_attr__( 'Text', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#000000',
	'priority'    => 0,
	'output' => array(
		array(	'element'=> 'body, html, .qt-content-main, .qt-negative .qt-caption-small span, .qt-paper, .qt-negative .qt-caption-med, .qt-card, .qt-paper, .qt-card, .qt-card-s, .qt-negative .qt-caption-med span, input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea , .qt-negative .qt-card h1, .qt-negative .qt-card h2, .qt-negative .qt-card h3, .qt-negative .qt-card h4, .qt-negative .qt-card h4 a, .qt-negative .qt-card h5, .qt-negative .qt-card h6, .qt-negative .qt-card h1 a, .qt-negative .qt-card h2 a, .qt-negative .qt-card h3 a, .qt-negative .qt-card h4 a, .qt-negative .qt-card h5 a, .qt-negative .qt-card h6 a ',
			'property'      => 'color',	
			'value_pattern' => '$D8'
		),
		array(
			'element'=> '*::placeholder',
			'property'      => 'color',	
			'value_pattern' => '$D8'
		),
		array(
			'element'=> '.qt-text-secondary, .qt-tags a , .qt-content-aside, .qt-footer, .qt-tags ',
			'property'      => 'color',	
			'value_pattern' => '$A5'
		),
		// array(
		// 	'element'=> 'h1:not(.elementor-heading-title), h2:not(.elementor-heading-title), h3:not(.elementor-heading-title), h4:not(.elementor-heading-title), h5:not(.elementor-heading-title), h6:not(.elementor-heading-title), h1:not(.elementor-heading-title) a, h2:not(.elementor-heading-title) a, h3:not(.elementor-heading-title) a, h4:not(.elementor-heading-title) a, h5:not(.elementor-heading-title) a, h6:not(.elementor-heading-title) a',
		// 	'property'      => 'color',	
		// 	'value_pattern' => '$BF !important'
		// ),

		array(
			'element'=> '.qt-main h1, .qt-main h2, .qt-main h3, .qt-main h4, .qt-main h5, .qt-main h6, .qt-main h1 a, .qt-main h2 a, .qt-main h3 a, .qt-main h4 a, .qt-main h5 a, .qt-main h6 a',
			'property'      => 'color',	
			'value_pattern' => '$BF '
		),
		array(
			'element'=> '.qt-part-archive-item .qt-title a',
			'property'      => 'color',	
			'value_pattern' => '$BF !important'
		),

		array(
			'element' => '.qt-caption-small ',
			'property' => 'border-color',
		),
		array(
			'element' => '.qt-part-archive-item .qt-card h4 a , .qt-card  > .qt-caption-med span',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '.qt-caption-med span, .qt-caption-small span, a.rsswidget',
			'property' => 'background-color'
		),

		
	)
));


Kirki2_Kirki::add_field( 'qt_config', array(
	'type'        => 'color',
	'transport'   => 'auto',
	'settings'    => 'qt_textcolor_prmary',
	'label'       => esc_attr__( 'Text on primary background', "onair2" ),
	'section'     => 'qt_colors_section',
	'default'     => '#ffffff',
	'priority'    => 0,
	'output' => array(
		array(	'element'=> '[class*="qt-content-primary"] h2, [class*="qt-content-primary"] h3, [class*="qt-content-primary"] h4, [class*="qt-content-primary"] h5, [class*="qt-content-primary"] h6,
			[class*="qt-content-primary"] h3 a, [class*="qt-content-primary"] h4 a',
			'property'      => 'color',	
			'value_pattern' => '$D8',
			'suffix' => '!important'
		),
		
	)
));




