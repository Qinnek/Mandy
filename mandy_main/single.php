<?php
/**
* Mandy 移动端主题-文章页
*
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
 get_header(); ?>
     <!--content-->
            <div id="main">

	 <?php if ( have_posts() ): ?>
       <?php while ( have_posts() ) : the_post(); ?>
       <div class="ma_content_block">
       <div class="ma_hd_con_head">

      <?php if (has_post_thumbnail()) { ?>
        <a id="banner" class="banner-page lazy" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-original="<?php $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); echo $medium_image_url[0]; ?>">
          <h1 class="banner-title">
            <?php the_title(); ?>
          </h1>
       </a>
		<?php }  ?>

       </div>
      <article data-am-widget="paragraph" class="am-paragraph am-paragraph-default ma_content_article am-no-layout" data-am-paragraph="{ tableScrollable: true, pureview: false }">
            <?php if (!has_post_thumbnail()) {?>
     <h1 class="ma_article_title"><?php the_title(); ?></h1>
             <?php } ?>
      <div class="ma_article_user_time">发表于：<?php echo time_ago(get_the_date('U'));?></div>
          <?php the_content(); ?>
          <?php echo ma_get_option( 'single_ads', 'mandy_ads', '' ) ?>
      </article>
          <div class="author__wrap">
            <div class="author__avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ),'80' ); ?></div>
            <div class="author__text">
                <div class="author__name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="Posts by bianca" rel="author"><?php echo esc_attr( get_the_author() ); ?></a></div>
                <div class="author__description">
                 &nbsp;<?php echo the_author_meta('description');?>
                </div>
            </div>
        </div>
        <ul class="am-pagination">
          <li class="am-pagination-prev"><?php previous_post_link( '%link', '&larr; ' . '%title' ); ?></li>
          <li class="am-pagination-next"><?php next_post_link( '%link', '%title' . ' &rarr;' ); ?></li>
        </ul>
</div>

    <?php endwhile; ?>
    <?php comments_template( '', true ); ?>
         <?php endif; ?>
            </div>
 <?php get_footer(); ?>
