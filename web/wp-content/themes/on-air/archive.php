<?php
/**
 * Archive Template
 *
 */
?>
<?php get_header(); ?>        
<!-- ====================================================== blog ====================================================== -->
<header class="paper qw-header z-depth-1">
    <div class="container ">
        <h2 class="qw-header-title grey-text">
            <?php
            get_template_part("part","archivetitle");
            ?>
        </h2>
        <?php get_template_part ('inc/breadcrumb'); ?>
    </div>
  
</header>

<div class="container">
    <div class="row">
        <div class="col s12 m12 <?php $s = get_theme_mod('QT_sidebar_number'); if($s == '2'){ ?>l6<?php }else{ ?>l8 <?php } ?>" id="qwArchiveContainer">
        <?php  get_template_part('loop','archive'); ?>
        </div>
        <?php get_template_part ('sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>