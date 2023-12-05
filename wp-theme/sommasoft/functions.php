<?php

// include custom jQuery
function shapeSpace_include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery',  get_stylesheet_directory_uri().'/assets/js/jquery-3.7.1.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

function comma_styles_n_scripts() {
	// Main styles
	enqueue_versioned_style( 'comma-main',		'/style.css' );
	enqueue_versioned_style( 'comma-root',		'/assets/css/root.css' );
	enqueue_versioned_style( 'comma-fonts',	'/assets/css/fonts.css' );
	enqueue_versioned_style( 'comma-main-ui',	'/assets/css/ui.css' );
	enqueue_versioned_style( 'comma-header', 	'/assets/css/header.css' );
	enqueue_versioned_style( 'comma-footer', 	'/assets/css/footer.css' );
	enqueue_versioned_style( 'comma-overlay', '/assets/css/overlay.css' );

	// Sections & pages
	enqueue_versioned_style( 'comma-section-blog', 			'/assets/css/sections/blog.css' );
	enqueue_versioned_style( 'comma-section-cases', 		'/assets/css/sections/cases.css' );
	enqueue_versioned_style( 'comma-section-faq', 			'/assets/css/sections/faq.css' );
	

	if(is_front_page()) {
		enqueue_versioned_style( 'comma-section-about', 		'/assets/css/sections/about.css' );
		enqueue_versioned_style( 'comma-section-clients', 		'/assets/css/sections/clients.css' );
		enqueue_versioned_style( 'comma-section-command', 		'/assets/css/sections/command.css' );
		enqueue_versioned_style( 'comma-section-main-banner', '/assets/css/sections/main-banner.css' );
		enqueue_versioned_style( 'comma-section-reviews',		'/assets/css/sections/reviews.css' );
		enqueue_versioned_style( 'comma-section-services',		'/assets/css/sections/services.css' );
	}

	if(is_single() || is_page()) { enqueue_versioned_style( 'comma-section-single', '/assets/css/sections/single.css' ); }
	if(is_404()) { enqueue_versioned_style( 'comma-section-page-404',	'/assets/css/sections/page-404.css' ); }



	// Scripts
	enqueue_versioned_script( 'comma-script-app', '/assets/js/app.js', array( 'jquery'), true );
	if(is_front_page()) {
		enqueue_versioned_script( 'comma-script-slick', '/assets/js/slick.min.js', array( 'jquery'), true );
		enqueue_versioned_script( 'comma-script-slider', '/assets/js/slider.js', array( 'jquery'), true );
	}
}
add_action( 'wp_enqueue_scripts', 'comma_styles_n_scripts' );


// Dynamic versioning of files with styles
function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
	wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
}
function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
	wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}


// Add Post Thumbnails
add_theme_support( 'post-thumbnails' ); 



// New excerpt size length
function wph_excerpt_length($length) {
	return 30; 
}
add_filter('excerpt_length', 'wph_excerpt_length');



add_filter('excerpt_more', function($more) {
	return '...';
});



// Remove wrapper tags from the taxonomy description
add_filter('term_description', 'del_term_description_p');
function del_term_description_p( $value ){
	return preg_replace('~<[/p]+>~i', '', $value);
}
echo term_description(134, 'post_tag');



// Hide admin bar for subscribers
if ( current_user_can( 'subscriber' ) ) {
	show_admin_bar( false );
}




// ---------- Register post types & taxonomies ---------- //

