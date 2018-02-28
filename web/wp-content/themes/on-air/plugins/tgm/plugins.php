<?php

require_once ('class-tgm-plugin-activation.php');



///////////////////////////////////////////////////////////////////////////////////////////
/////// Required Plugins
///////////////////////////////////////////////////////////////////////////////////////////

if( !function_exists('qantum_required_plugins') ):
function qantum_required_plugins() {
	
	$plugins = array(
		array(
                    'name'     			=> 'QantumThemes Support And Manual', 
                    'slug'     			=> 'qt-support', 
                    'source'   			=> get_template_directory()  . '/plugins/qt-support.zip',
                    'required' 			=> true,
                    'version' 			=> '1.0',
                    'force_activation' 	=> false, 
                    'force_deactivation'=> false,
                    'external_url' 		=> ''
		)
		,
	    array(
                    'name'     			=> 'QantumThemes Radio Suite', 
                    'slug'     			=> 'qt-radio-suite', 
                    'source'   			=> get_template_directory()  . '/plugins/qt-radio-suite.zip',
                    'required' 			=> true,
                    'version' 			=> '1.0.7',
                    'force_activation' 	=> false, 
                    'force_deactivation'=> false,
                    'external_url' 		=> ''
		)
		, array(
                    'name'     			=> 'QantumThemes Banner Manager', 
                    'slug'     			=> 'qt-banner', 
                    'source'   			=> get_template_directory()  . '/plugins/qt-banner.zip',
                    'required' 			=> true,
                    'version' 			=> '1.0.2',
                    'force_activation' 	=> false, 
                    'force_deactivation'=> false,
                    'external_url' 		=> ''
		)		
		, array(
                    'name'     			=> 'QantumThemes Videolove', 
                    'slug'     			=> 'videolove', 
                    'source'   			=> get_template_directory()  . '/plugins/videolove.zip',
                    'required' 			=> true,
                    'version' 			=> '1.0',
                    'force_activation' 	=> false, 
                    'force_deactivation'=> false,
                    'external_url' 		=> ''
		)	     
		, array(
            'name'      => 'Slim Jetpack',
            'slug'      => 'slimjetpack',
            'required'  => false
        )

        , array(
            'name'      => 'SoundCloud Shortcode',
            'slug'      => 'soundcloud-shortcode',
            'required'  => false
        )
        , array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false
        )
        , array(
                    'name'     			=> 'QantumThemes Easy Installer', 
                    'slug'     			=> 'easy_installer', 
                    'source'   			=> get_template_directory()  . '/plugins/easy_installer.zip',
                    'required' 			=> true,
                    'version' 			=> '',
                    'force_activation' 	=> false, 
                    'force_deactivation'=> false,
                    'external_url' 		=> ''
		)

       
	);

	$config = array(
		'domain'       		=> 'on-air',         	
		'default_path' 		=> '',                         	
		'parent_menu_slug' 	=> 'themes.php', 				
		'parent_url_slug' 	=> 'themes.php', 				
		'menu'         		=> 'install-required-plugins', 	
		'has_notices'      	=> true,                       
		'is_automatic'    	=> true,
		'message' 			=> '',							
		'strings'      		=> array(
			'page_title'                       			=> esc_attr__( 'Install Required Plugins', '_s' ),
			'menu_title'                       			=> esc_attr__( 'Install Plugins', '_s' ),
			'installing'                       			=> esc_attr__( 'Installing Plugin: %s', '_s' ), 
			'oops'                             			=> esc_attr__( 'Something went wrong with the plugin API.', '_s' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  				=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 				=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 					=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					 	=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  	=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> esc_attr__( 'Return to Required Plugins Installer', '_s' ),
			'plugin_activated'                 			=> esc_attr__( 'Plugin activated successfully.', '_s' ).' <a href="'.esc_url(admin_url( 'themes.php?page=easint','http')).'" class="button button-primary">'.esc_attr__("Go to One Click Installer","_s").'</a>',
			'complete' 						=> esc_attr__( 'All plugins installed and activated successfully. %s', '_s' ).' <a href="'.esc_url(admin_url( 'themes.php?page=easint','http')).'" class="button button-primary">'.esc_attr__("Go to One Click Installer","_s").'</a>', 
			'nag_type'						=> 'updated'
		)
	);
	tgmpa($plugins, $config);
}
endif; // end   _s_required_plugins  
