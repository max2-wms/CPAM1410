<?php
/*
Package: OnAir2
Description: Carousel of posts multi-column
Version: 1.2.1
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
if(!function_exists('qantumthemes_carousel_short')) {
	function qantumthemes_carousel_short($atts){


		
		/*
		 *	Defaults
		 * 	All parameters can be bypassed by same attribute in the shortcode
		 */
		extract( shortcode_atts( array(
			'id' => false,
			'quantity' => 6,
			'posttype' => 'post',
			'orderby' => false,
			'offset' => 0,
			'category' => false
			
		), $atts ) );


		if(!is_numeric($quantity)) {
			$quantyty = 6;
		}
		if(!is_numeric($offset)) {
			$offset = 0;
		}
		
		/**
		 *  Query for my content
		 */
		$args = array(
			'post_type' =>  $posttype,
			'posts_per_page' => $quantity,
			'post_status' => 'publish',
			'paged' => 1,
			'suppress_filters' => false,
			'offset' => esc_attr($offset),
			'ignore_sticky_posts' => 1
		);

	
		if($orderby){
			if($orderby == 'rand' || $orderby == 'ID' || $orderby == 'author' || $orderby == 'title' || $orderby == 'date' || $orderby == 'comment_count' || $orderby == 'menu_order' ) {
				$args[ 'orderby'] = esc_attr($orderby);
			}
		}

		/**
		 * Add category parameters to query if any is set
		 */
		if (false !== $category && 'all' !== $category) {

			if($category !== ''){
				$args[ 'tax_query'] = array(
	            		array(
	                    'taxonomy' => esc_attr( qantumthemes_get_type_taxonomy( $posttype ) ),
	                    'field' => 'slug',
	                    'terms' => array(esc_attr($category)),
	                    'operator'=> 'IN' //Or 'AND' or 'NOT IN'
	             	)
	            );
			}
		}

		if($posttype == 'event'){
			$args['orderby'] = 'meta_value';
            $args['order']   = 'ASC';
            $args['meta_key'] = 'eventdate';
            $args['suppress_filters'] = false;
			if(get_theme_mod( 'qt_events_hideold', 0 ) == '1'){
				$args['meta_query'] = array(
				array(
					'key' => 'eventdate',
					'value' => date('Y-m-d'),
					'compare' => '>=',
					'type' => 'date'
					 )
				);
			}
		}
		
		// ========== QUERY BY ID =================
		if($id){
			$idarr = explode(",",$id);
			if(count($idarr) > 0){
				$quantity = count($idarr);
				$args = array(
					'post__in'=> $idarr,
					'orderby' => 'post__in',
					'post_type' => $posttype,
					'posts_per_page' => -1,
					'ignore_sticky_posts' => 1
				);  
			}
		}
		// ========== QUERY BY ID END =================

		// echo '<pre>';
		// print_r($args);
		// echo '</pre>';

		/**
		 * [$wp_query execution of the query]
		 * @var WP_Query
		 */
		$wp_query = new WP_Query( $args );
		
		/**
		 * Output object start
		 */
		ob_start();
		// add http://php.net/manual/en/tidy.examples.basic.php
		if ( $wp_query->have_posts() ) : 
			$template_type = $posttype;
			if($posttype === 'post') {
				$template_type = 'post-vertical';
			}
			if($posttype === 'event') {
				$template_type = 'eventcard';
			}
		?>
			<!-- SLIDESHOW POST ================================================== -->
			<div class="qt-slickslider-container qt-slickslider-externalarrows">
				<div class="row">
					<div class="qt-slickslider qt-invisible qt-animated qt-slickslider-multiple" 
					data-slidestoshow="3" 
					data-variablewidth="false" 
					data-arrows="true" 
					data-dots="false" 
					data-infinite="true" 
					data-centermode="false" 
					data-pauseonhover="true" 
					data-autoplay="false" 
					data-arrowsmobile="false"  
					data-centermodemobile="true" 
					data-dotsmobile="false"  
					data-slidestoshowmobile="1" 
					data-variablewidthmobile="true" 
					data-infinitemobile="false">
						<?php
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$post = $wp_query->post;
						setup_postdata( $post );
						/**
						 *  WE HAVE TO USE THE ARCHIVE ITEM FOR EACH SPECIFIC POSTTYPE
						 */
						
						
						?>
							<div class="qt-item">
								<?php get_template_part (  'phpincludes/part-archive-item-'.$template_type); ?>
							</div>
						<?php endwhile;  ?>
					</div>
				</div>
			</div>
			<!-- SLIDESHOW PODCAST END ================================================== -->
		<?php else: 
			echo esc_attr__("Sorry, there is nothing for the moment.", "onair2"); ?>
		<?php  
		endif; 
		wp_reset_postdata();
		/**
		 * Loop end;
		 */
		
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-slideshow-carousel","qantumthemes_carousel_short");
}


