<?php
/*
Package: OnAir2
Description: Color customizations
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


add_action('wp_head','qantumthemes_css_customizations',1000);

if(!function_exists('qantumthemes_hex2rgba')){
function qantumthemes_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}}

if(!function_exists('qantumthemes_css_customizations')){
function qantumthemes_css_customizations(){
	ob_start();


	/**
	 * Colors from customizer
	 * ==========================
	 */
	$qt_primary_color= get_theme_mod( 'qt_primary_color', "#454955");
    $qt_primary_color_light= get_theme_mod( 'qt_primary_color_light', "#565c68");
    $qt_primary_color_dark= get_theme_mod( 'qt_primary_color_dark', "#101010");
    $qt_color_accent= get_theme_mod( 'qt_color_accent', "#dd0e34");
    $qt_color_accent_hover= get_theme_mod( 'qt_color_accent_hover', "#ff0442");
    $qt_color_secondary= get_theme_mod( 'qt_color_secondary', "#64c9d9");
    $qt_color_secondary_hover= get_theme_mod( 'qt_color_secondary_hover', "#58a4b0");
    $qt_color_background= get_theme_mod( 'qt_color_background', "#f7f7f9");
    $qt_color_paper= get_theme_mod( 'qt_color_paper', "#ffffff");
    $qt_textcolor_original = get_theme_mod( 'qt_textcolor_original', "#000000");
    $qt_header_color = get_theme_mod( 'qt_header_color',  "#000000" );
    $qt_player_background = get_theme_mod( 'qt_player_background',  "#000000" );
    $qt_typography_menu_size = get_theme_mod( 'qt_typography_menu_size', '1' );

	/**
	 * Derivated colors (calculated from the originals by alpha change following material design principles)
	 * ==========================
	 */
	$qt_text_color= qantumthemes_hex2rgba($qt_textcolor_original, 0.87);
	$qt_text_color_secondary= qantumthemes_hex2rgba($qt_textcolor_original, 0.65);
	$qt_titles_color= qantumthemes_hex2rgba($qt_textcolor_original, 0.75);
	$qt_text_color_aside= qantumthemes_hex2rgba($qt_textcolor_original, 0.65);
	$qt_text_color_divider_and_hints= qantumthemes_hex2rgba($qt_textcolor_original, 0.38);
	$qt_backgorund_lightcolor= qantumthemes_hex2rgba($qt_textcolor_original, 0.1);
	$qt_text_color_negative= $qt_color_paper;
	$qt_text_color_negative_light= qantumthemes_hex2rgba($qt_color_paper, 0.65);


	?>

	<!-- THEME STYLES DYNAMIC CUSTOMIZATIONS ========================= -->


	<style type="text/css" id="qantumthemes-theme-customizations">


body, html, .qt-content-main, .qt-negative .qt-caption-small span, .qt-paper, .qt-negative .qt-caption-med, .qt-card, .qt-paper, .qt-card, .qt-card-s, .qt-negative .qt-caption-med span, input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea ,
.qt-negative .qt-card h1, .qt-negative .qt-card h2, .qt-negative .qt-card h3, .qt-negative .qt-card h4, .qt-negative .qt-card h5, .qt-negative .qt-card h6, .qt-negative .qt-card h1 a, .qt-negative .qt-card h2 a, .qt-negative .qt-card h3 a, .qt-negative .qt-card h4 a, .qt-negative .qt-card h5 a, .qt-negative .qt-card h6 a {
color: <?php echo esc_attr($qt_text_color); ?> }

*::placeholder {
color: <?php echo esc_attr($qt_text_color); ?> }

.qt-text-secondary {
color: <?php echo esc_attr($qt_text_color_secondary); ?> }

h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
color: <?php echo esc_attr($qt_titles_color); ?> }

.qt-negative h1, .qt-negative h2, .qt-negative h3, .qt-negative h4, .qt-negative h5, .qt-negative h6, .qt-negative h1 a, .qt-negative h2 a, .qt-negative h3 a, .qt-negative h4 a, .qt-negative h5 a, .qt-negative h6 a {
color: <?php echo esc_attr($qt_text_color_negative); ?> }

a, .qt-content-main a, a.qt-logo-text span, .tabs .tab a, .qt-pageheader h1 a, .qt-pageheader h2 a, .qt-pageheader h3 a, .qt-pageheader h4 a, .qt-pageheader h5 a, .qt-pageheader h6 a {
color: <?php echo esc_attr($qt_color_accent); ?> }

.qt-content-aside, .qt-footer, .qt-tags {
color: <?php echo esc_attr($qt_text_color_aside); ?> }

.qt-content-aside a, .qt-footer a, .qt-tags a, .qt_color_secondary, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price {
color: <?php echo esc_attr($qt_color_secondary); ?> }


.qt-negative, .qt-content-primary-dark,.qt-content-primary,.qt-content-primary-light,.qt-btn-primary, .btn-primary,.qt-secondary, .qt-btn-secondary, .btn-secondary, nav.qt-menubar ul.qt-desktopmenu a:hover, .qt-side-nav a , .qt-sharepage a, .qt-caption-med span , .qt-caption-small span, a.rsswidget, .qt-text-neg, .qt-logo-text, .qt-negative .qt-btn-ghost, .qt-text-neg .qt-btn-ghost {
color: <?php echo esc_attr($qt_text_color_negative); ?> }

