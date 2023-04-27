<?php

define( 'THEME_PATH', get_template_directory_uri() );
define( 'FILTER_HIDE', get_field('filter_hide', 'options') );
define( 'LAYER_SHOW_ONLY_ONE', get_field('layer_show_only_one', 'options') );
define( 'LAYER_SHOW_FIRST', get_field('layer_show_first', 'options') );
define( 'CATALOG_MATTRESS_LINK', get_field('mattress_catalog_file', 'options') );
define( 'CATALOG_FURNITURE_LINK', get_field('furniture_catalog_file', 'options') );
define( 'CATALOG_FURNITURE_CAB_LINK', get_field('cab_catalog_file', 'options') );
define( 'ONLINE_STORE_LINK', get_field('online_store_link', 'options') );
define( 'MAP_COORD', get_field('map_coord','options')? explode(', ', get_field('map_coord','options')) : array(53.129203, 46.565781) );
define( 'USER_SETTINGS', array(
  'THEME_PATH' => THEME_PATH,
  'MAP_COORD' => MAP_COORD,
  'FILTER_HIDE' => FILTER_HIDE,
  'LAYER_SHOW_ONLY_ONE' => LAYER_SHOW_ONLY_ONE,
  'LAYER_SHOW_FIRST' => LAYER_SHOW_FIRST,
  'AJAX_URL' => admin_url( 'admin-ajax.php?action=send_mail' ),
) );

function get_style() {
  $ver = '?v=1.0.1';
  wp_enqueue_style('style', THEME_PATH );
  wp_enqueue_style( 'vendor', THEME_PATH.'/style/vendor-bundle.css' );
  wp_enqueue_style( 'main', THEME_PATH.'/style/main.css'.$ver );
  // wp_enqueue_style( 'custom', THEME_PATH.'/style/custom.css'.$ver );

  wp_deregister_style( 'woocommerce-general' );
	wp_deregister_style( 'woocommerce-layout' );
}

function get_scripts() {
  $ver = '?v=1.0.0';
  wp_deregister_script('jquery');
  wp_enqueue_script( 'vendor', THEME_PATH.'/js/vendor-bundle.js', null, null, false);
  wp_enqueue_script( 'main', THEME_PATH.'/js/main.js'.$ver, null, null, false);
  wp_localize_script( 'vendor', 'WP_Options', USER_SETTINGS );
}

function add_type_es6_module( $tag, $handle, $src ) {
  if ( 'main' === $handle ) {
    return str_replace( '<script ', '<script type="module"', $tag );
  }
  return $tag;
}

function remove_jquery_migrate( $scripts ) {

	if ( empty( $scripts->registered['jquery'] ) || is_admin() ) {
		return;
	}

	$deps = & $scripts->registered['jquery']->deps;

	$deps = array_diff( $deps, [ 'jquery-migrate' ] );
}

function filter_plugin_updates( $value ) {
  unset( $value->response['advanced-custom-fields-pro-master/acf.php'] );
  unset( $value->response['filebird-pro/filebird.php'] );
	return $value;
}

function add_setting_site() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' 	=> 'Настройки сайта',
      'menu_title'	=> 'Настройки сайта',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'Сторонний код',
      'menu_title'	=> 'Сторонний код',
      'parent_slug'	=> 'theme-general-settings',
    ));
  }
}

function decline_word($num, $word) {
	$cases = array (2, 0, 1, 1, 1, 2);
	return $word[ ($num%100 > 4 && $num %100 < 20) ? 2 : $cases[min($num%10, 5)] ];
}

function get_image_url_fallback($url) {
  return $url ? $url : THEME_PATH.'/img/no-photo.webp';
}

function theme_register_menus() {
	register_nav_menu( 'header-main-menu', 'Главное меню (шапка)' );
	register_nav_menu( 'footer-catalog-menu', 'Меню "Каталог" (подвал)' );
	register_nav_menu( 'footer-about-menu', 'Меню "О нас" (подвал)' );
	register_nav_menu( 'footer-help-menu', 'Меню "Полезное" (подвал)' );
}

function custom_woocommerce_placeholder_img_src( $src ) {
  $src = THEME_PATH . '/img/no-photo.webp';
  return $src;
}

function is_parent_query_taxonomy ($name, $taxonomy) {
  $parrent_ID = get_ancestors(get_queried_object()->term_id, $taxonomy)[0];
  $queryTaxID = get_term_by( 'name', $name, $taxonomy )->term_id;
  return $parrent_ID === $queryTaxID;
}

function is_current_term ($name, $taxonomy) {
  $current_ID = get_queried_object()->term_id;
  $queryTaxID = get_term_by( 'name', $name, $taxonomy )->term_id;
  return $queryTaxID === $current_ID;
}

