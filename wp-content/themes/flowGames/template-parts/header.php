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

?>
<!-- header -->
<header id="top">
	<div class="container">
		<div class="grid">
			<div class="item logo">
				<?php
				$the_custom_logo = get_theme_mod('custom_logo');
				$site_name = get_bloginfo('name');
				$tagline   = get_bloginfo('description', 'display');
				if (function_exists('the_custom_logo') &&  has_custom_logo()) {
					echo '<a href="' . esc_url(home_url('/')) . '" rel="home" title="' . get_bloginfo('name') . '"><img src="' . esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) . '" alt="' . get_bloginfo('name') . '"  /></a>';
				}
				?>
			</div>
			<div class="item social-media-box">
				<div class="social-media">
					<ul>
						<?php
						$US_socialMedia_repeater = get_theme_mod('US_socialMedia_repeater', json_encode(array()));
						$US_socialMedia_repeater_decoded = json_decode($US_socialMedia_repeater);
						foreach ($US_socialMedia_repeater_decoded as $repeater_item) {
							$alt = get_post_meta(pippin_get_image_id($repeater_item->image_url), '_wp_attachment_image_alt', TRUE) == '' ? get_the_title(pippin_get_image_id($repeater_item->image_url)) : get_post_meta(pippin_get_image_id($repeater_item->image_url), '_wp_attachment_image_alt', TRUE);
							echo '<li><a target="_blank" href="' . $repeater_item->link . '"><img src="' . $repeater_item->image_url . '" width="21" height="21" alt="'.$alt.'" data-id="'.pippin_get_image_id('https://flow.siteup.dev/wp-content/uploads/2022/10/youtube-32.svg').'"></a></li>';
						}
						?>
					</ul>
				</div>
				<a href="#" id="open-menu" class="" aria-label="Open menu mobile">
					<div class="ani">
						<svg class="close" width="30" height="30" viewBox="0 0 100 100">
							<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
							<path class="line line2" d="M 20,50 H 80" />
							<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
						</svg>
					</div>
				</a>
				<div class="seach-box">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
						<input type="text" autocomplete="off" class="search-field" placeholder="O que você procura?" value="<?php echo get_search_query(); ?>" name="s" />
						<!-- button type="submit" class="search-submit">
							<svg class="icon">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/icons.svg#search"></use>
							</svg>
						</button -->
					</form>
					<a href="#" aria-label="Open search mobile">
						<svg class="icon">
							<use xlink:href="<?= get_bloginfo('template_url') ?>/assets/img/icons.svg#search"></use>
						</svg>
					</a>
				</div>

			</div>
			<div class="item menu">
				<nav>
					<?php if (has_nav_menu('menu')) :
						$itemsWrap = '<ul id="%1$s" class="%2$s">%3$s</ul>';
						wp_nav_menu(
							array(
								'theme_location'       => 'menu',
								'menu'                 => '',
								'container'            => 'ul',
								'container_class'      => 'menu',
								'container_id'         => '',
								'container_aria_label' => '',
								'menu_class'           => '',
								'menu_id'              => '',
								'echo'                 => true,
								'fallback_cb'          => 'wp_page_menu',
								'before'               => '',
								'after'                => '',
								'link_before'          => '',
								'link_after'           => '',
								'items_wrap'           => $itemsWrap,
								'item_spacing'         => 'preserve',
								'depth'                => 0,
								'walker'               => '',
							)
						);
					endif; ?>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- end:header -->