<div>
    <div class="row">

    
    <?php
    
     while ( have_posts() ) : the_post(); 
            
            global $post;
            $sticky = '';
            if(is_sticky($post->ID)){
                get_template_part("part","post-featured");
            } else {
                get_template_part("part","post-third");
            }
         
        endwhile; // end of the loop. 
    ?>
    </div>
</div>
