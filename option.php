<?php
/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('mandy_Settings_API_Test' ) ):
class mandy_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new mandy_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

       function admin_menu() {
        add_menu_page( 'Mandy 设置', 'Mandy 设置', 'delete_posts', 'mandy_settings', array($this,'plugin_page'),'dashicons-smartphone');
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'mandy_basics',
                'title' => __( '常规设置', 'mandy' )
            ),
            array(
                'id' => 'mandy_advanced',
                'title' => __( '首页幻灯片设置', 'mandy' )
            ),
            array(
                'id' => 'mandy_others',
                'title' => __( '首页头像设置', 'mandy' )
            ),
            array(
                'id' => 'mandy_style',
                'title' => __( '样式增强', 'wpmandyuf' )
            ),
			      array(
                'id' => 'mandy_links',
                'title' => __( '代码', 'mandy' )
            ),
            array(
                      'id' => 'mandy_ads',
                      'title' => __( '广告', 'mandy' )
                  ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'mandy_basics' => array(
                array(
                    'name'              => 'icp',
                    'label'             => __( '网站 ICP 备案号', 'mandy' ),
                    'desc'              => __( '会自动链接到工信部的官网，假如你使用的是非中国大陆的主机，请留空。', 'mandy' ),
                    'type'              => 'text',
                    'default'           => '',
                ),
			 array(
                    'name'              => 'sw_mobi',
                    'label'             => __( '手机端是否跳转其它域名', 'mandy' ),
                    'desc'              => __( '假如选是，则在移动端跳转下面用户设定的手机域名地址（需要进行域名解析），显示的是Mandy 移动端主题。假如选否，则在移动端使用 PC端 的域名，显示的是 Mandy 移动端主题 ', 'mandy' ),
                    'type'    => 'select',
                    'default' => 'f',
                    'options' => array(
                        't' => '是',
                        'f'  => '否'
                    )
                ),
				 array(
                    'name'              => 'mobi',
                    'label'             => __( '手机域名地址', 'mandy' ),
                    'desc'              => __( '当用户用手机访问你的站点会自动跳转至手机域名，假如你上面的选项选了否，请留空。', 'mandy' ),
                    'type'              => 'text',
                    'default'           => '',
                ),
          array(
                     'name'              => 'support_theme',
                     'label'             => __( '是否保留鸣谢主题信息', 'mandy' ),
                     'desc'              => __( '希望各位能够支持我们的工作，能让这一主题延续传播下去', 'mandy' ),
                     'type'    => 'select',
                     'default' => 't',
                     'options' => array(
                         't' => '是',
                         'f'  => '否'
                     )
                 ),
          array(
                    'name'    => 'faviconimg',
                    'label'   => __( '网站favicon图片', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),
                array(
                    'name'    => 'safariimg',
                    'label'   => __( 'Safari 网站大图', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),
                array(
                    'name'    => 'top_selectbox',
                    'label'   => __( '顶部显示内容', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'select',
                    'default' => 'tx',
                    'options' => array(
                        'tx' => '头像',
                        'hdp'  => '幻灯片'
                    )
                ),
                array(
                    'name'    => '404_image',
                    'label'   => __( '404页面图片', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),
                array(
                    'name'  => 'bulletin',
                    'label' => __( '首页公告栏信息', 'mandy' ),
                    'desc'  => __( '写什么随便你', 'mandy' ),
                    'type'  => 'textarea'
                ),
				array(
                    'name'    => 'htmlys',
                    'label'   => __( '前台 html 压缩', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'select',
                    'default' => 'f',
                    'options' => array(
                        't' => '开启',
                        'f'  => '关闭'
                    )
                ),
            ),
            'mandy_advanced' => array(
              array(
                  'name'    => 'effect_hd',
                  'label'   => __( '切换效果', 'mandy' ),
                  'desc'    => __( '切换的效果', 'mandy' ),
                  'default' => 'fade',
                  'type'    => 'select',
                  'options' => array(
                      'fade' => '渐变',
                      'coverflow'  => 'Coverflow 效果',
                      'flip' => '反转'
                  )
              ),
                array(
                    'name'    => 'hd1_se',
                    'label'   => __( '幻灯片1', 'mandy' ),
                    'desc'    => __( '打开显示，关闭不显示', 'mandy' ),
                    'type'    => 'select',
                    'options' => array(
                        'yes' => '打开',
                        'no'  => '关闭'
                    )
                ),
				 array(
                    'name'    => 'hd1_li',
                    'label'   => __( '幻灯片1 链接', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'text',
                    'default' => '',
                ),
				 array(
                    'name'  => 'hd1_ms',
                    'label' => __( '幻灯片1 描述', 'mandy' ),
                    'desc'  => __( '', 'mandy' ),
                    'type'  => 'textarea'
                ),
                array(
                    'name'    => 'hd1_tu',
                    'label'   => __( '幻灯片1 图片', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),
				 array(
                    'name'    => 'hd2_se',
                    'label'   => __( '幻灯片2', 'mandy' ),
                    'desc'    => __( '打开显示，关闭不显示', 'mandy' ),
                    'type'    => 'select',
                    'options' => array(
                        'yes' => '打开',
                        'no'  => '关闭'
                    )
                ),
				 array(
                    'name'    => 'hd2_li',
                    'label'   => __( '幻灯片2 链接', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'text',
                    'default' => '',
                ),
				 array(
                    'name'  => 'hd2_ms',
                    'label' => __( '幻灯片2 描述', 'mandy' ),
                    'desc'  => __( '', 'mandy' ),
                    'type'  => 'textarea'
                ),
         array(
                    'name'    => 'hd2_tu',
                    'label'   => __( '幻灯片2 图片', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),

				 array(
                    'name'    => 'hd3_se',
                    'label'   => __( '幻灯片3', 'mandy' ),
                    'desc'    => __( '打开显示，关闭不显示', 'mandy' ),
                    'type'    => 'select',
                    'options' => array(
                        'yes' => '打开',
                        'no'  => '关闭'
                    )
                ),
				 array(
                    'name'    => 'hd3_li',
                    'label'   => __( '幻灯片3 链接', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'text',
                    'default' => '',
                ),
				 array(
                    'name'  => 'hd3_ms',
                    'label' => __( '幻灯片3 描述', 'mandy' ),
                    'desc'  => __( '', 'mandy' ),
                    'type'  => 'textarea'
                ),
                array(
                    'name'    => 'hd3_tu',
                    'label'   => __( '幻灯片3 图片', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),

				 array(
                    'name'    => 'hd4_se',
                    'label'   => __( '幻灯片4', 'mandy' ),
                    'desc'    => __( '打开显示，关闭不显示', 'mandy' ),
                    'type'    => 'select',
                    'options' => array(
                        'yes' => '打开',
                        'no'  => '关闭'
                    )
                ),
				 array(
                    'name'    => 'hd4_li',
                    'label'   => __( '幻灯片4 链接', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'text',
                    'default' => '',
                ),
				 array(
                    'name'  => 'hd4_ms',
                    'label' => __( '幻灯片4 描述', 'mandy' ),
                    'desc'  => __( '', 'mandy' ),
                    'type'  => 'textarea'
                ),
                array(
                    'name'    => 'hd4_tu',
                    'label'   => __( '幻灯片4 图片', 'mandy' ),
                    'desc'    => __( '', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                )
            ),
            'mandy_style' => array(
              array(
                        'name'    => 'top_color',
                        'label'   => __( '主题配色', 'mandy' ),
                        'desc'    => __( '别选白色', 'mandy' ),
                        'type'    => 'color',
                        'default' => '#000'
                    ),
                array(
                    'name'    => 'style_yzk',
                    'label'   => __( '头部标题-有字库字体Class', 'mandy' ),
                    'desc'    => __( '有字库官网上，选有字库的Class方式，填入类名，然后在代码设置区域引用代码。实在不懂，我们有视频教程（github和官方说明里有视频地址）', 'mandy' ),
                    'type'    => 'text',
                    'default' => ''
                ),
                array(
                    'name'    => 'style_yzk_size',
                    'label'   => __( '头部标题-字体字号', 'mandy' ),
                    'desc'    => __( '加px单位', 'mandy' ),
                    'type'    => 'text',
                    'default' => ''
                ),
            ),
            'mandy_others' => array(
                array(
                    'name'    => 'human_text',
                    'label'   => __( '头像名称', 'mandy' ),
                    'desc'    => __( '你的名字', 'mandy' ),
                    'type'    => 'text',
                    'default' => ''
                ),
                array(
                    'name'  => 'human_textarea',
                    'label' => __( '头像描述', 'mandy' ),
                    'desc'  => __( '自我介绍', 'mandy' ),
                    'type'  => 'textarea'
                ),
                array(
                    'name'    => 'human_image',
                    'label'   => __( '头像图片', 'mandy' ),
                    'desc'    => __( '可以放你自己的照片', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                ),
				array(
                    'name'    => 'human_bak',
                    'label'   => __( '头像背景图片', 'mandy' ),
                    'desc'    => __( '可以放你自己的照片', 'mandy' ),
                    'type'    => 'file',
                    'default' => ''
                )
            ),
			 'mandy_links' => array(
                array(
                    'name'  => 'head_code',
                    'label' => __( '头部代码', 'mandy' ),
                    'desc'  => __( '如Style标签自定义样式。代码会输出在head标签里', 'mandy' ),
                    'type'  => 'textarea'
                ),
				         array(
                    'name'  => 'body_code',
                    'label' => __( '尾部代码', 'mandy' ),
                    'desc'  => __( '如CNZZ统计代码。代码会输出在body标签结束前，自带JQ 3.2.1', 'mandy' ),
                    'type'  => 'textarea'
                ),
            ),
          'mandy_ads' => array(
                     array(
                         'name'  => 'footed_ads',
                         'label' => __( '全站底部广告位', 'mandy' ),
                         'desc'  => __( '请添加相关广告代码', 'mandy' ),
                         'type'  => 'textarea'
                     ),
     				          array(
                         'name'  => 'single_ads',
                         'label' => __( '文章底部广告位', 'mandy' ),
                         'desc'  => __( '请添加相关广告代码', 'mandy' ),
                         'type'  => 'textarea'
                     ),
                 )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
