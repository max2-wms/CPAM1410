<?php
function page_navi($before = '', $after = '') {
    global $wp_query;

    $request = $wp_query->request;
    $posts_per_page = intval(get_query_var('posts_per_page'));
    $paged = intval(get_query_var('paged'));
    $numposts = $wp_query->found_posts;
    $max_page = $wp_query->max_num_pages;
    if(empty($paged) || $paged == 0) {
        $paged = 1;
    }
    $pages_to_show = 7;
    $pages_to_show_minus_1 = $pages_to_show-1;
    $half_page_start = floor($pages_to_show_minus_1/2);
    $half_page_end = ceil($pages_to_show_minus_1/2);
    $start_page = $paged - $half_page_start;
    if($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $paged + $half_page_end;
    if(($end_page - $start_page) != $pages_to_show_minus_1) {
        $end_page = $start_page + $pages_to_show_minus_1;
    }
    if($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = $max_page;
    }
    if($start_page <= 0) {
        $start_page = 1;
    }
    echo '<div class="center-block"><ul class="qw-pagination center-block">'."";
    if ($paged > 1) {
        echo '<li class="prev"><a href="'.esc_url(get_pagenum_link()).'" title="First">
        <i class="mdi-hardware-keyboard-backspace"></i>
        </a></li>';
    }  
 
    
    else { echo '<li class="disabled"><a href="#"><i class="mdi-hardware-keyboard-arrow-left"></i></a></li>'; }
    
    for($i = $start_page; $i  <= $end_page; $i++) {
        if($i == $paged) {
            echo '<li class="active"><a href="#" class="maincolor-text">'.esc_attr($i).'</a></li>';
        } else {
            echo '<li><a href="'.esc_url(get_pagenum_link($i)).'">'.esc_attr($i).'</a></li>';
        }
    }


    if ($end_page < $max_page) {
        echo '<li><a href="'.esc_url(get_pagenum_link($max_page)).'" title="Last">
        <span class="qticon-skip-fast-forward"></span>
        </a></li>';
    }
    echo '</ul></div>';
}

?>