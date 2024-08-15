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
$logo_footer    		    = get_theme_mod('US_logo_footer');
$text_copyright 				= get_theme_mod('US_text_copyright');

$newsletter_title 			= get_theme_mod('US_newsletter_title');
$newsletter_form 				= get_theme_mod('US_newsletter_form');
$newsletter_text 				= get_theme_mod('US_newsletter_text');

?>
<!-- footer -->
<footer id="footer">
	<div class="bar"></div>
	<div class="bg-black">
		<div class="container">
			<div class="grid">
				<div class="item">
					<div class="logo">
						<?php
						if ($logo_footer != '') {
							echo '<a href="' . esc_url(home_url('/')) . '" rel="home" title="' . get_bloginfo('name') . '">' . wp_get_attachment_image(attachment_url_to_postid($logo_footer), 'full') . '</a>';
						}
						?>
					</div>
					<div class="social-media visible-phablets visible-phone">
						<ul>
							<?php
							$US_socialMedia_repeater = get_theme_mod('US_socialMedia_repeater', json_encode(array()));
							$US_socialMedia_repeater_decoded = json_decode($US_socialMedia_repeater);
							foreach ($US_socialMedia_repeater_decoded as $repeater_item) {
								$alt = get_post_meta(pippin_get_image_id($repeater_item->image_url), '_wp_attachment_image_alt', TRUE) == '' ? get_the_title(pippin_get_image_id($repeater_item->image_url)) : get_post_meta(pippin_get_image_id($repeater_item->image_url), '_wp_attachment_image_alt', TRUE);
								echo '<li><a target="_blank" href="' . $repeater_item->link . '"><img src="' . $repeater_item->image_url . '" width="21" height="21" alt="'.$alt.'"></a></li>';
							}
							?>
						</ul>
					</div>
				</div>
				<div class="item">
					<h6>Institucional</h6>
					<?php if (has_nav_menu('institucional')) :
						$itemsWrap = '<ul id="%1$s" class="%2$s">%3$s</ul>';
						wp_nav_menu(
							array(
								'theme_location'       => 'institucional',
								'menu'                 => '',
								'container'            => 'ul',
								'container_class'      => 'institucional',
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
				</div>
				<div class="item">
					<h6>Nossos canais</h6>
					<?php if (has_nav_menu('chanels')) :
						$itemsWrap = '<ul id="%1$s" class="%2$s">%3$s</ul>';
						wp_nav_menu(
							array(
								'theme_location'       => 'chanels',
								'menu'                 => '',
								'container'            => 'ul',
								'container_class'      => 'chanels',
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
				</div>
				<div class="item">
					<?php
					if ($newsletter_title != '') {
						echo '<h5><svg class="icon"><use xlink:href="' . get_bloginfo('template_url') . '/assets/img/icons.svg#lightning"></use></svg>' . $newsletter_title . '</h5>';
					}
					?>
					<div class="box-newsletter">
						<?= do_shortcode($newsletter_form) ?>
						<?php
						if ($newsletter_text != '') {
							echo '<p>' . $newsletter_text . '</p>';
						}
						?>
					</div>
				</div>
			</div>
			<div class="partners">
				<p class="copyright">
					<?php
					if ($text_copyright  != '') {
						echo $text_copyright;
					}
					?>
				</p>
				<div class="logos-partners">
					<?php
					$US_partners_repeater = get_theme_mod('US_partners_repeater', json_encode(array()));
					$US_partners_repeater_decoded = json_decode($US_partners_repeater);
					foreach ($US_partners_repeater_decoded as $repeater_item) {
						$alt = get_post_meta(pippin_get_image_id($repeater_item->image_url), '_wp_attachment_image_alt', TRUE) == '' ? get_the_title(pippin_get_image_id($repeater_item->image_url)) : get_post_meta(pippin_get_image_id($repeater_item->image_url), '_wp_attachment_image_alt', TRUE);
						echo '<a target="_blank" href="' . $repeater_item->link . '"><img src="' . $repeater_item->image_url . '" alt="'.$alt.'"></a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- end:footer -->
<svg class="frame-images">
	<clipPath id="svgMask1" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.00281, 0.0033)" d="M0 25.6931V7.29012L8.19151 0H349.365L357.011 7.69056V281.289L335.69 302.735H5.51265L0.254267 297.446V88.8262L6.26903 83.8022L5.69327 32.7102L0 25.6931Z" fill="#33cc66" />
	</clipPath>
</svg>
<svg class="frame-images">
	<clipPath id="svgMask2" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.00417, 0.0073)" d="M0 17.2721V4.90077L5.50673 0H234.86L240 5.16996V121.871L225.667 136.288H3.70587L0.17093 132.732V59.7132L4.21435 56.3359L3.82729 21.9894L0 17.2721Z" fill="#33cc66" />
	</clipPath>
</svg>
<svg class="frame-images">
	<clipPath id="svgMask3" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.00676, 0.0072)" d="M147 18.4054V5.78784L141.352 0.789551H5.27208L0 6.06239V125.086L14.7017 139.79H143.199L146.825 136.163V40.6304L143.381 37.1858L143.778 23.2165L147 18.4054Z" fill="#33cc66" />
	</clipPath>
</svg>
<svg class="frame-images">
	<clipPath id="svgMask4" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.00387 0.00258)" d="M0 18.5676V5.26833L5.91973 0H252.475L258 5.55771V371.011L242.592 386.51H3.98381L0.18375 382.687V64.1917L4.53042 60.5611L4.11434 23.6386L0 18.5676Z" fill="#33cc66" />
	</clipPath>
</svg>

<svg class="frame-images">
	<clipPath id="svgMask5" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.01020 0.00518)" d="M25.7224 117.622L33.8971 115.005L25.578 161.162L18.9453 198L25.4943 187.602L51.465 146.378L64.4677 125.738V125.731L83.0924 96.1655L99 70.9192L55.5364 84.1885L63.125 63.1324L66.5063 53.755L85.8905 0.00012207L28.2143 14.2815L15.5206 64.4849L13.2077 73.6364L0 125.867L25.7224 117.622Z" fill="#33cc66" />
	</clipPath>
</svg>
<svg class="frame-images">
	<clipPath id="svgMask6" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.00108 0.00167)" d="M927 53.4813L927 15.1748L909.929 0.000120578L15.9337 4.24224e-05L-1.39948e-06 16.0082L-4.87259e-05 557.36L44.4325 602L915.512 602L926.47 590.991L926.47 184.895L913.936 174.438L915.135 68.0877L927 53.4813Z" fill="#33cc66" />
	</clipPath>
</svg>
<svg class="frame-images">
	<clipPath id="svgMask7" clipPathUnits="objectBoundingBox">
		<path transform="scale(0.000958 0.00237)" d="M0 53.4812V15.1747L17.0709 0H1028.07L1044 16.0082V377.36L999.567 422H11.4882L0.529884 410.99V184.895L13.0645 174.437L11.8646 68.0876L0 53.4812Z" fill="#33cc66" />
	</clipPath>
</svg>