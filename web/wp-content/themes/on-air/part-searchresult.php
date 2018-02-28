<!-- ====================================================== normal post ====================================================== -->
<div class="qw-top30" id="post-<?php the_ID(); ?>" >
    <h5 class="normalfont"><a href="<?php esc_url(the_permalink()); ?>" ><?php the_title(); ?></a></h5>
    <?php the_excerpt();?>
    <a href="<?php esc_url(the_permalink()); ?>" ><?php echo esc_attr__("Read", "_s"); ?> <i class="mdi-content-forward"></i></a>
    <hr class="qw-separator  ">
</div>


