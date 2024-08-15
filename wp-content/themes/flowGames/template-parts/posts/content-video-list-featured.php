<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

echo '<div class="item">
  <div class="box">
    <div class="thumb">
      <a fancybox href="http://www.youtube.com/embed/' . get_field('link_do_video') . '?autoplay=1">' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'post-medium-featured-thumb') . '</a>
      ' . US_term_list(get_the_ID(), 'categories_videos') . '
    </div>
    <a class="content" fancybox href="http://www.youtube.com/embed/' . get_field('link_do_video') . '?autoplay=1">
      <div class="icon">
        <img src="' . get_template_directory_uri() . '/assets/img/play.svg" alt="">
      </div>
      <div><h5>' . get_the_title() . '</h5></div>
    </a>
  </div>
</div>';
