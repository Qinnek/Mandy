 <?php
/**
* Mandy 移动端主题-模板函数
*
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
// fallback_cb
function none_menu () {
	echo '<ul class="none_menu"><li><a href="'.home_url().'/wp-admin/nav-menus.php">请到后台设置菜单</a></li></ul>';
}
//发布日期 BY 大发
function time_ago( $from, $to = '' ) {
    if ( empty( $to ) ) {
        $to = time();
    }
    $diff = (int) abs( $to - $from );

    if ( $diff < 60 ) {
        $mins = round( $diff / 60 );
        if ( $mins <= 1 )
            $mins = 1;
        /* translators: min=minute */
        $since = $mins.' 分钟';
    } elseif ( $diff < 60 * 60* 24 && $diff >= 60 * 60 ) {
        $hours = round( $diff / ( 60*60 ) );
        if ( $hours <= 1 )
            $hours = 1;
        $since = $hours.' 小时';
    } elseif ( $diff < 60 * 60 * 24 * 7 && $diff >= 60 * 60 * 24 ) {
        $days = round( $diff / ( 60 * 60 * 24 ) );
        if ( $days <= 1 )
            $days = 1;
        $since = $days. ' 天';
    } elseif ( $diff < 30 * 60 * 60 * 24 && $diff >= 60 * 60 * 24 * 7 ) {
        $weeks = round( $diff / ( 60 * 60 * 24 * 7 ) );
        if ( $weeks <= 1 )
            $weeks = 1;
        $since = $weeks . ' 周';
    } elseif ( $diff < 60 * 60 * 24 * 365  && $diff >= 30 * 60 * 60 * 24 ) {
        $months = round( $diff / ( 30 * 60*60*24 ) );
        if ( $months <= 1 )
            $months = 1;
        $since = $months .' 月';
    } elseif ( $diff >= 60 * 60 * 24 * 365 ) {
        $years = round( $diff / (60 * 60 * 24 * 365) );
        if ( $years <= 1 )
            $years = 1;
        $since = $years .' 年';
    }

    return $since.'前';
}
//禁用谷歌字体 By WP大学
add_filter( 'gettext_with_context', 'wpdx_disable_open_sans', 888, 4 );
function wpdx_disable_open_sans( $translations, $text, $context, $domain ) {
  if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
    $translations = 'off';
  }
  return $translations;
}
// 添加特色图像功能
add_theme_support('post-thumbnails');
set_post_thumbnail_size(130, 100, true); // 图片宽度与高度
//Gravar By WP酷
function replace_avatar_url($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"ds-gravatar.qiniudn.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'replace_avatar_url', 10, 3 );
//禁止wptexturize函数
remove_filter('the_content', 'wptexturize');
remove_action('pre_post_update', 'wp_save_post_revision' );
add_action( 'wp_print_scripts', 'disable_autosave' );
function disable_autosave() {
    wp_deregister_script('autosave');
}
//去除冗余html代码
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 ); //Javascript的调用
remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );//清除前后文信息
remove_action('wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'locale_stylesheet' );
remove_action('publish_future_post','check_and_publish_future_post',10, 1 );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_print_styles', 8 );//载入css
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_footer', 'wp_print_footer_scripts' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
}
//强制JQ库底部载入
function ds_print_jquery_in_footer( &$scripts) {
    if ( ! is_admin() )
        $scripts->add_data( 'jquery', 'group', 1 );
}
add_action( 'wp_default_scripts', 'ds_print_jquery_in_footer' );
//禁用WP Cron
define('DISABLE_WP_CRON', true);

//去除顶部工具栏
show_admin_bar(false);

