<?php
/*
*
*	Get custom values of the theme
*
*/

global $optarray;
global $qw_custom_styles;
$qw_custom_styles = '';

/*
*
*	Debug to check all the theme mods
*
*/
//add_action( 'wp_head', 'debugMe' );
function debugMe(){

}


$optarray = thsp_cbp_get_options_values();

/*
*
*	Favicon
*
*/
add_action( 'wp_head', 'qt_favicon_print' );
function qt_favicon_print() {
	$i = get_theme_mod('QT_Favicon');
	if($i != ''){
		echo '<link rel="icon" href="'.esc_url($i).'" />' ;
	}
}


/*
*
*	Fonts 
*
*/
add_action('wp_head','QTenableGoogleFonts',1000);
function QTenableGoogleFonts(){
	if(get_theme_mod('QT_font_enable',"1") == '1'){
		global $qw_custom_styles;
		
		$QT_content_font = get_theme_mod('QT_content_font',"Lato");
		$QT_content_font_name = $QT_content_font;
		$QT_content_font = str_replace("|", "%7C", $QT_content_font);
		$QT_content_font = str_replace(" ", "+", $QT_content_font);
		echo '<link href="http://fonts.googleapis.com/css?family='.esc_attr($QT_content_font).':400,700,400italic" rel="stylesheet" type="text/css">';
		$qw_custom_styles .= 'body, p, .normalfont, .qw-nf {font-family: "'.esc_attr($QT_content_font_name).'", sans-serif; }';

		
		$QT_captions_font = get_theme_mod('QT_captions_font',"Racing Sans One");
		$QT_captions_font_name = $QT_captions_font;
		$QT_captions_font = str_replace("|", "%7C", $QT_captions_font);
		$QT_captions_font = str_replace(" ", "+", $QT_captions_font);
		echo '<link href="http://fonts.googleapis.com/css?family='.esc_attr($QT_captions_font).'" rel="stylesheet" type="text/css">';
		$qw_custom_styles .= 'h1, h2, h3, h4, h5, qw-page-title, .tooltip, #nav , h1.qw-page-title, h1.qw-moduletitle{font-family: "'.esc_attr($QT_captions_font_name).'", sans-serif;}';

	}
}


