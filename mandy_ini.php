<?php
/*
Plugin Name:Mandy 移动端主题
Plugin URI:http://www.xlyxu.cn/mandy
Description:轻巧、灵动
Version:3.0
Author:Qinnek
Author URI:http://www.xlyxu.cn/
*/
define('MANDY_VERSION', '2.0.0');
define('MANDY_URL', plugin_dir_path(__FILE__));
// 移除HTML过滤
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );
//引用后台
require_once dirname( __FILE__ ) . '/option.php';
require_once dirname( __FILE__ ) . '/class.php';
new mandy_Settings_API_Test();
//菜单
if ( function_exists('register_nav_menus') ) {
	register_nav_menus(array(
	'mandy_primary' => '[Mandy]手机导航菜单'
	));
}
//移动端域名
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

 function mandy_phone_switching_primary(){
	return '../plugins/mandy/mandy_main';
}
 if (ma_get_option('sw_mobi','mandy_basics','') == 't') {
if ($_SERVER['SERVER_NAME'] == ma_get_option( 'mobi', 'mandy_basics', '' )) {
	define('WP_HOME' ,'http://' . ma_get_option( 'mobi', 'mandy_basics', '' ));
	define('WP_SITEURL',WP_HOME);
	add_filter( 'template', 'mandy_phone_switching_primary' );
	add_filter( 'stylesheet', 'mandy_phone_switching_primary' );
	define ('MOBILE_THEME', true);
}elseif(strpos($_SERVER['HTTP_USER_AGENT'],'baidu Transcoder')){ //百度转码跳转
	header('Location: '. 'http://' . ma_get_option( 'mobi', 'mandy_basics', '' ) . $_SERVER["REQUEST_URI"]);
	die();
}else{

	if (!empty($_GET['m_action'])) {
		if ($_GET['m_action'] == 'nomobile') {
			setcookie('wordpress_mobile_domain_disable', 1, time()+86400, '/', bloginfo('url'), false);
			if (!empty($_SERVER['HTTP_REFERER'])) {
				$go = str_replace(ma_get_option( 'mobi', 'mandy_basics', '' ), bloginfo('url'), $_SERVER['HTTP_REFERER']);
				header ('location:'.$go);
				die();
			} else {
				header ('location:'.bloginfo('url'));
				die();
			}
		}
	}

		if ( $detect->isMobile() ) {
			if (!isset($_COOKIE['wordpress_mobile_domain_disable'])) {
				header ('location:http://' . ma_get_option( 'mobi', 'mandy_basics', '' ) . $_SERVER['REQUEST_URI']);
				die();
			}
		}
} }else {
	if ( $detect->isMobile() ) {
			add_filter( 'template', 'mandy_phone_switching_primary' );
	add_filter( 'stylesheet', 'mandy_phone_switching_primary' );
		}
	}


function ma_get_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}

$new_meta_boxes =
array(
    "radio" => array(
        "name" => "_meta_radio",
        "std" => 1,
        "title" => "文章类型样式",
        "buttons" => array('首页大图','首页小图'),
        "type"=>"radio"),

);
function new_meta_boxes() {
    global $post, $new_meta_boxes;
    foreach($new_meta_boxes as $meta_box) {
        //获取保存的是
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
        if($meta_box_value != "")
            $meta_box['std'] = $meta_box_value;//将默认值替换为以保存的值

        echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
        //通过选择类型输出不同的html代码
        switch ( $meta_box['type'] ){
            case 'radio':
                echo'<h4>'.$meta_box['title'].'</h4>';
                $counter = 1;
                foreach( $meta_box['buttons'] as $radiobutton ) {
                    $checked ="";
                    if(isset($meta_box['std']) && $meta_box['std'] == $counter) {
                        $checked = 'checked = "checked"';
                    }
                    echo '<input '.$checked.' type="radio" class="kcheck" value="'.$counter.'" name="'.$meta_box['name'].'_value"/>'.$radiobutton;
                    $counter++;
                }
                break;
        }
    }
}
function ma_create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '[Mandy] 仅对移动端生效', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}
function ma_save_postdata( $post_id ) {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        }
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }

        $data = $_POST[$meta_box['name'].'_value'];

        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    }
}
add_action('admin_menu', 'ma_create_meta_box');
add_action('save_post', 'ma_save_postdata');
