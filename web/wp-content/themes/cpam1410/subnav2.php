<ul class="subnav no_margins">
    <li class="capitalize bold">&raquo;&nbsp;<?php echo $lang['nav2']; ?></li>
    <li class="medium_gap<?php echo ( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 1 ) || ( !isset($_REQUEST['schedule']) )?" current":""; ?>"><a href="<?php echo get_page_link(10); ?>?schedule=1"><?php echo $lang['subnav5']; ?></a></li>
    <li class="gap<?php echo isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 2 ?" current":""; ?>"><a href="<?php echo get_page_link(10); ?>?schedule=2"><?php echo $lang['subnav6']; ?></a></li>
    <li class="gap<?php echo isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 3 ?" current":""; ?>"><a href="<?php echo get_page_link(10); ?>?schedule=3"><?php echo $lang['subnav7']; ?></a></li>
    <li class="gap<?php echo isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 4 ?" current":""; ?>"><a href="<?php echo get_page_link(10); ?>?schedule=4"><?php echo $lang['subnav8']; ?></a></li>
</ul>