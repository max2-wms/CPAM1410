<?php 
/*
Package: OnAir2
Description: charts tracklist
Version: 3.6.3
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


if(!function_exists('onair2_chart_array_orderby')){
function onair2_chart_array_orderby(){

    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}
}




if(!function_exists('qantumthemes_chart_tracklist')) {
function qantumthemes_chart_tracklist($atts){
	extract( shortcode_atts( array(
			'id' => false,
			'chart_id' => false,
			'number' => 100,
			'showtitle' => false,
			'chartcategory' => false,
			'tax_filter' => false,
			'chartstyle' => 'chart-normal',
			'showthumbnail' => false
	), $atts ) );

	if(!is_numeric($number)){
		$number = 100;
	}
	if(!is_numeric($id)){
		$id = false;
	}
	if($chart_id){
		$id = $chart_id;
	}
	if(false == $id){
		$args = array(
			'post_type' => 'chart',
			'posts_per_page' => 1,
			'post_status' => 'publish',
			'orderby' => array ( 'menu_order' => 'ASC', 'date' => 'DESC'),
			'paged' => 1,
			'suppress_filters' => false,
			'ignore_sticky_posts' => 1
		);


		if(false !== $chartcategory && '' !== $chartcategory){
			$args[ 'tax_query'] = array(
					array(
					'taxonomy' => 'chartcategory',
					'field' => 'slug',
					'terms' => array(esc_attr($chartcategory)),
					'operator'=> 'IN' //Or 'AND' or 'NOT IN'
				)
			);
		}

		if( $tax_filter  ){
			$tax_filter_array = explode(',', trim($tax_filter) );
			$tax_atts = array();
			$tax_query = array(
				'relation' => 'OR'
			);
			foreach( $tax_filter_array as $var => $val){
				$tax = explode(':', $val);
				if( array_key_exists(1, $tax)){
					$tax_atts[ trim( $tax[0] ) ] [] = trim( $tax[1] );
				}
			}
			foreach( $tax_atts as $taxname => $termslist ){
				$tax_query[] = array(
					'taxonomy' 	=> trim( $taxname ),
					'field' 	=> 'slug',
					'terms'		=> $termslist,
					'operator'	=> 'IN'
				);
			}

			$args[ 'tax_query'] = $tax_query;
		}
	} else {
		$args = array(
		'p' => esc_attr($id), 
		'post_type' => 'chart');
	}
	ob_start();
	$wp_query = new WP_Query( $args );
	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
		$events= get_post_meta(get_the_ID(), 'track_repeatable', true);   
		$total = count($events);


		if(is_array($events)){
			if($showtitle){
				?>
				<h3 class="qt-title">
				<?php the_title(); ?>
				</h3>
				<?php
			}
			if($showthumbnail){
				?><a href="<?php the_permalink(); ?>" alt="<?php esc_attr_e("Chart image", 'onair2'); ?>" class="qt-short-chart-featured"><?php  
				the_post_thumbnail('qantumthemes-squared', array("class" => "qt-featuredimage") );
				?></a><?php  
			}
			?>
			<ul class="qt-collapsible qt-chart-tracklist <?php echo "qt-".esc_attr($chartstyle); ?>" data-collapsible="accordion">
			<?php  

			$pos = 1;
			$counter = 0;
			$trackid = 0;

			/**
			 * Set ID and rating in the tracks attributes
			 */
			for( $ti = 0; $ti < count( $events ); $ti++ ){
				$events[$ti]['trackid'] = $ti;
				if(!array_key_exists('releasetrack_rating', $events[$ti])) {
					$events[$ti]['releasetrack_rating'] = 0;
				}
			}

			if( get_theme_mod( 'qt_chart_reorder' ) ){
				$events = onair2_chart_array_orderby($events, 'releasetrack_rating', SORT_DESC, 'trackid', SORT_ASC);
			}


			foreach($events as $event){ 
				if($number <= $counter) {
					break;
				}
				$counter = $counter +1;
				$neededEvents = array('releasetrack_track_title','releasetrack_scurl','releasetrack_buyurl','releasetrack_artist_name','releasetrack_img');
				foreach($neededEvents as $n){
					if(!array_key_exists($n,$event)){
						$event[$n] = '';
					}
				}
				?>
				<li id="chartItem<?php echo esc_attr($pos); ?>" class="qt-collapsible-item qt-part-chart qt-chart-track qt-card-s">
					<div class="qt-chart-table collapsible-header qt-content-primary">
						<div class="qt-position qt-content-primary-dark">
							<?php 
							if($event['releasetrack_img'] != ''){
								$img = wp_get_attachment_image_src($event['releasetrack_img'],'qantumthemes-thumb-squared');
								if($img){
									?>
									<img src="<?php echo esc_url($img[0]); ?>" class="qt-chart-cover" alt="Chart track" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
									<?php
								}
							}   
							?>
							<p class="qt-capfont qt-text-shadow"><?php echo esc_attr($pos); ?></p>
						</div>

						<?php 
						/**
						 * Rating function
						 * ===========================================
						 */
						if($chartstyle !== 'chart-small' && function_exists('qt_chartvote_buttons')){
							echo qt_chartvote_buttons(get_the_ID(), $event['trackid'], $event['releasetrack_rating']);
						}
						?>

						<div class="qt-titles">
							<h4 class="qt-ellipsis qt-t"><?php echo esc_attr($event['releasetrack_track_title']); ?></h4>
							<p><?php echo esc_attr($event['releasetrack_artist_name']); ?></p>
						</div>
						<div class="qt-action">
							<?php if($event['releasetrack_buyurl'] != ''){ ?>
								<a href="<?php echo esc_url($event['releasetrack_buyurl']); ?>" class="qt-btns" target="_blank"><i class="dripicons-cart"></i></a>
							<?php } ?>
						</div>
					</div>
					<?php if($event['releasetrack_scurl'] != ''){ ?>
						<div id="chartPlayer<?php echo esc_attr($pos); ?>" class="collapsible-body qt-paper">
							<?php 
							//======================= PLAYER ======================
							$pUrl =$event['releasetrack_scurl'];
							if($pUrl!=''){
								$link = $pUrl;
								$regex_mp3 = "/.mp3/";
								if (preg_match ( $regex_mp3 , $link  )) {
									echo do_shortcode('[audio src="'.esc_url($link ).'"]');
								} else {
									?>
									<div data-autoembed="<?php echo esc_url( $link ); ?>"></div>
									<?php  
								}
							} ?>
						</div>
					<?php } ?>

				</li>
				<?php 
				$pos = $pos+1;
			}//foreach
			?></ul><?php  
		}//end debuf if
		/**
		 *
		 *	If the total amount of tracks is more than the number we show, add button to single chart page
		 * 
		 */
		if($total > $number){
			?>
			<p class="aligncenter">
				<a class="qt-btn <?php if($chartstyle == "chart-normal") { ?>qt-btn-l<?php } ?> qt-btn-primary" href="<?php the_permalink(); ?>"><?php echo esc_attr__("Full tracklist","onair2"); ?></a>
			</p>
			<?php
		}
		
	endwhile; endif;
	wp_reset_postdata();
	return ob_get_clean();
}}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-chart","qantumthemes_chart_tracklist");
}


