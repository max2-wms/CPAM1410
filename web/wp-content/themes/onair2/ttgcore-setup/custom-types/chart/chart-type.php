<?php

add_action('init', 'qantumthemes_chart_register_type');  

if(!function_exists('qantumthemes_chart_register_type')){
function qantumthemes_chart_register_type() {
	$labelschart = array(
		'name' => esc_html__("Charts","onair2"),
		'singular_name' => esc_html__("Chart","onair2"),
		'add_new' => 'Add new ',
		'add_new_item' => 'Add new '.__("chart","onair2"),
		'edit_item' => 'Edit '.__("chart","onair2"),
		'new_item' => 'New '.__("chart","onair2"),
		'all_items' => 'All '.__("Charts","onair2"),
		'view_item' => 'View '.__("chart","onair2"),
		'search_items' => 'Search '.__("Charts","onair2"),
		'not_found' =>  'No '.__("Charts","onair2").' found',
		'not_found_in_trash' => 'No '.__("Charts","onair2").' found in Trash', 
		'parent_item_colon' => '',
		'menu_name' =>__("Charts","onair2")
	);
	$args = array(
		'labels' => $labelschart,
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
		'page-attributes' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-playlist-audio',
		'supports' => array('title', 'thumbnail','editor' )
	); 
	if(function_exists('ttg_custom_post_type')){
		ttg_custom_post_type( "chart" , $args );
	}

	/* ============= create custom taxonomy for the charts ==========================*/
	 $labels = array(
		'name' => esc_html__( 'Chart categories',"onair2"),
		'singular_name' => esc_html__( 'Category',"onair2"),
		'search_items' =>  esc_html__( 'Search by category',"onair2" ),
		'popular_items' => esc_html__( 'Popular categorys',"onair2" ),
		'all_items' => esc_html__( 'All charts',"onair2" ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit category',"onair2" ), 
		'update_item' => esc_html__( 'Update category',"onair2" ),
		'add_new_item' => esc_html__( 'Add New category',"onair2" ),
		'new_item_name' => esc_html__( 'New category Name',"onair2" ),
		'separate_items_with_commas' => esc_html__( 'Separate categorys with commas',"onair2" ),
		'add_or_remove_items' => esc_html__( 'Add or remove categorys',"onair2" ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used categorys',"onair2" ),
		'menu_name' => esc_html__( 'Chart categories',"onair2" )
	); 
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => true
	);
	if(function_exists('ttg_custom_taxonomy')){
		ttg_custom_taxonomy('chartcategory', 'chart', $args	);
	} 




	$fields_chart = array(
		'image' => array(
			'label' => 'Custom header background',		
			'id'    => 'qt_customheader_bg',
			'type'  => 'image'
			),
		'tracks' => array( // Repeatable & Sortable Text inputs
			'label'	=> 'Chart Tracks', // <label>
			'desc'	=> 'Add one for each track in the chart', // description
			'id'	=> 'track_repeatable', // field id and name
			'type'	=> 'repeatable', // type of field
			'sanitizer' => array( // array of sanitizers with matching kets to next array
				'featured' => 'meta_box_santitize_boolean',
				'title' => 'sanitize_text_field',
				'desc' => 'wp_kses_data'
			),
			
			'repeatable_fields' => array ( // array of fields to be repeated
				'releasetrack_track_title' => array(
					'label' => 'Title',
					'id' => 'releasetrack_track_title',
					'type' => 'text'
				)
				,'releasetrack_artist_name' => array(
					'label' => 'Artist/s',
					'id' => 'releasetrack_artist_name',
					'type' => 'text'
				)
				,'releasetrack_soundcloud_url' => array(
					'label' => 'Spotify song, Soundcloud, Youtube or MP3 Url',
					'desc'	=> 'Will be transformed into an embedded player in the chart page. For spotify: right click on a song, copy song link.', // description
					'id' 	=> 'releasetrack_scurl',
					'type' 	=> 'text'
				)
				,'releasetrack_buy_url' => array(
					'label' => 'Track Buy link',
					'desc'	=> 'A link to buy the single track', // description
					'id' 	=> 'releasetrack_buyurl',
					'type' 	=> 'text'
				)
				,'releasetrack_img' => array(
					'label' => 'Cover',
					'desc'	=> 'Better 600x600', // description
					'id' => 'releasetrack_img',
					'type' => 'image'
				)
		
			)
		),
		
	);




	/**
	 * If the Chart Vote plugin is active, a new field will be added to control the voting
	 */
	if(function_exists('qt_chartvote_active')){

		$fields_chart['tracks']['repeatable_fields'][] = array(
			'label' => 'Track rating',
			'desc'	=> 'User Rating for the track', // description
			'id' 	=> 'releasetrack_rating',
			'type' 	=> 'number'
		);
	}


	if(class_exists("custom_add_meta_box")){
		$tracks_box = new custom_add_meta_box( 'chart_tracks', 'Chart Tracks', $fields_chart, 'chart', true );
	}
}}

/*
*
*	Chart shortcode
*
*/
if(!function_exists('qantumthemes_chart_shortcode')) {
	function qantumthemes_chart_shortcode($atts){
		extract( shortcode_atts( array(
			'id' => ""
		), $atts ) );
			ob_start();
			?><h4><?php echo esc_attr(get_the_title($id)); ?></h4><?php
			$events= get_post_meta($id, 'track_repeatable', true);   
			if(is_array($events)){
				$pos = 1;
				foreach($events as $event){ 
					$neededEvents = array('releasetrack_track_title','releasetrack_scurl','releasetrack_buyurl','releasetrack_artist_name','releasetrack_img');
					foreach($neededEvents as $n){
						if(!array_key_exists($n,$events)){
							$events[$n] = '';
						}
					}
					?>
					<div class="qw-chart-row grey lighten-4" id="chartItem<?php echo esc_attr($pos); ?>">
						<div class="maincolor qw-chart-position"><?php echo esc_attr($pos); ?></div>

						 <?php 
						if($event['releasetrack_buyurl'] != ''){
							?>
							<a href="<?php echo esc_url($event['releasetrack_buyurl']); ?>" class="qw-chart-buy maincolor dark accentcolor-text tooltipped" data-position="left" data-tooltip="<?php echo esc_attr__("Go to shop","onair2") ?>">
							<i class="mdi-action-add-shopping-cart"></i>
							</a>
							<?php
						}   
						?>
						<?php 
						if($event['releasetrack_scurl'] != ''){
							?>
							<a href="#" class="qw-chart-play accentcolor tooltipped" data-toggleclass="hidden" data-target="chartPlayer<?php echo esc_attr($pos); ?>" data-position="right" data-tooltip="<?php echo esc_attr__("Listen","onair2") ?>">
							<i class="mdi-av-play-arrow"></i>
							</a>
							<?php
						}   
						?>
						<?php 
						if($event['releasetrack_img'] != ''){
							$img = wp_get_attachment_image_src($event['releasetrack_img'],'small');
							?>
							<img src="<?php echo esc_url($img[0]); ?>" class="qw-chart-cover" alt="<?php echo esc_attr__("Cover", "onair2"); ?>">
							<?php
						}   
						?>

						<h4><?php echo esc_attr($event['releasetrack_track_title']); ?></h4>
						<p><?php echo esc_attr($event['releasetrack_artist_name']); ?></p>
						
						<?php if($event['releasetrack_scurl'] != ''){ ?>
						<div class="qw-music-player hidden" id="chartPlayer<?php echo esc_attr($pos); ?>">
							<?php  
							
								$regex_soundcloud = "/soundcloud.com/";                       
								$regex_mp3 = "/.mp3/";

								if(preg_match ( $regex_soundcloud , $event['releasetrack_scurl'] )){
									echo do_shortcode('[soundcloud params="auto_play=false&show_comments=true"  width="100%" url="'.esc_url($event['releasetrack_scurl']).'"]');
								} else if(preg_match ( $regex_mp3 , $event['releasetrack_scurl'] )) {
									echo do_shortcode('[audio src="'.esc_url($event['releasetrack_scurl']).'"]');
								}
							?>
						</div>
						<?php } ?>
					</div>

					<?php 
					$pos = $pos+1;
			}//foreach
		}//end debuf if
		wp_reset_postdata();
		return ob_get_clean();
	}
}
ttg_custom_shortcode("embedchart","qantumthemes_chart_shortcode");