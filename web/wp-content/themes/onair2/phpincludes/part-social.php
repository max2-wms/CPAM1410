<?php
/*
Package: OnAir2
Description: SOCIAL LINKS LIST FROM CUSTOMIZER
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
// just a small program to create all the social icons
$social = array(
    'qt_beatport',
	'qt_facebook',
	'qt_spotify',
	'qt_amazon',
	'qt_blogger',
	'qt_behance',
	'qt_bebo',
	'qt_flickr',
	'qt_pinterest',
	'qt_rss',
	'qt_triplevision',
	'qt_tumblr',
	'qt_twitch',
	'qt_twitter',
	'qt_vimeo',
	'qt_wordpress',
	'qt_whatpeopleplay',
	'qt_youtube',
	'qt_instagram',
	'qt_snapchat',
	'qt_soundcloud',
	'qt_skype',
	'qt_space',
	'qt_googleplus',
	'qt_itunes',
	'qt_juno',
	'qt_lastfm',
	'qt_linkedin',
	'qt_mixcloud',
	'qt_resident-advisor',
	'qt_reverbnation',
	'qt_whatsapp',
	'qt_vk'
);
arsort($social);
foreach($social as $s){
	$link = get_theme_mod( $s, false );
	
	if($link){
		if($s === 'qt_whatsapp') {
			echo '<li class="right"><a href="https://api.whatsapp.com/send?phone='.$link.'" class="qw-disableembedding qw_social" target="_blank"><i class="qticon-'.str_replace("qt_","",$s).' qt-socialicon"></i></a></li>';
		} else if($s === 'qt_skype') {
			$link = 'skype:'.$link.'?call';
			echo '<li class="right"><a href="'.$link.'" class="qw-disableembedding qw_social" target="_blank"><i class="qticon-'.str_replace("qt_","",$s).' qt-socialicon"></i></a></li>';
		} else {
			echo '<li class="right"><a href="'.esc_url($link).'" class="qw-disableembedding qw_social" target="_blank"><i class="qticon-'.str_replace("qt_","",$s).' qt-socialicon"></i></a></li>';
		}
	}
}

?>
