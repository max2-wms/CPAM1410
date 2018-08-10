<?php
/*
Package: OnAir2
Description: 404 page not found
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
/**
 * [$paged current paged number]
 * @var [int]
 */
$paged = qantumthemes_get_paged();
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
?>
<?php get_header(); ?> 
	<?php  
	get_template_part ('phpincludes/menu');
	get_template_part ('phpincludes/part-searchbar'); 
	?>
	<div id="maincontent" class="qt-main qt-404">
		<?php 
		/**
		 * From V 2.5
		 */
		if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
			<hr class="qt-header-player-spacer">
		<?php } ?>
		<!-- ======================= CONTENT SECTION ======================= -->
		<!-- HEADER CONTACTS ========================= -->
		<div class="qt-pageheader qt-negative">
			<div class="qt-container">
				<div class="qt-container">
					<h1 class="qt-caption qt-spacer-s">
						<span class="qt-errorcode">404</span>
						<?php echo esc_attr__("OOOOPS! Something went wrong...", "onair2"); ?>
					</h1>
					<h4 class="qt-subtitle">
						<?php echo esc_attr__("The page you are looking for is not here anymore.", "onair2"); ?>
					</h4>
				</div>
				<hr class="qt-spacer-m">
				<!-- SEARCH FORM ========================= -->
				<div class="qt-searchbar qt-vertical-padding-m">
					<div class="qt-expandable-inner">
						<form method="get" class="qt-inline-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<div class="row qt-nopadding">
								<div class="col s8 m9">
									<input placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', "onair2" ); ?>" value="<?php echo esc_attr(get_search_query());  ?>" name="s" type="text" class="validate qt-input-l">
								</div>
								<div class="col s4 m3">
									<input type="button" value="<?php echo esc_attr__("Search", "onair2"); ?>" class="qt-btn qt-btn-primary qt-btn-l qt-fullwidth">
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- SEARCH FORM END ========================= -->
			</div>
		</div>
		<!-- HEADER CONTACTS END ========================= -->
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/part-sponsors' ); ?>
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>