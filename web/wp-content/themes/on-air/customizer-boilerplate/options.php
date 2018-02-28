<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2013, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 */


/**
 * Helper function that holds array of theme options.
 *
 * @return	array	$options	Array of theme options
 * @uses	thsp_get_theme_customizer_fields()	defined in customizer/helpers.php
 */
function thsp_cbp_get_fields() {

	/*
	 * Using helper function to get default required capability
	 */
	$thsp_cbp_capability = thsp_cbp_capability();
	
	$options = array(
		// Section ID


		//QT_backgrounds
		
		'QT_backgrounds' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Background images', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 6
			),
			'fields' => array(
				
				'QT_header_background' => array(
					'setting_args' => array(
						//'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Header background  image', '_s' ),
						'type' => 'image', // Image upload field control
						'priority' => -1
					)
				)
				,'QT_footer_bar_background' => array(
					'setting_args' => array(
						//'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Footer background image', '_s' ),
						'type' => 'image', // Image upload field control
						'priority' => 2
					)
				)
				,'QT_body_background' => array(
					'setting_args' => array(
						//'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Page background image', '_s' ),
						'type' => 'image', // Image upload field control
						'priority' => 1
					)
				)
			)
			
		)




		,'colors' => array(
			'existing_section' => true,
			'args' => array(
				'title' => esc_attr__( 'Theme Colors', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 1
			),
			'fields' => array(
				'QT_background_color' => array(
					'setting_args' => array(
						'default' => '#ededed',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Background Color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_paper_color' => array(
					'setting_args' => array(
						'default' => '#ffffff',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Paper Background Color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_text_color' => array(
					'setting_args' => array(
						'default' => '#333',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Text color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_main_color' => array(
					'setting_args' => array(
						'default' => '#e91e63',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Main Color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_main_color_darker' => array(
					'setting_args' => array(
						'default' => '#ad1457',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Main Color Dark Variant', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_header_background_color' => array(
					'setting_args' => array(
						'default' => '#e91e63',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Header Background Color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_main_color_text' => array(
					'setting_args' => array(
						'default' => '#FFFFFF',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Text color on main color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_main_color_link' => array(
					'setting_args' => array(
						'default' => '#fce4ec',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Link color on main color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_main_color_hover' => array(
					'setting_args' => array(
						'default' => '#00bcd4',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Link hover color on main color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_accent_color' => array(
					'setting_args' => array(
						'default' => '#26a69a',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Accent Color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_accent_color_darker' => array(
					'setting_args' => array(
						'default' => '#26a69a',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Accent Color darker variant', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_accent_color_hover' => array(
					'setting_args' => array(
						'default' => '#00796b',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Accent Color Hover', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_accent_color_text' => array(
					'setting_args' => array(
						'default' => '#e0f2f1',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Text color on accent color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_accent_color_link' => array(
					'setting_args' => array(
						'default' => '#FFFFFF',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Links color on accent color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				,'QT_accent_color_link_hover' => array(
					'setting_args' => array(
						'default' => '#64ffda',//ff0070
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Links Hover color on accent color', '_s' ),
						'type' => 'color',		
						'priority' => 1
					) // End control args
				)
				


			),
			
		)


		


		/*
		*
		* Built in player
		*
		*/

		,'musicplayer' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Music Player Settings', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 1
			),
			'fields' => array(
				
				'QT_player_enable' => array(
					'setting_args' => array(
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh'
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Enable streaming music player', '_s' ),
						'type' => 'radio', // Image radio replacement
						'choices' => array(
							'no' => array(
								'label' => esc_attr__( 'No', '_s' )
							),
							'yes' => array(
								'label' => esc_attr__( 'Yes', '_s' )
							)
						),					
						'priority' => 1
					) // End control args
				)
				,'QT_player_type' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Player type (Need page refresh)', '_s' ),
						'type' => 'radio', // Image radio replacement
						'choices' => array(
							'featured' => array(
								'label' => esc_attr__( 'Featured player', '_s' )
							),
							'360player' => array(
								'label' => esc_attr__( '360 Animated player', '_s' )
							),
							'javascript' => array(
								'label' => esc_attr__( 'External Javascript', '_s' )
							),
							/*'popup' => array(
								'label' => esc_attr__( 'Popup window (see popup section)', '_s' )
							)*/
							/*,
							'wordpress' => array(
								'label' => esc_attr__( 'Wordpress Native Player', '_s' )
							)*/
						),					
						'priority' => 1
					) // End control args
				)
				
				,'QT_player_autoplay' => array(
					'setting_args' => array(
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh'
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Autoplay on page open', '_s' ),
						'type' => 'radio', // Image radio replacement
						'choices' => array(
							'no' => array(
								'label' => esc_attr__( 'No', '_s' )
							),
							'yes' => array(
								'label' => esc_attr__( 'Yes', '_s' )
							)
						),					
						'priority' => 1
					) // End control args
				)
				,'QT_player_url' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'URL of the mp3 stream', '_s' ),
						'type' => 'text', // Image radio replacement
						'priority' => 2
					) // End control args
				)
				,'QT_player_html' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Other player javascript code (Url of external javascript to render your radio player)', '_s' ),
						'type' => 'textarea', // Radio control				
						'priority' => 2
					)
				)
				

			),
			
		)



		/*
		*
		* Popup player
		*
		*/
	

		,'popupPlayer' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Popup Player', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 1
			),
			'fields' => array(

				'QT_popup_enabled' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Enable Popup Player button', '_s' ),
						'type' => 'checkbox', // Image radio replacement
						'description' => esc_attr__( 'Add a button to open a popup in the menu section', '_s' ),
						'priority' => 0
					) // End control args
				)

				,'QT_popup_text' => array(
					'setting_args' => array(
						'default' => 'Popup Player',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Text of the button', '_s' ),
						'type' => 'text', // Image radio replacement
						'priority' => 10
					) // End control args
				)


				,'QT_popup_width' => array(
					'setting_args' => array(
						'default' => '450',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Width of the popup player', '_s' ),
						'type' => 'text', // Image radio replacement
						'description' => esc_attr__( 'Number (Pixel)', '_s' ),
						'priority' => 10
					) // End control args
				)
				,'QT_popup_height' => array(
					'setting_args' => array(
						'default' => '500',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Height of the popup player', '_s' ),
						'type' => 'text', // Image radio replacement
						'description' => esc_attr__( 'Number (Pixel)', '_s' ),
						'priority' => 10
					) // End control args
				)
				
				,'QT_popup_url' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'URL of the popup window', '_s' ),
						'type' => 'text', // Image radio replacement
						'description' => esc_attr__( 'Link to your external playr window. Use a full url as http://.... and upload your popup wherever you want', '_s' ),
						'priority' => 10
					) // End control args
				)


			)
			
		)



		/*
		*
		* Schedule settings
		*
		*/
	

		,'scheduleSettings' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Schedule settings', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 1
			),
			'fields' => array(

				
				
				'QT_timing_settings' => array(
					'setting_args' => array(
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'default' => '12',
						'transport' => 'refresh'
					), // End setting args			
					'control_args' => array(
						'label' => esc_attr__( 'Time format for schedule and show slider', '_s' ),
						'type' => 'radio', // Image radio replacement
						'choices' => array(
							'12' => array(
								'label' => esc_attr__( '12 Hours Format', '_s' )
							),
							'24' => array(
								'label' => esc_attr__( '24 Hours Format', '_s' )
							)
						),				
						'priority' => 1
					) // End control args
				)


			)
			
		)




		/*
		*
		* external_players
		*
		*/
	

		,'external_players' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Footer app links', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 7
			)
			,'fields' => array(

				'QT_apps_bar' => array(
					'setting_args' => array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Enable apps links bar in footer', '_s' ),
						'type' => 'radio', // Radio control
						'choices' => array(
							'1' => array(
								'label' => esc_attr__( 'Yes', '_s' )
							),
							'0' => array(
								'label' => esc_attr__( 'No', '_s' )
							)
						),					
						'priority' => -2
					)
				)

				


				,'listen_on_text' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( '"You can listen also on" text', '_s' ),
						
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,
				'app_android' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Android App', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'app_iphone' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'iPhone App', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'app_blackberry' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Blackberry App', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'app_itunes' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'iTunes App', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'app_winphone' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Windows Phone App', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'app_winamp' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Winamp link', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'app_mediaplayer' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Windows Media Player', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
			)
		)

		/*
		*
		* Social links
		*
		*/
	

		,'new_customizer_section' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Social links', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 8
			),
			'fields' => array(
				'QT_facebook' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Facebook page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_amazon' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Amazon page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_blogger' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Blogger', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
				,'QT_behance' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Behance', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
				,'QT_bebo' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Bebo', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
				,'QT_flickr' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Flickr page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_pinterest' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Pinterest page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_rss' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Rss page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_triplevision' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Triplevision page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
				,'QT_tumblr' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Tumblr page', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_twitter' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Twitter', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_vimeo' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Vimeo', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_wordpress' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Wordpress', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
				,'QT_whatpeopleplay' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Whatpeopleplay', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_youtube' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Youtube', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_soundcloud' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Soundcloud', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_myspace' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Myspace', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_googleplus' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Google+', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_itunes' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Itunes', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_juno' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Juno', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_lastfm' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Lastfm', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_linkedin' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Linkedin', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
				,'QT_mixcloud' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Mixcloud', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_resident-advisor' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Resident Advisor', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
				,'QT_reverbnation' => array(
					'setting_args' => array(
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Reverbnation', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 0
					)
				)
			)
			
		)
		

		/*
		*
		* Logo uploader
		*
		*/
		,'branding_custom_section' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Branding', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 0
			),
			'fields' => array(

				

				'QT_logo_menubar' => array(
					'setting_args' => array(
						//'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo in menu bar (Max 560 x 100px)', '_s' ),
						'type' => 'image', // Image upload field control
						'priority' => -1
					)
				),


				'QT_logo' => array(
					'setting_args' => array(
						//'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo header', '_s' ),
						'type' => 'image', // Image upload field control
						'priority' => -1
					)
				),

				'QT_logo_top' => array(
					'setting_args' => array(
						'default' => '15',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo margin top', '_s' ),
						'type' => 'number', // Image upload field control
						'priority' => 1
					)
				),

				'QT_logo_height' => array(
					'setting_args' => array(
						'default' => '60',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo max height', '_s' ),
						'type' => 'number', // Image upload field control
						'priority' => 1
					)
				),




				'QT_logo_top_s' => array(
					'setting_args' => array(
						'default' => '8',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo margin top on Sticky Bar', '_s' ),
						'type' => 'number', // Image upload field control
						'priority' => 1
					)
				),

				'QT_logo_height_s' => array(
					'setting_args' => array(
						'default' => '40',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo max height on Sticky Bar', '_s' ),
						'type' => 'number', // Image upload field control
						'priority' => 1
					)
				),




				'QT_logo_top_m' => array(
					'setting_args' => array(
						'default' => '5',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo margin top mobile', '_s' ),
						'type' => 'number', // Image upload field control
						'priority' => 1
					)
				),


				'QT_logo_height_m' => array(
					'setting_args' => array(
						'default' => '30',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Logo max height mobile', '_s' ),
						'type' => 'number', // Image upload field control
						'priority' => 1
					)
				),
				
				'QT_Favicon' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Favicon (.ico)', '_s' ),
						'type' => 'upload', 
						'priority' => 2
					)
				)

			)
			
		)

		


		//Footer
		
		,'QT_footer' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Footer', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 6
			),
			'fields' => array(
				'QT_footer_text' => array(
					'setting_args' => array(
						//'default' => esc_attr__( 'Copyright 2015', '_s' ),
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),	
					'control_args' => array(
						'label' => esc_attr__( 'Footer text', '_s' ),
						'type' => 'text', // Text field control
						'priority' => 1
					)
				)
			)
			
		)

		//Layout
		
		,'QT_layout' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Website layout', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 1
			),
			'fields' => array(
			    'QT_header_bar' => array(
					'setting_args' => array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Show header bar', '_s' ),
						'type' => 'radio', // Radio control
						'choices' => array(
							'1' => array(
								'label' => esc_attr__( 'Yes', '_s' )
							),
							'0' => array(
								'label' => esc_attr__( 'No', '_s' )
							)
						),					
						'priority' => 2
					)
				)
				,'QT_sidebar_number' => array(
					'setting_args' => array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Sidebar number', '_s' ),
						'type' => 'radio', // Radio control
						'choices' => array(
							'1' => array(
								'label' => esc_attr__( 'One Sidebar', '_s' )
							),
							'2' => array(
								'label' => esc_attr__( 'Two sidebars', '_s' )
							)
						),					
						'priority' => 2
					)
				)
				,'QT_max_width' => array(
					'setting_args' => array(
						'default' => '1280',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Maximum site width (in pixel)', '_s' ),
						'type' => 'text', // Radio control				
						'priority' => 1
					)
				)
				,'QT_schedule_default_layout' => array(
					'setting_args' => array(
						'default' => 'grid',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Schedule Default Layout', '_s' ),
						'type' => 'radio', // Radio control
						'choices' => array(
							'grid' => array(
								'label' => esc_attr__( 'Grid', '_s' )
							),
							'list' => array(
								'label' => esc_attr__( 'List', '_s' )
							)
						),					
						'priority' => 2
					)
				)
				/*,'QT_extra_content' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'postMessage',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Extra sidebar content', '_s' ),
						'type' => 'textarea', // Radio control				
						'priority' => 2
					)
				),*/
			)
		)

		//Extra
		
		

		
		

		/*
		*
		* Font
		*
		*/
		,'QT_fonts' => array(
			'existing_section' => false,
			'args' => array(
				'title' => esc_attr__( 'Google Fonts', '_s' ),
				//'description' => esc_attr__( 'New section description', '_s' ),
				'priority' => 1
			),
			'fields' => array(

			    // Enable disable google fonts ===================

			    'QT_font_enable' => array(
					'setting_args' => array(
						'default' => '1',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Enable Google Fonts', '_s' ),
						'type' => 'radio', // Radio control
						'choices' => array(
							'1' => array(
								'label' => esc_attr__( 'Enable', '_s' )
							),
							'0' => array(
								'label' => esc_attr__( 'Disable', '_s' )
							)
						),					
						'priority' => 2
					)
				),

				// Font captions family ===================

				'QT_captions_font' => array(
					'setting_args' => array(
						'default' => 'Racing Sans One',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Captions Font Weight', '_s' ),
						'type' => 'select', // Radio control
						'choices' => qt_GoogleFontOptions(),
						'priority' => 3
					)
				),



				// Font contant family ===================

				'QT_content_font' => array(
					'setting_args' => array(
						'default' => 'Lato',
						'type' => 'theme_mod',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => esc_attr__( 'Text Font', '_s' ),
						'type' => 'select', // Radio control
						'choices' => qt_GoogleFontOptions(),
						'priority' => 3
					)
				)
			)
		)
	);
	
	/* 
	 * 'thsp_cbp_options_array' filter hook will allow you to 
	 * add/remove some of these options from a child theme
	 */
	return apply_filters( 'thsp_cbp_options_array', $options );
	
}

