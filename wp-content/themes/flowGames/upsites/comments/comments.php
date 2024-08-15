<?php
// remove cookies buttom
remove_action('set_comment_cookies', 'wp_set_comment_cookies');

// html output comment field
add_filter('comment_form_field_comment', 'my_comment_form_field_comment');
function my_comment_form_field_comment($field)
{
  $field = '<div class="comment"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="4" title="' . __('Comment', 'my-text-domain') . '" placeholder="Deixe seu cometário" aria-required="true"></textarea></div>';
  return $field;
}

// html output comment
function format_comment($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment;
?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <h5><?php if ($comment->comment_type == 'wpdiscuz_sticky') {
          echo '<i class="fa fa-thumb-tack" aria-hidden="true"></i> ';
        } ?><?php printf(__('%s'), get_comment_author_link()) ?></h5> <span><?php echo get_comment_date(); ?> - <?php echo get_comment_time(); ?></span>
    <?php comment_text(); ?>
    <!-- div class="reply">
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div -->
  </li>
<?php }
