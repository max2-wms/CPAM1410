<?php
/**
 * 
 * Contains the header output for Revolution Slider dropdown
 * 
 * @package  onair2
 * @since  3.5.0
 * @version  3.5.0
 * @author  QantumThemes http://qantumthemes.com
 * @filesource  
 * 
 */


if( is_single() || is_page() || is_singular() ){
 	$alias = get_post_meta( get_the_ID(), 'qt_sider_header',  true );
	if( $alias && class_exists('RevSlider') ){ 
		echo apply_filters('the_content', '[rev_slider alias="'.$alias.'"]' );
	}
}

