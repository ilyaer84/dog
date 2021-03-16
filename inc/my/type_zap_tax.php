<?php 
// регистрируем свои типы записи dogi

register_post_type('dogi', [ 
   'labels' => array(
      'name'               => __('Наши питомцы'),
      'singular_name'      => __('Наши питомцы'),
      'add_new'            => __('Добавить питомца'),
      'add_new_item'       => __('Кличка питомца'),
      'edit_item'          => __('Редактирование кличку собаки'),
      'new_item'           => __('Новый кличку собаки'),
      'view_item'          => __('Смотреть кличку собаки'),
      'search_items'       => __('Искать кличку собаки'),
      'not_found'          => __('Не найдено'),
      'not_found_in_trash' => __('Не найдено в корзине'),
      'parent_item_colon'  => '',
      'menu_name'          => __('Наши питомцы'),
   ),
   'show_ui' => true, // показывать интерфейс в админке
   'public'              => true, // доступ на клиентской части сайта + формируется ссылка
   'menu_position'       => 25,
   'menu_icon'           => 'dashicons-category', 
   //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
   'hierarchical'        => false,  //  нет родительских элементов
     'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'post-formats'), // какие стандартные
     // поля будут использованы register_post_type , ('title','editor','author','thumbnail','excerpt','comments')
   'has_archive'         => true, // есть архивная страница 
   'show_in_rest'          => null, // Создание кастомного типа записей с поддержкой Gutenberg
]);

// таксономии - раздылы, признаки 
register_taxonomy('dogi_name', ['dogi'], [ // имя таксономии type_mag, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Полное Имя',
    'singular_name'     => 'Полное Имя',
    'search_items'      => 'Найти Полное Имя',
    'all_items'         => 'Все имена',
    'view_item '        => 'Посмотреть Полное Имя',
    'edit_item'         => 'Редактировать Полное Имя',
    'update_item'       => 'Обновить Полное Имя',
    'add_new_item'      => 'Добавить новое Полное Имя',
    'new_item_name'     => 'Добавить новое имя',
    'menu_name'         => 'Полное Имя',
 ),
 'description'           => 'Где Полное Имя',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 'show_tagcloud'     => true, // Создать виджет облако элементов этой таксономии 
 
]);

// Рубрика  - категория

register_taxonomy('dogi_poroda', array('dogi'), array(
   'hierarchical' => true,
   'labels' => array(  // массив
      'name'              => 'Порода',
      'singular_name'     => 'Порода',
      'search_items'      => 'Найти Породу',
      'all_items'         => 'Все имена',
      'view_item '        => 'Посмотреть м',
      'edit_item'         => 'Редактировать Породу',
      'update_item'       => 'Обновить Порода',
      'add_new_item'      => 'Добавить новую Породу',
      'new_item_name'     => 'Добавить новую Породу',
      'menu_name'         => 'Порода',
   ),
   'description'           => 'Где Порода',
   'show_ui' => true,
   'query_var' => true,
   'rewrite' => array( 'slug' => 'dogi_poroda' ),
 ));
//

register_taxonomy('dogi_data', ['dogi'], [ // имя таксономии type_mag, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Дата рождения',
    'singular_name'     => 'Дата рождения',
    'search_items'      => 'Найти Дату рождения',
    'all_items'         => 'Все даты ',
    'view_item '        => 'Посмотреть Дату рождения',
    'edit_item'         => 'Редактировать Дату рождения',
    'update_item'       => 'Обновить Дату рождения',
    'add_new_item'      => 'Добавить новое Дату рождения',
    'new_item_name'     => 'Добавить новое имя',
    'menu_name'         => 'Дата рождения',
 ),
 'description'           => 'Где Дата рождения',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 'show_tagcloud'     => true, // Создать виджет облако элементов этой таксономии 
 
]);

// Рубрика  - категория

register_taxonomy('dogi_pol', array('dogi'), array(
   'labels' => array(  // массив
      'name'              => 'Пол',
      'singular_name'     => 'Пол',
      'search_items'      => 'Найти Пол',
      'all_items'         => 'Все полы',
      'view_item '        => 'Посмотреть Пол',
      'edit_item'         => 'Редактировать Пол',
      'update_item'       => 'Обновить Пол',
      'add_new_item'      => 'Добавить Пол',
      'new_item_name'     => 'Добавить Пол',
      'menu_name'         => 'Пол',
   ),
   'description'           => 'Где Пол',
   'hierarchical'        => true, // не иерархичекая таксоомия
   'show_ui' => true,
   'query_var' => true,
   'rewrite' => array( 'slug' => 'dogi_poroda' ),
 ));
