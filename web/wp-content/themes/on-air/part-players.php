<?php

// just a small program to create all the social icons
$app_icon = array(
				'app_android',
				'app_iphone',
				'app_blackberry',
				'app_itunes',
				'app_winphone',
				'app_winamp',
				'app_mediaplayer'
			);

global $optarray;

foreach($app_icon as $s){
	if(isset($optarray[$s])){
		if($optarray[$s] != ''){
			echo '<a href="'.esc_url($optarray[$s]).'" target="_blank" id="qwPlayerLink'.$s.'" class="btn-floating z-depth-2 btn-large waves-effect waves-light accentcolor"><span class="qt-'.$s.'">'.$s.'</span></a>';
		}
	}
}
