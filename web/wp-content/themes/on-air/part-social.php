<?php

// just a small program to create all the social icons
$social = array(
				'QT_facebook',
				'QT_amazon',
				'QT_blogger',
				'QT_behance',
				'QT_bebo',
				'QT_flickr',
				'QT_pinterest',
				'QT_rss',
				'QT_triplevision',
				'QT_tumblr',
				'QT_twitter',
				'QT_vimeo',
				'QT_wordpress',
				'QT_whatpeopleplay',
				'QT_youtube',
				'QT_soundcloud',
				'QT_myspace',
				'QT_googleplus',
				'QT_itunes',
				'QT_juno',
				'QT_lastfm',
				'QT_linkedin',
				'QT_mixcloud',
				'QT_resident-advisor',
				'QT_reverbnation'

				);
global $optarray;
foreach($social as $s){
	if(isset($optarray[$s])){
		
		if($optarray[$s] != ''){
			echo '<a href="'.esc_url($optarray[$s]).'" class="qw_social"  target="_blank"><span class="qticon-'.str_replace("QT_","",$s).'"></span></a>';
		}
	}
}

?>