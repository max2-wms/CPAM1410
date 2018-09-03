TYPE=VIEW
query=select `b`.`post_title` AS `titre`,count(0) AS `votes` from (`wordpress`.`wp_wdpv_post_votes` `a` join `wordpress`.`wp_posts` `b`) where (`b`.`ID` = `a`.`post_id`) group by `a`.`post_id` order by count(0) desc limit 15
md5=d74c339ae24b6893f8e5f61b091b40eb
updatable=0
algorithm=0
definer_user=cpam1410
definer_host=localhost
suid=1
with_check_option=0
timestamp=2018-09-02 23:53:47
create-version=1
source=select `b`.`post_title` AS `titre`,count(0) AS `votes` from (`wp_wdpv_post_votes` `a` join `wp_posts` `b`) where (`b`.`ID` = `a`.`post_id`) group by `a`.`post_id` order by count(0) desc limit 15
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `b`.`post_title` AS `titre`,count(0) AS `votes` from (`wordpress`.`wp_wdpv_post_votes` `a` join `wordpress`.`wp_posts` `b`) where (`b`.`ID` = `a`.`post_id`) group by `a`.`post_id` order by count(0) desc limit 15
