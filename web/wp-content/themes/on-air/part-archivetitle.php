<?php
if ( is_category() ) : single_cat_title();
elseif ( is_search() ) : printf( esc_attr(__( 'Search Results for: %s', '_s' )), '<span>' . esc_attr(get_search_query()) . '</span>' );
elseif ( is_tag() ) : single_tag_title();
elseif ( is_author() ) :
    the_post();
    printf( esc_attr(__( 'Author: %s', '_s' )), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
    rewind_posts();
elseif ( is_day() ) : printf( esc_attr__( 'Day: %s', '_s' ), '<span>' . esc_attr(get_the_date()) . '</span>' );
elseif ( is_month() ) : printf( esc_attr__( 'Month: %s', '_s' ), '<span>' . esc_attr(get_the_date( 'F Y' )) . '</span>' );
elseif ( is_year() ) :  printf( esc_attr__( 'Year: %s', '_s' ), '<span>' . esc_attr(get_the_date( 'Y' )) . '</span>' );
elseif ( is_tax( 'post_format', 'post-format-aside' ) ) : esc_attr_e( 'Asides', '_s' );
elseif ( is_tax( 'post_format', 'post-format-image' ) ) : esc_attr_e( 'Images', '_s');
elseif ( is_tax( 'post_format', 'post-format-video' ) ) : esc_attr_e( 'Videos', '_s' );
elseif ( is_tax( 'post_format', 'post-format-quote' ) ) : esc_attr_e( 'Quotes', '_s' );
elseif ( is_tax( 'post_format', 'post-format-link' ) ) : esc_attr_e( 'Links', '_s' );
elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) : esc_attr_e( 'Galleries', '_s' );
elseif ( is_tax( 'post_format', 'post-format-audio' ) ) : esc_attr_e( 'Sounds', '_s' );
/*
*
*   Custom post type titles
*
*/
elseif(is_post_type_archive( 'show' ) || is_tax('genre')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } 
            echo esc_attr__("Shows","_s");

elseif(is_post_type_archive( 'chart' ) || is_tax('chartcategory')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } 
            echo esc_attr__("charts","_s");            
elseif(is_post_type_archive( 'qtvideo' ) || is_tax('vdl_filters')):      
            $termname = '';
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if(is_object($term)){
                echo esc_attr($term->name).' ';
            } 
            echo esc_attr__("videos","_s");    
else :esc_attr_e( 'Archives', '_s' );
endif;
?>