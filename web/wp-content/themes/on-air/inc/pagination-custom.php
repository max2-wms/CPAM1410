<?php
global $special_query;
if($special_query->max_num_pages>1){?>
    <ul class="qw-pagination center-block ">
    <?php
      if ($paged > 1) { ?>
        <li><a href="<?php echo '?paged=' . ($paged -1); //prev link ?>"><</a></li>
                        <?php }
    for($i=1;$i<=$special_query->max_num_pages;$i++){?>
         <li><a href="<?php echo '?paged=' . $i; ?>" <?php echo ($paged==$i)? 'class="selected"':'';?>><?php echo esc_attr($i);?></a></li>
        <?php
    }
    if($paged < $special_query->max_num_pages){?>
         <li><a href="<?php echo '?paged=' . ($paged + 1); //next link ?>">></a></li>
    <?php } ?>
    </ul>
<?php } ?>
