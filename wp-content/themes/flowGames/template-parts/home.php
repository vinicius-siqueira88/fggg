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
$timefeaturedNews  = '7';

$post_ids_fetched 				= array(get_theme_mod('US_slide_home_itens_01'), get_theme_mod('US_slide_home_itens_02'), get_theme_mod('US_slide_home_itens_03'), get_theme_mod('US_slide_home_itens_04'), get_theme_mod('US_slide_home_itens_05'), get_theme_mod('US_slide_home_itens_06'));
$cat_home_games           = array(get_theme_mod('US_cat_home_games_01'), get_theme_mod('US_cat_home_games_02'), get_theme_mod('US_cat_home_games_03'));
$cat_home_esports         = array(get_theme_mod('US_cat_home_esports_01'), get_theme_mod('US_cat_home_esports_02'), get_theme_mod('US_cat_home_esports_03'));
$cat_home_culturapop      = array(get_theme_mod('US_cat_home_culturapop_01'), get_theme_mod('US_cat_home_culturapop_02'), get_theme_mod('US_cat_home_culturapop_03'));

$count = [];
$posthomefeaturedargs = array(
	'post_type' 						 => 'post',
	'post_status'            => 'publish',
	'posts_per_page'         => '6',
	'post__in' 							 => $post_ids_fetched,
	'orderby' 							 => 'post__in',
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
	'update_post_meta_cache' => false,
	'cache_results'          => false
);
$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);

if (sizeof($posthomefeaturedposts->posts) == 0) {
	$posthomefeaturedargs = array(
		'post_type' 						 => 'post',
		'post_status'            => 'publish',
		'posts_per_page'         => '6',
		'no_found_rows'          => true,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
		'cache_results'          => false
	);
	$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
}

wp_reset_postdata();


$text_prepend 	= get_theme_mod('US_home_text_prepend');
$text_h1 				= get_theme_mod('US_home_text_h1');

$more_featured 	= get_theme_mod('US_home_more_featured');
$list_post 			= get_theme_mod('US_home_list_post');
$reviews 				= get_theme_mod('US_home_reviews');
$most_read 			= get_theme_mod('US_home_most_read');
$podcasts 			= get_theme_mod('US_home_podcasts');
$webstories 		= get_theme_mod('US_home_webstories');

