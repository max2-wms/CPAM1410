<?php
/**
 *	@package    onair2
 *	@author 	QantumThemes <info@qantumthemes.com>
 *  @version 	0.0.0
 *  @textdoman 	onair2
 */

/**==========================================================================================
 *
 *
 *	QantumThemes Warranty Notice:
 * 	Theme's support doesn't cover any code customizations. You are free to edit any theme's code at your own risk.
 *  For any customization please use the provided child theme instead of editing core files.
 *  https://codex.wordpress.org/Child_Themes
 *
 * 
 ==========================================================================================*/

/**
 *
 *	Theme version definition to prevent caching of old files
 *  =============================================
 */
if(!function_exists('qantumthemes_theme_version')){
	function qantumthemes_theme_version(){
		$my_theme = wp_get_theme( );
		return $my_theme->get( 'Version' );
	}
}

/**
 *
 *	content_width
 *  =============================================
 */
if ( ! isset( $content_width ) ) $content_width = 1170;

/**
 *
 *	TGM Plugins Activation
 * 	Automatic plugins installation
 *  =============================================
 */
require_once get_template_directory() . '/TGM-Plugin-Activation/onair2-plugins-activation.php';
require_once get_template_directory() . '/T2G-connector-client/onair2-t2gconnectorclient-config.php';

/**
 *
 *	TTG CORE DATA
 * 	For custom types fields and appearance customizer
 *  =============================================
 */
if(function_exists('ttg_core_active')){
	
	/* Custom post types */
	include(get_template_directory().'/ttgcore-setup/custom-types/chart/chart-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/shows/shows-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/events/events-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/member/member-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/podcast/podcast-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/radio/radio-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/schedule/schedule-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/sponsor/sponsor-type.php');
	include(get_template_directory().'/ttgcore-setup/custom-types/pages-special/pages-special.php');

	/* Customizer */
	// Early exit if Kirki is not installed
	if ( class_exists( 'Kirki' ) ) {
		include(  get_template_directory().'/ttgcore-setup/customizer/kirki-configuration/sections.php' );
		include(  get_template_directory().'/ttgcore-setup/customizer/kirki-configuration/fields.php' );
		include(  get_template_directory().'/ttgcore-setup/customizer/kirki-configuration/configuration.php' ); 
	}
	
	/* Shortcode settings */
	include(get_template_directory()."/ttgcore-setup/short/short-eventfeatured.php");
	include(get_template_directory()."/ttgcore-setup/short/short-slideshow.php");
	include(get_template_directory()."/ttgcore-setup/short/short-slideshow-carousel.php");
	include(get_template_directory()."/ttgcore-setup/short/short-schedule.php");
	include(get_template_directory()."/ttgcore-setup/short/short-showslider.php");
	include(get_template_directory()."/ttgcore-setup/short/short-onair.php");
	include(get_template_directory()."/ttgcore-setup/short/short-upcoming-shows-carousel.php");
	include(get_template_directory()."/ttgcore-setup/short/short-captions.php");
	include(get_template_directory()."/ttgcore-setup/short/short-post-hero-single.php");
	include(get_template_directory()."/ttgcore-setup/short/short-post-grid.php");
	include(get_template_directory()."/ttgcore-setup/short/short-chart.php");

	/* Since 1.1.2 */
	include(get_template_directory()."/ttgcore-setup/short/short-appicons.php");

	/* Since 1.5 */
	include(get_template_directory()."/ttgcore-setup/short/short-post-list.php");
	/* Since 1.7 */
	include(get_template_directory()."/ttgcore-setup/short/short-post-large.php");

	/* Since 1.5 */
	include(get_template_directory()."/ttgcore-setup/short/short-post-card.php");
	include(get_template_directory()."/ttgcore-setup/short/short-buttons.php");
	include(get_template_directory()."/ttgcore-setup/short/short-tabs.php");
	include(get_template_directory()."/ttgcore-setup/short/short-sponsors.php");

	/* Since 2.3.4 */
	include(get_template_directory()."/ttgcore-setup/short/short-nowonair.php");
	include(get_template_directory()."/ttgcore-setup/short/short-sharing.php");

	/* Since 2.3.4 */
	include(get_template_directory()."/ttgcore-setup/short/short-onairmini.php");


	/* Since 1.9.9 */
	include(get_template_directory()."/ttgcore-setup/short/short-slideshow-events.php");
	/* Since 1.6 */
	include(get_template_directory()."/ttgcore-setup/short/short-events.php");
}

/**
 *
 *	Customizations
 *  =============================================
 */
include(get_template_directory()."/phpincludes/customizations.php");

