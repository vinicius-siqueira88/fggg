<?php
/*
Template Name: Webstories
*/
get_header();

$text_prepend = get_field('text_prepend');
$text_h1 = get_field('text_h1');
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
          </svg> <?= get_the_title() ?>
        </h2>
      </div>
    </div>

    <div class="container">
      <div class="">
        <div class="tit more-space">
          <span><?= $text_prepend ?>&nbsp;</span>
          <h1> <?= $text_h1 ?></h1>
        </div>
        <!-- webstories-list -->
        <div class="webstories-list">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $webargs = array(
            'post_type'              => 'web-story',
            'paged'                  => $paged,
            'post_status'            => 'publish',
          );
          $webposts = new WP_Query($webargs);
          $maxpages = $webposts->max_num_pages;
          while ($webposts->have_posts()) : $webposts->the_post();
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
        <!-- end:webstories-list -->
        <?php US_paging_nav($webposts, $paged, $maxpages); ?>
      </div>
    </div>
  </section>
  <!-- end:columns-home -->

</main>
<!-- end:main -->
<?php get_footer(); ?>