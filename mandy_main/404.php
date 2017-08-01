<?php
/**
* Mandy 移动端主题-错误404页面
*
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
 get_header(); ?>
     <!--content-->
     <div id="main">
		 <div class="ma_content ma_content_list">
      		<div class="ma_article_like">
        	  <div class="ma_content_main ma_article_like_delete ">
            	<div class="ma_404_title ma_404_text">404</div>
              <?php $image_404 = ma_get_option( '404_image', 'mandy_basics', '' ); if ($image_404 !== '' ) { ?>
                <img src="<?php echo ma_get_option( '404_image', 'mandy_basics', '' );?>" alt="404页面丢失" class="ma_404_image am-img-thumbnail">
              <?php } ?>
               <div class="ma_404_des">抱歉，你找的东西不见了</div>
                  <div class="am-sm-12">
                    <div class="ma_404_btn" style="text-align: center;">
                        <a class="am-btn am-btn-danger am-radius am-btn-warning" href="<?php bloginfo('url'); ?>">回首页看看</a>
                     </div>
                    </div>
              </div>

       		 </div>
           </div>
 <?php get_footer(); ?>