//
register_taxonomy('dogi_okras', ['dogi'], [ // имя таксономии type_mag, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Окрас',
    'singular_name'     => 'Окрас',
    'search_items'      => 'Найти Окрас',
    'all_items'         => 'Все Окрасы',
    'view_item '        => 'Посмотреть Окрас',
    'edit_item'         => 'Редактировать Окрас',
    'update_item'       => 'Обновить Окрас',
    'add_new_item'      => 'Добавить новое Дату рождения',
    'new_item_name'     => 'Добавить новое имя',
    'menu_name'         => 'Окрас',
 ),
 'description'           => 'Где Окрас',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 'show_tagcloud'     => true, // Создать виджет облако элементов этой таксономии 
 
]);

register_taxonomy('dogi_titul', ['dogi'], [ // имя таксономии type_mag, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Титул',
    'singular_name'     => 'Титул',
    'search_items'      => 'Найти Титул',
    'all_items'         => 'Все Титулы',
    'view_item '        => 'Посмотреть Титул',
    'edit_item'         => 'Редактировать Титул',
    'update_item'       => 'Обновить Титул',
    'add_new_item'      => 'Добавить новое Дату рождения',
    'new_item_name'     => 'Добавить новое имя',
    'menu_name'         => 'Титул',
 ),
 'description'           => 'Где Титул',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 'show_tagcloud'     => true, // Создать виджет облако элементов этой таксономии 
 
]);

register_taxonomy('dogi_link_ing', ['dogi'], [ // имя таксономии type_mag, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Ссылка на ингрус',
    'singular_name'     => 'Ссылка на ингрус',
    'search_items'      => 'Найти Ссылка на ингрус',
    'all_items'         => 'Все Ссылка на ингрусы',
    'view_item '        => 'Посмотреть Ссылка на ингрус',
    'edit_item'         => 'Редактировать Ссылка на ингрус',
    'update_item'       => 'Обновить Ссылка на ингрус',
    'add_new_item'      => 'Добавить новое Дату рождения',
    'new_item_name'     => 'Добавить новое имя',
    'menu_name'         => 'Ссылка на ингрус',
 ),
 'description'           => 'Где Ссылка на ингрус',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 'show_tagcloud'     => true, // Создать виджет облако элементов этой таксономии 
 
]);

