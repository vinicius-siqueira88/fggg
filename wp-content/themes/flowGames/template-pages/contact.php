<?php
/*
Template Name: Contato
*/
get_header();
?>
<main>
  <section class="contact">
    <div class="box-header">
      <div class="container">
        <h1><?= get_the_title() ?></h1>
        <h2><?= get_field('subtitle_contact') ?></h2>
        <p><?= get_field('text_contact') ?></p>
      </div>
    </div>
    <div class="container">
      <div class="grid">
        <div class="item">
          <h3><?= get_field('title_form_contact') ?></h3>
          <div class="form"><?= do_shortcode(get_field('form_contact')) ?></div>
        </div>
        <div class="item space">
          <h4><?= get_field('title_talk_editor_contact') ?></h4>
          <div class="border"><?= get_field('text_talk_editor_contact') ?></div>
          <h4 class="small"><?= get_field('title_advertise_contact') ?></h4>
          <?= get_field('text_advertise_contact') ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>