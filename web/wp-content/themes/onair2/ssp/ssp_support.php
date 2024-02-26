<?php  
/**
 * @package WordPress / Seriously Sinple Podcasting / Onair2
 * @author  QantumThemes
 *
 * Makes SSP compatible with ajax
 * 
 */





if(!function_exists('qantumthemes_ssp_files_inclusion')){
	add_action( 'wp_enqueue_scripts', 'qantumthemes_ssp_files_inclusion' );
	function qantumthemes_ssp_files_inclusion(){
		wp_enqueue_script( 'media-player' );
		wp_enqueue_script( 'html5-player' );
		wp_enqueue_style( 'ssp-html5-player' );
		wp_enqueue_style( 'ssp-frontend-player' );
	}
}

/**
 * Override player styles
 * @todo what is this used for
 */

if(!function_exists('ssp_override_player_styles')){
	add_action("wp_footer", "qantumthemes_ssp_override_player_styles");
	function ssp_override_player_styles() {
		$player_wave_form_progress_colour = get_option( 'ss_podcasting_player_wave_form_progress_colour', false );
		?>
		<style type="text/css">
			.ssp-wave wave wave {
				background: <?php echo $player_wave_form_progress_colour ? $player_wave_form_progress_colour : "#28c0e1"; ?> !important;
			}
		</style>
		<?php 
		if(defined(SSP_PLUGIN_URL)){
			?>
			<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,700&v=<?php echo SSP_VERSION ?>"/>
			<link rel="stylesheet" href="<?php echo SSP_PLUGIN_URL ?>assets/css/icon_fonts.css?v=<?php echo SSP_VERSION ?>"/>
			<link rel="stylesheet" href="<?php echo SSP_PLUGIN_URL ?>assets/fonts/Gizmo/gizmo.css?v=<?php echo SSP_VERSION ?>"/>
			<link rel="stylesheet" href="<?php echo SSP_PLUGIN_URL ?>assets/css/frontend.css?v=<?php echo SSP_VERSION ?>"/>
			<script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js?v=<?php echo SSP_VERSION ?>"></script>
			<?php
		}
	}
}