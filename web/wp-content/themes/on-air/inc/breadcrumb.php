<?php

	$icn = '<i class="mdi-image-navigate-next"></i>';
        echo '<ul class="qw-breadcrumb">';
        if (!is_home()) {
                echo '<li><i class="mdi-action-home"></i><a href="';
                echo home_url();
                echo '">';
                echo esc_attr__('Home',"_s");
                echo "</a></li>";

                if (is_category() ) {
                        
                         echo '<li>'.$icn;
                         the_category(' </li><li> '.$icn);


                }
                elseif (is_single()) {
                        
                       $id = $post->ID;

                        if(get_post_type( $id ) == 'post'){
                            echo '<li>'.$icn;
                            the_category(' </li><li> '.$icn);
                            echo '</li>';
                        }

                        if(get_post_type( $id ) == 'release'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'release' ).'">'.esc_attr__("Releases", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'genre', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }

                        if(get_post_type( $id ) == 'podcast'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'podcast' ).'">'.esc_attr__("Podcast", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'podcastfilter', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }

                        if(get_post_type( $id ) == 'artist'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'artist' ).'">'.esc_attr__("Artists", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'artistgenre', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }

                        if(get_post_type( $id ) == 'event'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'event' ).'">'.esc_attr__("Events", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'eventtype', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }

                        if(get_post_type( $id ) == 'members'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'members' ).'">'.esc_attr__("Members", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'membertype', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }

                        if(get_post_type( $id ) == 'shows'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'shows' ).'">'.esc_attr__("Shows", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'showgenre', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }

                        if(get_post_type( $id ) == 'schedule'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'schedule' ).'">'.esc_attr__("Schedules", "_s").'</a>';
                        }

                        if(get_post_type( $id ) == 'chart'){
                            echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'chart' ).'">'.esc_attr__("Charts", "_s").'</a>';
                            echo get_the_term_list( $post->ID, 'chartcategory', '<li> '.$icn, '</li><li> / ', '</li>' );
                        }
                        
                        


                        echo "<li>".$icn;
                        the_title();
                        echo '</li>';
                } elseif (is_page()) {
                        echo '<li>'.$icn;
                        echo the_title();
                        echo '</li>';
                } elseif (is_post_type_archive( 'show' ) || is_tax('genre')) {
                        $termname = '';
                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                        if(is_object($term)){
                                echo '<li>'.$icn;
                                echo esc_attr($term->name).' ';
                                echo '</li>';
                                
                        } 
                       
                } elseif (is_post_type_archive( 'chart' ) || is_tax('chartcategory')) {
                        $termname = '';
                        
                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                        if(is_object($term)){
                                echo '<li>'.$icn;
                                echo esc_attr($term->name).' ';
                                echo '</li>';
                                
                        } 

                } elseif (is_post_type_archive( 'podcast' ) || is_tax('podcastfilter')) {
                        
                        echo '<li> '.$icn.'<a href="'.get_post_type_archive_link( 'podcast' ).'">'.esc_attr__("Podcast", "_s").'</a>';
                        $termname = '';
                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                        if(is_object($term)){
                                echo '<li>'.$icn;
                                echo esc_attr($term->name).' ';
                                echo '</li>';
                                
                        } 
                       
                
                       
                }elseif (is_post_type_archive( 'qtvideo' ) || is_tax('vdl_filters')) {
                        $termname = '';
                        
                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                        if(is_object($term)){
                                echo '<li>'.$icn;
                                echo esc_attr($term->name).' ';
                                echo '</li>';
                                
                        } 
                       
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo "<li>".$icn.esc_attr__('Archive for',"_s")." "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo "<li>".$icn.esc_attr__('Archive for',"_s")." "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo "<li>".$icn.esc_attr__('Archive for',"_s")." "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo "<li>".$icn.esc_attr__('Author Archive',"_s").""; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>".$icn.esc_attr__('Blog Archives',"_s").""; echo'</li>';}
        elseif (is_search()) {echo "<li>".$icn.esc_attr__('Search Results',"_s").""; echo'</li>';}
        echo '</ul>';


?>