$list_postbtn 		= get_theme_mod('US_home_list_post_btn');
$podcastsbtn 			= get_theme_mod('US_home_podcasts_btn');
$webstoriesbtn 		= get_theme_mod('US_home_webstories_btn');
?>
<!-- main -->
<main>
	<!-- featured -->
	<section class="featured">

		<div class="image">
			<div class="slide-image-featured">
				<?php
				while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
					echo '<div class="box" style="color:' . get_field('cor_post', get_the_ID()) . '"><img src="' . wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full') . '" width="100%" height="100%" ></div>';
				endwhile;
				?>
			</div>
		</div>
		<div class="container">
			<div class="box-featured">
				<div class="box">
					<img src="<?= get_template_directory_uri(); ?>/assets/img/box-featured.svg" alt="">
				</div>
				<div class="content">
					<div class="slide-text-featured">
						<?php
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							array_push($count, get_the_ID());
							$title = (strlen(get_the_title()) > 75) ? substr(get_the_title(), 0, 75) . " &hellip;" : get_the_title();
							$excerpt = (strlen(get_the_excerpt()) > 130) ? substr(get_the_excerpt(), 0, 130) . " &hellip;" : get_the_excerpt();

							echo '<div class="relative">
							' . US_term_list(get_the_ID(), 'category') . '
							<a href="' . get_permalink(get_the_ID()) . '">
								<h2>' . $title . '</h2>
								<p>' . $excerpt . '</p>
							</a>
							<div class="meta">
								<span class="author">Por <a href="' . get_author_posts_url(get_post_field('post_author', get_the_ID())) . '" title="' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '">' . get_the_author_meta('display_name', get_the_author_meta(get_the_ID())) . '</a></span>
								<span class="data">' . get_the_date('d.m.Y \à\s G:i') . '</span>
							</div>
						</div>';
						endwhile;
						?>
					</div>
					<div class="paginate-slide-home">
						<button class="prev arrow" aria-label="Previous" type="button">
							<svg class="icon">
								<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
							</svg>
						</button>
						<div class="dots"></div>
						<button class="next arrow" aria-label="Next" type="button">
							<svg class="icon">
								<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
							</svg>
						</button>
					</div>
				</div>
				<div class="slide-pag">
					<div class="slide-pag-featured">
						<?php
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							echo '<div class="item"><div class="frame">' . wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'thumbnail') . '<img src="' . get_bloginfo('template_url') . '/assets/img/frame-featured.svg" class="frame-act" width="100%" height="100%"></div></div>';
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="more-featured">
			<div class="container">
				<div class="box-header">
					<h2>
						<svg class="icon">
							<use xlink:href="<?= get_bloginfo('template_url') ?>/assets/img/icons.svg#lightning"></use>
						</svg> <?= $more_featured ?>
					</h2>
					<div id="tabs-btn" class="btns">
						<a href="#" data-tab="tab-games" class="btn act">
							<svg class="icon">
								<use xlink:href="<?= get_bloginfo('template_url') ?>/assets/img/icons.svg#game-controller"></use>
							</svg>Games
						</a>
						<a href="#" data-tab="tab-esports" class="btn">
							<svg class="icon">
								<use xlink:href="<?= get_bloginfo('template_url') ?>/assets/img/icons.svg#trophy"></use>
							</svg>Esports
						</a>
						<a href="#" data-tab="tab-cultura-pop" class="btn">
							<svg class="icon">
								<use xlink:href="<?= get_bloginfo('template_url') ?>/assets/img/icons.svg#clapperboard"></use>
							</svg>Cultura Pop
						</a>
					</div>
				</div>
				<div id="tabs" class="tabs-content">
					<div id="tab-games" class="content act">
						<div class="grid slide-featured-games">
							<?php
							$posthomefeaturedargs = array(
								'post_type' 						 => 'post',
								'post_status'            => 'publish',
								'posts_per_page'         => '3',
								'post__in'      				 => $cat_home_games,
								'orderby' 							 => 'post__in',
								'no_found_rows'          => true,
								'update_post_term_cache' => false,
								'update_post_meta_cache' => false,
								'cache_results'          => false
							);
							$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
							while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
								array_push($count, get_the_ID());
								get_template_part('template-parts/posts/content', 'tabs-featured');
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
					<div id="tab-esports" class="content">
						<div class="grid slide-featured-esports">
							<?php
							$posthomefeaturedargs = array(
								'post_type' 						 => 'post',
								'post_status'            => 'publish',
								'posts_per_page'         => '3',
								'post__in'      				 => $cat_home_esports,
								'orderby' 							 => 'post__in',
								'no_found_rows'          => true,
								'update_post_term_cache' => false,
								'update_post_meta_cache' => false,
								'cache_results'          => false
							);
							$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
							while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
								array_push($count, get_the_ID());
								get_template_part('template-parts/posts/content', 'tabs-featured');
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
					<div id="tab-cultura-pop" class="content">
						<div class="grid slide-featured-culturapop">
							<?php
							$posthomefeaturedargs = array(
								'post_type' 						 => 'post',
								'post_status'            => 'publish',
								'posts_per_page'         => '3',
								'post__in'      				 => $cat_home_culturapop,
								'orderby' 							 => 'post__in',
								'no_found_rows'          => true,
								'update_post_term_cache' => false,
								'update_post_meta_cache' => false,
								'cache_results'          => false
							);
							$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
							while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
								array_push($count, get_the_ID());
								get_template_part('template-parts/posts/content', 'tabs-featured');
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tit">
			<span><?= $text_prepend ?></span>
			<h1><?= $text_h1 ?></h1>
		</div>
	</section>
	<!-- end:featured -->

	<!-- banner -->
	<div class="banner">
		<div class="container">
			<?php
			$banner_home_p1    		   = get_theme_mod('US_banner_home_p1');
			$banner_home_link_p1     = get_theme_mod('US_banner_home_link_p1');
			$banner_home_script_p1   = get_theme_mod('US_banner_home_script_p1');
			if ($banner_home_link_p1 != '') {
				echo '<a href="' . $banner_home_link_p1 . '" target="_blank" rel="noopener noreferrer">';
			}
			if ($banner_home_p1 != '') {
				echo '<img src="' . $banner_home_p1 . '" alt="">';
			}
			if ($banner_home_link_p1 != '') {
				echo '</a>';
			}
			if ($banner_home_script_p1 != '') {
				echo $banner_home_script_p1;
			}
			?>
		</div>
	</div>
	<!-- end:banner -->

	<!-- columns-home -->
	<section class="columns-home">
		<div class="container">
			<div class="grid">
				<!-- list-post-home -->
				<div class="list-post-home">
					<h2>
						<svg class="icon">
							<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
						</svg> <?= $list_post ?>
					</h2>
					<ul class="list-post">
						<?php
						$postcount = 0;
						$slug = 'reviews';
						$cat = get_category_by_slug($slug);
						$catID = $cat->term_id;
						$posthomefeaturedargs = array(
							'post_type' 						 => 'post',
							'post_status'            => 'publish',
							'posts_per_page'         => '10',
							'post__not_in' 					 => array_unique($count),
							'category__not_in'			 => array($catID),
							'no_found_rows'          => true,
							'update_post_term_cache' => false,
							'update_post_meta_cache' => false,
							'cache_results'          => false
						);
						$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							$postcount++;
							if ($postcount == 5) {
								get_template_part('template-parts/posts/content', 'blog-list-featured');
								echo '</ul>
									<div class="banner">
										<div class="container">';
								$banner_home_p2    		   = get_theme_mod('US_banner_home_p2');
								$banner_home_link_p2     = get_theme_mod('US_banner_home_link_p2');
								$banner_home_script_p2   = get_theme_mod('US_banner_home_script_p2');
								if ($banner_home_link_p2 != '') {
									echo '<a href="' . $banner_home_link_p2 . '" target="_blank" rel="noopener noreferrer">';
								}
								if ($banner_home_p2 != '') {
									echo '<img src="' . $banner_home_p2 . '" alt="">';
								}
								if ($banner_home_link_p2 != '') {
									echo '</a>';
								}
								if ($banner_home_script_p2 != '') {
									echo $banner_home_script_p2;
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
						wp_reset_postdata();
						?>
					</ul>
					<div class="center">
						<a href="<?= esc_url(home_url('/noticia')) ?>" class=" btn">
							<?= $list_postbtn ?>
							<svg class="icon">
								<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
							</svg>
						</a>
					</div>
				</div>
				<!-- end:list-post-home -->

				<!-- sidebar-home -->
				<div class="sidebar-home">
					<h3>
						<svg class="icon">
							<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
						</svg> <?= $reviews ?>
					</h3>
					<ul class="list-reviews">
						<?php
						$posthomefeaturedargs = array(
							'post_type' 						 => 'post',
							'post_status'            => 'publish',
							'posts_per_page'         => '6',
							'category_name'				   => 'reviews',
							'no_found_rows'          => true,
							'update_post_term_cache' => false,
							'update_post_meta_cache' => false,
							'cache_results'          => false
						);
						$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							get_template_part('template-parts/posts/content', 'blog-list-review');
						endwhile;
						wp_reset_postdata();
						?>
					</ul>
					<div class="div"></div>
					<h3>
						<svg class="icon">
							<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
						</svg> <?= $most_read ?>
					</h3>
					<ul class="list-most-read">
						<?php
						$posthomefeaturedargs = array(
							'post_type' 						 => 'post',
							'post_status'            => 'publish',
							'posts_per_page'         => '6',
							'no_found_rows'          => true,
							'update_post_term_cache' => false,
							'update_post_meta_cache' => false,
							'cache_results'          => false,
							'meta_key' 							 => 'US_post_views_count',
							'orderby' 							 => 'meta_value_num',
							'date_query' => array(
								'after' => date('Y-m-d', strtotime('-' . $timefeaturedNews . ' days'))
							)
						);
						$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							get_template_part('template-parts/posts/content', 'blog-list-most-read');
						endwhile;
						wp_reset_postdata();
						?>
					</ul>

					<div class="banner">
						<?php
						$banner_home_p3    		   = get_theme_mod('US_banner_home_p3');
						$banner_home_link_p3     = get_theme_mod('US_banner_home_link_p3');
						$banner_home_script_p3   = get_theme_mod('US_banner_home_script_p3');
						if ($banner_home_link_p3 != '') {
							echo '<a href="' . $banner_home_link_p3 . '" target="_blank" rel="noopener noreferrer">';
						}
						if ($banner_home_p3 != '') {
							echo '<img src="' . $banner_home_p3 . '" alt="">';
						}
						if ($banner_home_link_p3 != '') {
							echo '</a>';
						}
						if ($banner_home_script_p3 != '') {
							echo $banner_home_script_p3;
						}
						?>
					</div>
				</div>
				<!-- end:sidebar-home -->
			</div>
		</div>
	</section>
	<!-- end:columns-home -->

	<!-- videos -->
	<section class="videos">
		<div class="container">
			<h4>
				<svg class="icon">
					<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
				</svg> <?= $podcasts ?>
			</h4>
			<div class="grid">
				<div class="box-featured">
					<div class="video-featured">
						<?php
						$countvideo = [];
						$posthomefeaturedargs = array(
							'post_type' 						 => 'videos',
							'post_status'            => 'publish',
							'posts_per_page'         => '2',
							'no_found_rows'          => true,
							'update_post_term_cache' => false,
							'update_post_meta_cache' => false,
							'cache_results'          => false
						);
						$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							array_push($countvideo, get_the_ID());
							get_template_part('template-parts/posts/content', 'video-list-featured');
						endwhile;
						wp_reset_postdata();
						?>
					</div>
					<a href="<?= get_theme_mod('US_text_youtube') ?>" class="link-youtube" target="_blank">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/youtube.svg" alt=""> <span><?= $podcastsbtn ?></span>
						<svg class="icon">
							<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
						</svg>
					</a>
				</div>
				<div class="video-list">
					<ul class="list-video">
						<?php
						$posthomefeaturedargs = array(
							'post_type' 						 => 'videos',
							'post_status'            => 'publish',
							'posts_per_page'         => '3',
							'post__not_in' 					 => $countvideo,
							'no_found_rows'          => true,
							'update_post_term_cache' => false,
							'update_post_meta_cache' => false,
							'cache_results'          => false
						);
						$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
						while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
							array_push($countvideo, get_the_ID());
							get_template_part('template-parts/posts/content', 'video-list');
						endwhile;
						wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- end:videos -->

	<!-- webstories -->
	<section class="webstories">
		<div class="container">
			<div class="title">
				<h4>
					<svg class="icon">
						<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
					</svg> <?= $webstories ?>
				</h4>
				<a href="<?= esc_url(home_url('/webstories')) ?>" class="btn">
					<?= $webstoriesbtn ?>
					<svg class="icon">
						<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
					</svg>
				</a>
			</div>
			<div class="slide-webstories">
				<?php
				$webargs = array(
					'post_type' => 'web-story',
					'posts_per_page'  => 6,
				);
				$webposts = new WP_Query($webargs);
				while ($webposts->have_posts()) : $webposts->the_post();
					$nonce = wp_create_nonce("webstory_nonce");
					echo '<div class="item">
						<a href="' . get_the_permalink() . '">
							<div class="base">
								<img src="' . get_template_directory_uri() . '/assets/img/base-webstories.svg" alt="">
							</div>
							<div class="thumb">
								<img src="' . get_the_post_thumbnail_url() . '" alt="">
							</div>
							<div class="content">
								<h5>' . get_the_title() . '</h5>
							</div>
						</a>
					</div>';
				endwhile;
				?>
			</div>
			<div class="paginate-slide">
				<button class="prev arrow" aria-label="Previous" type="button">
					<svg class="icon">
						<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
					</svg>
				</button>
				<div class="dots"></div>
				<button class="next arrow" aria-label="Next" type="button">
					<svg class="icon">
						<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#arrow"></use>
					</svg>
				</button>
			</div>
		</div>
	</section>
	<!-- end:webstories -->
</main>
<!-- end:main -->