/*
*
*	Function to create an array of fonts
*
*/
global $googlefonts;
include_once 'googlefonts.php';
function qt_GoogleFontOptions(){
	
global $googlefonts;
	$fontlist = $googlefonts;
	$choices = array();
	if($fontlist != false){
		$json_a=json_decode($fontlist, true);
		$items = $json_a['items'];
		$n=1;
		
		if(!is_array($items)){
			return;
		}
		foreach($items as $i){
			if(array_key_exists('kind', $i)){
				if($i['kind']=='webfonts#webfont'){
					$v = $i['family'];
					$choices[$v] = array('label' => $v);
				}
			}
		}
		return $choices;
	
		
	}
	$choices = array();
	return $choices; // empty
}



if(!function_exists('qwGetFileData')){	
function qwGetFileData ($url){
	$defaults = array(
	 'method' => 'GET',
	 'timeout' => 10,
	 'redirection' => 5,
	 'httpversion' => '1.0',
	 'user-agent' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
	 'reject_unsafe_urls' => false,
	 'blocking' => true,
	 'headers' => array(),
	 'cookies' => array(),
	 'body' => null,
	 'compress' => false,
	 'decompress' => true,
	 'sslverify' => true,
	 'stream' => false,
	 'filename' => null,
	 'limit_response_size' => null,
	);

    $response = wp_remote_get(
        $url, 
        $defaults
	);	        
	if ( is_wp_error( $response ) ) {
	   return false;
	} else {
	   
	   $data = wp_remote_retrieve_body( $response );
	   return $data;
	}
}
}


/*
*
*	Function to create an array of fonts
*
*/
if(!function_exists('url_get_contents')){
function url_get_contents ($Url) {
	if (function_exists('wp_remote_get')){ 
		$response = wp_remote_get( $Url );
		if( is_wp_error( $response ) ) {
		   $error_message = $response->get_error_message();
		   //echo('Adminindex.php says: Wrong resource url');
		   return false;
		} else {
			return $response ['body'];
		}
	}
}}


