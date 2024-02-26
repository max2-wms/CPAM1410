<?php
/*
Package: OnAir2
Description: single social icons
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

// just a small program to create all the social icons
$social = array(
                'at', //email
                'earth', //website
                'facebook',
                'amazon',
                'blogger',
                'behance',
                'bebo',
                'flickr',
                'pinterest',
                'rss',
                'triplevision',
                'tumblr',
                'twitter',
                'vimeo',
                'wordpress',
                'whatpeopleplay',
                'youtube',
                'soundcloud',
                'myspace',
                'googleplus',
                'itunes',
                'instagram',
                'juno',
                'lastfm',
                'linkedin',
                'mixcloud',
                'spotify',
                'twitch',
                'resident-advisor',
                'reverbnation'
                );

$id = get_the_ID();
foreach($social as $s){
    $i = get_post_meta($id, $s, true);
    if($i != ''){
        $target = 'target="_blank"';
        if($s == 'at'){
            $i = 'mailto:'.$i;
            $target = '';
        }
        echo '<a href="'.esc_url($i).'" class="qw_social qw-disableembedding" '.$target.'><span class="qticon-'.esc_attr($s).'"></span></a>';
    } 
}

?>