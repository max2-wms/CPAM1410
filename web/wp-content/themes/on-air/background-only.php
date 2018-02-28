<?php
/**
	Template Name: Page with background only

*/
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<style type="text/css">
	body { background-color: #00a7eb; background-repeat: repeat-y; background-position: top center; background-attachment: scroll; }
</style>
<title><?php wp_title(); bloginfo('url'); ?></title>
<?php 
wp_head(); 
?>
</head>
 <body <?php body_class(); ?> id="theBody">

<?php while (have_posts()) : the_post(); ?>
<div id="page-content">
	<?php the_content(); endwhile; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>