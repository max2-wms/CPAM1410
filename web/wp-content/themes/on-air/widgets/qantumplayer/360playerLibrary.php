<?php


/** 
 * Register the Widget 
*/
add_action( 'init', 'QantumPlayerWidgetInit' );
function QantumPlayerWidgetInit() {
	wp_register_style( 'flashblock', get_template_directory_uri().'/widgets/qantumplayer/360-player/flashblock/flashblock.css');
	wp_enqueue_style( 'flashblock' );	
	wp_register_style( '360playercss', get_template_directory_uri().'/widgets/qantumplayer/360-player/360player.css');
	wp_enqueue_style( '360playercss' );
	function qantumplayerInitializeCus(){
		echo '<script type="text/javascript" src="'.get_template_directory_uri().'/widgets/qantumplayer/360-player/script/berniecode-animator.js'.'"></script>';	
		echo '<script type="text/javascript" src="'.get_template_directory_uri().'/widgets/qantumplayer/360-player/script/soundmanager2.js'.'"></script>';	
		
		if(preg_match('/MSIE 8/i',$_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE 7/i',$_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE 6/i',$_SERVER['HTTP_USER_AGENT'])) 

		{ 
			echo '<script type="text/javascript" src="'.get_template_directory_uri().'/widgets/qantumplayer/360-player/script/360player-custom-IE8.js'.'"></script>';	
			echo '<script type="text/javascript">
			soundManager.setup({
			  url: "'.get_template_directory_uri().'/widgets/qantumplayer/360-player/swf/",
			  useHighPerformance: false
			});
			</script>';	

		}else{

			echo '<script type="text/javascript" src="'.get_template_directory_uri().'/widgets/qantumplayer/360-player/script/360player-custom.js'.'"></script>';	
			echo '<script type="text/javascript">
			soundManager.setup({
			  url: "'.get_template_directory_uri().'/widgets/qantumplayer/360-player/swf/",
			  useHighPerformance: true
			});
			threeSixtyPlayer.config.scaleFont = (navigator.userAgent.match(/msie/i)?false:true);
			threeSixtyPlayer.config.showHMSTime = false;
			threeSixtyPlayer.config.useWaveformData = true;
			threeSixtyPlayer.config.useEQData = true;
			threeSixtyPlayer.config.waveformDataColor = "#FF0000";
			threeSixtyPlayer.config.playRingColor = "#00FF00";
			threeSixtyPlayer.config.loadRingColor = "#0000FF";
			if (threeSixtyPlayer.config.useWaveformData) { soundManager.flash9Options.useWaveformData = true;}	
			if (threeSixtyPlayer.config.useEQData) {soundManager.flash9Options.useEQData = true; }
			if (threeSixtyPlayer.config.usePeakData) {soundManager.flash9Options.usePeakData = true;}
			if (threeSixtyPlayer.config.useWaveformData || threeSixtyPlayer.flash9Options.useEQData || threeSixtyPlayer.flash9Options.usePeakData) { soundManager.preferFlash = true;}	
			</script>';	
		}
	}
	add_filter('wp_footer', 'qantumplayerInitializeCus');
   function IEpatchScript(){
   	 	echo '<!--[if IE]><script type="text/javascript" src="'.get_template_directory_uri().'/widgets/qantumplayer/360-player/script/excanvas.js"></script><![endif]-->';
	}
    add_filter('wp_head', 'IEpatchScript');
}


?>