.qt-mobile-menu, .qt-menu-social a  {
color: <?php echo esc_attr($qt_text_color_negative_light); ?> }




body, html, .qt-body {
background-color:<?php echo esc_attr($qt_color_background); ?> }

#qtplayercontainer {
    background-color:<?php echo esc_attr($qt_player_background); ?> }

.qt-body.woocommerce li.product, .give-form-wrap, .qt-paper, .qt-card, .qt-card-s,  .qt-negative .qt-caption-med span, a.rsswidget, input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local],  input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea, table.striped>tbody>tr:nth-child(odd), table.bordered>thead>tr, table.bordered>tbody>tr, .qt-negative .qt-caption-small span {
background-color: <?php echo esc_attr($qt_color_paper); ?> }

.qt-content-primary, .qt-menubar-top  {
background-color: <?php echo esc_attr($qt_primary_color); ?> }

.qt-content-primary-dark, .qt-menubar , .qt-mobile-menu, .qt-desktopmenu a{
background-color: <?php echo esc_attr($qt_primary_color_dark); ?> }

.qt-content-primary-light {
background-color: <?php echo esc_attr($qt_primary_color_light); ?> }

.qt-body.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.qt-accent, .qt-btn-primary, .btn-primary, nav.qt-menubar ul.qt-desktopmenu a:hover, .qt-btn-primary, .tabs .indicator, .pagination li.active, .give-btn,
.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
background-color: <?php echo esc_attr($qt_color_accent ); ?>!important }

a.qt-link-layer {
background-color: <?php echo esc_attr($qt_color_accent_hover); ?>!important }

.qt-secondary, .qt-btn-secondary, .btn-secondary, .qt-side-nav li li a, .slick-slider .slick-arrow::after, .slick-slider .slick-dots li.slick-active button,
.woocommerce span.onsale, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
background-color: <?php echo esc_attr($qt_color_secondary); ?>!important }

.qt-caption-med span, .qt-caption-small span, a.rsswidget   {
background-color: <?php echo esc_attr($qt_textcolor_original); ?> }



.qt-tags a {
    border-color: <?php echo esc_attr($qt_text_color_secondary); ?> }


.qt-menubar ul.qt-desktopmenu > li::after, .qt-menubar ul.qt-desktopmenu > li > a::after, .qt-menubar ul.qt-desktopmenu > li > a::before , .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover > a::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover > a::before, .qt-negative .qt-btn-ghost, .qt-negative .qt-widgets .qt-caption-small, .qt-caption-small {
border-color: <?php echo esc_attr($qt_text_color_negative); ?>  }

    .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover > a::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item:hover > a::before {
border-color: inherit !important;  }

.qt-menubar ul.qt-desktopmenu > li.current_page_item::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item > a::after, .qt-menubar ul.qt-desktopmenu > li.current_page_item > a::before, .qt-pageheader .qt-caption  {
border-color: <?php echo esc_attr($qt_color_accent); ?> !important; }

.qt-caption-small, .qt-negative .qt-caption-small  {
border-color:  <?php echo esc_attr($qt_textcolor_original); ?> }

.qt-negative .qt-caption-small { 
border-color: <?php echo esc_attr($qt_text_color_negative); ?> 
    }



/* Hover states ============ */
a:hover, .tabs .tab a:hover, .qt-pageheader h1 a:hover, .qt-pageheader h2 a:hover, .qt-pageheader h3 a:hover, .qt-pageheader h4 a:hover, .qt-pageheader h5 a:hover, .qt-pageheader h6 a:hover { 
    color: <?php echo esc_attr($qt_color_accent_hover); ?> }
.qt-menubar-top a:hover, .qt-pageheader .qt-tags a:hover, .qt-content-aside a:hover, .qt-footer a:hover, .qt-tags a:hover, .qt_color_secondary:hover {
    color: <?php echo esc_attr($qt_color_secondary_hover); ?>!important }
    
    
.qt-btn-primary:hover, .btn-primary:hover, .qt-sharepage a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover  {
    background-color: <?php echo esc_attr($qt_color_accent_hover); ?>!important }
.qt-btn-secondary:hover, .btn-secondary:hover, .qt-secondary:hover, .qt-btn-secondary:hover, .btn-secondary:hover, .qt-side-nav li li a:hover, .slick-slider .slick-arrow:hover::after, .slick-slider .slick-dots li.slick-active button:hover {
    background-color: <?php echo esc_attr($qt_color_secondary_hover); ?>!important }
.qt-tags a:hover {
    border-color: <?php echo esc_attr($qt_color_secondary_hover); ?>!important }



<?php 
/** 
 *  Since 2.4.3 
 *  Menu font size option
 */
if($qt_typography_menu_size == 's') { ?> .qt-menubar ul a { font-size: 0.80em; } <?php } 
if($qt_typography_menu_size == 'l') { ?> .qt-menubar ul a { font-size: 1.2em; } <?php } 
?>

</style>

	<?php  
	$output = "\n\n".ob_get_clean();
	// $output = str_replace("\n", " ", $output);
	$output = str_replace("  ", " ", $output);
	$output .= "\n<!-- QT STYLES DYNAMIC CUSTOMIZATIONS END ========= -->\n\n";
	
	
	echo $output ;
}}






