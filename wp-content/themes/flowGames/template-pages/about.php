<?php
/*
Template Name: Quem somos
*/
get_header();
?>

<!-- main -->
<main>
  <section class="about">
    <div class="box-header">
      <div class="container">
        <h1><?= get_the_title() ?></h1>
        <h2><?= get_field('subtitle_about') ?></h2>
        <p><?= get_field('text_about') ?></p>
      </div>
    </div>
    <div class="container">
      <div class="grid">
        <div class="content">
          <h3><?= get_field('title_content_about') ?></h3>
          <?= get_field('text_content_about') ?>
          <p><?= get_field('text_social_media_about') ?></p>
          <div class="social-media">
            <ul>
              <?php
              if (have_rows('social_media_about')) :
                while (have_rows('social_media_about')) : the_row();
                  echo '<li><a target="_blank" href="' . get_sub_field('link') . '">' . wp_get_attachment_image(get_sub_field('icon'), 'full') . '</a></li>';
                endwhile;
              endif;
              ?>
            </ul>
          </div>
        </div>
        <div class="sidebar">
          <div class="image">
            <?= wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="team">
      <div class="container">
        <div class="title">
          <h4>
            <svg class="icon">
              <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
            </svg> Conheça nossa equipe
          </h4>
        </div>
        <div class="slide-team">
          <?php
          if (have_rows('team_about')) :
            while (have_rows('team_about')) : the_row();
              echo '<div class="item">
                <a href="' . get_sub_field('link_author') . '">
                  <div class="base">
                    <img src="' . get_template_directory_uri() . '/assets/img/base-webstories.svg" alt="">
                  </div>
                  <div class="thumb">
                  ' . wp_get_attachment_image(get_sub_field('image'), 'full') . '
                  </div>
                  <div class="content">
                    <h5>' . get_sub_field('name') . '</h5>
                    <span>' . get_sub_field('office') . '</span>
                  </div>
                </a>
              </div>';
            endwhile;
          endif;
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
    </div>
  </section>
</main>
<!-- end:main -->

<?php get_footer(); ?>