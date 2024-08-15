<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$timefeaturedNews  = '7';
$avatar = (get_user_meta($post->post_author, 'us_imagem_avatar', true) != '') ? wp_get_attachment_image(get_user_meta($post->post_author, 'us_imagem_avatar', true)) : get_avatar($post->post_author, 120);
US_set_post_views(get_the_ID());

?>
<!-- main -->
<main>
	<article>
		<?php if (get_field('header_featured') == 'nao') { ?>
			<div class="image-box pattern"></div>
			<div class="header-post">
				<div class="container">
					<div class="after"></div>
					<div class="image-featured">
						<?= wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'large') ?>
						<?php
						if (wp_get_attachment_caption(get_post_thumbnail_id(get_the_ID())) != '') {
							echo '<p id="caption-attachment-' . get_post_thumbnail_id(get_the_ID()) . '" class="wp-caption-text">' . wp_get_attachment_caption(get_post_thumbnail_id(get_the_ID())) . '</p>';
						}
						?>
					</div>
					<div class="box">
						<?= US_term_list(get_the_ID(), 'category') ?>
						<h1><?= get_the_title() ?></h1>
						<p><?= get_the_excerpt() ?></p>
						<div class="meta">
							<div class="left">
								<div class="author">
									<div class="avatar">
										<?= $avatar ?>
									</div>
									<div class="name">Por <?= '<a href="' . get_author_posts_url($post->post_author) . '" title="' . get_the_author_meta('display_name', $post->post_author) . '">' . get_the_author_meta('display_name', $post->post_author) . '</a>' ?></div>
								</div>
								<span class="data"><?= get_the_date('d.m.Y \à\s G:i') ?></span>
							</div>
							<div class="share">
								<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">
									<svg class="icon twitter">
										<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#twitter"></use>
									</svg>
								</a>
								<a target="_blank" href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>">
									<svg class="icon whatsapp">
										<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#whatsapp"></use>
									</svg>
								</a>
								<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
									<svg class="icon facebook">
										<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#facebook"></use>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="image-box">
				<?= wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full') ?>
			</div>
			<div class="featured-post">
				<div class="container">
					<div class="box">
						<div class="featured-post-box"></div>
						<?= US_term_list(get_the_ID(), 'category') ?>
						<h1><?= get_the_title() ?></h1>
						<p><?= get_the_excerpt() ?></p>
						<div class="meta">
							<div class="left">
								<div class="author">
									<div class="avatar">
										<?= $avatar ?>
									</div>
									<div class="name">Por <?= '<a href="' . get_author_posts_url($post->post_author) . '" title="' . get_the_author_meta('display_name', $post->post_author) . '">' . get_the_author_meta('display_name', $post->post_author) . '</a>' ?></div>
								</div>
								<span class="data"><?= get_the_date('d.m.Y \à\s G:i') ?></span>
							</div>
							<div class="share">
								<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">
									<svg class="icon twitter">
										<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#twitter"></use>
									</svg>
								</a>
								<a target="_blank" href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>">
									<svg class="icon whatsapp">
										<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#whatsapp"></use>
									</svg>
								</a>
								<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
									<svg class="icon facebook">
										<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#facebook"></use>
									</svg>
								</a>
							</div>
						</div>
						<?php
						if (wp_get_attachment_caption(get_post_thumbnail_id(get_the_ID())) != '') {
							echo '<p id="caption-attachment-' . get_post_thumbnail_id(get_the_ID()) . '" class="wp-caption-text">' . wp_get_attachment_caption(get_post_thumbnail_id(get_the_ID())) . '</p>';
						}
						?>
					</div>
				</div>
			</div>
		<?php } ?>


		<div class="container">
			<div class="grid">
				<div class="content">
					<?php
					$coreCont = get_the_content();
					if (get_field('header_featured') == 'sim') {
						$contentfeatured = explode("\n", $coreCont);
					?>
						<div class="text-featured">
							<div class="letter">
								<?= substr($contentfeatured[0], 0, 1); ?>
							</div>
							<?php echo '<p>' . substr($contentfeatured[0], 1) . '</p>'; ?>
						</div>
					<?php
						$coreCont = preg_replace('/^.+\n/', '', $coreCont);
					}
					?>
					<div class="text-top">
						<?php

						$content = explode("[--quebra--]", $coreCont);
						echo apply_filters('the_content', $content[0]);
						echo '</div><div class="text-bottom">';
						if (sizeof($content) > 1) {
							echo apply_filters('the_content', $content[1]);
						}
						?>
						<?php
						$post_tags = get_the_tags();
						if ($post_tags) {
							echo '<div class="tags">';
							foreach ($post_tags as $tag) {
								echo '<a href="' . get_term_link($tag) . '">' . $tag->name . '</a>';
							}
							echo '</div>';
						}
						?>
					</div>
					<!-- banner -->
					<div class="banner">
						<?php
						$banner_post_p1    		   = get_theme_mod('US_banner_post_p1');
						$banner_post_link_p1     = get_theme_mod('US_banner_post_link_p1');
						$banner_post_script_p1   = get_theme_mod('US_banner_post_script_p1');
						if ($banner_post_link_p1 != '') {
							echo '<a href="' . $banner_post_link_p1 . '" target="_blank" rel="noopener noreferrer">';
						}
						if ($banner_post_p1 != '') {
							echo '<img src="' . $banner_post_p1 . '" alt="">';
						}
						if ($banner_post_link_p1 != '') {
							echo '</a>';
						}
						if ($banner_post_script_p1 != '') {
							echo $banner_post_script_p1;
						}
						?>
					</div>
					<!-- end:banner -->
					<div class="read-more">
						<h2>
							<span>
								<svg class="icon">
									<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
								</svg> LEIA MAIS
							</span>
						</h2>
						<ul>
							<?php

							$posthomefeaturedargs = array(
								'post_type' 						 => 'post',
								'post_status'            => 'publish',
								'posts_per_page'         => '3',
								'post__in'      				 => get_field('read_more_posts'),
								'orderby' 							 => 'post__in',
								//'post__not_in'     			 => array(get_the_ID()),
								// 'category_name'				   => 'games',
								'no_found_rows'          => true,
								'update_post_term_cache' => false,
								'update_post_meta_cache' => false,
								'cache_results'          => false
							);
							$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
							while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
								get_template_part('template-parts/posts/content', 'blog-list-read-more');
							endwhile;
							wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>
				<div class="sidebar">
					<div class="banner">
						<?php
						$banner_post_p3    		   = get_theme_mod('US_banner_post_p3');
						$banner_post_link_p3     = get_theme_mod('US_banner_post_link_p3');
						$banner_post_script_p3   = get_theme_mod('US_banner_post_script_p3');
						if ($banner_post_link_p3 != '') {
							echo '<a href="' . $banner_post_link_p3 . '" target="_blank" rel="noopener noreferrer">';
						}
						if ($banner_post_p3 != '') {
							echo '<img src="' . $banner_post_p3 . '" alt="">';
						}
						if ($banner_post_link_p3 != '') {
							echo '</a>';
						}
						if ($banner_post_script_p3 != '') {
							echo $banner_post_script_p3;
						}
						?>
					</div>
					<div class="div"></div>
					<h3>
						<svg class="icon">
							<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
						</svg> As mais lidas da semana
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
				</div>
				<?php if (get_field('review_note')) { ?>
					<section class="review">
						<div class="container">
							<div class="box-review">
								<div class="thumb">
									<?= wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'large') ?>
								</div>
								<div class="grid">
									<div class="item nota">
										<div class="box-nota">
											<style>
												.review .box-review .grid .item .box-nota .mask .box::after {
													height: <?= get_field('review_note'); ?>%;
												}
											</style>
											<?php $top = get_field('review_note') == 100 ? 'top' : 'normal'; ?>
											<div class="mask <?= $top ?>">
												<div class="box"></div>
											</div>
											<div class="tag">
												<?= get_field('review_note') / 10; ?>
											</div>
										</div>
										<h4><?= get_field('review_title'); ?></h4>
										<p>Publisher: <?= get_field('publisher'); ?></p>
										<p>Desenvolvedora: <?= get_field('developer'); ?></p>
										<p>Plataformas: <?= get_field('platforms'); ?></p>
										<p>Lançamento: <?= get_field('launch'); ?></p>
										<p>Tempo de review: <?= get_field('review_time'); ?></p>
									</div>
									<div class="item">
										<p><?= get_field('excerpt_review'); ?></p>
										<h4>Prós</h4>
										<ul>
											<?php
											$countitens = 0;
											if (have_rows('pros')) :
												while (have_rows('pros')) : the_row();
													$countitens++;
													echo '<li>' . get_sub_field('item') . '</li>';
												endwhile;
											endif;
											?>
										</ul>
										<h4>Contras</h4>
										<ul>
											<?php
											if (have_rows('cons')) :
												while (have_rows('cons')) : the_row();
													$countitens++;
													if ($countitens < 11) {
														echo '<li>' . get_sub_field('item') . '</li>';
													}
												endwhile;
											endif;
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php } ?>
				<div class="taboola">
					<div class="container">
						<div id="taboola-below-article-thumbnails"></div>
						<script type="text/javascript">
							window._taboola = window._taboola || [];
							_taboola.push({
							mode: 'alternating-thumbnails-a',
							container: 'taboola-below-article-thumbnails',
							placement: 'Below Article Thumbnails',
							target_type: 'mix'
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</article>


	<section class="comments">
		<div class="container">
			<h5>Comentários</h5>

			<?php
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
			/*
			$commenter = wp_get_current_commenter();
			$req = get_option('require_name_email');
			$aria_req = ($req ? " aria-required='true'" : '');
			$fields =  array(
				'author' => '<div class="name fields"><input id="author" name="author" type="text" placeholder="Nome" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
				'email'  => '<div class="email fields"><input id="email" name="email" type="text" placeholder="Email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
			);
			$url = '<div class="submit"><div class="box">%1$s %2$s<svg class="icon"><use xlink:href="' . get_bloginfo('template_url') . '/assets/img/icons.svg#arrow"></use></svg></div></div>';
			$comments_args = array(
				'fields'                =>  $fields,
				'title_reply'           => 'Please give us your valuable comment',
				'label_submit'          => 'Comentar',
				'submit_button'         => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
				'submit_field'          => $url,
			);
			comment_form($comments_args);*/
			?>
			<div class="commentList">
				<?php /*
				echo '<ul class="commentlist">';
				$comments = get_comments(array(
					'post_id' => $post_id,
					'status'  => 'approve',
					'orderby' => 'comment_type',
				));
				wp_list_comments(array(
					'per_page' => -1,
					'reverse_top_level' => false,
					'callback' => 'format_comment',
				), $comments);
				echo '</ul>';*/
				?>
			</div>
		</div>
	</section>
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<?php
			$banner_post_p2    		   = get_theme_mod('US_banner_post_p2');
			$banner_post_link_p2     = get_theme_mod('US_banner_post_link_p2');
			$banner_post_script_p2   = get_theme_mod('US_banner_post_script_p2');
			if ($banner_post_link_p2 != '') {
				echo '<a href="' . $banner_post_link_p2 . '" target="_blank" rel="noopener noreferrer">';
			}
			if ($banner_post_p2 != '') {
				echo '<img src="' . $banner_post_p2 . '" alt="">';
			}
			if ($banner_post_link_p2 != '') {
				echo '</a>';
			}
			if ($banner_post_script_p2 != '') {
				echo $banner_post_script_p2;
			}
			?>
		</div>
	</div>
	<!-- end:banner -->
	<section class="see-more">
		<div class="container">
			<h3>
				<svg class="icon">
					<use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
				</svg> veja também
			</h3>
			<div class="grid slide-featured-author">
				<?php
				$posthomefeaturedargs = array(
					'post_type' 						 => 'post',
					'post_status'            => 'publish',
					'posts_per_page'         => '3',
					'post__not_in'     			 => array(get_the_ID()),
					// 'category_name'				   => 'games',
					'no_found_rows'          => true,
					'update_post_term_cache' => false,
					'update_post_meta_cache' => false,
					'cache_results'          => false
				);
				$posthomefeaturedposts = new WP_Query($posthomefeaturedargs);
				while ($posthomefeaturedposts->have_posts()) : $posthomefeaturedposts->the_post();
					get_template_part('template-parts/posts/content', 'blog-list-see-more');
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>

</main>
<!-- end:main -->
<?php
get_footer();