/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_carousel_short' );
if(!function_exists('qantumthemes_vc_carousel_short')){
function qantumthemes_vc_carousel_short() {
  vc_map( array(
     "name" => esc_html__( "Post Carousel", "onair2" ),
     "base" => "qt-slideshow-carousel",
     "icon" => get_template_directory_uri(). '/img/vc/carousel.png',
     "description" => esc_html__( "Carousel of posts on 3 columns", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
     	array(
           "type" => "textfield",
           "heading" => esc_html__( "ID, comma separated list (123,345,7638)", "onair2" ),
           "description" => esc_html__( "Display only the contents with these IDs. All other parameters will be ignored.", "vlogger" ),
           "param_name" => "id",
           'value' => ''
        ),
      	array(
           "type" => "dropdown",
           "heading" => esc_html__( "Quantity", "onair2" ),
           "param_name" => "quantity",
           'value' => array("6", "9", "12", "15"),
           "description" => esc_html__( "Number of posts to display", "onair2" )
        ),
        array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by category (slug)", "onair2" ),
           "description" => esc_html__("Insert the slug of a category to filter the results","onair2"),
           "param_name" => "category"
        ),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Offset (number)", "onair2" ),
		   "description" => esc_html__("Number of posts to skip in the database query","onair2"),
		   "param_name" => "offset"
		),
		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Order by", "onair2" ),
		   "param_name" => "orderby",
		   'value' => array(__("Default", "onair2")=>"",
		   					__("Publish date", "onair2")=>"date",
		   					// __("Menu order", "onair2")=>"menu_order",
		   					__("Random", "onair2")=>"rand"
		   					),
		   "description" => esc_html__( "Change the order of the posts", "onair2" )
		)
     )
  ) );
}}



/**
 * ====================================================================================
 *
 *	PODCAST SHORTCODE
 *
 * ====================================================================================
 */


if(!function_exists('qantumthemes_podcastcarousel_short')) {
	function qantumthemes_podcastcarousel_short($atts){
		ob_start();
		extract( shortcode_atts( array(
			'quantity' => 6,
			'category' => false,
			'orderby' => false
			
		), $atts ) );
		echo do_shortcode('[qt-slideshow-carousel posttype="podcast" category="'.esc_attr($category).'" orderby="'.esc_attr($orderby).'" quantity="'.esc_attr($quantity).'"]' );
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-slideshow-podcastcarousel","qantumthemes_podcastcarousel_short");
}

if(!function_exists('qantumthemes_podcastcarousel_short')) {
	function qantumthemes_podcastcarousel_short($atts){
		ob_start();
		extract( shortcode_atts( array(
			'quantity' => 6,
			'category' => false,
			'orderby' => false
			
		), $atts ) );
		echo do_shortcode('[qt-slideshow-carousel posttype="podcast" category="'.esc_attr($category).'" orderby="'.esc_attr($orderby).'" quantity="'.esc_attr($quantity).'"]' );
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-slideshow-podcastcarousel","qantumthemes_podcastcarousel_short");
}
/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_podcastcarousel_short' );
if(!function_exists('qantumthemes_vc_podcastcarousel_short')){
function qantumthemes_vc_podcastcarousel_short() {
  vc_map( array(
     "name" => esc_html__( "Podcast Carousel", "onair2" ),
     "base" => "qt-slideshow-podcastcarousel",
     "icon" => get_template_directory_uri(). '/img/qt-logo.png',
     "description" => esc_html__( "Carousel of podcasts on 3 columns", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
     	

      	array(
           "type" => "dropdown",
           "heading" => esc_html__( "Quantity", "onair2" ),
           "param_name" => "quantity",
           'value' => array("6", "9", "12", "15"),
           "description" => esc_html__( "Number of posts to display", "onair2" )
        ),
        array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by category (slug)", "onair2" ),
           "description" => esc_html__("Insert the slug of a category to filter the results","onair2"),
           "param_name" => "category"
        ),
        array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Order by", "onair2" ),
		   "param_name" => "orderby",
		   'value' => array(__("Default", "onair2")=>"",
		   					__("Publish date", "onair2")=>"date",
		   					// __("Menu order", "onair2")=>"menu_order",
		   					__("Random", "onair2")=>"rand"
		   					),
		   "description" => esc_html__( "Change the order of the podcasts", "onair2" )
		)
     )
  ) );
}}



