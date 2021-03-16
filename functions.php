<?php 
// define( 'WP_ALLOW_MULTISITE', true );

/*

    thumbnail - Размеры миниатюр
    medium - Средний размер
    large - Крупный размер

*/



/*
    get_stylesheet_directory_uri() — получает URL текущей темы (дочерней, не родительской).

    get_template_directory_uri() — получает URL текущей темы (родительской, не дочерней).

    get_stylesheet_directory() — получает путь до текущей темы (дочерней, не родительской).

    get_template_directory() — получает путь до текущей темы (родительской, не дочерней).

    get_stylesheet() — получает название каталога текущей темы (дочерней, не родительской).

    get_template() — получает название каталога текущей темы (родительской, не дочерней).
    get_stylesheet_uri() — получает готовый URL на файл стилей style.css текущей темы. Если используется дочерняя тема, то получит ссылку на стили доч. темы. В этом случае для родительской темы такой функции в WordPress нет.

    */

    // ! КОНСТАНТЫ
    define('IMG_DIR', get_stylesheet_directory_uri() . '/assets/img/'); // константа глобально доступна для файлов темы
    
    define('CREATED', '2021');
    
    define('FROM_EMAIL', 'ilyaer84@ya.ru');  // elena.apikum@mail.ru
    define('TO_EMAIL', 'ilyaer84@ya.ru');
    
//  ! Подключаем стили и js 

// Лучше подключить файлы стилей по-отдельности в HTML: сначала стили родительской темы, а затем дочерней, чтобы они были ниже в HTML коде и перебивали родительские стили. Делается это так:
   add_action('wp_enqueue_scripts', 'my_theme_styles' );
   function my_theme_styles() {
      wp_enqueue_style('parent-theme-css', get_template_directory_uri() .'/style.css' );
      // не обязательно, правильная родительская тема подключит его сама.
   //   wp_enqueue_style('child-theme-css', get_stylesheet_directory_uri() .'/style.css', array('parent-theme-css') );
   
      //прежде пользумся ивентовой моделью
   wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // (название , адресс) get_template_directory_uri - расположение темы 
 
  
   wp_deregister_script('jquery'); // прибиваем стандартный wp jquery

   wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
//   wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js');
   wp_enqueue_script('main_script', get_stylesheet_directory_uri() . '/assets/js/main.js');
   wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js');
   //работаем с аватарами 
//  wp_enqueue_script('main_ava_js', get_stylesheet_directory_uri() . '/assets/js/image-uploader.js');

  

   // для стороны клиента, для того чтобы из php в java script при загрузке странице передать данные
   // надо динамически на лету создать ассоциативный массив в php, который в java привратится в объект
/*		wp_localize_script('script', '_PHP', [  // ('script' - тк хочу чтобы вывелось перед моим скриптом с тким id 'script' -> кот выше
      // '_PHP' - название глобально переменой кот будет сделана для java 
      'ajaxUrl' => admin_url('admin-ajax.php'),  //в ключ ajaxUrl из ф-я admin-ajax - получит нужный url
   //	'aa' => '2' // aa - пример- перечисляем ключи - любые данные при загрузки страницы со стороны сервера
      'is_mobile' => wp_is_mobile(),
   ]); 
*/
   }

// end 

// ! подключение стилей к  определенной странице
function wpse_enqueue_page_template_styles() {
   if ( is_page_template( 'adres-magaz.php' ) ) {
     wp_enqueue_style( 'page-template', get_stylesheet_directory_uri() . '/assets/css/adres-mag.css' );
   }
   if ( is_page( 20 ) ) {
      //подключаем стиль
    //  wp_enqueue_style ( 'contact', get_template_directory_uri()  . '/altercss.css', array(), '1.0' );  

          //подключаем скрипт Маска ввода телефона

      // ! доступ к папке uploads
      //  $uploads = wp_upload_dir();
      // $upload_path = $uploads['baseurl'];
      wp_enqueue_script('masked-input', get_stylesheet_directory_uri() . '/assets/js/jquery.maskedinput.min.js', array('jquery'), '1.1', true);
      wp_enqueue_script('obr_sv_zv', get_stylesheet_directory_uri() . '/assets/js/obrat_sv.js');

   }



}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );
// end 


