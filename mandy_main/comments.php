<?php
/**
* Mandy 移动端主题-评论
* puma_comment
* @author      Qinnek<qinnek@163.com>
* @version     2.0
* @since        1.0
*/
if ( post_password_required() )
    return;
?>
<div id="comments" class="responsesWrapper">
    <meta content="UserComments:<?php echo number_format_i18n( get_comments_number() );?>" itemprop="interactionCount">
    <h3 class="comments-title">共有 <span class="commentCount"><?php echo number_format_i18n( get_comments_number() );?></span> 条评论</h3>
    <ol class="commentlist">
        <?php
        wp_list_comments( array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 48,
        ) );
        ?>
    </ol>
    <?php if(comments_open()) : ?>
      <?php
        $aria_req = '';
        $args = array(
          'fields'=> array(
            'author' =>
                '<fieldset class="am-form-set">' .
                '<input id="author" name="author" placeholder = "昵称（必填）" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' />',
            'email' =>
              '<input id="email" name="email" placeholder = "邮箱（必填）" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
              '" size="30"' . $aria_req . ' />',
            'url' =>
              '<input id="url" name="url" placeholder = "网址" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
              '" size="30" /></fieldset>',
          ),
        'title_reply' => '写下你精彩的留言吧！',
        'label_submit'=>'确定',
      );
        comment_form($args);
      ?>
    <?php endif; ?>
</div>
