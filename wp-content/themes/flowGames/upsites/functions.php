<?php
/* url da pasta upsites no thema */
$upsites = get_template_directory() . '/upsites/';

/** 
 * After theme setup hook actions
 */
add_action('after_setup_theme', function () {

  // add_theme_support('widgets');
  // add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('post-small-thumb', 300, 283, true);
  add_image_size('post-small-featured-thumb', 500, 424, true);
  add_image_size('post-medium-featured-thumb', 651, 386, true);

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'menu' => __('Top Menu', 'upsites'),
      'institucional' => __('Institucional Menu', 'upsites'),
      'chanels' => __('Chanels Menu', 'upsites'),
    )
  );
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 197,
      'width'       => 50,
      'flex-height' => true,
      'flex-width'  => true,
    )
  );
});


/** 
 * Load theme assets
 */
add_action('wp_enqueue_scripts', function () {
  $assets_src = get_template_directory_uri() . '/assets';
  $version = wp_get_theme()->get('Version');

  // Load theme style
  if (strpos(get_bloginfo('url'), 'local.wp4') !== false or strpos(get_bloginfo('url'), 'localhost') !== false) {
    wp_enqueue_style('theme', "{$assets_src}/css/main.css", [], $version, 'all');
  } else {
    wp_enqueue_style('theme', "{$assets_src}/css/main.min.css", [], $version, 'all');
  }
  wp_enqueue_style('fancybox', "https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css", [], $version, 'all');

  // Load theme 
  wp_enqueue_script('cookie', "//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js", ['jquery'], $version, true);
  if (strpos(get_bloginfo('url'), 'local.wp4') !== false or strpos(get_bloginfo('url'), 'localhost') !== false) {
    wp_enqueue_script('theme', "{$assets_src}/js/bundle.js", ['jquery'], $version, true);
  } else {
    wp_enqueue_script('theme', "{$assets_src}/js/bundle.min.js", ['jquery'], $version, true);
  }
  wp_enqueue_script('fancybox', "https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js", ['jquery'], $version, true);
}, 999, 1);

add_action('admin_enqueue_scripts', function () {
  $assets_src = get_template_directory_uri() . '/assets';
  $version = wp_get_theme()->get('Version');

  wp_enqueue_style('admin_css', "{$assets_src}/css/admin-style.css",  [], $version, 'all');
});

/** 
 * Category
 */
function US_term_list($ID, $cat)
{
  //echo $cat;
  $term_list = wp_get_post_terms($ID, $cat, ['fields' => 'all']);
  $primary_term_bkp = $term_list[0]->name;
  $primary_term_slug_bkp = $term_list[0]->slug;
  $primary_term = '';
  $primary_term_slug = '';

  foreach ($term_list as $term) {
    /*if (get_post_meta($ID, '_yoast_wpseo_primary_' . $cat, true) == $term->term_id) {
      $primary_term = $term->name;
      $primary_term_slug = $term->slug;
    }*/
    if (get_post_meta($ID, 'rank_math_primary_category', true) == $term->term_id) {
      $primary_term = $term->name;
      $primary_term_slug = $term->slug;
    }
  }
  $primary_term = ($primary_term !== '') ? $primary_term : $primary_term_bkp;
  $primary_term_slug = ($primary_term_slug !== '') ? $primary_term_slug : $primary_term_slug_bkp;
  return '<a href="' . get_term_link($primary_term_slug, $cat) . '" class="tag">' . $primary_term . '</a>';
}

