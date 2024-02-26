<?php  

/*
*	Add revolution slider dropdown to header options
*	=============================================================
*/


if(!function_exists("qantumthemes_get_sliders_options")){
	function qantumthemes_get_sliders_options() {
		if(!class_exists('RevSlider')){
			return;
		}
		

		$options = array();

		$slider = new RevSlider();


		if(  method_exists($slider,'getAllSliderAliases') ){
			$objSliders = $slider->getAllSliderAliases();
			foreach( $objSliders as $slider ){
				$options[] = array(
					'label' => wp_strip_all_tags( $slider, true ),
					'value' => $slider
				);
			}
		}

		/**
		 * This is for revo slider 6 but is now suspended
		 * because basically is so buggy we rolled back to 5.8
		 */
		
		/*
		//////// SUSPENDED TILL REVO SLIDER FIXES THE POOR NEW VERSION

		 else if( method_exists($slider,'get_sliders') ){
			$objSliders = $slider->get_sliders();
			foreach( $objSliders as $slider ){
				$options[] = array(
					'label' => wp_strip_all_tags( $slider->title, true ),
					'value' => $slider->alias
				);
			}
		}  
		*/

		return array(
			'label' => esc_html__( 'Revolution Slider','onair2' ),
			'id' 	=> 'qt_sider_header',
			'type' 	=> 'select',
			'default' => '',
			'options' => $options
		);
	}
}