add_action('after_setup_theme', function(){  
 
   register_nav_menu('top_menu', 'Menu_main'); // регистрируем меню, можно несколько 
   /*  
   add_theme_support('post-thumbnails'); // разрешить использование миниатюр
   add_theme_support('title-tag'); 	 // работа с title и потом гдето хуками фильтрами подписываются на изменение title 
   add_theme_support('post-formats', ['aside',	'chat',	'gallery',	'image', 'link',
  'quote', 'status',	'video',	'audio']); 
  // регистрируем форматы постов, и после приминения на посте 
   // и на странице блога в индексе посты распараленены на свои типы  что позволит использовать get_template_part() 
*/
     add_image_size('size100-100', 100, 100, false); // регистрация своего размера!
     add_image_size('size300-200', 300, 200, false); 
     add_image_size('size600-400', 600, 400, false); 
     add_image_size('size768-512', 768, 512, false); 
     add_image_size('size1536-1024', 1536, 1024, false);  // регистрация своего размера!
});


// Подключаем шорткоды
include_once(__DIR__ . '/inc/shortcode/my_shortcode.php'); 
//

//  регистрация sidebar 

add_action('widgets_init', function(){  // widgets_init название хука
    register_sidebar([
		'name'          => 'Сайдбар сверху',
		'id'            => 'sidebar-top',
		'description'   => 'Для верхнего меню',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<div class="menu">',
		'after_title'   => "</div>\n",
     ]);
//     register_widget('Test_Widget_Recent_Posts'); // вызов своего виджета с указание соего класса - в отдельном файле
	
//	 register_widget('/assets/inc/Widget_Ya_Dialog'); // вызов своего виджета с указание соего класса - в отдельном файле

	});
//


// регистрируем свои типы записи +  // таксономии - раздылы, признаки 
   
   include_once(__DIR__ . '/inc/my/type_zap_tax.php'); //! регистрируем свои типы записи +  // таксономии - раздылы, признаки
   // __DIR__ - работа от текущей папки functiopn подключен к к индексу <-
   
   //свои плагины
  
 //  include_once(__DIR__ . '/inc/my/avatar_my.php');  //работаем с аватарами  + js надо поключить

//

   	// отключение админ бара
add_action('show_admin_bar', '__return_false');

// ! для Contact Form
//Доработка возвртим галочку

//Ориентация на конкретную контактную форму
add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '493' == event.detail.contactFormId ) {
      $('.form_tel').removeClass('form_req');
         $('.form_mail').addClass('form_req');
    }
}, false );
</script>
<?php
}

// end Contact Form

//Ember 
add_filter( 'embed_defaults', 'bigger_embed_size' );
		
function bigger_embed_size()
{
return array( 'width' => 240, 'height' => 150 );
}
//end ember

// !свои функции

/***для использования пути  в js ***/
add_action( 'wp_enqueue_scripts', 'mythemeurl', 99 );
function mythemeurl(){
wp_localize_script( 'jquery', 'mytheme', array( 
   //( 'jquery' Название скрипта, перед которым будут добавлены данные. Скрипт должен быть зарегистрирован заранее.
   //, 'mytheme', Название Javascript объекта, который будет содержать данные.
   'template_url' => get_template_directory_uri(), 
) );
}

function wtf($array, $stop = false) {
   echo '<pre>'.print_r($array,1).'</pre>';
   if(!$stop) {
      exit();
   }
}

//

// загрузить SVG
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
//


// *************

add_action( 'wp_print_styles', 'true_otkljuchaem_stili_contact_form', 100 ); // по идее вы можете использовать и хук wp_enqueue_scripts, хотя конкретно его я не тестировал
 
function true_otkljuchaem_stili_contact_form() {
   wp_deregister_style( 'contact-form-7' ); // в параметрах - ID подключаемого файла
   wp_deregister_style( 'astra-theme-css-inline-css' ); 
   wp_deregister_style( 'google-fonts-1-css' );
}

// ! Закрыть на обслуживание
/*
function wp_maintenance_mode(){
   if(!current_user_can('edit_themes') || !is_user_logged_in()){
   wp_die('<h1 style="color:red">Сайт находится на техническом обслуживании</h1><br />Как только работы будут завершены мы снова с вами встретимся!'); }
   }
   add_action('get_header', 'wp_maintenance_mode');
   */

   // ! Custom Gallery
