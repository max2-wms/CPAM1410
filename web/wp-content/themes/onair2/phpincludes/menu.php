<?php
/*
Package: OnAir2
Description: Menu and mobile menu
Version: 3.0.2
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>

<div class="qt-main-menubar" data-0="@class:qt-main-menubar">
	
	<?php  
	/**
	*
	*  Top menu
	* 
	*/
	if ( has_nav_menu( 'secondary' ) ) {
	?>
		<div class="qt-menubar-top qt-content-primary hide-on-large-and-down">
			<ul>
				<?php  
					wp_nav_menu( array(
						'theme_location' => 'secondary',
						'depth' => 1,
						'container' => false,
						'link_before' => '<i class="dripicons-chevron-right"></i>',
						'items_wrap' => '%3$s'
					) );
				?>
				<?php get_template_part("phpincludes/part","social"); ?>
			</ul>
		</div>
	<?php } ?> 


	<!-- QT MENUBAR  ================================ -->
	<nav id="qtmainmenucontainer" class="qt-menubar nav-wrapper qt-content-primary">
		<!-- desktop menu  HIDDEN IN MOBILE AND TABLETS -->
		<ul class="qt-desktopmenu hide-on-xl-and-down">
			<li class="qt-logo-link">
				<a href="<?php echo esc_url(get_home_url("/")); ?>" class="brand-logo qt-logo-text">
					<?php
					/**
					 * 
					 *
					 *  Logo or title
					 * 
					 */
					
					$logo = get_theme_mod("qt_logo_header","");
					if($logo != ''){
						echo '<img src="'.esc_attr($logo).'" alt="'.esc_attr__("Home","onair2").'">';
					}else{
						echo get_bloginfo('name');
					}
					?>
				</a>
			</li>

			<?php
			/**
			* 
			*
			*  Primary menu
			* 
			*/
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'depth' => 2,
					'container' => false,
					'items_wrap' => '%3$s'
				));
			}
			?> 


			<?php 
			/**
			 * Search
			 */
			if(get_theme_mod( 'qt_headerbutton_search', '0' )){?> 
			<li class="right qt-menu-btn">
				<a href="#" data-expandable="#qtsearchbar" class="qt-scrolltop">
					<i class="icon dripicons-search"></i>
				</a>
			</li>
			<?php } ?>
			

			 <?php 
			/**
			 * Popup
			 */
			
			$button_label_pop = get_theme_mod( 'qt_popup_label', 'Popup' );
			if($button_label_pop !== ''){
				$button_label_pop = ' '.$button_label_pop;

			}
			if( get_theme_mod('qt_popup_url', '') !== '' && get_theme_mod( 'qt_headerbutton_popup', '0' )){
			?>
				<li class="right qt-menu-btn">
					<a href="<?php echo esc_url( get_theme_mod('qt_popup_url', '') ); ?>" class="qt-popupwindow noajax" data-name="<?php echo esc_attr($button_label_pop); ?>" data-width="320" data-height="500">
						<i class="icon dripicons-duplicate"></i><?php echo esc_html($button_label_pop); ?>
					</a>
				</li>
			<?php  }  ?>

			<?php 
			/**
			 * Listen
			 */
			
			$button_label = get_theme_mod( 'qt_playerswitch_label', 'Listen' );
				
				
			if($button_label !== ''){
				$button_label = ' '.$button_label;
			}

			

			

			
			




			if(get_theme_mod( 'qt_headerbutton_listen', '0' )){
				if(get_theme_mod( 'qt_playerbar_version', '1' ) === '3'  ){ 

					get_template_part('phpincludes/menu-play-btn');

				} else if(get_theme_mod( 'qt_playerbar_version', '1' ) === '1'  ){ ?>
					<li class="right qt-menu-btn">
						<a  href="#" class="button-playlistswitch qtlistenbutton qt-header-play-btn" data-activates="channelslist">
							<i class="icon dripicons-media-play"></i><?php echo esc_attr($button_label); ?>
						</a>
						<?php if(get_theme_mod( 'qt_playerswitch', '0' ) && get_theme_mod("qt_autoplay", "0" )){  ?>
						<ul class="sub-menu">
							<li id="qtpausebtn" class="menu-item"><a href="#"><i class="dripicons-media-pause"></i> <span class="pause"><?php esc_html_e("Pause", "onair2") ?></span><span class="play"><?php esc_html_e("Resume", "onair2") ?></span></a></li>
						</ul>
						<?php  }  ?>
					</li>
				<?php  } else { ?>
					<li class="right qt-menu-btn">
						<a  href="#" class="qt-openplayerbar qt-header-play-btn"  data-qtswitch="contractplayer" data-target="#qtplayercontainer" >
							<i class="icon dripicons-media-play"></i><?php echo esc_attr__($button_label); ?>
						</a>
						<?php if(get_theme_mod( 'qt_playerswitch', '0' ) && get_theme_mod("qt_autoplay", "0" )){  ?>
						<ul class="sub-menu">
							<li id="qtpausebtn" class="menu-item"><a href="#"><i class="dripicons-media-pause"></i> <span class="pause"><?php esc_html_e("Pause", "onair2") ?></span><span class="play"><?php esc_html_e("Resume", "onair2") ?></span></a></li>
						</ul>
						<?php  }  ?>
					</li>
				<?php 
				} 

			}

			if(get_theme_mod( 'qt_songinfo_menu' )){
				?>
				<li class="right qt-compact-player">
					<?php  
					if( get_theme_mod( 'qt_playerbar_artwork' )  ){
						?>
						<div class="onair-artwork">
							<a class="onair-inline onair-elementor--artwork__img " href="#">
							
							</a>
						</div>
						<?php 
					}
					if( get_theme_mod( 'qt_playerbar_title' )  ){
						?>
						<p><span class="qtFeedPlayerTrack">Loading title</span><span class="qtFeedPlayerAuthor ">Loading artist</span></p>
						<?php 
					}
					?>
				</li>
				<?php  
			}
			?>


		</ul>
		
		<!-- mobile menu icon and logo VISIBLE ONLY TABLET AND MOBILE-->
		<ul class="qt-desktopmenu qt-mobilemenubar hide-on-xl-only ">
			<li>
				<a href="#" data-activates="qt-mobile-menu" class="button-collapse qt-menu-switch qt-btn qt-btn-primary qt-btn-m">
					<i class="dripicons-menu"></i>
				</a>
			</li>
			<li>
				<a href="<?php echo esc_url(get_home_url("/")); ?>" class="brand-logo qt-logo-text">
					<?php
					/**
					 *
					 *  Logo or title
					 * 
					 */
					$logo = get_theme_mod("qt_logo_header","");
					if($logo != ''){
						echo '<img src="'.esc_attr($logo).'" alt="'.esc_attr__("Home","onair2").'">';
					}else{
						echo get_bloginfo('name');
					}
					?>
				</a>
			</li>
			<?php
			if(get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
				<li class="qt-rightbutton">
					<a href="#" class="qt-openplayerbar qt-btn qt-btn-primary qt-btn-m">
						<i class="dripicons-media-play"></i>
					</a>
				</li>
			<?php 
			} else if( get_theme_mod( 'qt_playerbar_version', '1' ) === '3'){ 
				get_template_part('phpincludes/menu-play-btn-mobile'); 
			} 
			?>
		</ul>
	</nav>
	<?php  
		get_template_part('phpincludes/part-player-headerbar');
	?>
