<?
// отключение парсера html и добавления br и p в админке
remove_filter( 'the_content', 'wpautop' );
// add menus support
add_theme_support('menus');

// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'paradoxprava_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function paradoxprava_scripts() {
	wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/css/style.min.css' );
	wp_enqueue_script( 'scripts-bundle', get_template_directory_uri() . '/assets/js/app.min.js', array(), '1.0.0', true );
}

// add active class to active menu li
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'menu-list__item--active ';
    }
    return $classes;
}

//add link class
function add_menu_atts( $atts, $item, $args ) {
  $atts['class'] = 'menu-list__link';
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
    <li class="services__service services__service--'.$page->post_name.'">
      <a class="services__service-link" href="/services/'.$page->post_name.'">'.$page->post_title.'</a>
    </li>
    ';
  }
  $ret .= '</ul>';
  return $ret;
}

add_shortcode('services', 'shortcode_services');
