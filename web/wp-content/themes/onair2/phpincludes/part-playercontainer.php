<?php
/*
Package: OnAir2
Description: PLAYER 
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- PLAYER ========================= -->

<?php  
/**
 * [$args Query arguments]
 * @var array
 */
$args = array(
	'post_type' => 'radiochannel',
	'posts_per_page' => 1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'paged' => 1
);
/**
 * [$wp_query execution of the query]
 * @var WP_Query
 */
$wp_query = new WP_Query( $args );
if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
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
	?>
	
	<div id="qtplayercontainer" data-playervolume="true" data-accentcolor="<?php echo esc_attr(get_theme_mod( 'qt_color_accent', "#dd0e34")); ?>" data-accentcolordark="<?php echo esc_attr(get_theme_mod( 'qt_color_accent_hover', "#dd0e34")); ?>" data-textcolor="#ffffff" data-soundmanagerurl="<?php echo get_template_directory_uri(); ?>/components/soundmanager/swf/" 
		class="qt-playercontainer qt-playervolume qt-clearfix qt-content-primary<?php echo ( get_theme_mod( 'qt_playerbar_version', '1' ) == '2') ? 'dark' : ''; ?>">
		<div class="qt-playercontainer-content qt-vertical-padding-m">

			<?php if ( get_theme_mod('qt_display_radioname') == '1' ){ ?>
			<div class="qt-playercontainer-header">
				<div class="qt-vc">
					<div class="qt-vi">
						<h3 id="qtradiotitle" class="qt-text-shadow qt-spacer-s" ><?php the_title(); ?></h3>
						<h4 id="qtradiosubtitle" class="qt-thin qt-text-shadow small"><?php echo esc_attr((get_post_meta( $post->ID, "qt_radio_subtitle", true ))); ?></h4>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<div class="qt-playercontainer-musicplayer" id="qtmusicplayer">
				<div class="qt-musicplayer">
					<div class="ui360 ui360-vis qt-ui360">
						<a id="playerlink" href="<?php echo esc_attr(get_post_meta( $post->ID, "mp3_stream_url", true )); ?>"></a>
					</div>
				</div>
			</div>
			<div id="qtPlayerTrackInfo" class="qt-playercontainer-data qt-container qt-text-shadow small">
				<div class="qt-vc">
					<div class="qt-vi">
						<h6 class="qt-inline-textdeco">
							<span><?php esc_html_e("Current track", 'onair2'); ?></span>
						</h6>
						<div class="qt-t qt-current-track">
							<h5 id="qtFeedPlayerTrack"><?php esc_html_e("Title", 'onair2'); ?></h5>
							<h6  class="qt-small" id="qtFeedPlayerAuthor"><?php esc_html_e("Artist", 'onair2'); ?></h6>
						</div>
						<hr class="qt-inline-textdeco">
					</div>
				</div>
			</div>




			<div class="qt-playercontainer-ads-mobile">
				<?php qantumthemes_ads_display('qt_playerbar_ads_mobile'); ?>
			</div>
			<div class="qt-playercontainer-ads-desktop">
				<?php qantumthemes_ads_display('qt_playerbar_ads_desktop'); ?>
			</div>
		
			<?php  
			/**
			 * Channels list button
			 */
			if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){
				?>
				<div class="qt-playercontainer-dropdown">
					<?php  
					$args = array(
						'post_type' => 'radiochannel',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'post_status' => 'publish',
						'suppress_filters' => false,
						'paged' => 1
					);
					$wp_query_radios = new WP_Query( $args );
					$radio_count = $wp_query_radios->post_count;
					if($radio_count > 1){
						?>
						<a class="qt-btn qt-btn qt-btn-secondary" data-qtswitch="open" data-target="#qtchannelslistcontainer"><?php esc_html_e("Channels"); ?><i class="dripicons-chevron-down"></i></a>
						<?php  
						}
					wp_reset_postdata();
					?>
				</div>
				<?php
			}
			?>

		</div>

		<?php
		/**
		 * Dynamic radio channel background
		 */
		if($bg_id){ 
			?>
				<div id="playerimage" class="qt-header-bg" data-bgimage="<?php echo esc_url($bgurl[0]); ?>">
				   <?php if($logo != '') { ?> <img src="<?php echo esc_url($logo[0]); ?>" alt="Background" width="<?php echo esc_attr($logo[1]); ?>" height="<?php echo esc_attr($logo[2]); ?>"><?php } ?>
				</div>
			<?php 
		} 
		?>


	</div>
	<!-- this is for xml radio feed -->
	<div id="qtShoutcastFeedData" class="hidden" data-style="" data-channel="1" data-useproxy="<?php echo esc_attr( get_theme_mod( "qt_use_proxy" ) ); ?>"data-icecasturl="<?php echo esc_attr(get_post_meta( $post->ID, "qticecasturl", true )); ?>" 
		data-icecastmountpoint="<?php echo esc_attr(get_post_meta( $post->ID, "qticecastMountpoint", true )); ?>" 
		data-icecastchannel="<?php echo esc_attr(get_post_meta( $post->ID, "qticecastChannel", true )); ?>" 
		data-radiodotco="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiodotco", true )); ?>" data-airtime="<?php echo esc_attr(get_post_meta( $post->ID, "qtairtime", true )); ?>" data-radionomy="<?php echo esc_url(get_post_meta( $post->ID, "qtradionomy", true )); ?>" data-textfeed="<?php echo esc_url(get_post_meta( $post->ID, "qttextfeed", true )); ?>" data-host="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedHost", true )); ?>" data-port="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedPort", true )); ?>" data-channel="<?php echo esc_attr(get_post_meta( $post->ID, "qtradiofeedChannel", true )); ?>"></div>
	<?php
endwhile; else: ?>
	<?php echo esc_attr__("[There are no radio stations in the database]","onair2"); ?>
<?php 
endif;
wp_reset_postdata();
?>



<!-- PLAYER END ========================= -->
