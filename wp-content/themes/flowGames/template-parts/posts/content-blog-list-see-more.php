<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */
$avatar = (get_user_meta(get_post_field('post_author', get_the_ID()), 'us_imagem_avatar', true) != '') ? wp_get_attachment_image(get_user_meta(get_post_field('post_author', get_the_ID()), 'us_imagem_avatar', true)) : get_avatar(get_post_field('post_author', get_the_ID()), 120);
echo '<div class="item">
<div class="thumb"><a href="' . get_the_permalink() . '">' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'post-medium-featured-thumb') . '</a></div>
' . US_term_list(get_the_ID(), 'category') . '
<a href="' . get_the_permalink() . '">
<h4>' . get_the_title() . '</h4>
<p>' . get_the_excerpt() . '</p>
</a>
<div class="meta">
  <div class="author">
    <div class="avatar">' . $avatar . '</div>
    <span>Por <a href="' . get_author_posts_url(get_post_field('post_author', get_the_ID())) . '" title="' . get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())) . '">' . get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())) . '</a></span>
  </div>
  <div class="data">' . get_the_date('d.m.Y \à\s G:i') . '</div>
</div>
</div>';
