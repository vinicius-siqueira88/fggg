<?php

function US_customizer_register($wp_customize)
{
  /* create panel Options theme */
  $wp_customize->add_panel(
    new US_WP_Customize_Panel($wp_customize, 'US_client_theme', array(
      'priority'          => 201,
      'title'            => __('Options theme', 'upsites'),
      'description'      => __('Options theme', 'upsites'),
    ))
  );

  /* title_tagline */
  $wp_customize->add_setting('US_logo_footer', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo_footer',
      array(
        'label'     => __('Logo Rodapé', 'upsites'),
        'section'   => 'title_tagline',
        'settings'  => 'US_logo_footer',
      )
    )
  );
  $wp_customize->selective_refresh->add_partial('US_logo_footer', array(
    'selector' => 'footer .grid-4 .item.cols-01',
    'container_inclusive' => false,
    'render_callback' => 'dummy_function'
  ));

  $wp_customize->add_setting('US_text_copyright', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_text_copyright', array(
    'type' => 'text',
    'section' => 'title_tagline',
    'label' => __('Copyright', 'upsites'),
  ));

  $wp_customize->add_setting('US_text_youtube', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_text_youtube', array(
    'type' => 'text',
    'section' => 'title_tagline',
    'label' => __('Nosso canal no youtube', 'upsites'),
  ));

  $wp_customize->add_setting('US_partners_repeater', array(
    'sanitize_callback' => 'customizer_repeater_sanitize'
  ));
  $wp_customize->add_control(new Customizer_Repeater($wp_customize, 'US_partners_repeater', array(
    'label'   => __('Items', 'upsites'),
    'item_name' => __('Item', 'upsites'),
    'section' => 'title_tagline',
    'priority' => 201,
    'customizer_repeater_image_control' => true,
    'customizer_repeater_image_mobile_control' => false,
    'customizer_repeater_icon_control' => false,
    'customizer_repeater_link_control' => true,
    'customizer_repeater_title_control' => false,
    'customizer_repeater_subtitle_control' => false,
    'customizer_repeater_text_control' => false,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control' => false
  )));
  /* end:title_tagline */


  /* create panel Home Page 
  $wp_customize->add_panel(
    new US_WP_Customize_Panel($wp_customize, 'US_home', array(
      'priority'         => 201,
      'title'            => __('Home Page', 'upsites'),
      'description'      => __('Home page', 'upsites'),
      'panel'            => 'US_client_theme',
    ))
  );*/

  /* Texts Home /
  $wp_customize->add_section(
    'US_texts_home',
    array(
      'title'    => __('Textos Genéricos', 'upsites'),
      'priority' => 204,
      'panel'    => 'US_home'
    )
  );
  $wp_customize->add_setting('US_texts_home_title_01', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_texts_home_title_01', array(
    'type' => 'text',
    'section' => 'US_texts_home',
    'label' => __('Título 01', 'upsites'),
  ));
  $wp_customize->add_setting('US_texts_home_text_01', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_texts_home_text_01', array(
    'type' => 'text',
    'section' => 'US_texts_home',
    'label' => __('Texto 01', 'upsites'),
  ));
  / end:Texts Home */


  /* Banners */
  $wp_customize->add_panel(
    new US_WP_Customize_Panel($wp_customize, 'US_banner', array(
      'priority'         => 202,
      'title'            => __('Banner', 'upsites'),
      'description'      => __('banners sections', 'upsites'),
      'panel'            => 'US_client_theme',
    ))
  );

  $wp_customize->add_section(
    'US_banner_home',
    array(
      'title'    => __('home', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_banner'
    )
  );

  /* banner principal */
  $wp_customize->add_setting('US_banner_home_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_home_p1',
      array(
        'label'     => __('1ª full', 'upsites'),
        'section'   => 'US_banner_home',
        'settings'  => 'US_banner_home_p1',
      )
    )
  );
  $wp_customize->add_setting('US_banner_home_link_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_home_link_p1', array(
    'type' => 'text',
    'section' => 'US_banner_home',
    'label' => __('1ª full link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_home_script_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_home_script_p1', array(
    'type' => 'textarea',
    'section' => 'US_banner_home',
    'label' => __('1ª full script', 'upsites'),
  ));
  /* end: banner principal */
  $wp_customize->add_setting('US_banner_home_div_01', array(
    'sanitize_callback' => 'themename_sanitize',
  ));
  $wp_customize->add_control(
    new US_Separator_Control(
      $wp_customize,
      'US_banner_home_div_01',
      array(
        'section' => 'US_banner_home',
      )
    )
  );
  /* banner secundario */
  $wp_customize->add_setting('US_banner_home_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_home_p2',
      array(
        'label'     => __('2ª full', 'upsites'),
        'section'   => 'US_banner_home',
        'settings'  => 'US_banner_home_p2',
      )
    )
  );
  $wp_customize->add_setting('US_banner_home_link_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_home_link_p2', array(
    'type' => 'text',
    'section' => 'US_banner_home',
    'label' => __('2ª full link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_home_script_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_home_script_p2', array(
    'type' => 'textarea',
    'section' => 'US_banner_home',
    'label' => __('2ª full script', 'upsites'),
  ));
  /* end: banner secundario */
  $wp_customize->add_setting('US_banner_home_div_02', array(
    'sanitize_callback' => 'themename_sanitize',
  ));
  $wp_customize->add_control(
    new US_Separator_Control(
      $wp_customize,
      'US_banner_home_div_02',
      array(
        'section' => 'US_banner_home',
      )
    )
  );
  /* banner lateral */
  $wp_customize->add_setting('US_banner_home_p3', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_home_p3',
      array(
        'label'     => __('Lateral', 'upsites'),
        'section'   => 'US_banner_home',
        'settings'  => 'US_banner_home_p3',
      )
    )
  );
  $wp_customize->add_setting('US_banner_home_link_p3', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_home_link_p3', array(
    'type' => 'text',
    'section' => 'US_banner_home',
    'label' => __('Lateral link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_home_script_p3', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_home_script_p3', array(
    'type' => 'textarea',
    'section' => 'US_banner_home',
    'label' => __('Lateral script', 'upsites'),
  ));
  /* end: banner lateral */


  $wp_customize->add_section(
    'US_banner_post',
    array(
      'title'    => __('Interna post', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_banner'
    )
  );
  /* banner principal */
  $wp_customize->add_setting('US_banner_post_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_post_p1',
      array(
        'label'     => __('1ª full', 'upsites'),
        'section'   => 'US_banner_post',
        'settings'  => 'US_banner_post_p1',
      )
    )
  );
  $wp_customize->add_setting('US_banner_post_link_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_post_link_p1', array(
    'type' => 'text',
    'section' => 'US_banner_post',
    'label' => __('1ª full link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_post_script_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_post_script_p1', array(
    'type' => 'textarea',
    'section' => 'US_banner_post',
    'label' => __('1ª full script', 'upsites'),
  ));
  /* end: banner principal */
  $wp_customize->add_setting('US_banner_post_div_01', array(
    'sanitize_callback' => 'themename_sanitize',
  ));
  $wp_customize->add_control(
    new US_Separator_Control(
      $wp_customize,
      'US_banner_post_div_01',
      array(
        'section' => 'US_banner_post',
      )
    )
  );
  /* banner secundario */
  $wp_customize->add_setting('US_banner_post_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_post_p2',
      array(
        'label'     => __('2ª full', 'upsites'),
        'section'   => 'US_banner_post',
        'settings'  => 'US_banner_post_p2',
      )
    )
  );
  $wp_customize->add_setting('US_banner_post_link_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_post_link_p2', array(
    'type' => 'text',
    'section' => 'US_banner_post',
    'label' => __('2ª full link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_post_script_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_post_script_p2', array(
    'type' => 'textarea',
    'section' => 'US_banner_post',
    'label' => __('2ª full script', 'upsites'),
  ));
  /* end: banner secundario */
  $wp_customize->add_setting('US_banner_post_div_02', array(
    'sanitize_callback' => 'themename_sanitize',
  ));
  $wp_customize->add_control(
    new US_Separator_Control(
      $wp_customize,
      'US_banner_post_div_02',
      array(
        'section' => 'US_banner_post',
      )
    )
  );
  /* banner lateral */
  $wp_customize->add_setting('US_banner_post_p3', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_post_p3',
      array(
        'label'     => __('Lateral', 'upsites'),
        'section'   => 'US_banner_post',
        'settings'  => 'US_banner_post_p3',
      )
    )
  );
  $wp_customize->add_setting('US_banner_post_link_p3', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_post_link_p3', array(
    'type' => 'text',
    'section' => 'US_banner_post',
    'label' => __('Lateral link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_post_script_p3', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_post_script_p3', array(
    'type' => 'textarea',
    'section' => 'US_banner_post',
    'label' => __('Lateral script', 'upsites'),
  ));
  /* end: banner lateral */


  $wp_customize->add_section(
    'US_banner_cat',
    array(
      'title'    => __('Page category', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_banner'
    )
  );
  /* banner principal */
  $wp_customize->add_setting('US_banner_cat_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_cat_p1',
      array(
        'label'     => __('1ª full', 'upsites'),
        'section'   => 'US_banner_cat',
        'settings'  => 'US_banner_cat_p1',
      )
    )
  );
  $wp_customize->add_setting('US_banner_cat_link_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_cat_link_p1', array(
    'type' => 'text',
    'section' => 'US_banner_cat',
    'label' => __('1ª full link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_cat_script_p1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_cat_script_p1', array(
    'type' => 'textarea',
    'section' => 'US_banner_cat',
    'label' => __('1ª full script', 'upsites'),
  ));
  /* end: banner principal */
  $wp_customize->add_setting('US_banner_cat_div_01', array(
    'sanitize_callback' => 'themename_sanitize',
  ));
  $wp_customize->add_control(
    new US_Separator_Control(
      $wp_customize,
      'US_banner_cat_div_01',
      array(
        'section' => 'US_banner_cat',
      )
    )
  );
  /* banner lateral */
  $wp_customize->add_setting('US_banner_cat_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'US_banner_cat_p2',
      array(
        'label'     => __('Lateral', 'upsites'),
        'section'   => 'US_banner_cat',
        'settings'  => 'US_banner_cat_p2',
      )
    )
  );
  $wp_customize->add_setting('US_banner_cat_link_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_cat_link_p2', array(
    'type' => 'text',
    'section' => 'US_banner_cat',
    'label' => __('Lateral link', 'upsites'),
  ));
  $wp_customize->add_setting('US_banner_cat_script_p2', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_banner_cat_script_p2', array(
    'type' => 'textarea',
    'section' => 'US_banner_cat',
    'label' => __('Lateral script', 'upsites'),
  ));
  /* end: banner lateral */
  /* end:Banners */


  /* Newsletter */
  $wp_customize->add_section(
    'US_newsletter',
    array(
      'title'    => __('Newsletter', 'upsites'),
      'description'      => __('Newsletter sections', 'upsites'),
      'priority' => 203,
      'panel'    => 'US_client_theme'
    )
  );
  $wp_customize->add_setting('US_newsletter_title', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_newsletter_title', array(
    'type' => 'text',
    'section' => 'US_newsletter',
    'label' => __('Título', 'upsites'),
  ));
  $wp_customize->add_setting('US_newsletter_form', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_newsletter_form', array(
    'type' => 'text',
    'section' => 'US_newsletter',
    'label' => __('Formulário', 'upsites'),
    'description' => __('Shortcode do formulário', 'upsites'),
  ));
  $wp_customize->add_setting('US_newsletter_text', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_newsletter_text', array(
    'type' => 'text',
    'section' => 'US_newsletter',
    'label' => __('Texto', 'upsites'),
  ));
  /* end:Newslleter */


  /* Social media */
  $wp_customize->add_section(
    'US_socialMedia',
    array(
      'title'    => __('Social Media', 'upsites'),
      'priority' => 204,
      'panel'    => 'US_client_theme'
    )
  );

  $wp_customize->add_setting('US_socialMedia_repeater', array(
    'sanitize_callback' => 'customizer_repeater_sanitize'
  ));
  $wp_customize->add_control(new Customizer_Repeater($wp_customize, 'US_socialMedia_repeater', array(
    'label'   => __('Items', 'upsites'),
    'item_name' => __('Item', 'upsites'),
    'section' => 'US_socialMedia',
    'priority' => 1,
    'customizer_repeater_image_control' => true,
    'customizer_repeater_image_mobile_control' => false,
    'customizer_repeater_icon_control' => false,
    'customizer_repeater_link_control' => true,
    'customizer_repeater_title_control' => false,
    'customizer_repeater_subtitle_control' => false,
    'customizer_repeater_text_control' => false,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control' => false
  )));
  /* end:Social media */



  $allposts = array();
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page'  => 40,
  );
  // $allposts[''] = 'Selecionar';
  $posts = new WP_Query($args);
  while ($posts->have_posts()) : $posts->the_post();
    $allposts[get_the_ID()] = get_the_title();
  endwhile;





  $wp_customize->add_panel(
    new US_WP_Customize_Panel($wp_customize, 'US_home', array(
      'priority'         => 202,
      'title'            => __('Home', 'upsites'),
      'description'      => __('Home', 'upsites'),
      'panel'            => 'US_client_theme',
    ))
  );
  $wp_customize->add_section(
    'US_text_home',
    array(
      'title'    => __('Text home', 'upsites'),
      'priority' => 203,
      'panel'    => 'US_home'
    )
  );
  $wp_customize->add_setting('US_home_text_prepend', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_home_text_prepend', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Text prepend', 'upsites'),
  ));
  $wp_customize->add_setting('US_home_text_h1', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control('US_home_text_h1', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Text H1', 'upsites'),
  ));


  $wp_customize->add_setting('US_home_more_featured', array(
    'capability' => 'edit_theme_options',
    'default' => 'Mais Destaques',
  ));
  $wp_customize->add_control('US_home_more_featured', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Title More featured', 'upsites'),
  ));
  $wp_customize->add_setting('US_home_list_post', array(
    'capability' => 'edit_theme_options',
    'default' => 'Últimas Notícias',
  ));
  $wp_customize->add_control('US_home_list_post', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Title List post', 'upsites'),
  ));

  $wp_customize->add_setting('US_home_list_post_btn', array(
    'capability' => 'edit_theme_options',
    'default' => 'VER MAIS NOTÍCIAS',
  ));
  $wp_customize->add_control('US_home_list_post_btn', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Button List post', 'upsites'),
  ));

  $wp_customize->add_setting('US_home_reviews', array(
    'capability' => 'edit_theme_options',
    'default' => 'Reviews',
  ));
  $wp_customize->add_control('US_home_reviews', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Title Reviews', 'upsites'),
  ));
  $wp_customize->add_setting('US_home_most_read', array(
    'capability' => 'edit_theme_options',
    'default' => 'As mais lidas da semana',
  ));
  $wp_customize->add_control('US_home_most_read', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Title Most Read', 'upsites'),
  ));
  $wp_customize->add_setting('US_home_podcasts', array(
    'capability' => 'edit_theme_options',
    'default' => 'Podcasts e Vídeos',
  ));
  $wp_customize->add_control('US_home_podcasts', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Title Podcasts and Videos', 'upsites'),
  ));

  $wp_customize->add_setting('US_home_podcasts_btn', array(
    'capability' => 'edit_theme_options',
    'default' => 'ACESSE NOSSO CANAL NO YOUTUBE',
  ));
  $wp_customize->add_control('US_home_podcasts_btn', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Button Podcasts and Videos', 'upsites'),
  ));

  $wp_customize->add_setting('US_home_webstories', array(
    'capability' => 'edit_theme_options',
    'default' => 'Web Stories',
  ));
  $wp_customize->add_control('US_home_webstories', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Title Web Stories', 'upsites'),
  ));

  $wp_customize->add_setting('US_home_webstories_btn', array(
    'capability' => 'edit_theme_options',
    'default' => 'Mais Web Stories',
  ));
  $wp_customize->add_control('US_home_webstories_btn', array(
    'type' => 'text',
    'section' => 'US_text_home',
    'label' => __('Button Web Stories', 'upsites'),
  ));




  $wp_customize->add_section(
    'US_slide_home',
    array(
      'title'    => __('Slide home', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_home'
    )
  );


  /*$wp_customize->add_setting('US_slide_home_itens', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens',
    array(
      'label' => 'Post slide',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => true
      ),
      'choices' => array(
        'posts' => $allposts,
      )
    )
  ));*/
  $wp_customize->add_setting('US_slide_home_itens_01', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens_01',
    array(
      'label' => 'Position 01',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Posts' => $allposts,
      )
    )
  ));
  $wp_customize->add_setting('US_slide_home_itens_02', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens_02',
    array(
      'label' => 'Position 02',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Posts' => $allposts,
      )
    )
  ));
  $wp_customize->add_setting('US_slide_home_itens_03', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens_03',
    array(
      'label' => 'Position 03',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Posts' => $allposts,
      )
    )
  ));
  $wp_customize->add_setting('US_slide_home_itens_04', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens_04',
    array(
      'label' => 'Position 04',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Posts' => $allposts,
      )
    )
  ));
  $wp_customize->add_setting('US_slide_home_itens_05', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens_05',
    array(
      'label' => 'Position 05',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Posts' => $allposts,
      )
    )
  ));
  $wp_customize->add_setting('US_slide_home_itens_06', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_slide_home_itens_06',
    array(
      'label' => 'Position 06',
      'section' => 'US_slide_home',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Posts' => $allposts,
      )
    )
  ));


  $wp_customize->add_panel(
    new US_WP_Customize_Panel($wp_customize, 'US_slide_cat', array(
      'priority'         => 203,
      'title'            => __('Aba cat', 'upsites'),
      'description'      => __('Aba cat', 'upsites'),
      'panel'            => 'US_home',
    ))
  );

  $allcatspostsgames = array();
  $allcatspostsgamesargs = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page'  => 40,
    'category_name' => 'games',
    'no_found_rows'          => true,
    'update_post_term_cache' => false,
    'update_post_meta_cache' => false,
    'cache_results'          => false
  );
  // $allposts[''] = 'Selecionar';
  $allcatspostgames = new WP_Query($allcatspostsgamesargs);
  while ($allcatspostgames->have_posts()) : $allcatspostgames->the_post();
    $allcatspostsgames[get_the_ID()] = get_the_title();
  endwhile;
  $wp_customize->add_section(
    'US_cat_home_games',
    array(
      'title'    => __('Cat games', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_slide_cat'
    )
  );
  $wp_customize->add_setting('US_cat_home_games_01', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_games_01',
    array(
      'label' => 'Position 01',
      'section' => 'US_cat_home_games',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsgames,
      )
    )
  ));
  $wp_customize->add_setting('US_cat_home_games_02', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_games_02',
    array(
      'label' => 'Position 02',
      'section' => 'US_cat_home_games',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsgames,
      )
    )
  ));
  $wp_customize->add_setting('US_cat_home_games_03', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_games_03',
    array(
      'label' => 'Position 03',
      'section' => 'US_cat_home_games',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsgames,
      )
    )
  ));



  $allcatspostsesports = array();
  $allcatspostsesportsargs = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page'  => 40,
    'category_name' => 'esports',
    'no_found_rows'          => true,
    'update_post_term_cache' => false,
    'update_post_meta_cache' => false,
    'cache_results'          => false
  );
  // $allposts[''] = 'Selecionar';
  $allcatspostesports = new WP_Query($allcatspostsesportsargs);
  while ($allcatspostesports->have_posts()) : $allcatspostesports->the_post();
    $allcatspostsesports[get_the_ID()] = get_the_title();
  endwhile;
  $wp_customize->add_section(
    'US_cat_home_esports',
    array(
      'title'    => __('Cat esports', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_slide_cat'
    )
  );
  $wp_customize->add_setting('US_cat_home_esports_01', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_esports_01',
    array(
      'label' => 'Position 01',
      'section' => 'US_cat_home_esports',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsesports,
      )
    )
  ));
  $wp_customize->add_setting('US_cat_home_esports_02', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_esports_02',
    array(
      'label' => 'Position 02',
      'section' => 'US_cat_home_esports',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsesports,
      )
    )
  ));
  $wp_customize->add_setting('US_cat_home_esports_03', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_esports_03',
    array(
      'label' => 'Position 03',
      'section' => 'US_cat_home_esports',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsesports,
      )
    )
  ));



  $allcatspostsculturapop = array();
  $allcatspostsculturapopargs = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page'  => 40,
    'category_name' => 'cultura-pop',
    'no_found_rows'          => true,
    'update_post_term_cache' => false,
    'update_post_meta_cache' => false,
    'cache_results'          => false
  );
  // $allposts[''] = 'Selecionar';
  $allcatspostculturapop = new WP_Query($allcatspostsculturapopargs);
  while ($allcatspostculturapop->have_posts()) : $allcatspostculturapop->the_post();
    $allcatspostsculturapop[get_the_ID()] = get_the_title();
  endwhile;
  $wp_customize->add_section(
    'US_cat_home_culturapop',
    array(
      'title'    => __('Cat cultura pop', 'upsites'),
      'priority' => 201,
      'panel'    => 'US_slide_cat'
    )
  );
  $wp_customize->add_setting('US_cat_home_culturapop_01', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_culturapop_01',
    array(
      'label' => 'Position 01',
      'section' => 'US_cat_home_culturapop',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsculturapop,
      )
    )
  ));
  $wp_customize->add_setting('US_cat_home_culturapop_02', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_culturapop_02',
    array(
      'label' => 'Position 02',
      'section' => 'US_cat_home_culturapop',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsculturapop,
      )
    )
  ));
  $wp_customize->add_setting('US_cat_home_culturapop_03', array(
    'capability' => 'edit_theme_options',
  ));
  $wp_customize->add_control(new upsite_Dropdown_Select2_Custom_Control(
    $wp_customize,
    'US_cat_home_culturapop_03',
    array(
      'label' => 'Position 03',
      'section' => 'US_cat_home_culturapop',
      'input_attrs' => array(
        'multiselect' => false
      ),
      'choices' => array(
        'Category' => $allcatspostsculturapop,
      )
    )
  ));
}
add_action('customize_register', 'US_customizer_register');


