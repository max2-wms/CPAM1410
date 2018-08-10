<?php
/*
Package: OnAir2
Description: List of radio channels
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
wp_reset_query();

?>
<!-- CHANNELS LIST ========================= -->
<div id="qtchannelslistcontainer" class="qt-part-channels-list qt-content-primary">
	<ul id="qtchannelslist" class="qt-content-aside qt-channelslist qt-negative">
		<?php  
		
		$first = '';
		if(get_theme_mod("qt_autoplay", "0" )){
			$first = "qtfirstchannel";
		}

		if(get_page_template_slug(  get_the_ID() ) == 'page-popup.php'){
			if(get_theme_mod("qt_autoplay_on_popup", "0" )){
				$first = "qtfirstchannel";
			}
		}



		/**
		 * [$args Query arguments]
		 * @var array
		 */
		$args = array(
			'post_type' => 'radiochannel',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_status' => 'publish',
			'suppress_filters' => false,
			'paged' => 1
		);
		
		
		/**
		 * [$wp_query_channelslist execution of the query]
		 * @var WP_Query
		 */
		$wp_query_channelslist = new WP_Query( $args );


		if ( $wp_query_channelslist->have_posts() ) : while ( $wp_query_channelslist->have_posts() ) : $wp_query_channelslist->the_post();
			setup_postdata( $post );

			/**
			 * [$bgurl Array with url and sizes of the picture]
			 * @var array
			 */
			$bgurl = '';
			$bg_id = get_post_meta( $post->ID, "qt_radio_background", true );
			if($bg_id){
				$bgurl = wp_get_attachment_image_src($bg_id,'full');
			}

			/**
			 * [$bgurl Array with url and sizes of the logo]
			 * @var array
			 */
			$logo = '';
			$logo_id = get_post_meta( $post->ID, "qt_radio_logo", true );
			if($logo_id){
				$logo = wp_get_attachment_image_src($logo_id,'qantumthemes-thumb-squared');
			}
			$id = $post->ID;
			?>
			<li class="qt-channel">
				<a id="<?php echo esc_attr($first); ?>" href="#!" class="qt-ellipsis" 
					data-title="<?php echo addslashes(get_the_title()); ?>" 
					data-subtitle="<?php echo esc_attr((get_post_meta( $post->ID, "qt_radio_subtitle", true ))); ?>" 
					<?php if(is_array($bgurl)) { ?>data-background="<?php echo esc_url($bgurl[0]); ?>"<?php } ?>
					data-logo="<?php echo esc_attr(get_post_meta( $post->ID, "qt_radio_logo", true )); ?>" 
					data-playtrack="<?php echo esc_attr(get_post_meta( $post->ID, "mp3_stream_url", true )); ?>"
					data-host="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedHost", true )); ?>"
					data-port="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedPort", true )); ?>"
					data-channel="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedChannel", true )); ?>"
					data-icecasturl="<?php echo esc_attr(get_post_meta( $post->ID, "qticecasturl", true )); ?>" 
					data-icecastmountpoint="<?php echo esc_attr(get_post_meta( $post->ID, "qticecastMountpoint", true )); ?>" 
					data-icecastchannel="<?php echo esc_attr(get_post_meta( $post->ID, "qticecastChannel", true )); ?>" 
					data-radiodotco="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiodotco", true )); ?>" 
					data-airtime="<?php echo esc_attr(get_post_meta( $post->ID, "qtairtime", true )); ?>" 
					data-radionomy="<?php echo esc_url(get_post_meta( $post->ID, "qtradionomy", true )); ?>" 
					data-textfeed="<?php echo esc_url(get_post_meta( $post->ID, "qttextfeed", true )); ?>"
					data-stats_path=""
					data-played_path=""
					data-channel="">
					<?php if ($logo){ ?>
						<img src="<?php echo esc_url($logo[0]); ?>" class="qt-radiologo dripicons-media-play" alt="<?php echo esc_attr__("logo","onair2"); ?>" width="<?php echo esc_attr($logo[1]); ?>" height="<?php echo esc_attr($logo[2]); ?>">
					<?php } ?>
					<i class="dripicons-media-play"></i>
					<?php the_title(); ?>
				</a>

			</li>
			<?php
			$first = "";
		endwhile; else: ?>
			<!-- No channels in database -->
		<?php 
		endif;
		wp_reset_postdata();
		// wp_reset_query();
		?>
		
	</ul>
</div>
<!-- CHANNELS LIST END ========================= -->