/*
*
*	Setup 
* 	=============================================
*/
if ( ! function_exists( 'qantumthemes_setup' ) ) {
function qantumthemes_setup() {
	load_theme_textdomain( "onair2", get_template_directory() . '/languages' );
	

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

	/* = We have to add the required images sizes
	==============================================*/
	set_post_thumbnail_size( 200, 110, true );
	add_image_size( 'qantumthemes-xl', 2560, 1440, true );
	add_image_size( 'qantumthemes-full', 1600, 700, true );
	add_image_size( 'qantumthemes-large', 1170, 512, true );
	add_image_size( 'qantumthemes-medium', 690, 302, true );
	add_image_size( 'qantumthemes-squared', 690, 690, true );
	add_image_size( 'qantumthemes-thumb', 100, 44, true );
	add_image_size( 'qantumthemes-thumb-squared', 170, 170, true );

	/* = Some post formats support
	==============================================*/
	add_theme_support( 'post-formats', array( 'gallery', 'audio', 'video' ) );
	add_theme_support( 'woocommerce' );

	/* = Register the menu locations
	==============================================*/
	register_nav_menus( array(
		'primary' => esc_attr__( 'Primary Menu', "onair2" ),
	) );
	register_nav_menus( array(
		'secondary' => esc_attr__( 'Secondary Menu', "onair2" ),
	) );
	register_nav_menus( array(
		'footer' => esc_attr__( 'Footer Menu', "onair2" ),
	) );
}}
add_action( 'after_setup_theme', 'qantumthemes_setup' );

/**
 * 	CSS and Js loading
 * 	=============================================
 */