</div>

<!-- mobile menu -->
<div id="qt-mobile-menu" class="side-nav qt-content-primary">
	 <ul class=" qt-side-nav">
		<?php
		/**
		*
		*  Mobile menu
		* 
		*/
		if ( has_nav_menu( 'mobile' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'mobile',
				'depth' => 2,
				'container' => false,
				'items_wrap' => '%3$s'
			) );
		} else {
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'depth' => 2,
					'container' => false,
					'items_wrap' => '%3$s'
				) );
			}
		}
		?>
	</ul>
</div>

<!-- mobile toolbar -->
<ul class="qt-mobile-toolbar qt-content-primary-dark qt-content-aside hide-on-xl-only">
	
	<?php 
	/**
	 * Search
	 */
	if(get_theme_mod( 'qt_headerbutton_search', '0' )){?> 
	<li><a href="#" data-expandable="#qtsearchbar" class="qt-scrolltop"><i class="icon dripicons-search"></i></a></li>
	<?php } ?>


	<?php 
	/**
	 * Popup
	 */
	if( get_theme_mod('qt_popup_url', '') !== '' && get_theme_mod( 'qt_headerbutton_popup', '0' )){
	?>
		<li><a href="<?php echo esc_url( get_theme_mod('qt_popup_url', '') ); ?>" class="qt-popupwindow noajax" data-name="<?php echo esc_attr__("Music Player", "onair2");?>" data-width="320" data-height="500"><i class="icon dripicons-duplicate"></i></a></li>
	<?php } ?>

	<?php 
	/**
	 * Listen
	 */
	if(get_theme_mod( 'qt_headerbutton_listen', '0' ) ){?>
	<li>
		<?php if(get_theme_mod( 'qt_playerbar_version', '1' ) === '1'){ ?>
			<a href="#" class="button-playlistswitch qtlistenbutton" data-activates="channelslist"><i class="icon dripicons-media-play"></i></a>
		<?php } else { ?>
			<a href="#" class="qt-openplayerbar"><i class="icon dripicons-media-play"></i></a>
		<?php } ?>
	</li>
	<?php } ?>

</ul>