<?php
/*
Package: OnAir2
Description: Menu and mobile menu
Version: 3.0.2
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

?>
<li class="right qt-menu-btn">
	<a  href="#" class="qt-header-play-btn"
	<?php  
		$args = array(
			'post_type' => 'radiochannel',
			'posts_per_page' => 1,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
		$wp_query_channelslist = new WP_Query( $args );
		if ( $wp_query_channelslist->have_posts() ) : while ( $wp_query_channelslist->have_posts() ) : $wp_query_channelslist->the_post();
			$post = $wp_query_channelslist->post;
			setup_postdata( $post );
			$bgurl = '';
			$bg_id = get_post_meta( $post->ID, "qt_radio_background", true );
			if($bg_id){
				$bgurl = wp_get_attachment_image_src($bg_id,'full');
			}
			$logo = '';
			$logo_id = get_post_meta( $post->ID, "qt_radio_logo", true );
			if($logo_id){
				$logo = wp_get_attachment_image_src($logo_id,'qantumthemes-thumb-squared');
			}
			$id = $post->ID;
			?>
					data-title="<?php echo addslashes(get_the_title()); ?>" 
					data-subtitle="<?php echo esc_attr((get_post_meta( $post->ID, "qt_radio_subtitle", true ))); ?>" 
					<?php if(is_array($bgurl)) { ?>data-background="<?php echo esc_url($bgurl[0]); ?>"<?php } ?>
					data-logo="<?php echo esc_attr(get_post_meta( $post->ID, "qt_radio_logo", true )); ?>" 
					data-playtrack="<?php echo esc_attr(get_post_meta( $post->ID, "mp3_stream_url", true )); ?>"
					data-qtradioid="<?php echo esc_attr( $post->ID ); ?>"
					data-icymetadata="<?php echo esc_attr(get_post_meta( $post->ID, "icymetadata", true )); ?>"
					data-host="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedHost", true )); ?>"
					data-port="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedPort", true )); ?>"
					data-channel="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedChannel", true )); ?>"
					data-protocol="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedProtocol", true )); ?>"
					data-icecasturl="<?php echo esc_attr(get_post_meta( $post->ID, "qticecasturl", true )); ?>" 
					data-icecastmountpoint="<?php echo esc_attr(get_post_meta( $post->ID, "qticecastMountpoint", true )); ?>" 
					data-icecastchannel="<?php echo esc_attr(get_post_meta( $post->ID, "qticecastChannel", true )); ?>" 
					data-radiodotco="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiodotco", true )); ?>" 
					data-airtime="<?php echo esc_attr(get_post_meta( $post->ID, "qtairtime", true )); ?>" 
					data-radionomy="<?php echo esc_url(get_post_meta( $post->ID, "qtradionomy", true )); ?>" 
					data-live365="<?php echo esc_attr(get_post_meta( $post->ID, "qtlive365", true )); ?>"
					data-securesystems="<?php echo esc_attr(get_post_meta( $post->ID, "qtSecuresystems", true )); ?>"
					data-mediacp="<?php echo esc_attr(get_post_meta( $post->ID, "qtMediaCP", true )); ?>"
					data-winmedia="<?php echo esc_attr(get_post_meta( $post->ID, "qtWinMedia", true )); ?>"
					data-textfeed="<?php echo esc_url(get_post_meta( $post->ID, "qttextfeed", true )); ?>"
					data-jazler="<?php echo esc_url(get_post_meta( $post->ID, "qtjazler", true )); ?>"
					data-stats_path=""
					data-played_path=""
					data-channel=""
			<?php
			$first = "";
		endwhile; 
		endif;


	?>>
		<i class="icon dripicons-media-play"></i>
	</a>
	
</li>