/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_qantumthemes_chart_tracklist' );
if(!function_exists('qantumthemes_vc_qantumthemes_chart_tracklist')){
function qantumthemes_vc_qantumthemes_chart_tracklist() {
  vc_map( array(
	 "name" => esc_html__( "Chart tracks", "onair2" ),
	 "base" => "qt-chart",
	 "icon" => get_template_directory_uri(). '/img/vc/radio-chart-track.png',
	 "description" => esc_html__( "Display the tracks of the latest chart or specify a chart by id.", "onair2" ),
	 "category" => esc_html__( "Theme shortcodes", "onair2"),
	 "params" => array(
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "ID", "onair2" ),
		   "description" => esc_html__( "Optional Chart ID, if not specified will always show the latest chart by menu order or publish date", "onair2" ),
		   "param_name" => "id",
		   'value' => ''
		),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Number of tracks (default: 100)", "onair2" ),
		   "description" => esc_html__( "Optional Chart ID, if not specified will always show the latest chart by menu order or publish date", "onair2" ),
		   "param_name" => "number",
		),
		array(
		   "type" => "checkbox",
		   "heading" => esc_html__( "Show chart title", "onair2" ),
		   "description" => esc_html__( "Display the title of the chart", "onair2" ),
		   "param_name" => "showtitle",
		),
		array(
		   "type" => "checkbox",
		   "heading" => esc_html__( "Featured image", "onair2" ),
		   "description" => esc_html__( "Display the image linked to the full chart", "onair2" ),
		   "param_name" => "showthumbnail",
		),
		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Chart style", "onair2" ),
		   "param_name" => "chartstyle",
		   'value' => array("chart-normal","chart-small"),
		   "description" => esc_html__( "Chart visualization style", "onair2" )
		)
	 )
  ) );
}}
