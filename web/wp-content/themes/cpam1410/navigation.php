<ul>
	<?php echo is_page(2)?"<li class='left current'>":"<li class='left'>"; ?>
    	<a id="nav1" href="<?php echo get_page_link(2); ?>"><span class="hide"><?php echo $lang['nav1']; ?></span></a>
	</li>
    <?php echo is_page(10)?"<li class='left gap current'>":"<li class='left gap'>"; ?>
    	<a id="nav2" href="<?php echo get_page_link(10); ?>"><span class="hide"><?php echo $lang['nav2']; ?></span></a>
	</li>
	<?php echo is_page(12)?"<li class='left gap current'>":"<li class='left gap'>"; ?>
    	<a id="nav3" href="<?php echo get_page_link(12); ?>"><span class="hide"><?php echo $lang['nav3']; ?></span></a>
	</li>
    <?php echo is_page(6550)?"<li class='left gap current'>":"<li class='left gap'>"; ?>
    	<a id="nav6" href="<?php echo get_page_link(6550); ?>"><span class="hide"><?php echo $lang['nav6']; ?></span></a>
	</li>
    <?php echo is_page(14)?"<li class='left gap current'>":"<li class='left gap'>"; ?>
    	<a id="nav4" href="<?php echo get_page_link(14); ?>"><span class="hide"><?php echo $lang['nav4']; ?></span></a>
	</li>
    <?php echo is_page(16)?"<li class='left gap current'>":"<li class='left gap'>"; ?>
    	<a id="nav5" href="<?php echo get_page_link(16); ?>"><span class="hide"><?php echo $lang['nav5']; ?></span></a>
	</li>
    <li class="clear"></li>
</ul>