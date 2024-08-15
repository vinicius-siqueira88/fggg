<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

 $title = (strlen(get_the_title()) > 75) ? substr(get_the_title(), 0, 75) . " &hellip;" : get_the_title();

echo '<div class="item">
<div class="content-image">
  <div class="image-post">
    <a href="'.get_the_permalink().'">
      <div class="frame">
      ' . wp_get_attachment_image(get_post_thumbnail_id($featured->ID), 'post-small-featured-thumb') . '
      </div>
    </a>
  </div>
  <div class="title">
  ' . US_term_list(get_the_ID(), 'category') . '
    <a href="'.get_the_permalink().'" class="title-link">
      <h2>'.$title.'</h2>
    </a>
  </div>
</div>
<div class="meta">
<span class="author">Por <a href="' . get_author_posts_url(get_post_field('post_author', get_the_ID())) . '" title="' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '">' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '</a></span>
<span class="data">' . get_the_date('d.m.Y \à\s G:i') . '</span>
</div>
</div>';
?>