/*
 // регистрируем свою запись 
register_post_type('adr_mag', [ 
   'labels' => array(
      'name'               => 'Адресс магазина',
      'singular_name'      => 'Адресс магазина',
      'add_new'            => 'Добавить новый адресс магазина',
      'add_new_item'       => 'Добавление адресса',
      'edit_item'          => 'Редактирование адресса',
      'new_item'           => 'Новый адресса',
      'view_item'          => 'Смотреть адресс',
      'search_items'       => 'Искать адресс',
      'not_found'          => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon'  => '',
      'menu_name'          => 'Адресс магазина',
   ),
   'show_ui' => true, // показывать интерфейс в админке
   'public'              => true, // доступ на клиентской части сайта + формируется ссылка
   'menu_position'       => 25,
   'menu_icon'           => 'dashicons-category', 
   'hierarchical'        => false,  //  нет родительских элементов
     'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'post-formats'), // какие стандартные
     // поля будут использованы register_post_type , ('title','editor','author','thumbnail','excerpt','comments')
   'has_archive'         => true, // есть архивная страница 
   'show_in_rest'          => null, // Создание кастомного типа записей с поддержкой Gutenberg
]);

 // таксономии - раздылы, признаки 
 register_taxonomy('type_mag', ['adr_mag'], [ // имя таксономии type_mag, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Тип магазина',
    'singular_name'     => 'тип магазина',
    'search_items'      => 'Найти тип магазина',
    'all_items'         => 'Все Типы магазина',
    'view_item '        => 'Посмотреть тип магазина',
    'edit_item'         => 'Редактировать тип магазина',
    'update_item'       => 'Обновить тип магазина',
    'add_new_item'      => 'Добавить новый тип магазина',
    'new_item_name'     => 'Добавить новый',
    'menu_name'         => 'Тип магазина',
 ),
 'description'           => 'Где тип магазина',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 'show_tagcloud'     => true, // Создать виджет облако элементов этой таксономии 
 
]);

register_taxonomy('phone_m', ['adr_mag'], [ // имя таксономии cyti, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Телефон',
    'singular_name'     => 'Телефон',
    'search_items'      => 'Найти Телефон',
    'all_items'         => 'Все Телефоны',
    'view_item '        => 'Посмотреть Телефон',
    'edit_item'         => 'Редактировать Телефон',
    'update_item'       => 'Обновить Телефон',
    'add_new_item'      => 'Добавить новый Телефон',
    'new_item_name'     => 'Добавить новый',
    'menu_name'         => 'Телефон',
 ),
 'description'           => 'Где Телефон',
 'public'              => true,
 'hierarchical'        => false, // не иерархичекая таксоомия
 //'rewrite'               => true,  // true (тип записи используется как префикс)
		//'query_var'             => $taxonomy, // название параметра запроса
	//	'capabilities'          => array(),
//		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		
// 'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
 //		'show_in_rest'          => null, // добавить в REST API
 //		'rest_base'             => null, // $taxonomy
]);

register_taxonomy('ulicha', ['adr_mag'], [ // имя таксономии ulicha, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Улица',
    'singular_name'     => 'Улица',
    'search_items'      => 'Найти Улицу',
    'all_items'         => 'Все Улицы',
    'view_item '        => 'Посмотреть Улицу',
    'edit_item'         => 'Редактировать Улицу',
    'update_item'       => 'Обновить Улицу',
    'add_new_item'      => 'Добавить новую Улицу',
    'new_item_name'     => 'Добавить новую',
    'menu_name'         => 'Улица',
 ),
 'description'           => 'Где Улица',
 'public'              => true,
 'hierarchical'        => false // не иерархичекая таксоомия
]);

register_taxonomy('dom', ['adr_mag'], [ // имя таксономии ulicha, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'Дом',
    'singular_name'     => 'Номер дома',
    'search_items'      => 'Найти Дом',
    'all_items'         => 'Все дома',
    'view_item '        => 'Посмотреть дома',
    'edit_item'         => 'Редактировать дом',
     'update_item'       => 'Обновить дом',
    'add_new_item'      => 'Добавить новый дом',
    'new_item_name'     => 'Добавить новый',
    'menu_name'         => 'Дом',
 ),
 'description'           => 'Где дом',
 'public'              => true,
 'hierarchical'        => false // не иерархичекая таксоомия
]);

register_taxonomy('graf_s', ['adr_mag'], [ // имя таксономии graf_s, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'С какого часа',
    'singular_name'     => 'С какого часа',
    'search_items'      => 'Найти С какого часа',
    'all_items'         => 'Все С какого часа',
    'view_item '        => 'Посмотреть С какого часа',
    'edit_item'         => 'Редактировать С какого часа',
    'update_item'       => 'Обновить С какого часа',
    'add_new_item'      => 'Добавить новый С какого часа',
    'new_item_name'     => 'Добавить новый',
    'menu_name'         => 'С какого часа',
 ),
 'description'           => 'Где С какого часа',
 'public'              => true,
 'hierarchical'        => false // не иерархичекая таксоомия
]);
register_taxonomy('graf_do', ['adr_mag'], [ // имя таксономии graf_do, ['adr_mag'] к  какому типу поста привязываем хоть к станд post
            
   'labels' => array(  // массив
    'name'              => 'До какого часа',
    'singular_name'     => 'До какого часа',
    'search_items'      => 'Найти До какого часа',
    'all_items'         => 'Все До какого часа',
    'view_item '        => 'Посмотреть До какого часа',
    'edit_item'         => 'Редактировать До какого часа',
    'update_item'       => 'Обновить До какого часа',
    'add_new_item'      => 'Добавить новый До какого часа',
    'new_item_name'     => 'Добавить новый',
    'menu_name'         => 'До какого часа',
 ),
 'description'           => 'Где До какого часа',
 'public'              => true,
 'hierarchical'        => false // не иерархичекая таксоомия
]);
//


/*
slug — по ярлыку,

   post_type - все записи данного типа
   post_type/post_slug - одна запись данного типа

   taxonomy_name/taxonomy_slug

   taxonomy_name - funct
   taxonomy_slug - из админки

   stocks
   stocks/moscow
     stocks/moscow/id
     **********

     stocks?type_stocks=moscow&rooms=3
     get запрос 
     на странице stocks  или др
     с помощью ф-ии get_post выбирать все данные данного типа

function test_postsRecent($atts){  // пример нужное ниже
   $atts = shortcode_atts([    //
      'cnt' => 3              //
   ], $atts);                  //

   $posts = get_posts([        <----------
      'post_type'   => 'post',    
      'numberposts' => $atts['cnt'],  
      'orderby'     => 'date',
         'order'       => 'DESC',
                                     <---- добавляем ключ meta_query 
   ]);

*/
//