/*
remove_shortcode( 'gallery' );
function my_own_gallary() {
    // Gallery code
}

//add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr) {
global $post, $wp_locale;

static $instance = 0;
$instance++;

//Мы доверяем ввод автора, поэтому давайте, по крайней мере, убедитесь, что это выглядит 
// как действительное заявление о порядке оформления
if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
        unset( $attr['orderby'] );
}

extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => 'dl',
    'icontag'    => 'dt',
    'captiontag' => 'dd',
    'columns'    => 3,
    'size'       => 'light-thumb',
    'include'    => '',
    'exclude'    => ''
), $attr));

$id = intval($id);
if ( 'RAND' == $order )
    $orderby = 'none';

if ( !empty($include) ) {
    $include = preg_replace( '/[^0-9,]+/', '', $include );
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
        $attachments[$val->ID] = $_attachments[$key];
    }
} elseif ( !empty($exclude) ) {
    $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
} else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}

if ( empty($attachments) )
    return '';

if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
        $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
}

$itemtag = tag_escape($itemtag);
$captiontag = tag_escape($captiontag);
$columns = intval($columns);
$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
$float = is_rtl() ? 'right' : 'left';

$selector = "gallery-{$instance}";

$output = apply_filters('gallery_style', "
    <style type='text/css'>
        #{$selector} {
            margin: auto;
        }
        #{$selector} .gallery-item {
            float: {$float};
            margin-top: 0px;
            text-align: center;
            width: {$itemwidth}%;           }
        #{$selector} img {
            border: 0;
        }
        #{$selector} .gallery-caption {
            margin-left: 0;
        }
    </style>
    <!-- see gallery_shortcode() in wp-includes/media.php -->


    <div id='$selector' class='gallery galleryid-{$id}'>");
    $output = "<div id=\"mygallery\">\n";




$i = 0;
foreach ( $attachments as $id => $attachment ) {
    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);


    $output .= "<{$itemtag} class='gallery-item'>";
    $output .= "
        <{$icontag} class='gallery-icon'>
            $link
        </{$icontag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
        $output .= "
            <{$captiontag} class='gallery-caption'>
            " . wptexturize($attachment->post_excerpt) . "
            </{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    if ( $columns > 0 && ++$i % $columns == 0 )
        $output .= '<br style="clear: both" />';
}

$output .= "
    <br style='clear: both;' />
    </div>\n";


return $output;

}
add_shortcode( 'gallery' , 'my_post_gallery' );
*/
// поэтому, если вы хотите вывести другую строку, такую как img title или img desc, просто используйте эту конструкцию
//$title = $img ['title'];
//

/*
//
// Удалим рамку у картинок
add_filter('gallery_style', function( $str ){
	return str_replace('border: 2px solid #cfcfcf;', '', $str );
    return str_replace('border: 1px solid #eaeaea;', '', $str );
    //.gallery-caption
});
*/
// отключим стили у галлереи
// add_filter( 'use_default_gallery_style', '__return_false');

/*
add_filter(
   'gallery_style',
   function ($style) {
       $style =
<<<STYLE
<style type="text/css">
   .gallery-images {
       display: flex;
       flex-wrap: wrap;
       margin-top: 20px;
   }
       .gallery-images > a {
           box-sizing: border-box;
           overflow: hidden;
           width: 23%;
           margin-right: 2.66666%;
           border: 1px solid #cfcfcf;
           background-color: #f5f5f5;
           padding: 10px;
           margin-bottom: 2.66666%;
           /* для центрирования картинок */
  /*         display: flex;
           align-items: center;
           justify-content: center;
       }
       .gallery-images > a:nth-child(4n) {
           margin-right: 0;
       }
           .gallery-images > a > img {
               max-width: 100%;
           }
</style>
STYLE;
       return $style;
   }
);


function process_pdf( $file ) {

    if( $file['type'] === 'application/pdf' ) {

        // Get the parent post ID, if there is one
        if( isset($_REQUEST['post_id']) ) {
            $post_id = $_REQUEST['post_id'];

            $filename = $file[ 'name' ];
            $filename_wo_extension = basename( $filename, ".pdf" );

            $im = new Imagick();
            $im->setResolution(300, 300);
            $im->readimage( $file[ 'tmp_name' ] ); 
            $pages = $im->getNumberImages();

            $attachments_array = array();

            // iterate over pages of the pdf file
            for($p = 1; $p <= $pages; $p++){
                $im->setIteratorIndex( $p - 1 );
                $im->setImageFormat('jpeg');

                $filename_neu = $filename_wo_extension .'_'. $p .'.jpg';

                // upload new image to wordpress
                // https://codex.wordpress.org/Function_Reference/wp_insert_attachment
                $upload_file = wp_upload_bits($filename_neu, null, $im);
                if (!$upload_file['error']) {

                    $attachment = array(
                        'post_mime_type' => 'image/jpeg',
                        'post_title' => preg_replace( '/\.[^.]+$/', '', $filename_neu),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );

                    $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'] );

                    if (!is_wp_error( $attachment_id )) {
                        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
                        wp_update_attachment_metadata( $attachment_id,  $attachment_data );
                        $attachments_array[] = $attachment_id;
                    }
                }
            }

            // add new images to a gallery (advanced custom fields plugin)
            // http://www.advancedcustomfields.com/resources/update_field/
            update_field( 'field_55b0a473da995', $attachments_array, $post_id );

          $im->destroy();
       }
    }

    return $file;

}

add_filter('wp_handle_upload_prefilter', 'process_pdf' );
*/