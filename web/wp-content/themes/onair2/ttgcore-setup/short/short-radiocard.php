<?php  
/*
Package: onair2
Create a card with a
*/

if(!function_exists('qantumthemes_radiocard_shortcode')){
	function qantumthemes_radiocard_shortcode ($atts){
		extract( shortcode_atts( array(
			'include_by_id' => false,
		), $atts ) );
		ob_start();


		if( !$include_by_id ){
			return esc_html__( 'No ID selected', 'onair2' );
		}


		if( !is_string( get_post_status( $include_by_id ) ) ){
			return esc_html__( 'Invalid ID', 'onair2' );
		}
		
		/**
			 * [$bgurl Array with url and sizes of the picture]
			 * @var array
			 */
			$bgurl = false;
			$cardbg = false;
			$bg_id = get_post_meta( $include_by_id, "qt_radio_background", true );
			if($bg_id){
				$bgurl = wp_get_attachment_image_src($bg_id,'full');
				$cardbg = wp_get_attachment_image_src($bg_id,'medium');
			}

			/**
			 * [$bgurl Array with url and sizes of the logo]
			 * @var array
			 */
			$logo = '';
			$logo_id = get_post_meta( $include_by_id, "qt_radio_logo", true );
			if($logo_id){
				$logo = wp_get_attachment_image_src($logo_id,'qantumthemes-thumb-squared');
			}
			$id = $include_by_id;
			?>
			<a href="#" class="qt-radiocard" 
				data-title="<?php echo addslashes(get_the_title()); ?>" 
				data-subtitle="<?php echo esc_attr((get_post_meta( $include_by_id, "qt_radio_subtitle", true ))); ?>" 
				<?php if(is_array($bgurl)) { ?>data-background="<?php echo esc_url($bgurl[0]); ?>"<?php } ?>
				data-logo="<?php echo esc_attr(get_post_meta( $include_by_id, "qt_radio_logo", true )); ?>" 
				data-qtradioid="<?php echo esc_attr( $post->ID ); ?>"
				data-playtrack="<?php echo esc_attr(get_post_meta( $include_by_id, "mp3_stream_url", true )); ?>"
				data-icymetadata="<?php echo esc_attr(get_post_meta( $post->ID, "icymetadata", true )); ?>"
				data-host="<?php echo esc_attr(get_post_meta( $include_by_id, "qtradiofeedHost", true )); ?>"
				data-port="<?php echo esc_attr(get_post_meta( $include_by_id, "qtradiofeedPort", true )); ?>"
				data-channel="<?php echo esc_attr(get_post_meta( $include_by_id, "qtradiofeedChannel", true )); ?>"
				data-protocol="<?php echo esc_attr(get_post_meta( $include_by_id, "qtradiofeedProtocol", true )); ?>"
				data-icecasturl="<?php echo esc_attr(get_post_meta( $include_by_id, "qticecasturl", true )); ?>" 
				data-icecastmountpoint="<?php echo esc_attr(get_post_meta( $include_by_id, "qticecastMountpoint", true )); ?>" 
				data-icecastchannel="<?php echo esc_attr(get_post_meta( $include_by_id, "qticecastChannel", true )); ?>" 
				data-radiodotco="<?php echo esc_attr(get_post_meta( $include_by_id, "qtradiodotco", true )); ?>" 
				data-airtime="<?php echo esc_attr(get_post_meta( $include_by_id, "qtairtime", true )); ?>" 
				data-radionomy="<?php echo esc_url(get_post_meta( $include_by_id, "qtradionomy", true )); ?>" 
				data-textfeed="<?php echo esc_url(get_post_meta( $include_by_id, "qttextfeed", true )); ?>"
				data-jazler="<?php echo esc_url(get_post_meta( $post->ID, "qtjazler", true )); ?>"
				data-securesystems="<?php echo esc_attr(get_post_meta( $post->ID, "qtSecuresystems", true )); ?>"
				data-mediacp="<?php echo esc_attr(get_post_meta( $post->ID, "qtMediaCP", true )); ?>"
				data-stats_path=""
				data-played_path=""
				data-channel="">
				<div class="qt-radiocard__c">
					<div class="qt-radiocard__flex-center">
						
							<?php if ($cardbg){ ?>
								<img src="<?php echo esc_url($cardbg[0]); ?>" class="qt-radiocard__bg" alt="<?php echo esc_attr__("Background","onair2"); ?>" width="<?php echo esc_attr($cardbg[1]); ?>" height="<?php echo esc_attr($cardbg[2]); ?>">
							<?php } ?>


						<div class="qt-radiocard__p">
							<i class="dripicons-media-play"></i>
						</div>
						<div class="qt-radiocard__cn">

							<?php if ($logo){ ?>
								<img src="<?php echo esc_url($logo[0]); ?>" class="qt-radiocard__logo" alt="<?php echo esc_attr__("logo","onair2"); ?>" width="<?php echo esc_attr($logo[1]); ?>" height="<?php echo esc_attr($logo[2]); ?>">
							<?php } else { ?>
								<span class="qt-radiocard__t"><?php echo get_the_title( $include_by_id ); ?></span>
							<?php } ?>
						</div>
					</div>
				</div>
			</a>

		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-radiocard","qantumthemes_radiocard_shortcode");
}

/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_radiocard_shortcode' );
if(!function_exists('qantumthemes_vc_radiocard_shortcode')){
function qantumthemes_vc_radiocard_shortcode() {
  vc_map( array(
	"name" => esc_html__( "Radio card", "onair2" ),
	"base" => "qt-radiocard",
	"icon" => get_template_directory_uri(). '/img/vc/button.png',
	"description" => esc_html__( "Display a playable radio card for a channel", "onair2" ),
	"category" => esc_html__( "Theme shortcodes", "onair2"),
	"params" => array(
			array(
				'type' 			=> 'autocomplete',
				'heading' 		=> esc_html__( 'Channel', 'onair2'),
				'param_name' 	=> 'include_by_id',
				'settings'		=> array( 
					'values' 		=> onair2_autocomplete('radiochannel') ,
					'multiple'       => false,
					'sortable'       => false,
	          		'min_length'     => 1,
	          		'groups'         => false,  // In UI show results grouped by groups
	          		'unique_values'  => true,  // In UI show results except selected. NB! You should manually check values in backend
	          		'display_inline' => true, // In UI show results inline view),
				),
				'dependency' => array(
					'element' => 'post_type',
					'value' => array( 'ids' ),
				),
			),
			
		)
  	));
}}
