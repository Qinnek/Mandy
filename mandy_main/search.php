<?php
/**
* Mandy 移动端主题-搜索页
*
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
 get_header(); ?>
     <!--content-->
     <h3 class="arctips" style="text-align: center;">
      <?php
          global  $wp_query;
          if ( $wp_query->is_search() ){
           printf('搜索', 'mandy');
          }
        ?>
     </h3>
      <?php if ( have_posts() ) { include 'list.php';  } else { echo ' <p class="non">没有文章</p>';}?>
 <?php get_footer(); ?>
