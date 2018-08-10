<?php
/*
Package: OnAir2
Description: Header template for NORML PAGES
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
$hidetitle = qantumthemes_hide_title(get_the_ID());
if($hidetitle == 0){
?>
<!-- HEADER CAPTION ========================= -->
<div class="qt-pageheader qt-negative">
	<div class="qt-container qt-center">

			<?php  


			/**
			 * ===========================================================================
			 * Radio logo (since v 3.0)
			 * =========================================================================== 
			*/
			$customlogo = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'qt_header_logo', true ),'full');
			if($customlogo) {
				?>
				<img src="<?php echo esc_url($customlogo[0]); ?>" alt="" class="qt-spacer-s qt-center">
				<?php
			} else {
				?>
				<h1 class="qt-caption qt-spacer-s qt-center"><?php the_title(); ?></h1>
				<?php 
			}


			/**
			 * ===========================================================================
			 * New since 3.1.0
			 * Allow auto channel switch (js controlled)
			 * ===========================================================================
			 */
			$auto_switch = get_theme_mod( 'qt_radiochannel_autoselect' );
			if($auto_switch) {
				
				/**
				 * [$bgurl Array with url and sizes of the picture]
				 * @var array
				 */
				global $post;
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
				<p class="qt-spacer-m">
					<a id="<?php echo esc_attr($first); ?>" href="#!" class="qt-btn qt-btn-primary qt-btn-l qt-btn-play-round qt-autoselect-channel" 
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
						<i class="dripicons-media-play"></i>
					</a>
				</p>
				<?php 

			}
			
			?>
	</div>
	<?php get_template_part('phpincludes/part-background-image-header' ); ?>
</div>
<!-- HEADER CAPTION END ========================= -->
<?php } ?>