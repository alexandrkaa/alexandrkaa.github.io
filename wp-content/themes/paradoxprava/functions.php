<?
// отключение парсера html и добавления br и p в админке
remove_filter( 'the_content', 'wpautop' );
// add menus support
add_theme_support('menus');

// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'paradoxprava_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function paradoxprava_scripts() {
  wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/css/style.min.img.css' );
  wp_enqueue_script( 'scripts-bundle', get_template_directory_uri() . '/assets/js/app.min.js', array(), date('Ym'), true );
}

// add active class to active menu li
function special_nav_class ($classes, $item) {
  // echo "<pre>";
  // var_dump($item);
  // echo "</pre>";
  //if( strtolower ($args->menu_class) == "footer-nav__list") {
    if (in_array('current-menu-item', $classes) && !in_array('footer-nav__item', $classes) ) {
        $classes[] = 'menu-list__item--active ';
    }
  //}
    return $classes;
}

//add link class
function add_menu_atts( $atts, $item, $args ) {
  // echo "<pre>";
  // var_dump($args->menu_class);
  // echo "</pre>";
  if( strtolower ($args->menu_class) == "footer-nav__list") {
    $atts['class'] = 'footer-nav__link';
  } else {
    $atts['class'] = 'menu-list__link';
  }
  return $atts;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10, 2);
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 20, 3 );

function shortcode_services() {
  $args = array(
  	'sort_order' => 'asc',
  	'sort_column' => 'menu_order',
  	'hierarchical' => 1,
  	'exclude' => '',
  	'include' => '',
  	'meta_key' => '',
  	'meta_value' => '',
  	'authors' => '',
  	'child_of' => 0,
  	'parent' => 9,
  	'exclude_tree' => '',
  	'number' => '',
  	'offset' => 0,
  	'post_type' => 'page',
  	'post_status' => 'publish'
  );
  $pages = get_pages($args);
  $ret = '<ul class="services__list">';
  foreach ($pages as $page) {
    $ret .= '
    <li class="services__service services__service--'.$page->post_name.' no-webp">
      <a class="services__service-link" href="/services/'.$page->post_name.'">'.$page->post_title.'</a>
    </li>
    ';
  }
  $ret .= '</ul>';
  return $ret;
}

add_shortcode('services', 'shortcode_services');

// удалить атрибут type у scripts и styles
add_filter('style_loader_tag', 'clean_style_tag');
function clean_style_tag($src) {
    return str_replace("type='text/css'", '', $src);
}

add_filter('script_loader_tag', 'clean_script_tag');
function clean_script_tag($src) {
    return str_replace("type='text/javascript'", '', $src);
}

// below disabling diff WP default styles and JS

function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

//Disable gutenberg style in Front
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
