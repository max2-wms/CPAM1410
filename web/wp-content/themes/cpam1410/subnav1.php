<?php
	$category = get_the_category(); 
?>

<ul class="subnav no_margins">
    <li class="capitalize bold">&raquo;&nbsp;<?php echo $lang['nav3']; ?></li>
    <li class="big_gap<?php echo $category[0]->cat_ID == 4?" current":""; ?>"><a href="<?php echo get_category_link(4); ?>"><?php echo $lang['subnav1']; ?></a></li>
    <li class="gap<?php echo $category[0]->cat_ID == 3?" current":""; ?>"><a href="<?php echo get_category_link(3); ?>"><?php echo $lang['subnav2']; ?></a></li>
    <li class="gap<?php echo $category[0]->cat_ID == 5?" current":""; ?>"><a href="<?php echo get_category_link(5); ?>"><?php echo $lang['subnav3']; ?></a></li>
    <li class="gap<?php echo $category[0]->cat_ID == 6?" current":""; ?>"><a href="<?php echo get_category_link(6); ?>"><?php echo $lang['subnav4']; ?></a></li>
</ul>