function product_in_cat($product, $cat_name) {
  return in_array(get_term_by( 'name', $cat_name, 'product_cat' )->term_id, $product->get_category_ids());
}

function get_phone($phone_str, $class_name = null) {
  if (!$phone_str) return;
  $selector = $class_name ? "class=\"$class_name\"" : '';
  $phone_href = preg_replace('/[^+\d]/', '', $phone_str);
  return "<a $selector href=\"tel:$phone_href\">$phone_str</a>";
}

function get_email($email_str, $class_name = null) {
  if (!$email_str) return;
  $selector = $class_name ? "class=\"$class_name\"" : '';
  return "<a $selector href=\"mailto:$email_str\">$email_str</a>";
}

function get_adress($adress_str, $class_name = null) {
  if (!$adress_str) return;
  $selector = $class_name ? "class=\"$class_name\"" : '';
  return "<p $selector>$adress_str</p>";
}

function get_format_date($date) {
  $year = date_parse($date)['year'];
  $month = date_parse($date)['month'] < 10 ? '0'.date_parse($date)['month'] : date_parse($date)['month'];
  $day = date_parse($date)['day'] < 10 ? '0'.date_parse($date)['day'] : date_parse($date)['day'];
  return "{$year}-{$month}-{$day}";
}

function unset_product_types( $product_types ) {
	unset( $product_types['grouped'] );
	unset( $product_types['external'] );
	unset( $product_types['variable'] );
	return $product_types;
}

function unset_product_type_options( $options ) {
	if( isset( $options[ 'virtual' ] ) ) {
		unset( $options[ 'virtual' ] );
	}
	if( isset( $options[ 'downloadable' ] ) ) {
		unset( $options[ 'downloadable' ] );
	}
	return $options;
}

function render_adminbar_filters ( $filters ) {
	if( isset( $filters[ 'product_type' ] ) ) {
		$filters[ 'product_type' ] = 'render_filters_cb';
	}
	return $filters;
}

function render_filters_cb() {
	$current_product_type = isset( $_REQUEST['product_type'] ) ? wc_clean( wp_unslash( $_REQUEST['product_type'] ) ) : false;
	$output  = '<select name="product_type" id="dropdown_product_type"><option value="">Фильтровать по типу товара</option>';

	foreach ( wc_get_product_types() as $value => $label ) {
		$output .= '<option value="' . esc_attr( $value ) . '" ';
		$output .= selected( $value, $current_product_type, false );
		$output .= '>' . esc_html( $label ) . '</option>';
	}

	$output .= '</select>';
	echo $output;
}

function check_status_checkbox($filter, $item) {
  $query = explode('&', $_SERVER['QUERY_STRING']);
  if($query) {
    foreach($query as $param) {
      list($name, $value) = explode('=', $param, 2);
      if ( $name === $filter && $value===$item->slug ) {
        echo 'checked';
      }
    }
  }
}

