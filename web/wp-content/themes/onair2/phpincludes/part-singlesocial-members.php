<?php
/*
Package: OnAir2
Description: single social icons
Version: 1.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

// just a small program to create all the social icons
$social = array(
                'QT_facebook',

                 'QT_instagram',
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

foreach($social as $s){
    $slink = get_post_meta($post->ID,$s,true);    
    if($slink != ''){
        echo '<a href="'.esc_url($slink).'" class="qw_social icon-l qw-disableembedding" target="_blank"><span class="qticon-'.str_replace("QT_","",$s).' white-text"></span></a>';
    }
}
