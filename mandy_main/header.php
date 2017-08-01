<?php
/**
* Mandy 移动端主题-头部
*
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo ma_get_option( 'safariimg', 'mandy_basics', '' );?>">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
		<title><?php ma_meta_title(); ?></title>
    <link rel="icon" type="image/png" href="<?php echo ma_get_option( 'faviconimg', 'mandy_basics', '' );?>">
		<link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/amazeui/2.7.2/css/amazeui.min.css" />
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/jQuery.mmenu/5.5.3/core/css/jquery.mmenu.css" />
    <?php if (ma_get_option( 'top_selectbox', 'mandy_basics', '' ) == 'hdp') {?><link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css"><?php } ?>
    <style>
      <?php $site_color = ma_get_option( 'top_color', 'mandy_style', '#000' ); ?>
  		.ma_list_tag { background-color: <?php echo $site_color ?>;}
  		span.cat_links a { background-color: <?php echo $site_color ?>;}
  		.reply .comment-reply-link,.am-btn-secondary{ background-color: <?php echo $site_color ?> ;}
  		.form-submit .submit {border: 2px solid <?php echo $site_color ?>;color: <?php echo $site_color ?>;}
  		.am-slider-d2 .am-slider-more { background-color: <?php echo $site_color ?>;}
      .header p {font-size: <?php echo ma_get_option( 'style_yzk_size', 'mandy_style', '' ); ?>}
  		 .header, .footer{
  		 	 <?php wp_reset_query(); if (is_home() || is_front_page() || has_post_thumbnail()) { ?>
  			position: absolute;
  		 	background: -moz-linear-gradient(bottom, rgba(19,20,22,0) 0%, #21292C 100%);
  		 	background: -webkit-gradient(linear, left bottom, left top, color-stop(0%, rgba(19,20,22,0)), color-stop(100%, #21292C));
  		 	background: -webkit-linear-gradient(bottom, rgba(19,20,22,0) 0%, #21292C 100%);
  		 	background: -o-linear-gradient(top, rgba(19,20,22,0) 0%, #21292C 100%);
  		 	background: -ms-linear-gradient(top, rgba(19,20,22,0) 0%, #21292C 100%);
  		 	background: linear-gradient(to top, rgba(19,20,22,0) 0%, #21292C 100%);
  			<?php	} else { ?>
  			position:static;
  			background: <?php echo $site_color ?>;
  			<?php	} ?>
        <?php if ($paged && $paged > 1 || is_search() || is_author() || is_category() || is_404()) { ?>
          position:static;
    			background: <?php echo $site_color ?>;
        <?php  } ?>
  		 }
  		.am-btn-secondary { border-color: #FFF;}
		</style>
    <?php echo ma_get_option( 'head_code', 'mandy_links', '' ) ?>
	</head>
	<body>
		<div class="search">
  		<button id="btn-search-close" type="button" class="am-btn am-btn-success am-round">Close</button>
  		<form class="search__form" action="<?php echo home_url( '/' ); ?>">
  			<input type="search" class="am-form-field am-round" placeholder="善用搜索" style="margin-top: 6px;" value="<?php the_search_query(); ?>" name="s" id="s" />
  		</form>
		</div>
		<div id="page" class="main-wrap">
			<div class="header">
				<a href="#menu" class="menu1"></a>
        <a id="btn-search" class="menu2"></a>
				<p class="<?php echo ma_get_option( 'style_yzk', 'mandy_style', '' ) ?>"><?php bloginfo('name'); ?></p>
			</div>
	      <nav id="menu">
				 	<?php wp_nav_menu(array(
            'theme_location' => 'mandy_primary',
            'container' => false,
            'fallback_cb'  => 'none_menu',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>'
          ,)); ?>
				</nav>