function US_paging_nav($posts, $paged, $maxpages)
{

  /** Stop execution if there's only 1 page */
  if ($posts->max_num_pages <= 1)
    return;

  //$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval($maxpages);

  /** Add current page to the array */
  if ($paged >= 1)
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ($paged >= 3) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if (($paged + 2) <= $max) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="paginations">' . "\n";

  /** Previous Post Link */
  if (get_previous_posts_link()) {
    printf('<a rel="prev" href="%s" class="prev">Anterior</a>' . "\n", get_previous_posts_page_link());
  } else {
    printf('<a href="#" rel="prev" class="prev">Anterior</a>' . "\n", get_previous_posts_page_link());
  }

  /** Link to first page, plus ellipses if necessary */
  if (!in_array(1, $links)) {
    $class = 1 == $paged ? ' class="current"' : '';

    printf('<a%s href="%s">%s</a>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

    if (!in_array(2, $links))
      echo '<span>…</span>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort($links);
  foreach ((array) $links as $link) {
    $class = $paged == $link ? ' class="current"' : '';
    printf('<a%s href="%s">%s</a>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
  }

  /** Link to last page, plus ellipses if necessary */
  if (!in_array($max, $links)) {
    if (!in_array($max - 1, $links))
      echo '<span>…</span>' . "\n";

    $class = $paged == $max ? ' class="current"' : '';
    printf('<a%s href="%s">%s</a>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
  }

  /** Next Post Link */
  if (get_next_posts_link('next', $posts->max_num_pages)) {
    printf('<a rel="next" href="%s" class="next">Próximo</a>' . "\n", get_next_posts_page_link());
  } else {
    printf('<a href="#" rel="next" class="next">Próximo</a>' . "\n", get_next_posts_page_link());
  }
  echo '</div>' . "\n";
}

function USFormatGallery($string, $attr)
{
  static $instance = 0;
  $instance++;

  $output = '<figure class="block-gallery" id="slick-slider-postimg-' . $instance . '">';

  $posts = get_posts(array('include' => $attr['ids'], 'post_type' => 'attachment'));

  $output .= '<div class="galley">';
  foreach ($posts as $imagePost) {
    $output .= '<a fancybox-img data-fancybox="gallery_group_' . $instance . '" href="' . wp_get_attachment_image_src($imagePost->ID, 'large')[0] . '"><img src="' . wp_get_attachment_image_src($imagePost->ID, 'large')[0] . '"></a>';
  }
  $output .= '</div>';

  $output .= '<div class="pag-galley">';
  foreach ($posts as $imagePost) {
    $output .= '<img src="' . wp_get_attachment_image_src($imagePost->ID, 'thumbnail')[0] . '">';
  }
  $output .= '</div>';

  $output .= '</figure>';

  return $output;
}
add_filter('post_gallery', 'USFormatGallery', 10, 2);

/*function create_theme_template_pages()
{
  $check_page_news_exist = get_page_by_path('noticias', 'OBJECT', 'page');
  // Check if the page already exists
  if (empty($check_page_news_exist)) {
    $page_id = wp_insert_post(
      array(
        'post_title' => 'Notícias de Games',
        'post_name' => strtolower('Notícias'),
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_content' => '',
        'page_template'  => 'template-pages/' . sanitize_title('news') . '.php',
      )
    );
  }
  $check_page_videos_exist = get_page_by_path('podcasts-e-videos', 'OBJECT', 'page');
  // Check if the page already exists
  if (empty($check_page_videos_exist)) {
    $page_id = wp_insert_post(
      array(
        'post_title' => 'Podcasts e Vídeos',
        'post_name' => strtolower('Podcasts e Vídeos'),
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_content' => '',
        'page_template'  => 'template-pages/' . sanitize_title('videos') . '.php',
      )
    );
  }
  $check_page_webstories_exist = get_page_by_path('webstories', 'OBJECT', 'page');
  // Check if the page already exists
  if (empty($check_page_webstories_exist)) {
    $page_id = wp_insert_post(
      array(
        'post_title' => 'Webstories de Games',
        'post_name' => strtolower('Webstories'),
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_content' => '',
        'page_template'  => 'template-pages/' . sanitize_title('webstories') . '.php',
      )
    );
  }
  $check_page_contact_exist = get_page_by_path('contato', 'OBJECT', 'page');
  // Check if the page already exists
  if (empty($check_page_contact_exist)) {
    $page_id = wp_insert_post(
      array(
        'post_title' => 'Contato',
        'post_name' => strtolower('Contato'),
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_content' => '',
        'page_template'  => 'template-pages/' . sanitize_title('contact') . '.php',
      )
    );
  }
  $check_page_about_exist = get_page_by_path('quem-somos', 'OBJECT', 'page');
  // Check if the page already exists
  if (empty($check_page_about_exist)) {
    $page_id = wp_insert_post(
      array(
        'post_title' => 'Quem Somos',
        'post_name' => strtolower('Quem Somos'),
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_content' => '',
        'page_template'  => 'template-pages/' . sanitize_title('about') . '.php',
      )
    );
  }
}
add_action('init', 'create_theme_template_pages');*/


function US_add_arrow_menu($output, $item, $depth, $args)
{
  //Only add class to 'top level' items on the 'primary' menu.
  if ('menu' == $args->theme_location && $depth === 0) {
    if (in_array("menu-item-has-children", $item->classes)) {
      $output .= '<span class="icon"></span>';
    }
  }
  return $output;
}
add_filter('walker_nav_menu_start_el', 'US_add_arrow_menu', 10, 4);

add_action('web_stories_story_head', "backbutton");
function backbutton()
{
  echo '
    <a href="' . htmlspecialchars($_SERVER['HTTP_REFERER']) . '" target="_self" title="Toutes les stories"  style="position: fixed; top: 0;color: white;z-index: 9;padding: 1rem;"><svg width="25" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 477.862 477.862"
	style="enable-background:new 0 0 477.862 477.862;" xml:space="preserve" fill="#ffffff">
	<path d="M187.722,102.856V17.062C187.719,7.636,180.076-0.003,170.65,0c-4.834,0.001-9.44,2.053-12.676,5.644L4.375,176.311
			c-5.617,6.256-5.842,15.67-0.529,22.187l153.6,187.733c5.968,7.295,16.72,8.371,24.016,2.403c3.952-3.233,6.249-8.066,6.26-13.172
			v-85.043c134.827,4.386,218.965,62.02,256.888,175.787c2.326,6.96,8.841,11.653,16.179,11.656c0.92,0.003,1.84-0.072,2.748-0.222
			c8.256-1.347,14.319-8.479,14.319-16.845C477.855,259.818,356.87,112.174,187.722,102.856z" /></svg></a>
    ';
}

/*function searchFilter($query)
{
  if ($query->is_search) {
    $type = $_GET['post_type'];
    if (isset($query->query_vars['post_type'])) {
      if ($type == 'downloads') {
        $query->set('post_type', $type);
        return locate_template('search-download.php');
      }
    } else {
      $query->set('post_type', 'post');
    }
  }
  return $query;
}
add_filter('pre_get_posts', 'searchFilter');*/

function my_relationship_query( $args, $field, $post_id ) {
	
  // order by newest posts first
  $args['orderby'] = 'date';
  $args['order'] = 'DESC';

  // return
  return $args;
  
}

// filter for every field
add_filter('acf/fields/relationship/query', 'my_relationship_query', 10, 3);

/* CUSTOMIZER_REPEATER_VERSION */
define('CUSTOMIZER_REPEATER_VERSION', '1.1.0');
require $upsites . 'customizer-repeater/inc/customizer.php';

/* US_SET_POST_VIEWS */
define('US_SET_POST_VIEWS', '1.1.0');
require $upsites . 'post-views/post-views.php';

/* US_CUSTOMIZER_CONTROLS */
define('US_CUSTOMIZER_CONTROLS', '1.1.0');
require $upsites . 'customizer-controls/customizer-controls.php';

/* US_CUSTOMIZER_REGISTER */
define('US_CUSTOMIZER_REGISTER', '1.1.0');
require $upsites . 'customizer-register/customizer-register.php';

/* US_COMMENTS */
define('US_COMMENTS', '1.1.0');
require $upsites . 'comments/comments.php';

/* US_PAGINATION */
define('US_PAGINATION', '1.1.0');
require $upsites . 'pagination/pagination.php';

function pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
   return $attachment[0]; 
}