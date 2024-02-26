<?php  
/*
Package: onair2
Description: Sponsors shortcode
*/

/**
 * 
 * Sponsors
 * =============================================
 */
if(!function_exists('qantumthemes_sponsors_shortcode')){
	function qantumthemes_sponsors_shortcode ($atts){
		extract( shortcode_atts( array(
			'include_by_id' => false,
			'e_include_by_id' => false,
			'randomizer' => false,
			'fx' => false,
			'class' => '',

			'items_per_row_desktop' => '6',
			'items_per_row_tablet' => '3',
			'items_per_row_mobile' => '1',

			'pause_on_hover' => 'true',
			'loop'=> 'true',
			'center' => 'true',
			'nav' => 'true',
			'dots' => 'dots',

		), $atts ) );

		ob_start();

	

	
		/**
	   * [$args Query arguments]
	   * @var array
	   */
	  

	  $args = array(
	      'post_type' => 'qtsponsor',
	      'posts_per_page' => -1,
	      'post_status' => 'publish',
	      'orderby' => array ( 'menu_order' => 'ASC', 'date' => 'DESC'),
	      'suppress_filters' => false,
	      'paged' => 1
	  );

       

         // ========== QUERY BY ID =================
		if($include_by_id || $e_include_by_id){

			if($include_by_id){
				$idarr = explode(",",$include_by_id);
			} else {
				$idarr = $e_include_by_id;
			}
			if(count($idarr) > 0){
				$quantity = count($idarr);

				$args = array(
					'post__in'=> $idarr,
					'post_type' =>  'qtsponsor',
					'orderby' => 'post__in',
					'posts_per_page' => $quantity,
					'ignore_sticky_posts' => 1
				);  
			}
		}

		 if($randomizer){
        	$args['orderby'] = 'rand';
        }
        
		// ========== QUERY BY ID END =================
		// 
        /**
         * [$wp_query execution of the query]
         * @var WP_Query
         */
        $wp_query = new WP_Query( $args );


		ob_start();



		?>
		<!-- SLIDESHOW SPONSORS ================================================== -->
		<div class="<?php if($fx){  ?>qt-sponsor-fx<?php } ?> <?php echo esc_attr($class); ?>">
		    <div class="qt-slickslider-container qt-slickslider-externalarrows qt-slickslider-fullscreen">
		        <div class="row">
		            <div class="qt-slickslider qt-slickslider-multiple qt-text-shadow " 
		           	data-slidestoshow="<?php echo esc_attr( $items_per_row_desktop ); ?>" 
								data-slidestoshowipad="<?php echo esc_attr( $items_per_row_tablet ); ?>" 
								data-slidestoshowmobile="<?php echo esc_attr( $items_per_row_mobile ); ?>" 
								data-variablewidth="false" 
								data-arrows="<?php echo esc_attr( $nav ); ?>" 
								data-dots="<?php echo esc_attr( $dots ); ?>" 
								data-infinite="<?php echo esc_attr( $loop ); ?>" 
								data-centermode="<?php echo esc_attr( $center ); ?>" 
								data-pauseonhover="<?php echo esc_attr( $pause_on_hover ); ?>" 

		            data-autoplay="true" data-arrowsmobile="false"  
		            data-centermodemobile="true" data-dotsmobile="false"  
		            data-slidestoshowmobile="1" data-variablewidthmobile="true" 
		            data-infinitemobile="false">
		                <?php  

		                if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
		                    if (has_post_thumbnail()){ ?>
		                    <div class="qt-item">
		                        <a href="<?php echo esc_attr(get_post_meta(get_the_ID(), "linkurl", true)); ?>" target="_blank" rel="nofollow" class="qt-sponsor" >
		                             <?php the_post_thumbnail( 'full',  array( 'title' => get_the_title(), 'alt' => get_the_title() ) ); ?>
		                        </a>
		                    </div>
		                    <?php 
		                    } 
		                endwhile; endif;
		                wp_reset_postdata();
		                ?>            
		            </div>
		        </div>
		    </div>
		    <hr class="qt-spacer-s">
		</div>
		 <!-- SLIDESHOW SPONSORS END ================================================== -->
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-sponsors","qantumthemes_sponsors_shortcode");
}

/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_sponsors_shortcode' );
if(!function_exists('qantumthemes_vc_sponsors_shortcode')){
function qantumthemes_vc_sponsors_shortcode() {
  vc_map( array(
	"name" => esc_html__( "Sponsor carousel", "onair2" ),
	"base" => "qt-sponsors",
	"icon" => get_template_directory_uri(). '/img/qt-logo.png',
	"description" => esc_html__( "Add a sponsors carousel", "onair2" ),
	"category" => esc_html__( "Theme shortcodes", "onair2"),
	"params" => array(
			array(
				'type' => 'checkbox',
				'heading' => esc_attr__('Add saturation effect', 'onair2'),
				'param_name' => 'fx',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_attr__('Random ordering', 'onair2'),
				'param_name' => 'randomizer',
			),
			array(
			   "type" => "textfield",
			   "heading" => esc_html__( "Sponsors by ID", "onair2" ),
			   "param_name" => "include_by_id"
			),
			array(
				'type' => 'textfield',
				'value' => '',
				'heading' => esc_attr__('CSS Class', 'onair2'),
				'param_name' => 'class',
			),

		)
  	));
}}
