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
$user_id = $post->post_author;
$avatar = (get_user_meta($user_id, 'us_imagem_avatar', true) != '') ? wp_get_attachment_image(get_user_meta($user_id, 'us_imagem_avatar', true)) : get_avatar($user_id, 260);

?>
<main>
	<section class="bio-author">
		<div class="container">
			<div class="grid">
				<div class="item">
					<div class="box-avatar">
						<?= $avatar ?>
					</div>
					<div class="social-media">
						<ul>
							<?php
							if (have_rows('social_media', 'user_' . $user_id)) :
								while (have_rows('social_media', 'user_' . $user_id)) : the_row();
									echo '<li><a href="' . get_sub_field('link') . '">' . wp_get_attachment_image(get_sub_field('icon'), 'full') . '</a></li>';
								endwhile;
							endif;
							?>
						</ul>
					</div>
				</div>
				<div class="item">
					<h1>
						<svg class="icon">
							<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
						</svg> <?= get_the_author_meta('display_name', $user_id) ?>
					</h1>
					<div class="count-post">
						<?php
						if (count_user_posts($user_id) == 0) {
							echo 'Nenhuma matéria publicada';
						} elseif (count_user_posts($user_id) == 1) {
							echo count_user_posts($user_id) . ' matéria publicada';
						} else {
							echo count_user_posts($user_id) . ' matérias publicadas';
						}
						?>
					</div>
					<p><?= get_the_author_meta('description', $user_id) ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- columns-home -->
	<section class="columns-categories">
		<div class="most-read">
			<div class="container">
				<h2>
					<svg class="icon">
						<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
					</svg> AS Mais LIDAS
				</h2>
				<div class="grid slide-featured-author">
					<?php
					$postfeaturedargs = array(
						'post_type' 						 => 'post',
						'posts_per_page' 			   => 3,
						'post_status'            => 'publish',
						'author' 								 => $user_id,
						'meta_key' 							 => 'US_post_views_count',
						'orderby' 							 => 'meta_value_num',
					);

					$postfeatured = new WP_Query($postfeaturedargs);
					while ($postfeatured->have_posts()) : $postfeatured->the_post();
						get_template_part('template-parts/posts/content', 'author-featured');
					endwhile;
					?>
				</div>
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
							'author' 								 => $user_id,
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
						$banner_cat_p2    		   = get_theme_mod('US_banner_cat_p2');
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
					<div id="taboola-category-thumbnails"></div>
					<script type="text/javascript">
						window._taboola = window._taboola || [];
						_taboola.push({
							mode: 'thumbnails-a-cathegory',
							container: 'taboola-category-thumbnails',
							placement: 'Category Thumbnails',
							target_type: 'mix'
						});
					</script>
				</div>
				<!-- end:sidebar-home -->
			</div>
		</div>
	</section>
	<!-- end:columns-home -->
</main>