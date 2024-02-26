<?php
/*
Package: OnAir2
Description: Carousel of posts multi-column
Version: 2.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
if(!function_exists('qantumthemes_carousel_short')) {
	function qantumthemes_carousel_short($atts){
		extract( shortcode_atts( array(
			'id' => false,
			'quantity' => 6,
			'posttype' => 'post',
			'orderby' => false,
			'order' => false,
			'offset' => 0,
			'category' => false,
			'category_exclude' => false,


			'onair_elementor' => false, // to know if is elementor widget
			'tax_filter' => false,
			'tax_filter_exc' => false,
			'items_per_page' => false,
			'include_by_id' => false,
			'hideold' => false,


			'items_per_row_desktop' => '3',
			'items_per_row_tablet' => '2',
			'items_per_row_mobile' => '1',

			'pause_on_hover' => 'true',
			'loop'=> 'true',
			'center' => 'true',
			'nav' => 'true',
			'dots' => 'dots',
			
		), $atts ) );


		if(!is_numeric($quantity)) {
			$quantyty = 6;
		}
		if(!is_numeric($offset)) {
			$offset = 0;
		}
		if($items_per_page){
			$quantity = $items_per_page;
		}

		if($include_by_id){
			$id = $include_by_id;
		}
		
		


		if( $id ){
			if(!is_array($id)){
				$id = explode(",",$id);
			} 
			if(count($id) > 0){
				$args = array(
					'post__in'=> $id,
					'post_type' => 'any',
					'orderby' => 'post__in',
					'posts_per_page' => -1,
					'ignore_sticky_posts' => 1
				);  
			}
		} else {

			/**
			 *  Query for my content
			 */
			$args = array(
				'post_type' => $posttype,
				'posts_per_page' => $quantity,
				'post_status' => 'publish',
				'paged' => 1,
				'suppress_filters' => false,
				'ignore_sticky_posts' => 1,
				'offset' => esc_attr($offset)
			);

			if($orderby){
				if($orderby == 'rand' || $orderby == 'ID' || $orderby == 'author' || $orderby == 'title' || $orderby == 'date' || $orderby == 'comment_count' || $orderby == 'menu_order' ) {
					$args[ 'orderby'] = esc_attr($orderby);
				}
			}
			if($order){
				if($order == 'ASC' || $order == 'DESC'){
					$args[ 'order'] = esc_attr($order);
				} 
			}

			/**
			 * Add category parameters to query if any is set
			 */
			$args[ 'tax_query'] = array();
			if (false !== $category && 'all' !== $category && '' !== $category) {
				$args[ 'tax_query'][] =	array(					
						'taxonomy' => esc_attr( qantumthemes_get_type_taxonomy( $posttype ) ),
						'field' => 'slug',
						'terms' => explode(',', esc_attr(trim($category))),
						'operator'=> 'IN' //Or 'AND' or 'NOT IN'
					);
			}

			/**
			 * Exclude category
			 */
			if (false !== $category_exclude ) {
				$args[ 'tax_query']['relation'] = 'AND';
				$args[ 'tax_query'][] =	array(
					'taxonomy' => esc_attr( qantumthemes_get_type_taxonomy( $posttype ) ),
					'field' => 'slug',
					'terms' =>  explode(',', esc_attr(trim($category_exclude))),
					'operator'=> 'NOT IN' //Or 'AND' or 'NOT IN'
				);
			}


			if($posttype == 'event'){

				$args['orderby'] = 'meta_value';
            $args['order']   = 'ASC';
            $args['meta_key'] = 'eventdate';
            $args['suppress_filters'] = false;

				if( ( $onair_elementor && $hideold ) || ( !$onair_elementor && get_theme_mod( 'qt_events_hideold', 0 ) == '1'  ) ){
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

			// Elementor version
			if( $tax_filter || $tax_filter_exc ){
				$tax_filter_array = explode(',', trim($tax_filter) );
				$tax_atts = array();
				$tax_query = array(
					'relation' => 'AND'
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

				/**
				 * @since 1.7.0.2
				 * Exclude taxonomy
				 * ================================================================================================================================
				 **/

				if( $tax_filter_exc  ){
					$tax_filter_array_exc = explode(',', trim($tax_filter_exc) );
					$tax_atts_exc = array();
					foreach( $tax_filter_array_exc as $var => $val){
						$tax = explode(':', $val);
						if( array_key_exists(1, $tax)){
							$tax_atts_exc[ trim( $tax[0] ) ] [] = trim( $tax[1] );
						}
					}
					foreach( $tax_atts_exc as $taxname => $termslist ){
						$tax_query[] = array(
							'taxonomy' 	=> trim( $taxname ),
							'field' 	=> 'slug',
							'terms'		=> $termslist,
							'operator'	=> 'NOT IN'
						);
					}
				}
				$args[ 'tax_query'] = $tax_query;
			}

		}
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
			if($posttype === 'chart') {
				$template_type = 'chart';
			}
			if($posttype === 'members') {
				$template_type = 'members';
			}
			if($posttype === 'podcast') {
				$template_type = 'podcast';
			}
			if($posttype === 'qtvideo') {
				$template_type = 'qtvideo';
			}
		?>
			<!-- SLIDESHOW POST ================================================== -->
			<div class="qt-slickslider-container qt-slickslider-carousel qt-slickslider-externalarrows">
				<div class="row">
					<div class="qt-slickslider qt-invisible qt-animated qt-slickslider-multiple" 
					data-slidestoshow="<?php echo esc_attr( $items_per_row_desktop ); ?>" 
					data-slidestoshowipad="<?php echo esc_attr( $items_per_row_tablet ); ?>" 
					data-slidestoshowmobile="<?php echo esc_attr( $items_per_row_mobile ); ?>" 
					data-variablewidth="false" 
					data-arrows="<?php echo esc_attr( $nav ); ?>" 
					data-dots="<?php echo esc_attr( $dots ); ?>" 
					data-infinite="<?php echo esc_attr( $loop ); ?>" 
					data-centermode="<?php echo esc_attr( $center ); ?>" 
					data-pauseonhover="<?php echo esc_attr( $pause_on_hover ); ?>" 
					data-autoplay="false" 
					data-arrowsmobile="false"  
					data-centermodemobile="true" 
					data-dotsmobile="false"
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



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_podcastcarousel_short' );
if(!function_exists('qantumthemes_vc_podcastcarousel_short')){
function qantumthemes_vc_podcastcarousel_short() {
  vc_map( array(
     "name" => esc_html__( "Podcast Carousel", "onair2" ),
     "base" => "qt-slideshow-podcastcarousel",
     "icon" => get_template_directory_uri(). '/img/vc/carousel.png',
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




/**
 * ====================================================================================
 *
 *	PODCAST SHORTCODE
 *
 * ====================================================================================
 */


if(!function_exists('qantumthemes_teamcarousel_short')) {
	if(function_exists('ttg_custom_shortcode')) {
		ttg_custom_shortcode("qt-slideshow-teamcarousel","qantumthemes_teamcarousel_short");
	}

	function qantumthemes_teamcarousel_short($atts){
		ob_start();
		extract( shortcode_atts( array(
			'quantity' => 6,
			'category' => false,
			'orderby' => false
			
		), $atts ) );
		echo do_shortcode('[qt-slideshow-carousel posttype="members" category="'.esc_attr($category).'" orderby="'.esc_attr($orderby).'" quantity="'.esc_attr($quantity).'"]' );
		return ob_get_clean();
	}




	/**
	 *  Visual Composer integration
	 */

	if(!function_exists('qantumthemes_teamcarousel_short_vc')){
		add_action( 'vc_before_init', 'qantumthemes_teamcarousel_short_vc' );
		function qantumthemes_teamcarousel_short_vc() {
		  vc_map( array(
		     "name" => esc_html__( "Team Carousel", "onair2" ),
		     "base" => "qt-slideshow-teamcarousel",
		     "icon" => get_template_directory_uri(). '/img/vc/carousel.png',
		     "description" => esc_html__( "Carousel of team members", "onair2" ),
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
				   					__("Menu order", "onair2")=>"menu_order",
				   					__("Random", "onair2")=>"rand"
				   					),
				   "description" => esc_html__( "Change the order of the podcasts", "onair2" )
				)
		     )
		  ) );
		}
	}
}