/*
*
*	Colors 
*
*/
add_action('wp_head','QTcustomColor',10);
function QTcustomColor(){
	global $optarray;

	 	

		echo 
		'<style type="text/css">

			.deskcolor {background-color:'.esc_attr(get_theme_mod('QT_background_color', '#ededed')).' !important;}
			.paper, .card, .card .card-reveal, .tabs, .tabs li.tab, .qw-separator.triangle.small:after, .cbp-vm-view-list .cbp-vm-offair .cbp-vm-title, .cbp-vm-view-list .cbp-vm-offair .cbp-vm-time {background-color:'.esc_attr(get_theme_mod('QT_paper_color','#ffffff')).' !important;}
			.maincolor, body.qw-stickynav nav#qwMainNavbar {background-color:'.esc_attr(get_theme_mod('QT_main_color',"#e91e63")).' !important;}
			#qwMainNavbar .maincolor, body.qw-stickynav nav#qwMainNavbar {background-color:'.esc_attr(get_theme_mod('QT_header_background_color')).' !important;}
			.slider ul.indicators li.indicator-item.active {background-color:'.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' !important;}
			.tabs .indicator {background-color:'.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' !important;}
			.maincolor.dark , #qwMainNavbar .maincolor .dark {background-color:'.esc_attr(get_theme_mod('QT_main_color_darker','#ad1457')).' !important;}
			.accentcolor {background-color:'.esc_attr(get_theme_mod('QT_accent_color','#26a69a')).' !important;}
			.dropDownMenu li li a {background: linear-gradient(to right, '.esc_attr(get_theme_mod('QT_main_color_darker','#ad1457')).' 34%, '.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' 65%);background-size: 300% 100%;background-position:right bottom;}
			 .accentcolor.dark  {background-color:'.esc_attr(get_theme_mod('QT_accent_color_darker')).' !important;}
			ul.qw-smallmenu li::after {background-color:'.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' !important;}
			a.accentcolor:hover {background-color:'.esc_attr(get_theme_mod('QT_accent_color_hover')).' !important;}
			body, .textcolor,.cbp-vm-view-list .cbp-vm-offair .cbp-vm-time {color: '.esc_attr(get_theme_mod('QT_text_color')).' !important;}
			a:hover {color:'.esc_attr(get_theme_mod('QT_main_color_darker','#ad1457')).' !important;}
			a {color:'.esc_attr(get_theme_mod('QT_accent_color','#26a69a')).' !important;}
			.maincolor, .cbp-vm-view-list .cbp-vm-nowonair .cbp-vm-title, .cbp-vm-view-list .maincolor .cbp-vm-time span  {color:'.esc_attr(get_theme_mod('QT_main_color_text')).' !important;}
			.maincolor a {color:'.esc_attr(get_theme_mod('QT_main_color_link')).' !important;}
			.maincolor a:hover, li.current-menu-item > a {color:'.esc_attr(get_theme_mod('QT_main_color_hover')).' !important;}
			.maincolor-text, .cbp-vm-view-list .cbp-vm-offair .cbp-vm-title {color:'.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' !important;}
			a.maincolor-text, .card-footer a.prettySocial span {color:'.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' !important;}
			a.maincolor-text:hover {color:'.esc_attr(get_theme_mod('QT_main_color_darker','#ad1457')).' !important;}
			.maincolor ::-webkit-input-placeholder, .maincolor :-moz-placeholder, .maincolor ::-moz-placeholder, .maincolor :-ms-input-placeholder {color: '.esc_attr(get_theme_mod('QT_main_color_text')).' !important;}
			.accentcolor {color:'.esc_attr(get_theme_mod('QT_accent_color_text')).' !important;}
			.widget .qw-widget-title {border-color:'.esc_attr(get_theme_mod('QT_accent_color','#26a69a')).';}
			.accentcolor a {color:'.esc_attr(get_theme_mod('QT_accent_color_link')).' !important;}
			.accentcolor a:hover {color:'.esc_attr(get_theme_mod('QT_accent_color_link_hover')).' !important;}
			.accentcolor-text, a.accentcolor-text {color:'.esc_attr(get_theme_mod('QT_accent_color','#26a69a')).' !important;}
			a.accentcolor-text:hover {color:'.esc_attr(get_theme_mod('QT_accent_color_hover')).' !important;}
			a.accentcolor, a.accentcolor:hover  {color:'.esc_attr(get_theme_mod('QT_accent_color_link')).' !important;}
			.qw-fancyborder, blockquote {border-color:'.esc_attr(get_theme_mod('QT_main_color','#e91e63')).' !important;}
			.maincolor input[type=text], input[type=password], .maincolor input[type=email], 
			.maincolor input[type=url], .maincolor input[type=date], .maincolor input[type=tel], 
			.maincolor input[type=number], .maincolor input[type=search], .maincolor textarea.materialize-textarea {border-bottom-color:'.esc_attr(get_theme_mod('QT_main_color_text')).';}
			.cbp-vm-view-list .cbp-vm-time {background-color:transparent !important;}
		';


		$body_bg_img = get_theme_mod("QT_body_background","");
		if($body_bg_img != ''){
			echo 'body {background-image:url('.esc_attr($body_bg_img).');background-size:cover;background-attachment:fixed;background-position: center center;}';
		}



		$width = get_theme_mod('QT_max_width','1280');
		if(is_numeric($width)){
			echo '  .container {max-width:'.esc_attr($width).'px;}';
		}
		$top = get_theme_mod('QT_logo_top','15');
		if(is_numeric($top)){
			echo ' @media only screen and (min-width : 992px) { .brand-logo {margin-top:'.esc_attr($top).'px;} }';
		}
		$height = get_theme_mod('QT_logo_height','50');
		if(is_numeric($height)){
			echo ' @media only screen and (min-width : 992px) { .brand-logo img {max-height:'.esc_attr($height).'px;} }';
		}







		$top_s = get_theme_mod('QT_logo_top_s','8');
		if(is_numeric($top_s)){
			echo '    body.qw-stickynav nav#qwMainNavbar  .brand-logo {margin-top:'.$top_s.'px;}';
		}
		$height_s = get_theme_mod('QT_logo_height_s','40');
		if(is_numeric($height_s)){
			echo '   body.qw-stickynav nav#qwMainNavbar  .brand-logo img {max-height:'.$height_s.'px;}';
		}






		/*
		*
		*	Mobile
		*
		*/
		echo '@media only screen and (max-width: 600px) {';

			$top = get_theme_mod('QT_logo_top_m','5');
			if(is_numeric($top)){
				echo '  .brand-logo {margin-top:'.$top.'px;}';
			}
			$height = get_theme_mod('QT_logo_height_m','30');
			if(is_numeric($height)){
				echo '  .brand-logo img {max-height:'.$height.'px;}';
			}

		echo '}';

		echo '</style>';

}
	
/*
*
*	Fullscreen background
*
*/
add_action('wp_head','QTfsbg',10);
function QTfsbg(){
	$QT_fsbg = get_theme_mod("QT_fsbg","1");
	if($QT_fsbg == '1'){
		global $qw_custom_styles;
		$qw_custom_styles .= ' body#theBody.custom-background {-moz-background-size:cover;-webkit-background-size:cover;background-size:cover;background-position:center !important;background-attachment:fixed;}';
	}
}





/*
*
*	Logo
*
*/

function qt_showlogo(){
	$logo = esc_attr(get_theme_mod("QT_logo",""));


	if($logo != ''){
		echo '<div class="qw-header-logo-big"><a href="'.esc_url(esc_attr(get_home_url())).'"><img src="'.esc_attr($logo).'" class="img-responsive" alt="'.esc_attr__("Home","_s").'"></a></div>';
	}else{
		echo '<div class="qw-header-logo-big qw-logo-big-text"><h2 ><a href="'.esc_url(esc_attr(get_home_url())).'" class="text-white white-text text-shadow brand-logo textual qw-animated" id="logo-container">'.esc_attr(get_bloginfo( 'name' )).'</a></h2></div>';
	}
}

/*
*
*	Logo Menu Bar
*
*/

function qt_showlogo_menubar(){
	$logo = esc_attr(get_theme_mod("QT_logo_menubar",""));


	if($logo != ''){
		echo '<a href="'.esc_url(esc_attr(get_home_url())).'" class="brand-logo" id="logo-container"><img src="'.esc_attr($logo).'" class="img-responsive qw-animated fast" alt="'.esc_attr__("Home","_s").'"></a>';
	}else{
		/*
		Hidden for style choice
		*/
		//echo '<a href="'.esc_url(esc_attr(get_home_url())).'" class="brand-logo textual" id="logo-container">'.esc_attr(get_bloginfo( 'name' )).'</a>';

	}
}



/*
*
*	Logo
*
*/

function qt_showlogo_big(){
	$logo = get_theme_mod("QT_logo_big");
	if($logo != ''){
		
		return '<a href="'.esc_url(esc_attr(get_home_url())).'" class="qw-sidebarlogo" id="qwLogoBig" ><img src="'.esc_attr(esc_url($logo)).'" class="img-responsive" alt="'.esc_attr__("Home","_s").'"></a>';
	}
	return;
	
}

/*
*
*	Footer 
*
*/

function qt_footertext(){
	global $optarray;
	if(isset($optarray['QT_footer_text'])){
		echo esc_attr($optarray['QT_footer_text']);
	}else{
		return "Copyright 2015 QantumThemes";
	}
}




/*
*
*	Menu version 
*
*/

function qt_menutype(){
	return esc_attr(get_theme_mod('QT_menutype','menutype1'));
}



/*
*
*	Add custom body classes
*
*/

add_filter( 'body_class', 'qt_body_class' );
function qt_body_class( $classes ) {
	global $optarray;
	if(isset($optarray['QT_colour_palette'])){
		$classes[] = esc_attr(get_theme_mod('QT_colour_palette','qw_palette_dark'));
	}
	return $classes;
}



/*
*
*	PRINT ALL THE CUSTOM STYLES 
*
*/


add_action('wp_head','qt_output_custom_styles',9000);

function qt_output_custom_styles(){
	global $optarray;
	global $qw_custom_styles;
	echo '

<!-- THEME CUSTOMIZATION ==================================== -->

';
	echo '<style type="text/css">';
	echo wp_kses_post($qw_custom_styles);
	echo '</style>';
	echo '

<!-- THEME CUSTOMIZATION END ================================ -->

';
}



?>