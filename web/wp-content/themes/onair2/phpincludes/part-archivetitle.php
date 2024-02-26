<?php
/*
Package: OnAir2
Description: Archive title
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/




if ( is_category() ) : single_cat_title();
elseif (is_page() || is_singular() ) : the_title();
elseif ( is_search() ) : printf( esc_attr(__( 'Search Results for: %s', "onair2" )), '<span>' . esc_attr(get_search_query()) . '</span>' );
elseif ( is_tag() ) : single_tag_title();
elseif ( is_author() ) :
    the_post();
    printf( esc_attr(__( 'Author: %s', "onair2" )), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
    rewind_posts();
elseif ( is_day() ) : printf( esc_attr__( 'Day: %s', "onair2" ), '<span>' . esc_attr(get_the_date()) . '</span>' );
elseif ( is_month() ) : printf( esc_attr__( 'Month: %s', "onair2" ), '<span>' . esc_attr(get_the_date( 'F Y' )) . '</span>' );
elseif ( is_year() ) :  printf( esc_attr__( 'Year: %s', "onair2" ), '<span>' . esc_attr(get_the_date( 'Y' )) . '</span>' );
elseif ( is_tax( 'post_format', 'post-format-aside' ) ) : esc_attr_e( 'Asides', "onair2" );
elseif ( is_tax( 'post_format', 'post-format-image' ) ) : esc_attr_e( 'Images', "onair2");
elseif ( is_tax( 'post_format', 'post-format-video' ) ) : esc_attr_e( 'Videos', "onair2" );
elseif ( is_tax( 'post_format', 'post-format-quote' ) ) : esc_attr_e( 'Quotes', "onair2" );
elseif ( is_tax( 'post_format', 'post-format-link' ) ) : esc_attr_e( 'Links', "onair2" );
elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) : esc_attr_e( 'Galleries', "onair2" );
elseif ( is_tax( 'post_format', 'post-format-audio' ) ) : esc_attr_e( 'Sounds', "onair2" );
/*
*
*   Custom post type titles
*
*/
elseif(is_post_type_archive( 'shows' ) || is_tax('genre')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } else {
                echo esc_attr__("Shows","onair2");
            }

elseif(is_post_type_archive( 'schedule' ) || is_tax('schedulefilter')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } else {
                echo esc_attr__("Schedule","onair2");            
            }
elseif(is_post_type_archive( 'chart' ) || is_tax('chartcategory')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } else {
                echo esc_attr__("charts","onair2");            
            }
elseif(is_post_type_archive( 'qtvideo' ) || is_tax('vdl_filters')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            }  else {
                echo esc_attr__("videos","onair2");    
            }

elseif (is_post_type_archive( 'members' ) || is_tax('membertype')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } else {
                echo esc_attr__("Team Members","onair2");  
            }

elseif (is_post_type_archive( 'podcast' ) || is_tax('podcastfilter')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name);
            } else {
                echo esc_attr__("Podcast","onair2"); 
            }

elseif (is_post_type_archive( 'event' ) || is_tax('eventtype')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } else {
                echo esc_attr__("Events","onair2"); 
            }

else: esc_attr_e( 'Blog', "onair2" );
endif;
?>