<?php
/**
* Mandy 移动端主题-首页
*
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
 get_header(); ?>
    <!--bannner-->
	<?php if ( $paged < 1 ) { ?>
      <div class="banner">
     	  <div class="banner-img ">
          <!-- 头像 -->
		<?php $top_se = ma_get_option( 'top_selectbox', 'mandy_basics', '' );
		if  ( $top_se == 'tx') { ?>
        <div class="owl_item active ma_testimonial_carousel" style="background-image: url(<?php echo ma_get_option( 'human_bak', 'mandy_others', $greyimg );?>); background-size: cover;">
<div class="item">
			<img src="<?php echo ma_get_option( 'human_image', 'mandy_others', $greyimg );?>">
							<h4><?php echo ma_get_option( 'human_text', 'mandy_others', '自己去后台设置' );?></h4>
							<span><?php echo ma_get_option( 'human_textarea', 'mandy_others', '自己去后台设置' );?></span>
						</div></div>
            <!-- 幻灯片 -->
        <?php } else { ?>
          <div class="swiper-container">
           <div class="swiper-wrapper">
             <?php $op1 = ma_get_option( 'hd1_se', 'mandy_advanced', '' );  if ($op1 == 'yes') { ?>
               <div class="swiper-slide" style="background-image:url(<?php echo ma_get_option( 'hd1_tu', 'mandy_advanced', '' );?>)">
                <a href="<?php echo ma_get_option( 'hd1_li', 'mandy_advanced', '' );?>"><?php echo ma_get_option( 'hd1_ms', 'mandy_advanced', '' );?></a>
               </div>
             <?php } ?>
             <?php $op2 = ma_get_option( 'hd2_se', 'mandy_advanced', '' );  if ($op2 == 'yes') { ?>
               <div class="swiper-slide" style="background-image:url(<?php echo ma_get_option( 'hd2_tu', 'mandy_advanced', '' );?>)">
                <a href="<?php echo ma_get_option( 'hd2_li', 'mandy_advanced', '' );?>"><?php echo ma_get_option( 'hd2_ms', 'mandy_advanced', '' );?></a>
               </div>
             <?php } ?>
             <?php $op3 = ma_get_option( 'hd3_se', 'mandy_advanced', '' );  if ($op3 == 'yes') { ?>
               <div class="swiper-slide" style="background-image:url(<?php echo ma_get_option( 'hd3_tu', 'mandy_advanced', '' );?>)">
                <a href="<?php echo ma_get_option( 'hd3_li', 'mandy_advanced', '' );?>"><?php echo ma_get_option( 'hd3_ms', 'mandy_advanced', '' );?></a>
               </div>
             <?php } ?>
             <?php $op4 = ma_get_option( 'hd4_se', 'mandy_advanced', '' );  if ($op4 == 'yes') { ?>
               <div class="swiper-slide" style="background-image:url(<?php echo ma_get_option( 'hd4_tu', 'mandy_advanced', '' );?>)">
                <a href="<?php echo ma_get_option( 'hd4_li', 'mandy_advanced', '' );?>"><?php echo ma_get_option( 'hd4_ms', 'mandy_advanced', '' );?></a>
               </div>
             <?php } ?>
           </div>
           <!-- Add Pagination -->
           <div class="swiper-pagination swiper-pagination-white"></div>
           <!-- Add Arrows -->
           <div class="swiper-button-next swiper-button-white"></div>
           <div class="swiper-button-prev swiper-button-white"></div>
         </div>
		    <?php } ?>
            </div>
      </div>
<?php } ?>
     <!--content-->
     <?php $bulletin = ma_get_option( 'bulletin', 'mandy_basics', '' ); if ($bulletin !== '' ) { ?>
       <div class="ma-bulletin"><?php echo ma_get_option( 'bulletin', 'mandy_basics', '' );?></div>
    <?php } ?>
     <h2 class="arctips">
      <?php
		  if( $paged && $paged > 1 ){
			printf('最新发布 第'.$paged.'页');
		}else{
			echo "文章列表";
		}
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		    'ignore_sticky_posts' => 1,
		    'paged' => $paged
		);
		query_posts($args);
		  ?>
     </h2>
    <?php include 'list.php'; ?>
 <?php get_footer(); ?>
