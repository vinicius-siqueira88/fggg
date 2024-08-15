<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

echo '<li>
<div class="grid">
  <div class="content">
  ' . US_term_list(get_the_ID(), 'category') . '
    <h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
    <div class="meta">
      <span class="author">Por <a href="' . get_author_posts_url(get_post_field('post_author', get_the_ID())) . '" title="' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '">' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '</a></span>
    </div>
  </div>
  <div class="thumb">
  <a href="' . get_the_permalink() . '">' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'post-small-thumb') . '</a>
  </div>
</div>
</li>';
