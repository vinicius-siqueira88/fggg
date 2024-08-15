<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
$term      = get_search_query();
?>
<!-- main -->
<main>

	<!-- columns-home -->
	<section class="columns-categories">
		<div class="box-title">
			<div class="container">
				<h2>
					<svg class="icon">
						<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
					</svg> <?= $term ?>
				</h2>
			</div>
		</div>

		<div class="container">
			<div class="grid">
				<!-- list-post-home -->
				<div class="list-post-home">
					<ul class="list-post">
						<?php
						$postcount = 0;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$postargs = array(
							'post_type' 						 => 'post',
							'paged' 								 => $paged,
							'post_status'            => 'publish',
							's' 										 => $term,
						);
						$postcat = new WP_Query($postargs);
						$maxpages = $postcat->max_num_pages;
						while ($postcat->have_posts()) : $postcat->the_post();
							$postcount++;
							if ($postcount == 5) {
								get_template_part('template-parts/posts/content', 'blog-list-featured');
								echo '</ul>
								<div class="banner">
								<div class="container">';
								$banner_cat_p1    		   = get_theme_mod('US_banner_cat_p1');
								$banner_cat_link_p1     = get_theme_mod('US_banner_cat_link_p1');
								$banner_cat_script_p1   = get_theme_mod('US_banner_cat_script_p1');
								if ($banner_cat_link_p1 != '') {
									echo '<a href="' . $banner_cat_link_p1 . '" target="_blank" rel="noopener noreferrer">';
								}
								if ($banner_cat_p1 != '') {
									echo '<img src="' . $banner_cat_p1 . '" alt="">';
								}
								if ($banner_cat_link_p1 != '') {
									echo '</a>';
								}
								if ($banner_cat_script_p1 != '') {
									echo $banner_cat_script_p1;
								}
								echo '</div>
							</div>
										<ul class="list-post">';
							} elseif ($postcount == 10) {
								get_template_part('template-parts/posts/content', 'blog-list-featured');
							} else {
								get_template_part('template-parts/posts/content', 'blog-list');
							}
						endwhile;
						// wp_reset_postdata();
						?>
					</ul>
					<?php US_paging_nav($postcat, $paged, $maxpages); ?>
				</div>
				<!-- end:list-post-home -->

				<!-- sidebar-home -->
				<div class="sidebar-home">
					<div class="banner">
						<?php
						$banner_cat_p2    		  = get_theme_mod('US_banner_cat_p2');
						$banner_cat_link_p2     = get_theme_mod('US_banner_cat_link_p2');
						$banner_cat_script_p2   = get_theme_mod('US_banner_cat_script_p2');
						if ($banner_cat_link_p2 != '') {
							echo '<a href="' . $banner_cat_link_p2 . '" target="_blank" rel="noopener noreferrer">';
						}
						if ($banner_cat_p2 != '') {
							echo '<img src="' . $banner_cat_p2 . '" alt="">';
						}
						if ($banner_cat_link_p2 != '') {
							echo '</a>';
						}
						if ($banner_cat_script_p2 != '') {
							echo $banner_cat_script_p2;
						}
						?>
					</div>
				</div>
				<!-- end:sidebar-home -->
			</div>
		</div>
	</section>
	<!-- end:columns-home -->

</main>
<!-- end:main -->