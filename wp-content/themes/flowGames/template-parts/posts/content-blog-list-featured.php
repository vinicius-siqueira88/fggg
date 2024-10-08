<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

echo '<li class="featured-post">
<div class="grid">
  <div class="thumb"><a href="' . get_the_permalink() . '">
  ' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'post-medium-featured-thumb') . '
    <img src="' . get_template_directory_uri() . '/assets/img/frame-post-featured.svg" class="frame-post" alt=""></a>
  </div>
  <div class="content">
  ' . US_term_list(get_the_ID(), 'category') . '
    <a href="' . get_the_permalink() . '">
    <h3>' . get_the_title() . '</h3>
    <p>' . get_the_excerpt() . '</p>
    </a>
    <div class="meta">
      <span class="author">Por <a href="' . get_author_posts_url(get_post_field('post_author', get_the_ID())) . '" title="' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '">' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '</a></span>
      <span class="data">' . get_the_date('d.m.Y \à\s G:i') . '</span>
    </div>
  </div>
</div>
</li>';
