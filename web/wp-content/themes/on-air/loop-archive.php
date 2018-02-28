
            <div>
                <?php
                /*
                *
                *   Ready for different custom post type archives
                *
                */
                if(is_post_type_archive( 'podcast' ) || is_tax('filter')){
                    get_template_part( 'loop', 'archivepodcast' );
                } else {
                    while ( have_posts() ) : the_post(); 
                        ?><div class="row"><?php
                        global $post;
                        $sticky = '';
                        if(is_sticky($post->ID)){
                            get_template_part("part","post-featured");
                        } else {
                            get_template_part("part","post");
                        }
                        ?></div><?php
                    endwhile; // end of the loop. 
                }
                ?>
            </div>
            <footer class="paper z-depth-1 qw-padded">
                <?php
// Previous/next page navigation.
            page_navi( array(
                'prev_text'          => __( 'Previous page', '_s' ),
                'next_text'          => __( 'Next page', '_s' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', '_s' ) . ' </span>',
            ) );
                ?>
            </footer>
