<div>
    <div class="row">

    
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
            
            global $post;
            $sticky = '';
            if(is_sticky($post->ID)){
                get_template_part("part","post-featured");
            } else {
                get_template_part("part","post-small");
            }
         
        endwhile; // end of the loop. 
    }
    ?>
    </div>
</div>