function register_taxonomy_processes() {
	$labels = array(
	"name" => __('Процессы', 'processes'),
	"singular_name" => __('Процесс', 'processes'),
	"all_items" => __('Все процессы', 'all_processes'),
	"edit_item" => __('Изменить процесс', 'edit_process'),
	"view_item" => __('Посмотреть процесс', 'view_process'),
	"update_item" => __('Обновить процесс', 'update_process'),
	"add_new_item" => __('Добавить', 'add'),
	"new_item_name" => __('Новая', 'new'),
	);
	$args = array(
	"label" => __( 'Процессы', 'processes'),
	"labels" => $labels,
	"public" => true,
	"hierarchical" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"query_var" => true,
	"rewrite" => array('slug' => 'sevices', 'with_front' => true),
	"show_admin_column" => true,
	"rest_base" => "",
	"show_in_quick_edit" => true,
	'show_in_rest' => true,
	);
	register_taxonomy("processes", array("service", "case"), $args);
}
add_action( 'init', 'register_taxonomy_processes' );

function register_post_types(){
	register_post_type( 'service', [
		'label'  => null,
		'labels' => [
			'name'               => 'Услуги', // the main name for the record type
			'singular_name'      => 'Услугa', // name for one record of this type
			'add_new'            => 'Добавить услугу', // to add a new entry
			'add_new_item'       => 'Добавление услуги', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование услуги', // to edit the record type
			'new_item'           => 'Новая услуга', // text of the new entry
			'view_item'          => 'Смотреть услугу', // to view a record of this type
			'search_items'       => 'Искать услугу', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
			'menu_name'          => 'Услуги', // menu name
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // whether to show it in the admin menu
		'show_in_admin_bar'   => true, // depends on show_in_menu
		'show_in_rest'        => true, // add to the REST API. C WP 4.7
		'rest_base'           => 'service', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'excerpt'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ 'processes' ],
		'has_archive'         => false,
		'rewrite'             => array( 'slug'=>'services'),
		'feeds'				  => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-store',
	] );
	register_post_type( 'case', [
		'label'  => null,
		'labels' => [
			'name'               => 'Кейсы', // the main name for the record type
			'singular_name'      => 'Кейс', // name for one record of this type
			'add_new'            => 'Добавить кейс', // to add a new entry
			'add_new_item'       => 'Добавление кейса', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование кейса', // to edit the record type
			'new_item'           => 'Новый кейс', // text of the new entry
			'view_item'          => 'Смотреть кейс', // to view a record of this type
			'search_items'       => 'Искать кейс', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
			'menu_name'          => 'Кейсы', // menu name
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // whether to show it in the admin menu
		'show_in_admin_bar'   => true, // depends on show_in_menu
		'show_in_rest'        => true, // add to the REST API. C WP 4.7
		'rest_base'           => 'case', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ 'processes' ],
		'has_archive'         => false,
		'rewrite'             => true,
		'feeds'					 => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-star-filled',
	] );
	register_post_type( 'faq', [
		'label'  => null,
		'labels' => [
			'name'               => 'FAQs', // the main name for the record type
			'singular_name'      => 'FAQ', // name for one record of this type
			'add_new'            => 'Добавить FAQ', // to add a new entry
			'add_new_item'       => 'Добавление FAQ', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование FAQ', // to edit the record type
			'new_item'           => 'Новый FAQ', // text of the new entry
			'view_item'          => 'Смотреть FAQ', // to view a record of this type
			'search_items'       => 'Искать FAQ', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
			'menu_name'          => 'Блок «FAQ»', // menu name
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => 'themes.php', // whether to show it in the admin menu
		'show_in_admin_bar'   => false, // depends on show_in_menu
		'show_in_rest'        => false, // add to the REST API. C WP 4.7
		'rest_base'           => 'case', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-admin-appearance',
	] );
	register_post_type( 'worker', [
		'label'  => null,
		'labels' => [
			'name'               => 'Сотрудники', // the main name for the record type
			'singular_name'      => 'Сотрудник', // name for one record of this type
			'add_new'            => 'Добавить сотрудника', // to add a new entry
			'add_new_item'       => 'Добавление сотрудника', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование сотрудника', // to edit the record type
			'new_item'           => 'Новый сотрудник', // text of the new entry
			'view_item'          => 'Смотреть сотрудника', // to view a record of this type
			'search_items'       => 'Искать сотрудника', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'menu_name'          => 'Блок «Команда»', // menu name
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => 'themes.php', // whether to show it in the admin menu
		'show_in_admin_bar'   => false, // depends on show_in_menu
		'show_in_rest'        => false, // add to the REST API. C WP 4.7
		'rest_base'           => 'worker', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail', 'excerpt'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-admin-appearance',
	] );
	register_post_type( 'review', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // the main name for the record type
			'singular_name'      => 'Отзыв', // name for one record of this type
			'add_new'            => 'Добавить отзыв', // to add a new entry
			'add_new_item'       => 'Добавление отзыва', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование отзыва', // to edit the record type
			'new_item'           => 'Новый отзыв', // text of the new entry
			'view_item'          => 'Смотреть отзыв', // to view a record of this type
			'search_items'       => 'Искать отзыв', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
			'menu_name'          => 'Блок «Отзывы»', // menu name
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => 'themes.php', // whether to show it in the admin menu
		'show_in_admin_bar'   => false, // depends on show_in_menu
		'show_in_rest'        => false, // add to the REST API. C WP 4.7
		'rest_base'           => 'review', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => ['title','editor'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-admin-appearance',
	] );
	register_post_type( 'client', [
		'label'  => null,
		'labels' => [
			'name'               => 'Клиенты', // the main name for the record type
			'singular_name'      => 'Клиент', // name for one record of this type
			'add_new'            => 'Добавить клиента', // to add a new entry
			'add_new_item'       => 'Добавление клиента', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование клиента', // to edit the record type
			'new_item'           => 'Новый клиент', // text of the new entry
			'view_item'          => 'Смотреть клиента', // to view a record of this type
			'search_items'       => 'Искать клиента', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
			'menu_name'          => 'Блок «Клиенты»', // menu name
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => 'themes.php', // whether to show it in the admin menu
		'show_in_admin_bar'   => false, // depends on show_in_menu
		'show_in_rest'        => false, // add to the REST API. C WP 4.7
		'rest_base'           => 'client', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => ['title','thumbnail'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-admin-appearance',
	] );
}
add_action( 'init', 'register_post_types' );




// ---------- Custom fields for services ---------- //

// Fields for All publications
function keyword_field() { add_meta_box( 'keyword_field', 'Ключевые слова', 'keyword_field_box', array('post', 'page', 'service', 'case'), 'normal', 'high'  ); }
function keyword_field_box( $post ){ ?>
	<p><label><input type="text" name="extra[keyword]" value="<?php echo get_post_meta($post->ID, 'keyword', 1); ?>" style="width:50%" placeholder="word1, word2, word3, ..." /> Ключевые слова для мета-тега KeyWords</label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'keyword_field', 1);



// Fields for Services
function is_popular_field() { add_meta_box( 'is_popular_field', 'Часто заказываемая', 'is_popular_field_box', 'service', 'normal', 'high'  ); }
function is_popular_field_box( $post ){ ?>
	<input type="hidden" name="extra[is_popular]" value="">
	<label><input type="checkbox" name="extra[is_popular]" value="1" <?php checked( get_post_meta($post->ID, 'is_popular', 1), 1 )?> /> Эту услугу часто заказывают клиенты</label>
<?php }
add_action('add_meta_boxes', 'is_popular_field', 1);

function price_field() { add_meta_box( 'price_field', 'Ориентировочная стоимость', 'price_field_box', 'service', 'normal', 'high'  ); }
function price_field_box( $post ){ ?>
	<p><label><input type="text" name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" style="width:50%" /> Приблизительная стоимость услуги в ₽</label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'price_field', 1);



// Fields for Cases
function is_banner_field() { add_meta_box( 'is_banner_field', 'Разместить в баннере', 'is_banner_field_box', 'case', 'normal', 'high'  ); }
function is_banner_field_box( $post ){ ?>
	<input type="hidden" name="extra[is_banner]" value="">
	<label><input type="checkbox" name="extra[is_banner]" value="1" <?php checked( get_post_meta($post->ID, 'is_banner', 1), 1 )?> /> Закрепить в виде баннера</label>
<?php }
add_action('add_meta_boxes', 'is_banner_field', 1);

function website_field() { add_meta_box( 'website_field', 'Сайт', 'website_field_box', 'case', 'normal', 'high'  ); }
function website_field_box( $post ){ ?>
	<div>
		<p><label><input type="text" name="extra[website_name]" value="<?php echo get_post_meta($post->ID, 'website_name', 1); ?>" style="width:50%" placeholder="domain.com" /> Название сайта проекта</label></p>
		<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	</div>
	<div>
		<p><label><input type="text" name="extra[website_link]" value="<?php echo get_post_meta($post->ID, 'website_link', 1); ?>" style="width:50%" placeholder="https://domain.com" /> Ccылка на проект</label></p>
		<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	</div>
<?php }
add_action('add_meta_boxes', 'website_field', 1);



// Fields for Workers
function worker_post_field() { add_meta_box( 'worker_post_field', 'Должность сотрудника', 'worker_post_field_box', 'worker', 'normal', 'high'  ); }
function worker_post_field_box( $post ){ ?>
	<p><label><input type="text" name="extra[worker_post]" value="<?php echo get_post_meta($post->ID, 'worker_post', 1); ?>" style="width:50%" /> Должность сотрудника</label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'worker_post_field', 1);

function worker_vkname_field() { add_meta_box( 'worker_vkname_field', 'Профиль Вконтакте', 'worker_vkname_field_box', 'worker', 'normal', 'high'  ); }
function worker_vkname_field_box( $post ){ ?>
	<p><label><input type="text" name="extra[worker_vkname]" value="<?php echo get_post_meta($post->ID, 'worker_vkname', 1); ?>" style="width:50%" placeholder="vk_name" /> Имя профиля во Вконтакте</label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'worker_vkname_field', 1);



// Fields for Clients
function client_link_field() { add_meta_box( 'client_link_field', 'Ссылка', 'client_link_field_box', 'client', 'normal', 'high'  ); }
function client_link_field_box( $post ){ ?>
	<p><label><input type="text" name="extra[client_link]" value="<?php echo get_post_meta($post->ID, 'client_link', 1); ?>" style="width:50%" placeholder="https://website.com"/> Ссылка на сайт</label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'client_link_field', 1);



// Save Meta Data
function my_extra_fields_update( $post_id ){
	// базовая проверка
	if (
		   empty( $_POST['extra'] )
		|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	)
		return false;

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
	foreach( $_POST['extra'] as $key => $value ){
		if( empty($value) ){
			delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
	}

	return $post_id;
}
// включаем обновление полей при сохранении
add_action( 'save_post', 'my_extra_fields_update', 0 );



// ---------- Customizer ---------- //
function my_theme_customize_register( WP_Customize_Manager $wp_customize ) {

	// Customizer "Ссылки на формы"
	$wp_customize->add_section(
		'btn_to_form',
		array(
			'title' => 'Ссылки на формы',
			'description' => 'Настройки кнопок-ссылок на страницы с формами отправки брифа, предложения вакансии и обратной связи',
			'priority' => 1000,
		)
	);


	$wp_customize->add_setting(
		'btn_start__href',
		array('default' => '#!')
	);
	$wp_customize->add_control(
		'btn_start__href',
		array(
			'label' => 'Ссылка кнопки «Начать проект»',
			'section' => 'btn_to_form',
			'settings' => 'btn_start__href',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'btn_review__href',
		array('default' => '#!')
	);
	$wp_customize->add_control(
		'btn_review__href',
		array(
			'label' => 'Ссылка кнопки «Оставить отзыв»',
			'section' => 'btn_to_form',
			'settings' => 'btn_review__href',
			'type' => 'url',
		)
	);


	$wp_customize->add_setting(
		'btn_vacancy__href',
		array('default' => '#!')
	);
	$wp_customize->add_control(
		'btn_vacancy__href',
		array(
			'label' => 'Ссылка карточки вакансии в разделе «Команда»',
			'section' => 'btn_to_form',
			'settings' => 'btn_vacancy__href',
			'type' => 'url',
		)
	);


	// Customizer "Контакты"
	$wp_customize->add_section(
		'contacts',
		array(
			'title' => 'Контакты',
			'description' => 'Почта для связи и аккаунты социальных сетей',
			'priority' => 1001,
		)
	);

	$wp_customize->add_setting(
		'contacts_email',
		array('default' => '')
	);
	$wp_customize->add_control(
		'contacts_email',
		array(
			'label' => 'Почта',
			'section' => 'contacts',
			'settings' => 'contacts_email',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'contacts_vk_link',
		array('default' => '')
	);
	$wp_customize->add_control(
		'contacts_vk_link',
		array(
			'label' => 'Ссылка на VK',
			'section' => 'contacts',
			'settings' => 'contacts_vk_link',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'contacts_tg_link',
		array('default' => '')
	);
	$wp_customize->add_control(
		'contacts_tg_link',
		array(
			'label' => 'Ссылка на Telegram',
			'section' => 'contacts',
			'settings' => 'contacts_tg_link',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_vcru_link',
		array('default' => '')
	);
	$wp_customize->add_control(
		'contacts_vcru_link',
		array(
			'label' => 'Ссылка на VC.RU',
			'section' => 'contacts',
			'settings' => 'contacts_vcru_link',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'contacts_behance_link',
		array('default' => '')
	);
	$wp_customize->add_control(
		'contacts_behance_link',
		array(
			'label' => 'Ссылка на Behance',
			'section' => 'contacts',
			'settings' => 'contacts_behance_link',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'contacts_github_link',
		array('default' => '#!')
	);
	$wp_customize->add_control(
		'contacts_github_link',
		array(
			'label' => 'Ссылка на GitHub',
			'section' => 'contacts',
			'settings' => 'contacts_github_link',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'contacts_vk_use',
		array('default' => 1)
	);
	$wp_customize->add_control(
		'contacts_vk_use',
		array(
			'label' => 'Отображать VK',
			'section' => 'contacts',
			'settings' => 'contacts_vk_use',
			'type' => 'checkbox',
		)
	);
	$wp_customize->add_setting(
		'contacts_tg_use',
		array('default' => 1)
	);
	$wp_customize->add_control(
		'contacts_tg_use',
		array(
			'label' => 'Отображать Telegram',
			'section' => 'contacts',
			'settings' => 'contacts_tg_use',
			'type' => 'checkbox',
		)
	);
	$wp_customize->add_setting(
		'contacts_vcru_use',
		array('default' => 1)
	);
	$wp_customize->add_control(
		'contacts_vcru_use',
		array(
			'label' => 'Отображать VC.RU',
			'section' => 'contacts',
			'settings' => 'contacts_vcru_use',
			'type' => 'checkbox',
		)
	);
	$wp_customize->add_setting(
		'contacts_behance_use',
		array('default' => 1)
	);
	$wp_customize->add_control(
		'contacts_behance_use',
		array(
			'label' => 'Отображать Behance',
			'section' => 'contacts',
			'settings' => 'contacts_behance_use',
			'type' => 'checkbox',
		)
	);
	$wp_customize->add_setting(
		'contacts_github_use',
		array('default' => 1)
	);
	$wp_customize->add_control(
		'contacts_github_use',
		array(
			'label' => 'Отображать GitHub',
			'section' => 'contacts',
			'settings' => 'contacts_github_use',
			'type' => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'my_theme_customize_register' );