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
                'juno',
                'lastfm',
                'linkedin',
                'mixcloud',
                'resident-advisor',
                'reverbnation'
                );

$id = get_the_ID();
foreach($social as $s){
    $i = get_post_meta($id, $s, true);
    if($i != ''){
        echo '<a href="'.esc_url($i).'" class="qw_social qw-disableembedding"  target="_blank"><span class="qticon-'.esc_attr($s).'"></span></a>';
    } 
}

?>