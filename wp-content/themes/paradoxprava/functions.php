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
