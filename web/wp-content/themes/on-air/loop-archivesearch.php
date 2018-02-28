
            <div class="paper qw-padded z-depth-1">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php

                global $post;
                         get_template_part("part","searchresult");
                ?>
                  <?php endwhile; ?>
            </div>
            <footer class="paper z-depth-1 qw-padded qw-top30">
                <?php
// Previous/next page navigation.
            page_navi( array(
                'prev_text'          => esc_attr__( 'Previous page', '_s' ),
                'next_text'          => esc_attr__( 'Next page', '_s' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_attr__( 'Page', '_s' ) . ' </span>',
            ) );
                ?>
            </footer>