if(!function_exists('qantumthemes_files_inclusion')){
function qantumthemes_files_inclusion() {
	// CSS
	wp_enqueue_style( 'wp-mediaelement' );
	wp_enqueue_style( $handle = "dripicons", get_template_directory_uri().'/fonts/dripicons/webfont.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "qantumthemes_qticons", get_template_directory_uri().'/fonts/qticons/qticons.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "slick", get_template_directory_uri().'/components/slick/slick.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "swipebox", get_template_directory_uri().'/components/swipebox/src/css/swipebox.min.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "classycountdown", get_template_directory_uri().'/components/countdown/css/jquery.classycountdown.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "flashblock", get_template_directory_uri().'/components/soundmanager/templates/qtradio-player/css/flashblock.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "qantumthemes_volume", get_template_directory_uri().'/components/soundmanager/templates/qtradio-player/css/qt-360player-volume.css', false, qantumthemes_theme_version(), "all" );
	wp_enqueue_style( $handle = "qantumthemes_main", get_template_directory_uri().'/css/qt-main.css', false, qantumthemes_theme_version(), "all" );
	/**
	 * If the customizer is not active, let's load default font styles
	 */
	if(!function_exists('ttg_core_active')){
		wp_enqueue_style( $handle = "qantumthemes_typography", get_template_directory_uri().'/css/qt-typography.css', $deps = array("qantumthemes_main"), qantumthemes_theme_version(), "all" );
	}
	// js
	$deps = array("jquery", "masonry" );
	wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/modernizr-2.8.3-respond-1.4.2.min.js', $deps, '2.8.3', true ); $deps[] = 'modernizr';
	

	$deps[] =  'wp-mediaelement';
	$deps[] =  'wp-playlist';


	if(defined( 'WPB_VC_VERSION' )){
		if(function_exists('vc_asset_url')){
			wp_register_style( 'vc_tta_style', vc_asset_url( 'css/js_composer_tta.min.css' ), false, WPB_VC_VERSION );
			wp_enqueue_style( 'vc_tta_style' );
			wp_register_script( 'vc_accordion_script', vc_asset_url( 'lib/vc_accordion/vc-accordion.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
			wp_register_script( 'vc_tta_autoplay_script', vc_asset_url( 'lib/vc-tta-autoplay/vc-tta-autoplay.min.js' ), array( 'vc_accordion_script' ), WPB_VC_VERSION, true );
			wp_enqueue_script( 'vc_accordion_script' );
			if ( ! vc_is_page_editable() ) {
				wp_enqueue_script( 'vc_tta_autoplay_script' );
			}
		}
		wp_enqueue_script( 'wpb_composer_front_js' );
		wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_style( 'js_composer_custom_css' );
	}

	
   
	if(get_theme_mod("qt_enable_debug", 0)){
		wp_enqueue_script( 'materialize', get_template_directory_uri().'/js/materializecss/bin/materialize.min.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'materialize';
		wp_enqueue_script( 'jquerycookie', get_template_directory_uri().'/js/jquerycookie.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'jquerycookie';
		wp_enqueue_script( 'slick', get_template_directory_uri().'/components/slick/slick.min.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'slick';
		wp_enqueue_script( 'knob', get_template_directory_uri().'/components/countdown/js/jquery.knob.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'knob';
		wp_enqueue_script( 'throttle', get_template_directory_uri().'/components/countdown/js/jquery.throttle.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'throttle';
		wp_enqueue_script( 'classycountdown', get_template_directory_uri().'/components/countdown/js/jquery.classycountdown.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'classycountdown';
		wp_enqueue_script( 'excanvas', get_template_directory_uri().'/components/soundmanager/script/excanvas.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'excanvas';
		wp_enqueue_script( 'berniecode', get_template_directory_uri().'/components/soundmanager/script/berniecode-animator.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'berniecode';
		wp_enqueue_script( 'soundmanager', get_template_directory_uri().'/components/soundmanager/script/soundmanager2-nodebug.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'soundmanager';
		wp_enqueue_script( 'qantumthemes_shoutcast', get_template_directory_uri().'/components/soundmanager/script/shoutcast.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'qantumthemes_shoutcast';
		wp_enqueue_script( 'qantumthemes_volumecontroller', get_template_directory_uri().'/components/soundmanager/templates/qtradio-player/script/qt-360player-volumecontroller.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'qantumthemes_volumecontroller';
		wp_enqueue_script( 'qantumthemes_popup', get_template_directory_uri().'/components/popup/popup.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'qantumthemes_popup';
		wp_enqueue_script( 'fitvids', get_template_directory_uri().'/components/fitvids/jquery.fitvids.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'fitvids';
		wp_enqueue_script( 'skrollr', get_template_directory_uri().'/components/skrollr/skrollr.min.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'skrollr';
		wp_enqueue_script( 'qantumthemes_main', get_template_directory_uri().'/js/qt-main.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'qantumthemes_main';
	} else {
		wp_enqueue_script( 'qantumthemes_main', get_template_directory_uri().'/js/min/qt-main-min.js', $deps, qantumthemes_theme_version(), true ); $deps[] = 'qantumthemes_main';
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}}
add_action( 'wp_enqueue_scripts', 'qantumthemes_files_inclusion' );



/*
*
*	Gets the taxonomy associated with any post type for other queries
* 	=============================================
*/
if(!function_exists('qantumthemes_get_type_taxonomy')){
function qantumthemes_get_type_taxonomy($posttype){
	$taxonomy = 'category';
	if($posttype != ''){
		switch($posttype){
			case "chart":
				$taxonomy = 'chartcategory';
				break;
			case "event":
				$taxonomy = 'eventtype';
				break;
			case "members":
				$taxonomy = 'membertype';
				break;
			case "podcast":
				$taxonomy = 'podcastfilter';
				break;
			case "schedule":
				$taxonomy = 'schedulefilter';
				break;
			case "radio":
				$taxonomy = 'channeltype';
				break;
		}
	}
	return $taxonomy;
}}



/**
 * 
 * 	Register sidebars
 * 	=============================================
 */
if(!function_exists('qantumthemes_widgets_init')){
function qantumthemes_widgets_init() {

	register_sidebar( array(
		'name'          => esc_attr__( 'Right Sidebar', "onair2" ),
		'id'            => 'right-sidebar',
		'before_widget' => '<aside id="%1$s" class="qt-widget qt-content-aside %2$s">',
		'before_title'  => '<h5 class="qt-caption-small"><span>',
		'after_title'   => '</span></h5>',
		'after_widget'  => '</aside>'
		
	) );

	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Sidebar', "onair2" ),
		'id'            => 'footersidebar',
		'before_widget' => '<aside id="%1$s" class="qt-widget col qt-ms-item %2$s">',
		'before_title'  => '<h5 class="qt-caption-small"><span>',
		'after_title'   => '<span></h5>',
		'after_widget'  => '</aside>'
		
	) );


	register_sidebar( array(
		'name'          => esc_attr__( 'Popup Widgets', "onair2" ),
		'id'            => 'popupwidgets',
		'before_widget' => '<aside id="%1$s" class="qt-widget col qt-ms-item %2$s">',
		'before_title'  => '<h5 class="qt-caption-small"><span>',
		'after_title'   => '</span></h5>',
		'after_widget'  => '</aside>'
		
	) );	

}}
add_action( 'widgets_init', 'qantumthemes_widgets_init' );

/**
 * 
 * 	Get current page. 
 *  Role: Fix for using archives as home page
 *  =============================================
 */

if(!function_exists('qantumthemes_get_paged')){
function qantumthemes_get_paged() {
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {  $paged = 1; }
	return intval($paged);
}}


/**
 * 
 * 	Pagination
 *  Role: Function to add special pagination template
 * 	=============================================
 */


if(!function_exists('qantumthemes_page_navi')){
function qantumthemes_page_navi($wp_query) {
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = qantumthemes_get_paged();
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}

	/*
	if ($paged > 1) { ?>
		<li class="special waves-effect"><a href="<?php echo get_pagenum_link(); ?>" class="qt-btn qt-btn-l qt-btn-primary"><i class="dripicons-arrow-thin-left"></i></a></li>
	<?php } else {  ?>
		<li class="special waves-effect disabled"><a href="#" class="qt-btn qt-btn-l qt-btn-primary"><i class="dripicons-arrow-thin-left"></i></a></li>
	<?php
	}
	if ($end_page < $max_page) { ?>
		<li class="special waves-effect"><a href="<?php echo get_pagenum_link(); ?>" class="qt-btn qt-btn-l qt-btn-primary"><i class="dripicons-arrow-thin-right"></i></a></li>
	<?php 
	}*/



	if ($paged > 1) { ?>
		<li class="special waves-effect"><a href="<?php echo get_pagenum_link($paged-1); ?>" class="qt-btn qt-btn-l qt-btn-primary"><i class="dripicons-arrow-thin-left"></i><span class="hide-on-large-only"><?php echo esc_attr__("Prev", "lifecoach"); ?></span></a></li>
	<?php } 

	if ($paged < $max_page) { 
	?>
		<li class="special waves-effect"><a href="<?php echo get_pagenum_link($paged+1); ?>" class="qt-btn qt-btn-l qt-btn-primary"><i class="dripicons-arrow-thin-right"></i><span class="hide-on-large-only"><?php echo esc_attr__("Next", "lifecoach"); ?></span></a></li>
	<?php 
	}



	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active item waves-effect hide-on-large-and-down"><a href="#" class="maincolor-text">'.esc_attr($i).'</a></li>';
		} else {
			echo '<li class="item waves-effect hide-on-large-and-down"><a href="'.esc_url(get_pagenum_link($i)).'">'.esc_attr($i).'</a></li>';
		}
	}
}}






/**
 * 	Customize number of posts depending on the archive post type
 * 	=============================================
 */
if(!function_exists('qantumthemes_custom_number_of_posts')){
function qantumthemes_custom_number_of_posts( $query ) {
	$query->set( 'suppress_filters',false ); // for wpml
	if($query->is_main_query() && !is_admin()){
		if ( $query->is_post_type_archive( 'podcast' ) 
			|| $query->is_post_type_archive('chart')
			|| $query->is_post_type_archive('event')
			|| $query->is_post_type_archive('shows')
			|| $query->is_post_type_archive('qtvideo')
			|| $query->is_post_type_archive('members')
			|| $query->is_tax('membertype')
			|| $query->is_tax('podcastfilter')
			|| $query->is_tax('chartcategory')
			|| $query->is_tax('eventtype')
			|| $query->is_tax('genre')
			|| $query->is_tax('vdl_filters')
		) {
			$query->set( 'posts_per_page','9' );
		
			if ( $query->is_post_type_archive( 'qtvideo' ) || $query->is_tax('vdl_filters')){
				$query->set( 'orderby', array ( 'meta_value' => 'DESC', 'date' => 'DESC'));
			}

			if ( $query->is_post_type_archive( 'shows' ) || $query->is_tax('genre')){
				$query->set( 'orderby', array ('menu_order' => 'ASC', 'date' => 'DESC'));
				$query->set( 'posts_per_page','9' );
			}

			if ( $query->is_post_type_archive( 'members' ) || $query->is_tax('membertype')){
				$query->set( 'orderby', array ('menu_order' => 'ASC', 'date' => 'DESC'));
				$query->set( 'posts_per_page','12' );
			}


			if ( $query->is_post_type_archive( 'podcast' ) || $query->is_tax('podcastfilter')){
				$query->set( 'posts_per_page','6' );
				$query->set( 'meta_key','_podcast_date' );
				$query->set( 'orderby', array ( 'meta_value' => 'DESC', 'date' => 'DESC'));
			}

			if ( $query->is_post_type_archive( 'chart' ) || $query->is_tax('chartcategory')){
				$query->set( 'posts_per_page','6' );
				$query->set( 'orderby', array ( 'meta_value' => 'DESC', 'date' => 'DESC'));
			}

			if($query->is_post_type_archive('event') || $query->is_tax('eventtype')) {
				$query->set( 'posts_per_page','4' );
				$query->set( 'meta_key', 'eventdate' );
				$query->set( 'orderby', 'meta_value' );
				$query->set( 'order', 'ASC' );
				if ( get_theme_mod ( 'qt_events_hideold', 0 ) == '1'){
					$query->set ( 
						'meta_query' , array (
						array (
							'key' => 'eventdate',
							'value' => date('Y-m-d'),
							'compare' => '>=',
							'type' => 'date'
							 )
						)
					);
				}
			}
			return;
		}
	}
}}
add_action( 'pre_get_posts', 'qantumthemes_custom_number_of_posts', 1 );

/**
 * 	Finds out if we want to hide the title for pages
 * 	=============================================
 */
if(!function_exists('qantumthemes_hide_title')) {
function qantumthemes_hide_title($id){
	if(is_page()){
		if(get_post_meta($id,"qt_post_hide_header",true) == "1"){
			return 1;
		}
	}
	return 0;
}}

/**
 * 	Do we add sponsors to footer?
 * 	=============================================
 */
if(!function_exists('qantumthemes_footer_sponsors')) {
function qantumthemes_footer_sponsors(){
	if(is_page()){
		if(get_post_meta(get_the_ID(),"qt_footer_sponsors", $string = true) == "1"){
			return 1;
		}
	}
	return 0;
}}

/**
 * 	Finds out if we want to hide the title for pages
 * 	=============================================
 */
if(!function_exists('qantumthemes_international_date')) {
function qantumthemes_international_date(){
	the_time( get_option( "date_format", "d M Y" ), '', '', true );
}}



/**
 * Template for comments and pingbacks.
 * 	=============================================
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
if ( ! function_exists( 'qantumthemes_s_comment' ) ) :
function qantumthemes_s_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<div class="row">
				<div class="col s2">
					<div class="qw-comment-image">
						<span class="qticon-earth qticons-big qw-user-icon"></span>
					</div>
				</div>
				<div class="col s10">
					<p class="qw-commentheader qw-small qw-caps">
						<?php esc_attr_e( 'Pingback:', "onair2" ); ?> <?php edit_comment_link( '<i class="glyphicon  glyphicon-pencil"></i>', '<span class="edit-link">', '</span>' ); ?>
					</p>
					<div class="comment-text">
						<?php comment_author_link(); ?> 
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body  qt-vertical-padding-s">
			<div class="row">
				<div class="col m1 hide-on-small-only">
					<div class="qw-comment-image">
						<?php 
							$avatar = get_avatar( $comment, $args['avatar_size'] );
							if ( 0 != $args['avatar_size'] && $avatar != '' ){
								echo get_avatar( $comment, $args['avatar_size'] );
							}else{
								?><i class="fa fa-user"></i><?php
							}
						?>
					</div>
					
				</div>
				<div class="col s12 m11">
					<div class="comment-content">
						<h4 class="qt-commentheader">
							<?php printf( esc_attr__( '%s &nbsp; On &nbsp;', "onair2" ), sprintf( '%s', get_comment_author_link() ) ); ?>
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', "onair2" ), get_comment_date(), get_comment_time() ); ?>
							</a>
							<?php edit_comment_link( '<i class="glyphicon  glyphicon-pencil"></i>', '<span class="edit-link">', '</span>' ); ?>
						</h4>

						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php echo esc_attr__( 'Your comment is awaiting moderation.', "onair2" ); ?></p>
						<?php endif; ?>
						<div class="comment-text qt-content">
							<?php comment_text(); ?>							
						</div>
						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						) ) );
						?>
					</div><!-- .comment-content -->
				</div>
			</div>			
		</article><!-- .comment-body -->
	<?php
	/* Yes, the LI is open and is correct in this way. */
	endif;
}
endif; // ends check for qantumthemes_s_comment()

/**
 * 	Edit the class of comment reply button
 * 	=============================================
 */
add_filter('comment_reply_link', 'qantumthemes_replace_reply_link_class');
if(!function_exists('qantumthemes_replace_reply_link_class')){
function qantumthemes_replace_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", 'class="comment-reply-link qt-btn qt-btn-s qt-btn-secondary"', $class);
	return $class;
}}

/**
 * 	Print list of terms without errors if taxonomy is not existing or wrong
 * 	=============================================
 */
if(!function_exists('qantumthemes_get_the_term_list')) {
function qantumthemes_get_the_term_list($id = '', $tax = '', $open = '', $separators = '', $close = ''){
	$terms = get_the_term_list( $id, $tax, $open, $separators, $close);
	if ( !is_wp_error( $terms ) ) {
		return $terms;
	}
}}

/* Tags formatting
=============================================*/
if ( ! function_exists( 'qantumthemes_custom_tag_cloud_widget' ) ) {
function qantumthemes_custom_tag_cloud_widget($args) {
	$args['number'] = '26'; //adding a 0 will display all tags
	$args['largest'] = '12'; //largest tag
	$args['smallest'] = '12'; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}}
add_filter( 'widget_tag_cloud_args', 'qantumthemes_custom_tag_cloud_widget' );

/* Widgets title formatting
=============================================*/
if ( ! function_exists( 'qantumthemes_widget_title' ) ) {
function qantumthemes_widget_title($title = '', $instance = array(), $id_base = '') {
	if($title == ''){ // title is set as blog title already if not set specifically
			return '';    // so this never gets executed
	}
	elseif (strpos($title, 'RSS') !== false) { // if we have RSS somewhere, strip the <span></span> - no real solution
			return $title;
	}
	return $title;
}}

add_filter ( 'widget_title' , 'qantumthemes_widget_title', 10000, 3); 


/* Icon by post format
=============================================*/
if ( ! function_exists( 'qantumthemes_format_icon_class' ) ) {
function qantumthemes_format_icon_class ( $id = false) {
	if ( false === $id ) {
		return;
	} else {
		$format = get_post_format( $id );
		if ( false === $format ) {
			$format = 'post';
		}
		switch ($format){
			case "video":
				echo 'dripicons-media-play';
				break;
			case "audio":
				echo 'dripicons-music';
				break;
			case "gallery":
				echo 'dripicons-camera';
				break;
			case "image":
				echo 'dripicons-camera';
				break;
			case "link":
				echo 'dripicons-link';
				break;
			case "chat":
				echo 'dripicons-conversation';
				break;
			case "post": 
			case "aside":
			case "quote":
			default:
				echo 'dripicons-align-justify';
			break;
		}
	}
}}

/* Display the comments and likes of a post in archives
=============================================*/
if(!function_exists("qantumthemes_item_counters")){
function qantumthemes_item_counters ($id = false, $comments = false  ) { // you can hide comments count setting "false" the first parameter
	if(false === $id){
		return;
	}
	if(true === $comments){
		$comments_count = wp_count_comments( $id );
		echo esc_attr(wp_count_comments( $id )->approved); ?><i class="dripicons-message"></i> <?php 
	}
	if(function_exists('qtli_post_like')) { 
		echo esc_attr(qtli_loveit_count( $id )); ?><i class="dripicons-heart"></i><?php  
	} 
}}

/* Add user agent to body for css classes fix
=============================================*/
if ( ! function_exists( 'qantumthemes_class_names' ) ) {
function qantumthemes_class_names($classes) {

	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;


	if($is_lynx)        $classes[] = 'is_lynx';
	else if($is_gecko)   $classes[] = 'is_gecko';
	else if($is_opera)   $classes[] = 'is_opera';
	else if($is_NS4)     $classes[] = 'is_ns4';
	else if($is_safari)  $classes[] = 'is_safari';
	else if($is_chrome)  $classes[] = 'is_chrome';
	else if($is_IE)      $classes[] = 'is_ie';
	else                $classes[] = 'is_unknown';
	if($is_IE &&  preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)){
		$classes[] = 'ie'.$browser_version[1];
	}
	if(wp_is_mobile()) $classes[] = 'mobile';
	if($is_iphone) $classes[] = 'is_iphone';
	else if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) $classes[] = 'is_ipad';
	else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false) $classes[] = 'is_android';
	else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false) $classes[] = 'is_kindle';
	else if(strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false) $classes[] = 'is_blackberry';
	else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) $classes[] = 'is_opera-mini';
	else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) $classes[] = 'is_opera-mobi';
	
	if ( stristr( $_SERVER['HTTP_USER_AGENT'],'mac') ) $classes[] = 'is_osx';
	else if ( stristr( $_SERVER['HTTP_USER_AGENT'],'linux') ) $classes[] = 'is_linux';
	else if ( stristr( $_SERVER['HTTP_USER_AGENT'],'windows') ) $classes[] = 'is_windows';
	
	/* Custom qantumthemes classes for the theme */
	$classes[] = "qt-parentcontainer";
	if(is_singular()) {
		$classes[] = "template-".esc_attr ( get_page_template_slug ( get_the_ID() ) );
	} else {
		$classes[] =  "template-archive";
	}

	$classes[] =  ( get_theme_mod( 'qt_sticky_menu' ) ) ? "qt-stickymenu" : "qt-notsticky-menu" ;

	$classes[] =  ( has_nav_menu( 'secondary' ) ) ? "qt-has-secondarybar" : "" ;


	if(get_theme_mod("qt_enable_debug", 0)){
		$classes[] = 'qt-debug';
	}
	if( get_theme_mod("qt_playerbar_version", '1') == '2'){
		$classes[] = 'qt-playertype-header';
	}
	if(get_theme_mod("qt_playerbar_openstate", '1') && !wp_is_mobile() && get_theme_mod("qt_playerbar_version", '1') == '2' ){
		$classes[] = 'qt-playerbar-open';
	}

	




	$classes[] = 'qt-body';

	return $classes;
}}

add_filter('body_class','qantumthemes_class_names');


/* Add formatting to custom metas
=============================================*/
function qantumthemes_custom_password_form() {

	$label = 'pwbox-'.get_the_ID();
	$o = '<form class="form" action="' .  esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
	' . esc_attr__( "This post is password protected. Please insert the password to proceed", "onair2" ) . '
	<label class="pass-label" for="' . $label . '">' . esc_attr__( "Password:", "onair2" ) . ' </label><input name="post_password" id="' . $label . '" type="password" />
	<input type="submit" name="Submit" class="qt-btn qt-btn-primary" value="' . esc_attr__( "Submit", "onair2" ) . '" />
	</form>
	';
	return $o;
}
add_filter( 'the_password_form', 'qantumthemes_custom_password_form' );



/* Visual composer extension
=============================================*/
if(defined( 'WPB_VC_VERSION' )){
	add_action( 'vc_after_init', 'qantumthemes_vc_after_init_actions' );
	function qantumthemes_vc_after_init_actions() {
		
		// Remove VC Elements
		if( function_exists('vc_remove_element') ){
			// Remove VC Separator Element
			vc_remove_element( 'vc_media_grid' );
			vc_remove_element( 'vc_masonry_grid' );
			vc_remove_element( 'vc_masonry_media_grid' );
			vc_remove_element( 'vc_basic_grid' );
			vc_remove_element( 'vc_line_chart' );
			vc_remove_element( 'vc_round_chart' );
			vc_remove_element( 'vc_pie' );
			vc_remove_element( 'vc_progress_bar' );
			vc_remove_element( 'vc_flickr' );
			vc_remove_element( 'vc_raw_js' );
			vc_remove_element( 'vc_posts_slider' );
			vc_remove_element( 'vc_video' );
			vc_remove_element( 'vc_images_carousel' );
			vc_remove_element( 'vc_gmaps' );
			vc_remove_element( 'vc_tta_pageable' );
			//vc_remove_element( 'vc_tta_section' ); // this breaks tabs in visual composer if enabled, leave commented
			vc_remove_element( 'vc_gallery' );
			vc_remove_element( 'vc_single_image' );
		}
		function qantumthemes_remove_default_stylesheet() {
			$handle = 'vc_pageable_owl-carousel-css';
			wp_dequeue_style( 'vc_pageable_owl-carousel-css' );
			wp_deregister_style( 'vc_pageable_owl-carousel-css' );
			wp_dequeue_style( 'vc_pageable_owl-carousel-css-css' );
			wp_deregister_style( 'vc_pageable_owl-carousel-css-css' );
			wp_dequeue_script( 'vc_jquery_skrollr_js' ); // already included by the theme
		}

		/**
		 * Adding theme custom parameters
		 */
		if( function_exists('vc_add_param') ){ 
			vc_add_param(
				"vc_row", 
				array(
					'weight' => 1,
					'type' => 'checkbox',
					'heading' => esc_html__( 'Negative colors', "onair2" ),
					'param_name' => 'qt_negative',
					'description' => esc_html__( "Captions and texts uses negative colors", "onair2" )
				)
			);
			vc_add_param(
				"vc_row", 
				array(
					'weight' => 1,
					'type' => 'checkbox',
					'heading' => esc_html__( 'Add container', "onair2" ),
					'param_name' => 'qt_container',
					'description' => esc_html__( "Add a container box to the content to limit width", "onair2" )
				)
			);
			vc_add_param(
				"vc_row_inner", 
				array(
				   	'type' => 'checkbox',
				   	'weight' => 1,
				   	'heading' => esc_html__( 'Add container', "lifecoach" ),
				   	'param_name' => 'qt_container',
				   	'description' => esc_html__( "Add a container box to the content to limit width", "lifecoach" )
				)
			);
			vc_add_param(
				"vc_row_inner", 
				array(
					'type' => 'checkbox',
					'weight' => 1,
					'heading' => esc_html__( 'Negative colors', "onair2" ),
					'param_name' => 'qt_negative',
					'description' => esc_html__( "Captions and texts uses negative colors", "onair2" )
				)
			);
		}
	}
}


/* Get number of current week in the month, used by schedule functions
=============================================*/
function qantumthemes_week_number( $date = 'today' ) { 
    return ceil( date( 'j', strtotime( $date ) ) / 7 );
}

/* Radio proxy
=============================================*/
function qantumthemes_radioproxy(){
	if(isset($_GET)){
		if(array_key_exists('qtproxycall',$_GET)){
			$url = $_GET['qtproxycall'];
			$data = wp_remote_get( $url );
			if ( is_array( $data ) ) {
				echo $data['body'];
			}
			die();
		}
	}
}
add_action('init', 'qantumthemes_radioproxy');

function qantumthemes_add_proxy_param(){
	?>
	<div id="qantumthemesproxyurl" class="qt-hidden" data-proxyurl="<?php echo site_url(); ?>"></div>
	<?php  
}
add_action("wp_footer", "qantumthemes_add_proxy_param");




/* Ads display

=============================================*/
if(!function_exists('qantumthemes_ads_display')){
function qantumthemes_ads_display($slot){
	$content = get_theme_mod($slot);
	
	if($content == ''){ return; }
	ob_start();
	?>
	<div class="qt-vc">
		<div class="qt-vi">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
	<?php
	echo ob_get_clean();
}}



/* Get universal page id
=============================================*/
if ( ! function_exists( 'qantumthemes_universal_page_id' ) ) {
function qantumthemes_universal_page_id() {
	$pageid = get_the_ID();
	if(function_exists('is_shop') && function_exists('is_checkout') && function_exists('is_account_page') && function_exists('is_wc_endpoint_url')){
		if(is_shop()){
			$pageid = get_option( 'woocommerce_shop_page_id' ); 
		} elseif (is_cart()){
			$pageid = get_option( 'woocommerce_cart_page_id' ); 
		}elseif (is_checkout()){
			$pageid = get_option( 'woocommerce_checkout_page_id' ); 
		}elseif (is_account_page()){
			$pageid = get_option( 'woocommerce_myaccount_page_id' ); 
		}elseif (is_wc_endpoint_url( 'order-pay' )){
			$pageid = get_option( 'woocommerce_pay_page_id' ); 
		}elseif (is_wc_endpoint_url( 'order-received' )){
			$pageid = get_option( 'woocommerce_thanks_page_id' ); 
		}elseif (is_wc_endpoint_url( 'view-order' ) ){
			$pageid = get_option( 'woocommerce_view_order_page_id' ); 
		}elseif (is_wc_endpoint_url( 'edit-account' ) ){
			$pageid = get_option( 'woocommerce_myaccount_page_id' ); 
		}elseif (is_wc_endpoint_url( 'edit-address' )){
			$pageid = get_option( 'woocommerce_edit_address_page_id' ); 
		}elseif (is_wc_endpoint_url( 'lost-password' )){
			$pageid = get_option( 'woocommerce_checkout_page_id' ); 
		}elseif (is_wc_endpoint_url( 'customer-logout' )){
			$pageid = get_option( 'woocommerce_checkout_page_id' ); 
		}elseif (is_wc_endpoint_url( 'add-payment-method' )){
			$pageid = get_option( 'woocommerce_shop_page_id' ); 
		}
	}
	return $pageid;
}}



function qantumthemes_woo_sale_flash() {
	return '<span class="onsale qt-onsale-icon"><i class="dripicons-star"></i></span>';
}
add_filter( 'woocommerce_sale_flash', 'qantumthemes_woo_sale_flash' );








/* Disable SPAN wrapper for CF7
=============================================*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

add_filter('wpcf7_form_elements', function( $content ) {
  $dom = new DOMDocument();
  $dom->preserveWhiteSpace = false;
  $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

  $xpath = new DomXPath($dom);
  $spans = $xpath->query("//span[contains(@class, 'wpcf7-form-control-wrap')]" );

  foreach ( $spans as $span ) :
    $children = $span->firstChild;
    $span->parentNode->replaceChild( $children, $span );
  endforeach;

  return $dom->saveHTML();
});

/**
 * 
 * Used by shortcodes autocomplete
 * =============================================
 */
if(!function_exists('onair2_get_type_posts_data')) {
function onair2_get_type_posts_data( $post_type = 'post' ) {
	$posts = get_posts( array(
		'posts_per_page' 	=> -1,
		'post_type'			=> $post_type,
	));
	$result = array();
	foreach ( $posts as $post )	{
		$result[] = array(
			'value' => $post->ID,
			'label' => $post->post_title,
		);
	}
	return $result;
}}



/* Transform string to slug
=============================================*/
if(!function_exists('onair2_slugify')){
function onair2_slugify($string, $replace = array(), $delimiter = '-') {
  // https://github.com/phalcon/incubator/blob/master/Library/Phalcon/Utils/Slug.php
  if (!extension_loaded('iconv')) {
	throw new Exception('iconv module not loaded');
  }
  // Save the old locale and set the new locale to UTF-8
  $oldLocale = setlocale(LC_ALL, '0');
  setlocale(LC_ALL, 'en_US.UTF-8');
  $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
  if (!empty($replace)) {
	$clean = str_replace((array) $replace, ' ', $clean);
  }
  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
  $clean = strtolower($clean);
  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
  $clean = trim($clean, $delimiter);
  // Revert back to the old locale
  setlocale(LC_ALL, $oldLocale);
  return $clean;
}}