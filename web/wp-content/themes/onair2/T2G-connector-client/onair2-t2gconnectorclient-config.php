<?php
/**
 * This is the configuration for the installer plguin.
 * This class (T2GConnectorConfig) is retriven by the official plugin function
 */
if(!class_exists("T2GConnectorConfig")){
class T2GConnectorConfig {
	public function __construct(){
		
	}
	///return $this->login_url.$this->client_id.'&redirect_uri='.$this->login_page;
	// This function needs to stay in the functions.php of the theme
	public function t2gconnector_product_sku() {
		return '19340714'; // if false we don't do check or auto updates of theme
	}
	// generic settings
	public function t2gconnector_settings(){
		$settings = array 
			(
				"dashboard_title" => "OnAir2",
				'logo' => get_template_directory_uri() . '/img/logo.png',
				'auto_update_theme' => false,
				'manual_url' => esc_url('http://qantumthemes.com/manuals/onair2/'),
				'helpdesk_url' => esc_url('http://www.qantumthemes.com/helpdesk/forums/forum/onair2-theme-support/'),
				'messageboard_top' => esc_url('http://qantumthemes.xyz/t2gconnector-comm/onair2/onair2_messageboard_top.php'),
				"deepcheck" => false,
				'icon' => get_template_directory_uri() . '/img/icon.png',
			);
		return $settings;
	}
	// for auto plugin update
	public function t2gconnector_plugins_list(){
		$plugins_url = esc_url('https://qantumthemes.xyz/public_plugins/onair2/');
		$folder = '180702aVio/';
		$plugins = array(
			array(
				'name'      => esc_html__('OnAir2 Theme Dashboard','onair2'),
				'slug'      => 't2gconnectorclient',
				'version'	=> '1.3.7',
				'required'  => true,
				'source'             =>  $plugins_url . 'static/t2gconnectorclient-1.3.7.zip', 
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('Theme Core Plugin','onair2'),
				'slug'      => 'ttg-core',
				'version'	=> '1.2.8',
				'required'  => true,
				'source'             => $plugins_url . $folder .'ttg-core-1.2.8.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'               => esc_attr('WP Bakery Visual Composer','onair2'),
				'slug'               => 'js_composer',
				'version'			 => '5.5.2', // update via remote
				'source'             => $plugins_url . $folder .'js_composer-5.5.2.zip',
				'required'           => false, 
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Banner','onair2'),
				'slug'      => 'qt-banner',
				'version'	=> '1.0.5', // update via remote
				'required'  => false,
				'source'             => $plugins_url . $folder .'qt-banner-1.0.5.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Loveit','onair2'),
				'slug'      => 'qt-loveit',
				'version'	=> '1.0.0',
				'required'  => false,
				'source'             => $plugins_url . $folder .'qt-loveit-1.0.0.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Videolove','onair2'),
				'slug'      => 'qt-videogalleries',
				'version'	=> '1.5',
				'required'  => true,
				'source'             => $plugins_url . $folder .'qt-videogalleries-1.5.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Widgets','onair2'),
				'slug'      => 'qt-widgets',
				'version'	=> '1.3.2', // update via remote
				'required'  => true,
				'source'             => $plugins_url . $folder .'qt-widgets-1.3.2.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			
			array(
				'name'      => esc_attr('Envato Market','onair2'),
				'slug'      => 'envato-market',
				'version'	=> '2.0',
				'required'  => true,
				'source'             => $plugins_url . 'static/envato-market-2.0.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Places','onair2'),
				'slug'      => 'qt-places',
				'version'	=> '1.7.0',
				'required'  => true,
				'source'             => $plugins_url . $folder .'qt-places-1.7.0.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Swipebox','onair2'),
				'slug'      => 'qt-swipebox',
				'version'	=> '1.0.4',
				'required'  => true,
				'source'             => $plugins_url . $folder .'qt-swipebox-1.0.4.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Ajax Pageload','onair2'),
				'slug'      => 'qt-ajax-pageload',
				'version'	=> '1.6',
				'required'  => false,
				'source'             => $plugins_url . $folder .'qt-ajax-pageload-1.6.zip',
				'force_activation'   => false, 
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT ContactForm','onair2'),
				'slug'      => 'qt-contactform',
				'version'	=> '1.3', 
				'required'  => true,
				'source'             => $plugins_url . $folder .'qt-contactform-1.3.zip',
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT OnAir2 Category Backgrounds','onair2'),
				'slug'      => 'qt-onair-categorybg',
				'version'	=> '1.1.1',
				'required'  => false,
				'source'             => $plugins_url . $folder .'qt-onair-categorybg-1.1.1.zip',
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'      => esc_attr('QT Chart Vote','onair2'),
				'slug'      => 'qt-chartvote',
				'version'	=> '1.0', 
				'required'  => false,
				'source'             => $plugins_url . $folder .'qt-chartvote-1.0.zip',
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_attr('Slider Revolution','onair2'),
				'slug'               => 'revslider',
				'version'			 => '5.4.8',
				'source'             => $plugins_url . $folder .'revslider-5.4.8.zip',
				'required'           => false, 
				'force_activation'   => false, 
				'force_deactivation' => false
			),
		);
		return $plugins;
	}
	public function t2gconnector_demos_list(){
		$demos = array(
			'demo1' => array(
				'name'      	=> "Main demo",
				'folder'       	=>  '/T2G-connector-client/demo/1/',
				'screenshot'   	=>  '/T2G-connector-client/demo/1/screenshot.jpg', 
				'description'	=>	'Main demo with schedule, radio, podcasts and events. Images are not included.'
			),
			'demo2' => array(
				'name'      	=> "POP demo",
				'folder'       	=>  '/T2G-connector-client/demo/2/',
				'screenshot'   	=>  '/T2G-connector-client/demo/2/screenshot.jpg', 
				'description'	=>	'Pop radio demo with schedule, radio, podcasts and events. Images are not included.'
			),
			'demo3' => array(
				'name'      	=> "Ecommerce & Donations demo",
				'folder'       	=>  '/T2G-connector-client/demo/3/',
				'screenshot'   	=>  '/T2G-connector-client/demo/3/screenshot.jpg', 
				'description'	=>	'Demo including WooCommerce pages and Give Donations Plugin contents, top bar player and new home. Important: install WooCommerce and Give donations plugin before importing this demo.'
			),
		);
		return $demos;
	}
}
}