function create_post_types() {
  register_post_type( 'news', [
		'label'  => null,
		'labels' => [
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новости', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование новость', // для редактирования типа записи
			'new_item'           => 'Новая новость', // текст новой записи
			'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Найти новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Новости', // название меню
		],
		'description'         => 'Новости компании',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-text-page',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],//[ 'title','editor','author','thumbnail','excerpt','trackbacks','comments','revisions','page-attributes','post-formats']
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
  register_post_type( 'store', [
		'label'  => null,
		'labels' => [
			'name'               => 'Магазины', // основное название для типа записи
			'singular_name'      => 'Магазин', // название для одной записи этого типа
			'add_new'            => 'Добавить магазин', // для добавления новой записи
			'add_new_item'       => 'Добавление магазина', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование магазина', // для редактирования типа записи
			'new_item'           => 'Новый магазин', // текст новой записи
			'view_item'          => 'Смотреть магазин', // для просмотра записи этого типа.
			'search_items'       => 'Найти магазин', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Магазины', // название меню
		],
		'description'         => 'Торговые точки компании',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-cart',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],//[ 'title','editor','author','thumbnail','excerpt','trackbacks','comments','revisions','page-attributes','post-formats']
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
  register_post_type( 'actions', [
		'label'  => null,
		'labels' => [
			'name'               => 'Временные акции компании', // основное название для типа записи
			'singular_name'      => 'Акция', // название для одной записи этого типа
			'add_new'            => 'Добавить акцию', // для добавления новой записи
			'add_new_item'       => 'Добавление акции', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование акции', // для редактирования типа записи
			'new_item'           => 'Новая акция', // текст новой записи
			'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
			'search_items'       => 'Найти акцию', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Акции', // название меню
		],
		'description'         => 'Временные акции компании',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-money-alt',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],//[ 'title','editor','author','thumbnail','excerpt','trackbacks','comments','revisions','page-attributes','post-formats']
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function true_excerpt_length(){
	return 25;
}

function true_excerpt_more(){
	return ' . . .';
}

function add_youtube_html ( $atts ) {

	$atts = shortcode_atts( [
    'width' => '100%',
		'id' => 'dQw4w9WgXcQ',
    'title' => '',
    'resolution' => 'maxresdefault',
		'class'  => null,
	], $atts );

  return "<div style=\"max-width: {$atts['width']};\">
            <div class=\"yt-video {$atts['class']}\" data-video-id=\"{$atts['id']}\">
              <a class=\"yt-video__link\" href=\"https://youtu.be/{$atts['id']}\">
                <picture>
                  <source srcset=\"https://i.ytimg.com/vi_webp/{$atts['id']}/{$atts['resolution']}.webp\" type=\"image/webp\">
                  <img class=\"yt-video__media\" src=\"https://i.ytimg.com/vi/{$atts['id']}/{$atts['resolution']}.jpg\" alt=\"{$atts['title']}\">
                </picture>
              </a>
              <button class=\"yt-video__button\" aria-label=\"Запустить видео\">
                <svg width=\"68\" height=\"48\" viewBox=\"0 0 68 48\" aria-hidden=\"true\">
                  <path class=\"yt-video__button-shape\" d=\"M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z\">
                  </path>
                  <path class=\"yt-video__button-icon\" d=\"M 45,24 27,14 27,34\"></path>
                </svg>
              </button>
            </div>
          </div>";
}

function send_mail() {
	$headers = array(
	  'From: Socruz <info@'.$_SERVER['HTTP_HOST'].'>',
	  'content-type: text/html',
	);

	$to = array();
  if (get_field('send_email', 'options')) {
    foreach (get_field('send_email', 'options') as $item) {
      array_push($to, $item['recipient']);
    }
  }

	$subject = get_field('subject_theme', 'options') ? get_field('subject_theme', 'options') : 'Обратная связь с сайта '.$_SERVER['HTTP_HOST'];
  $frame_color_theme = get_field('frame_color_theme', 'options') ? get_field('frame_color_theme', 'options') : '#e2e2e2';
  $string_color_theme = get_field('string_color_theme', 'options') ? get_field('string_color_theme', 'options') : '#f2f2f2';

  $c = true;
  // CSS стили таблицы
  $style_table = '
    width: 100%;
    border-collapse: collapse;
  ';
  // CSS стили строки таблицы
  $style_tr = '
    background-color: '.$string_color_theme.';
  ';
  // CSS стили ячейки таблицы
  $style_td = '
    padding: 10px;
    border: '.$frame_color_theme.' 2px solid;
    vertical-align: top;
  ';

  // Перебор всех заполненных полей форм и запись в переменную $message
  foreach ( $_POST as $key => $value ) {
    if ( $value != "" ) {
      $message .= "
      " . ( ($c = !$c) ? '<tr>':'<tr style="'.$style_tr.'">' ) . "
        <td style='".$style_td."'><b>$key</b></td>
        <td style='".$style_td."'>$value</td>
      </tr>
      ";
    }
  }
  // Создание "тела" письма
  $body = "<table style='".$style_table."'>$message</table>";
  wp_mail( $to, $subject, $body, $headers);
  wp_die();
}

function get_page_page() {
  switch (1) {
    case is_page() :
      return  the_title();
      break;
    case is_archive() :
      return  the_archive_title();
      break;
    case is_single() :
      return  the_title();
      break;
    case is_404() :
      echo 'Страница не найдена';
      break;
    case is_search() :
      echo 'Поиск';
      break;
    case is_category() :
      return  single_cat_title();
      break;
    case is_tax() :
      return  single_term_title();
      break;
  }
}

add_action( 'wp_enqueue_scripts', 'get_style' );
add_action( 'wp_footer', 'get_scripts' );
add_action( 'after_setup_theme', 'theme_register_menus' );
add_action( 'init', 'create_post_types' );
add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
add_filter( 'script_loader_tag', 'add_type_es6_module', 10, 3 );
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
add_filter( 'woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src' );
add_filter( 'product_type_selector', 'unset_product_types' );
add_filter( 'product_type_options', 'unset_product_type_options' );
add_filter( 'woocommerce_products_admin_list_table_filters', 'render_adminbar_filters');
add_filter( 'excerpt_length', 'true_excerpt_length', 10, 1);
add_filter( 'excerpt_more', 'true_excerpt_more', 10, 1);
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

add_theme_support( 'woocommerce' );
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
add_theme_support( 'post-thumbnails', array( 'page', 'post', 'product', 'news', 'actions' ) );

add_setting_site();

add_shortcode( 'you-tube', 'add_youtube_html' );
