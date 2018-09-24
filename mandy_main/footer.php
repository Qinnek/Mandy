<?php
/**
* Mandy 移动端主题-底部
*/
?>
</div>
<hr/>
  <footer data-am-widget="footer" class="am-footer am-footer-default">
    <div class="am-footer-miscs ">
        <?php echo ma_get_option('footed_ads', 'mandy_ads', '') ?>
        <p>©<?php date_default_timezone_set("PRC");echo date("Y");?> <?php bloginfo('name'); ?>
          <?php $spth = ma_get_option( 'support_theme', 'mandy_basics', 't' );  if ($spth == 't') { ?>
          · Mobile Theme by <a href="https://www.xlyxu.cn">Mandy</a></p>
          <?php  } ?>
        <p><a href="http://www.miitbeian.gov.cn/"><?php echo ma_get_option( 'icp', 'mandy_basics', '' );?></a></p>
    </div>
  </footer>
 		 <!--Modal-->
  <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default  am-no-layout" id="">
    <ul class="btn3 clearfix">
    <li class="ma_menu bt-name" data-am-navbar-share="">
        <a href="###">
          <span class="am-icon-share-square-o"></span>
          <span class="am-navbar-label">分享</span>
          </a>
    </li><!--Footer menu-->

    <li class="ma_menu bt-name" data-am-navbar-qrcode="">
         <a href="###">
          <span class="am-icon-qrcode"></span>
          <span class="am-navbar-label">本页二维码</span>
          </a>
    </li>
    <li class="ma_menu bt-name am-no-layout" data-am-widget="gotop">
       <a href="#top">
          <span class="am-gotop-icon am-icon-chevron-up"></span>
          <span class="am-navbar-label">回顶部</span>
        </a>
    </li>
    </ul>
    </div>

		<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"/></script>
		<script type="text/javascript" src="//cdn.bootcss.com/jQuery.mmenu/5.5.3/core/js/jquery.mmenu.min.js"></script>
    <?php if( ma_get_option( 'top_selectbox', 'mandy_basics', '' ) == 'hdp') {?>
    <script type="text/javascript" src="//cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script> var swiper=new Swiper('.swiper-container',{pagination:'.swiper-pagination',paginationClickable:'.swiper-pagination',nextButton:'.swiper-button-next',prevButton:'.swiper-button-prev',spaceBetween:30,effect:'<?php echo ma_get_option( 'effect_hd', 'mandy_advanced', 'fade' ) ?>',preventClicks:false,}); </script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/main.js"></script>
    <script>$(".header p").click(function(){window.location.href="<?php bloginfo('url'); ?>"});</script>
    <!--wp-compress-html--><!--wp-compress-html no compression-->
   <?php echo ma_get_option( 'body_code', 'mandy_links', '' ) ?>
    <!--wp-compress-html no compression--><!--wp-compress-html-->
  </div>
	</body>
</html>
