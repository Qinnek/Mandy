<div id="main">
 <div class="ma_content ma_content_list">
  <div class="ma_article_like">
    <div class="ma_content_main ma_article_like_delete">
      <div data-am-widget="list_news" class="am-list-news am-list-news-default am-no-layout">
        <div class="am-list-news-bd">
          <ul class="am-list">
   <?php if ( have_posts() ):
        while ( have_posts() ) : the_post();
         if (get_post_meta($post->ID, "_meta_radio_value", true) == "1") { ?>
           <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right ma_list_one_block">
            <div class="ma_list_one_info">
                <div class="ma_list_one_info_l">
                    <div class="ma_list_one_info_ico"><?php echo get_avatar( get_the_author_meta( 'user_email' ),'32' ); ?></div>
                    <div class="ma_list_one_info_name"><?php the_author_posts_link(); ?></div>
                </div>
                <div class="ma_list_one_info_r">
                    <div class="ma_list_tag "><?php the_category(', ') ?></div>
                </div>
            </div>
            <?php if (has_post_thumbnail()) { ?>
              <a id="banner" class="banner-page lazy" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-original="<?php $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); echo $medium_image_url[0]; ?>">
                <h1 class="banner-title">
                  <?php the_title(); ?>
                </h1>
             </a>
             <?php } ?>
            <div class="am-u-sm-12 am-list-main ma_list_one_nr">
              <?php
                if (!has_post_thumbnail()) { ?>
                  <h3 class="am-list-item-hd ma_list_one_bt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
              <?php  } ?>
                <div class="am-list-item-text ma_list_one_text"><?php the_excerpt(); ?></div>
            </div>
          </li>
      <?php } else {  ?>
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right ma_list_one_block">
         <div class="ma_list_one_info">
             <div class="ma_list_one_info_l">
                 <div class="ma_list_one_info_ico"><?php echo get_avatar( get_the_author_meta( 'user_email' ),'32' ); ?></div>
                 <div class="ma_list_one_info_name"><?php the_author_posts_link(); ?></div>
             </div>
             <div class="ma_list_one_info_r">
                 <div class="ma_list_tag "><?php the_category(', ') ?></div>
             </div>
         </div>
         <div class=" am-u-sm-<?php if(has_post_thumbnail()) {echo "8";} else {echo "12";} ?> am-list-main ma_list_one_nr">
             <h3 class="am-list-item-hd ma_list_one_bt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
             <div class="am-list-item-text ma_list_one_text"><?php the_excerpt(); ?></div>
         </div>
         <?php if (has_post_thumbnail()) { ?>
           <div class="am-u-sm-4 largeimg am-list-thumb">
             <a href="<?php the_permalink(); ?>">
               <img class="aligncenter ma_list_one_img" src="<?php echo $greyimg ?>" data-original="<?php $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); echo $medium_image_url[0];	?>">
             </a>
           </div>
          <?php } ?>
       </li>
        <?php } ?>
  <?php endwhile; ?>
      </ul>
      </div>
      </div>
      </div>
    </div>
  <ul class="am-pagination">
    <li class="am-pagination-prev"><?php previous_posts_link(__('&laquo; 上一页','mandy') ); ?></li>
    <li class="am-pagination-next"><?php next_posts_link(__('下一页 &raquo;','mandy') ); ?></li>
  </ul>
  </div>
 <?php endif; ?>
  </div>
