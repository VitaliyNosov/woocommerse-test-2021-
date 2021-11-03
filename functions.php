<?php

//Custom logo

add_theme_support( 'custom-logo' );


// widget block

function wordpress_test_2021_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-Links', 'wordpress-test-2021' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordpress-test-2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wordpress_test_2021_widgets_init' );


// menu

// header menu

register_nav_menus( array(
	'menu-1' => esc_html__( 'header-menu', 'wordpress-test-2020' ),
) );

// sing-up menu

register_nav_menus( array(
	'sing-up' => esc_html__( 'sing-up', 'wordpress-test-2020' ),
) );


// footer menu one

register_nav_menus( array(
	'menu-footer-1' => esc_html__( 'footer-menu-one', 'wordpress-test-2020' ),
) );

// footer menu two

register_nav_menus( array(
	'menu-footer-2' => esc_html__( 'footer-menu-two', 'wordpress-test-2020' ),
) );

// footer menu three

register_nav_menus( array(
	'menu-footer-3' => esc_html__( 'footer-menu-three', 'wordpress-test-2020' ),
) );

/**
 * Enqueue scripts and styles.
 */


function wordpress_test_2021_scripts() {

	// styles
	wp_enqueue_style( 'mormalize', get_stylesheet_directory_uri() . '/assets/style/normalize.css' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/style/style.css' );
	wp_enqueue_style( 'slick-slider', get_stylesheet_directory_uri() . '/assets/style/slick-theme.css' );
	wp_enqueue_style( 'slick-slider-theme', get_stylesheet_directory_uri() . '/assets/style/slick.css' );
	wp_style_add_data( 'style', 'rtl', 'replace' );

	// scripts
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_script('scripts', get_template_directory_uri() .'/assets/js/main.js', array('jquery'), null, true);
	wp_enqueue_script('slick', get_template_directory_uri() .'/assets/js/slick.min.js', array('jquery'), null, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpress_test_2021_scripts' );


// fontawesome-5


function wpschool_load_fontawesome() {
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/fontawesome-5/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'wpschool_load_fontawesome' );

// svg 

add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

// svg

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	if( $dosvg ){

		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );


# Creates data for displaying SVG as images in a media library.

function show_svg_in_media_library( $response ) {

	if ( $response['mime'] === 'image/svg+xml' ) {

		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// woocommerce custom icons


/*
 * Shortcode for WooCommerce Cart Icon for Menu Item
 */
add_shortcode ('woocommerce_cart_icon', 'woo_cart_icon' );
function woo_cart_icon() {
    ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set variable for Cart URL
  
        echo '<li><a class="menu-item cart-contents" href="'.$cart_url.'" title="Cart">';
        
        if ( $cart_count > 0 ) {
        
            echo '<span class="cart-contents-count">'.$cart_count.'</span>';
       
        }
        
        echo '</a></li>';
        
            
    return ob_get_clean();
 
}


/*
 * Filter with AJAX When Cart Contents Update
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_icon_count' );
function woo_cart_icon_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    
    echo '<a class="cart-contents menu-item" href="'.$cart_url.'" title="View Cart">';
    
    if ( $cart_count > 0 ) {
        
        echo '<span class="cart-contents-count">'.$cart_count.'</span>';
                    
    }
    echo '</a>';
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}


/*
 * Append Cart Icon Particular Menu
 */
add_filter('wp_nav_menu_items','woo_cart_icon_menu', 10, 2);
function woo_cart_icon_menu($menu, $args) {

    if($args->theme_location == 'primary') { // 'primary' is my menu ID
        $cart = do_shortcode("[woo_cart_but]");
        return $cart . $menu;
    }

    return $menu;
}



// Регистрация пользователей.

// Добавляем событие в процесс инициализации JS скриптов
add_action( 'wp_enqueue_scripts', 'wplb_ajax_enqueue' );

//Описываем событие
function wplb_ajax_enqueue() {

	// Подключаем файл js скрипта.
	wp_enqueue_script(
		'wplb-ajax', // Имя
		get_stylesheet_directory_uri() . '/scripts/wplb-ajax.js', // Путь до JS файла.
		array( 'jquery' ), // В массив jquery.
		'',
		true
	); 

	// Используем функцию wp_localize_script для передачи переменных в JS скрипт.
	wp_localize_script(
		'wplb-ajax', // Куда будем передавать
		'wplb_ajax_obj', // Название массива, который будет содержать передаваемые данные
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ), // Элемент массива, содержащий путь к admin-ajax.php
			'nonce' => wp_create_nonce( 'wplb-nonce' ) // Создаем nonce
		)
	);

}


// Создаём событие обработки Ajax запроса.
add_action( 'wp_ajax_nopriv_wplb_ajax_request', 'wplb_ajax_request' );
add_action( 'wp_ajax_wplb_ajax_request', 'wplb_ajax_request' );

// Описываем саму функцию.
function wplb_ajax_request() {

	// Перемененная $_REQUEST содержит все данные заполненных форм.
	if ( isset( $_REQUEST ) ) {

		// Проверяем nonce, а в случае если что-то пошло не так, то прерываем выполнение функции.
		if ( !wp_verify_nonce( $_REQUEST[ 'security' ], 'wplb-nonce' ) ) {
			wp_die( 'Базовая защита не пройдена' );
		}

		// Введём переменную, которая будет содержать массив с результатом отработки события.
		$result = array( 'status' => false, 'content' => false );

		// Создаём массив который содержит значения полей заполненной формы.
		parse_str( $_REQUEST[ 'content' ], $creds );

		switch ( $_REQUEST[ 'type' ] ) {
			case 'registration':
				/**
				 * Заполнена форма регистрации.
				 */

				// Пробуем создать объект с пользователем.
				$user = username_exists( $creds[ 'wplb_login' ] );

				// Проверяем, а может быть уже есть такой пользователь
				if ( !$user && false == email_exists( $creds[ 'wplb_email' ] ) ) {
					// Пользователя не существует.

					// Создаём массив с данными для регистрации нового пользователя.
					$user_data = array(
						'user_login' => $creds[ 'wplb_login' ], // Логин.
						'user_email' => $creds[ 'wplb_email' ], // Email.
						'user_pass' => $creds[ 'wplb_password' ], // Пароль.
						'display_name' => $creds[ 'wplb_login' ], // Отображаемое имя.
						'role' => 'subscriber' // Роль.
					);

					// Добавляем пользователя в базу данных.
					$user = wp_insert_user( $user_data );

					// Проверка на ошибки.
					if ( is_wp_error( $user ) ) {

						// Невозможно создать пользователя, записываем результат в массив.
						$result[ 'status' ] = false;
						$result[ 'content' ] = $user->get_error_message();

					} else {

						// Создаём массив для авторизации.
						$creds = array(
							'user_login' => $creds[ 'wplb_login' ], // Логин пользователя.
							'user_password' => $creds[ 'wplb_password' ], // Пароль пользователя.
							'remember' => true // Запоминаем.
						);

						// Пробуем авторизовать пользователя.
						$signon = wp_signon( $creds, false );

						if ( is_wp_error( $signon ) ) {

							// Авторизовать не получилось.
							$result[ 'status' ] = false;
							$result[ 'content' ] = $signon->get_error_message();

						} else {

							// Авторизация успешна, устанавливаем необходимые куки.
							wp_clear_auth_cookie();
							clean_user_cache( $signon->ID );
							wp_set_current_user( $signon->ID );
							wp_set_auth_cookie( $signon->ID );
							update_user_caches( $signon );

							// Записываем результаты в массив.
							$result[ 'status' ] = true;
						}

					}
				} else {
					
					// Такой пользователь уже существует, регистрация не возможна, записываем данные в массив.
					$result[ 'status' ] = false;
					$result[ 'content' ] = esc_html__( 'Пользователь уже существует', 'wplb_ajax_lesson' );
				}
				break;
			case 'authorization':
				/**
				 * Заполнена форма авторизации.
				 */

				// Создаём массив для авторизации
				$creds = array(
					'user_login' => $creds[ 'wplb_login' ], // Логин пользователя
					'user_password' => $creds[ 'wplb_password' ], // Пароль пользователя
					'remember' => true // Запомнинаем
				);

				// Пробуем авторизовать пользователя.
				$signon = wp_signon( $creds, false );

				if ( is_wp_error( $signon ) ) {

					// Авторизовать не получилось
					$result[ 'status' ] = false;
					$result[ 'content' ] = $signon->get_error_message();

				} else {

					// Авторизация успешна, устанавливаем необходимые куки.
					wp_clear_auth_cookie();
					clean_user_cache( $signon->ID );
					wp_set_current_user( $signon->ID );
					wp_set_auth_cookie( $signon->ID );
					update_user_caches( $signon );

					// Записываем результаты в массив.
					$result[ 'status' ] = true;
				}


				break;
		}

		// Конвертируем массив с результатами обработки и передаем его обратно как строку в JSON формате.
		echo json_encode( $result );

	}

	// Заканчиваем работу Ajax.
	wp_die();
}



add_shortcode( 'wplb_ajax_example', 'wplb_ajax_example_function' );
function wplb_ajax_example_function() {
    ob_start();
	echo get_template_part( 'wplb_ajax_template');
	return ob_get_clean();
}