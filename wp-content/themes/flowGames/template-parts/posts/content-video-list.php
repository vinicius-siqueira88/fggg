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
    <div class="thumb">
      <a fancybox href="http://www.youtube.com/embed/' . get_field('link_do_video') . '?autoplay=1">' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'thumbnail') . '</a>
    </div>
    <div class="content">
    ' . US_term_list(get_the_ID(), 'categories_videos') . '
      <div><h5><a fancybox href="http://www.youtube.com/embed/' . get_field('link_do_video') . '?autoplay=1">' . get_the_title() . '</a></h5></div>
    </div>
  </div>
</li>';
