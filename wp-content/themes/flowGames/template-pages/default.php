<?php
/*
Template Name: Padrão
*/
get_header();
?>
<!-- main -->
<main>
  <!-- columns-home -->
  <section class="template">
    <div class="box-title">
      <div class="container">
        <h1>
          <svg class="icon">
            <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/icons.svg#lightning"></use>
          </svg> <?= get_the_title() ?>
        </h1>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <?php the_content() ?>
      </div>
    </div>
  </section>
  <!-- end:columns-home -->
</main>
<!-- end:main -->
<?php get_footer(); ?>