function US_register_cpts()
{

  /**
   * Post Type: Videos.
   */

  $labels = [
    "name" => __("Videos"),
    "singular_name" => __("Video"),
  ];

  $args = [
    "label" => __("Videos"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "videos", "with_front" => true],
    "query_var" => true,
    "supports" => ["title", "thumbnail"],
    "show_in_graphql" => false,
  ];

  register_post_type("videos", $args);
}
add_action('init', 'US_register_cpts');


function US_register_taxes()
{

  /**
   * Taxonomy: Categorias.
   */

  $labels = [
    "name" => __("Categorias"),
    "singular_name" => __("Categoria"),
  ];


  $args = [
    "label" => __("Categorias"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'categories_videos', 'with_front' => true,],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "show_tagcloud" => false,
    "rest_base" => "categories_videos",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "rest_namespace" => "wp/v2",
    "show_in_quick_edit" => false,
    "sort" => false,
    "show_in_graphql" => false,
    'default_term'       => 'Podcasts'
  ];
  register_taxonomy("categories_videos", ["videos"], $args);
}
add_action('init', 'US_register_taxes');

if (function_exists('acf_add_local_field_group')) :
  /* cor do post */
  acf_add_local_field_group(array(
    'key' => 'group_6283b0abef62f',
    'title' => 'Color post',
    'fields' => array(
      array(
        'key' => 'field_6283b0b987ebb',
        'label' => 'Color',
        'name' => 'cor_post',
        'type' => 'color_picker',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '#000000',
        'enable_opacity' => 0,
        'return_format' => 'string',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'downloads',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 1,
  ));

  /* link do video */
  acf_add_local_field_group(array(
    'key' => 'group_63349005cd339',
    'title' => 'Link video',
    'fields' => array(
      array(
        'key' => 'field_63349021e2e21',
        'label' => 'Link',
        'name' => 'link_do_video',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => 'https://www.youtube.com/watch?v=',
        'append' => '',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'videos',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_63369c7d02dad',
    'title' => 'Header featured',
    'fields' => array(
      array(
        'key' => 'field_63369c7d10019',
        'label' => 'Featured',
        'name' => 'header_featured',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'sim' => 'Sim',
          'nao' => 'Não',
        ),
        'default_value' => 'nao',
        'return_format' => 'value',
        'allow_null' => 0,
        'other_choice' => 0,
        'save_other_choice' => 0,
        'layout' => 'vertical',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_633724643d597',
    'title' => 'Itens review',
    'fields' => array(
      array(
        'key' => 'field_633724e4e520w',
        'label' => 'Review Title',
        'name' => 'review_title',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_63372474392f8',
        'label' => 'Review Note',
        'name' => 'review_note',
        'type' => 'range',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'min' => 0,
        'max' => 100,
        'step' => '05',
        'prepend' => '',
        'append' => '',
      ),
      array(
        'key' => 'field_6337256fe519d',
        'label' => 'Excerpt review',
        'name' => 'excerpt_review',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => 180,
        'rows' => 4,
        'new_lines' => '',
      ),
      array(
        'key' => 'field_633724e4e519c',
        'label' => 'Review time',
        'name' => 'review_time',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633724ace5198',
        'label' => 'Publisher',
        'name' => 'publisher',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633724c1e5199',
        'label' => 'Developer',
        'name' => 'developer',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633724cae519a',
        'label' => 'Platforms',
        'name' => 'platforms',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633724d5e519b',
        'label' => 'Launch',
        'name' => 'launch',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633725ade519e',
        'label' => 'Pros',
        'name' => 'pros',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 6,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_633725bce519f',
            'label' => 'Item',
            'name' => 'item',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => 55,
          ),
        ),
      ),
      array(
        'key' => 'field_633725ece51a0',
        'label' => 'Cons',
        'name' => 'cons',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 6,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_633725ece51a1',
            'label' => 'Item',
            'name' => 'item',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => 55,
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_category',
          'operator' => '==',
          'value' => 'category:reviews',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_633b4ccc0eb8b',
    'title' => 'Social media',
    'fields' => array(
      array(
        'key' => 'field_633b4d229c647',
        'label' => 'Social media',
        'name' => 'social_media',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 5,
        'layout' => 'row',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_633b4d4e9c648',
            'label' => 'Icon',
            'name' => 'icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'id',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => 42,
            'min_height' => 42,
            'min_size' => '',
            'max_width' => 42,
            'max_height' => 42,
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_633b4d80c35d2',
            'label' => 'Link',
            'name' => 'link',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'user_form',
          'operator' => '==',
          'value' => 'all',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_633c92fe92753',
    'title' => 'Contact fields',
    'fields' => array(
      array(
        'key' => 'field_633c93113937c',
        'label' => 'Subtitle',
        'name' => 'subtitle_contact',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633c937f3937d',
        'label' => 'Text',
        'name' => 'text_contact',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 4,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633c939e3937e',
        'label' => 'Title form',
        'name' => 'title_form_contact',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633c93c23937f',
        'label' => 'Form',
        'name' => 'form_contact',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633c94394791b',
        'label' => 'Title talk editor',
        'name' => 'title_talk_editor_contact',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633c94574791c',
        'label' => 'Text talk editor',
        'name' => 'text_talk_editor_contact',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'delay' => 1,
      ),
      array(
        'key' => 'field_633c94954791d',
        'label' => 'Title advertise',
        'name' => 'title_advertise_contact',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_633c94e44791e',
        'label' => 'Text advertise',
        'name' => 'text_advertise_contact',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'delay' => 1,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-pages/contact.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
    ),
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_633d640c64dc3',
    'title' => 'About fields',
    'fields' => array(
      array(
        'key' => 'field_633d649a04240',
        'label' => 'Subtitle',
        'name' => 'subtitle_about',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633d64c504241',
        'label' => 'Text',
        'name' => 'text_about',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 4,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633d7d5804242',
        'label' => 'Title content',
        'name' => 'title_content_about',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633d7d7604243',
        'label' => 'Text content',
        'name' => 'text_content_about',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 1,
      ),
      array(
        'key' => 'field_633d7f7915bad',
        'label' => 'Text Social media',
        'name' => 'text_social_media_about',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_633d7d9e04244',
        'label' => 'Social media',
        'name' => 'social_media_about',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 4,
        'layout' => 'row',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_633d7dfa04245',
            'label' => 'Icon',
            'name' => 'icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'id',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_633d7e0a04246',
            'label' => 'Link',
            'name' => 'link',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_633d7e2704247',
        'label' => 'Team',
        'name' => 'team_about',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'row',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_633d7e4004248',
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_633d7e4b04249',
            'label' => 'Office',
            'name' => 'office',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_633d7e4b04250',
            'label' => 'Link author',
            'name' => 'link_author',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_633d7e6b0424a',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => 'Dimensions 267px X 401px',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'id',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => 267,
            'min_height' => 401,
            'min_size' => '',
            'max_width' => 267,
            'max_height' => 401,
            'max_size' => '',
            'mime_types' => '',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-pages/about.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
    ),
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_635c14d311478',
    'title' => 'Read more',
    'fields' => array(
      array(
        'key' => 'field_635c1526feea1',
        'label' => 'Read more posts',
        'name' => 'read_more_posts',
        'type' => 'relationship',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'post',
        ),
        'taxonomy' => '',
        'filters' => array(
          0 => 'search',
          1 => 'post_type',
          2 => 'taxonomy',
        ),
        'elements' => '',
        'min' => '',
        'max' => 3,
        'return_format' => 'id',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

  acf_add_local_field_group(array(
    'key' => 'group_635c196d5cd14',
    'title' => 'Text H1',
    'fields' => array(
      array(
        'key' => 'field_635c19a96d299',
        'label' => 'Text prepend',
        'name' => 'text_prepend',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_635c19e76d29a',
        'label' => 'Text H1',
        'name' => 'text_h1',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'taxonomy',
          'operator' => '==',
          'value' => 'category',
        ),
      ),
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-pages/news.php',
        ),
      ),
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-pages/videos.php',
        ),
      ),
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-pages/webstories.php',
        ),
      ),
      array(
        array(
          'param' => 'taxonomy',
          'operator' => '==',
          'value' => 'categories_videos',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

endif;
