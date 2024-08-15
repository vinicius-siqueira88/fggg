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
  <a href="' . get_the_permalink() . '">' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'thumbnail') . '</a>
  <div class="nota">
  <svg class="icon">
    <use xlink:href="' . get_template_directory_uri() . '/assets/img/icons.svg#lightning"></use>
  </svg>' . get_field('review_note') / 10 . '
  </div>
  </div>
  <div class="content">
  ' . US_term_list(get_the_ID(), 'category') . '
    <h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
  </div>
</div>
</li>';
