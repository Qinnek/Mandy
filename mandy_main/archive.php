<?php
/**
* Mandy 移动端主题-分类页
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
          if ( $wp_query->is_author() ){
            $curauth = $wp_query->get_queried_object();
            echo get_avatar(get_the_author_meta( 'user_email' ),'48' );
			printf(get_the_author());
          } else if ( $wp_query->is_home() ) {
            printf( '最新文章', 'mandy' );
          } else {
            the_archive_title( '', '' );
          } ?>
          <small><?php echo category_description();?></small>
     </h3>
      <?php if ( have_posts() ) {
         include 'list.php';
        } else {
          echo '<p class="non">没有文章</p>';
        }?>
<?php get_footer(); ?>
