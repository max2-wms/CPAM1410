<?php
/*









          360 Qantum Player
          IMPORTANT: REQUIRES JQUERY COOKIE LIBRARY












*/
function qantumplayerInitializeCus(){

    if(preg_match('/MSIE 8/i',$_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE 7/i',$_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE 6/i',$_SERVER['HTTP_USER_AGENT'])){ 
      echo '<script type="text/javascript">
      soundManager.setup({
        url: "'.get_template_directory_uri().'/qantumplayer/360-player/swf/",
        useHighPerformance: false
      });
      </script>'; 

    } else {

      echo '<script type="text/javascript" src="'.get_template_directory_uri().'/qantumplayer/360-player/script/360player-custom.js'.'"></script>'; 

      $autoplay = 'false';
       if(get_theme_mod("QT_player_autoplay") == 'yes') {
           $autoplay = 'true';
      }



      echo '<script type="text/javascript">
      soundManager.setup({
        url: "'.get_template_directory_uri().'/qantumplayer/360-player/swf/",
        useHighPerformance: true
      });
      threeSixtyPlayer.config.scaleFont = (navigator.userAgent.match(/msie/i)?false:true);
      threeSixtyPlayer.config.showHMSTime = false;
      threeSixtyPlayer.config.useWaveformData = true;
      threeSixtyPlayer.config.useEQData = true;
     threeSixtyPlayer.config.waveformDataColor = "'.esc_attr(get_theme_mod('QT_accent_color_dark')).'";
     threeSixtyPlayer.config.playRingColor = "'.esc_attr(get_theme_mod('QT_accent_color','#26a69a')).'";
     threeSixtyPlayer.config.loadRingColor = "'.esc_attr(get_theme_mod('QT_main_color_dark','#26a69a')).'";
     threeSixtyPlayer.config.autoPlay = '.$autoplay .';
      if (threeSixtyPlayer.config.useWaveformData) { soundManager.flash9Options.useWaveformData = true;}  
      if (threeSixtyPlayer.config.useEQData) {soundManager.flash9Options.useEQData = true; }
      if (threeSixtyPlayer.config.usePeakData) {soundManager.flash9Options.usePeakData = true;}
      if (threeSixtyPlayer.config.useWaveformData || threeSixtyPlayer.flash9Options.useEQData || threeSixtyPlayer.flash9Options.usePeakData) { soundManager.preferFlash = true;}  
      </script>';

      if(get_theme_mod("QT_player_autoplay") == 'yes') {
          echo '<div id="autoplay360" data-play="true"></div> ';
      }




      
    }
}
add_filter('wp_footer', 'qantumplayerInitializeCus',9999999);
  



function IEpatchScript(){
  echo '<!--[if IE]><script type="text/javascript" src="'.get_template_directory_uri().'/qantumplayer/360-player/script/excanvas.js"></script><![endif]-->';
}
add_filter('wp_head', 'IEpatchScript',99);


function qw_register_360player_style(){
  /*
  wp_register_style( 'flashblock', get_template_directory_uri().'/qantumplayer/360-player/flashblock/flashblock.css');
  wp_enqueue_style( 'flashblock' ); 
  wp_register_style( '360playercss', get_template_directory_uri().'/qantumplayer/360-player/360player.css');

   //wp_enqueue_style( 'qantumplayer-360player-css', get_template_directory_uri().'/qantumplayer/360-player/360player.css');
*/
  wp_enqueue_style( '360playercss', get_template_directory_uri().'/qantumplayer/360-player/qantumthemes-soundmanager2-styles.css' );

  


  /*
  *
  **  New script which contains all
  *
  *
  *
  *
  */

   wp_enqueue_script( 'qw_sm_bernicode', get_template_directory_uri().'/qantumplayer/360-player/script/qantum-soundmanager2-library.js', array('jquery') );

  if(preg_match('/MSIE 8/i',$_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE 7/i',$_SERVER['HTTP_USER_AGENT']) || preg_match('/MSIE 6/i',$_SERVER['HTTP_USER_AGENT'])){ 
    wp_enqueue_script( 'qw_360playerIE8', get_template_directory_uri().'/qantumplayer/360-player/script/360player-custom-IE8.js', array('jquery','qw_sm_bernicode') );
  }

}
add_action( 'wp_enqueue_scripts', 'qw_register_360player_style', 99999 );