// 禁用wordpress评论html代码
// This will occur when the comment is posted
function plc_comment_post( $incoming_comment ) {
// convert everything in a comment to display literally
$incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
// the one exception is single quotes, which cannot be #039; because WordPress marks it as spam
$incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
return( $incoming_comment );
}
// This will occur before a comment is displayed
function plc_comment_display( $comment_to_display ) {
// Put the single quotes back in
$comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
return $comment_to_display;
}
add_filter( 'preprocess_comment', 'plc_comment_post', '', 1);
add_filter( 'comment_text', 'plc_comment_display', '', 1);
add_filter( 'comment_text_rss', 'plc_comment_display', '', 1);
add_filter( 'comment_excerpt', 'plc_comment_display', '', 1);
// 图片延迟加载
function add_image_placeholders( $content ) {
	$greyimg = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAAAAA/+EDKWh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMwNjcgNzkuMTU3NzQ3LCAyMDE1LzAzLzMwLTIzOjQwOjQyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0QTU1QjJCQTZBMzkxMUU1QjNDREQ5RUMyMTlCRkM1QiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0QTU1QjJCOTZBMzkxMUU1QjNDREQ5RUMyMTlCRkM1QiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBNzdENDIyMDI4MzcxMUU0QTVCQkI4MkNDMEE4NTAzMCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBNzdENDIyMTI4MzcxMUU0QTVCQkI4MkNDMEE4NTAzMCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEABsaGikdKUEmJkFCLy8vQkc/Pj4/R0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0cBHSkpNCY0PygoP0c/NT9HR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR//AABEIASwBkAMBIgACEQEDEQH/xABLAAEBAAAAAAAAAAAAAAAAAAAABgEBAAAAAAAAAAAAAAAAAAAAABABAAAAAAAAAAAAAAAAAAAAABEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AowAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAf/9k= ';
    if( is_feed() || is_preview() || ( function_exists( 'is_mobile' ) && is_mobile() ) )
        return $content;
    if ( false !== strpos( $content, 'data-original' ) )
        return $content;
    $placeholder_image = apply_filters( 'lazyload_images_placeholder_image', $greyimg );
    $content = preg_replace( '#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#', sprintf( '<img${1}src="%s" data-original="${2}"${3}><noscript><img${1}src="${2}"${3}></noscript>', $placeholder_image ), $content );
    return $content;
}
add_filter( 'the_content', 'add_image_placeholders', 99 );
//title By Devework
function get_page_number() {
    if ( get_query_var('paged') ) {print ' | ' . '第'. get_query_var('paged') . '页';}}
function ma_meta_title(){
        if ( is_single() ) {
            single_post_title(); echo ' | '; bloginfo( 'name' );
        } elseif ( is_home() || is_front_page() ) {
            bloginfo( 'name' );
            if( get_bloginfo( 'description' ) ) {
              echo ' | ' ; bloginfo( 'description' ); get_page_number();
            }
        } elseif ( is_page() ) {
            single_post_title( '' ); echo ' | '; bloginfo( 'name' );
        } elseif ( is_search() ) {
            printf( __( '有关 %s 的搜索结果：', 'Geekwork' ), '"'.get_search_query().'"' ); get_page_number(); echo ' | '; bloginfo( 'name' );
        } elseif ( is_404() ) {
            _e( '404 Not Found', 'Geekwork' ); echo ' | '; bloginfo( 'name' );
        } else {
            wp_title( '' ); echo ' | '; bloginfo( 'name' ); get_page_number();
        }
    }
// 分类、标签浏览结果
function ma_archive_traffic( $type='' , $pid='' ) {
  global $dmeng_Tracker;

  $vars = $dmeng_Tracker->vars();
  if ($type=='')
    $type = $vars['type'];

  if ($pid=='')
    $pid = $vars['pid'];

  return $dmeng_Tracker->get_var( $type , $pid );
}
// 压缩html BY 张戈博客
function wp_compress_html(){
    function wp_compress_html_main ($buffer){
        $initial=strlen($buffer);
        $buffer=explode("<!--wp-compress-html-->", $buffer);
        $count=count ($buffer);
        for ($i = 0; $i <= $count; $i++){
            if (stristr($buffer[$i], '<!--wp-compress-html no compression-->')) {
                $buffer[$i]=(str_replace("<!--wp-compress-html no compression-->", " ", $buffer[$i]));
            } else {
                $buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
                $buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
                $buffer[$i]=(str_replace("\n", "", $buffer[$i]));
                $buffer[$i]=(str_replace("\r", "", $buffer[$i]));
                while (stristr($buffer[$i], '  ')) {
                    $buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
                }
            }
            $buffer_out.=$buffer[$i];
        }
        $final=strlen($buffer_out);
        $savings=($initial-$final)/$initial*100;
        $savings=round($savings, 2);
        $buffer_out.="\n<!--压缩前的大小: $initial bytes; 压缩后的大小: $final bytes; 节约：$savings% -->";
    return $buffer_out;
}
ob_start("wp_compress_html_main");
}
if ( ma_get_option( 'htmlys', 'mandy_basics', '' ) == 't') { add_action('get_header', 'wp_compress_html'); }
