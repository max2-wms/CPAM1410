<?php
/*
Package: OnAir2
Description: AUTHOR PART 
Version: 3.8.7
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- AUTHOR PART ========================= -->
<div class="qt-post-author qt-card">
	<div class="row">
		<?php 
		$authorurl = get_the_author_meta( 'picture' , get_the_author_meta('ID') );
		if($authorurl != '') {
		?>
		<div class="qt-post-author-picture col s2 m2 l1 aligncenter">
			<a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta('ID') ) ); ?>">
				<img src="<?php echo esc_url($authorurl); ?>" alt="<?php echo esc_attr__("Author","onair2"); ?>">
			</a>
		</div>
		<?php } ?>
		<div class="qt-post-author-data col s10 m7 l7">
			<h6><?php echo esc_attr__("Author","onair2");  ?></h6>
			<h4><a href="#author_page"><?php echo get_the_author(); ?></a></h4>
		</div>
		<div class="qt-post-author-link col s12 m3 l4 ">
			<a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta('ID') ) ); ?>" class="qt-btn qt-btn-large qt-btn-primary aligncenter"><?php echo esc_attr__("Author's archive","onair2"); ?></a>
		</div>
	</div>
</div>
<!-- AUTHOR PART END ========================= -->
