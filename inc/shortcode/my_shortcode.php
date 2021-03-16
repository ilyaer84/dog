<?php 

// шорткоды
// ссыдка на WAP 
function WAP_url( $atts ) {
	$params = shortcode_atts( array( // в массиве укажите значения параметров по умолчанию
		'anchor' => 'W.A.P. - Заказать разработку сайта', // параметр 1
		'url' => 'http://web-app-pro.ru/', // параметр 2
      'a_wap_cl' => 'a_wap_cl', // параметр 2
	), $atts );
	return "<br><a class='{$params['a_wap_cl']}' href='{$params['url']}' target='_blank'>{$params['anchor']}</a>";
}
add_shortcode( 'WAPurl', 'WAP_url' );
//

// !адрес сайта
function true_misha_func( $atts ){
	return site_url(); // никаких echo, только return
}
add_shortcode( 'misha', 'true_misha_func' );
 
// !адрес миша
function true_url_external( $atts ) {
	$params = shortcode_atts( array( // в массиве укажите значения параметров по умолчанию
		'anchor' => 'Моя ссылка', // параметр 1
		'url' => 'https://misha.blog', // параметр 2
	), $atts );
	return "<a href='{$params['url']}' target='_blank'>{$params['anchor']}</a>";
}
add_shortcode( 'trueurl', 'true_url_external' );
//[trueurl anchor="текст ссылки" url="URL ссылки"]
//[trueurl anchor="текст ссылки"]URL ссылки[/trueurl]
//[trueurl anchor="главная"][misha][/trueurl]
/* <h2 class="zast_h_i">Дарлинг Тейлс</h2>
         <h1 class="zast_h_ii">"Darling Tails"</h1>
         <p><strong><em>Питомник Ши-тцу г. Тольятти</em></strong></p>
         */


// заставка
function zast_func(){
   $html .= '
<section class="container_zast t-c">
   <div class="div_zast">
 <img src="'.IMG_DIR.'zast.jpg" alt="Питомцы" style="width: 100%;">
             
         </div>
							
		</section>';
      return  $html;
}
add_shortcode( 'zast_gl', 'zast_func' );

// src="/wp-content/themes/dog/assets/img/zast.jpg"
//  <div class="div_zast"> <img src="'.IMG_DIR.'zast.jpg" alt="Автомобиль мечты" style="width: 100%;">
// Шорткод будет работать как в постах, так и в формах.

// !шорткод выведет checkbox рубрик 
function cat_like_shortcode_func(){
	$html = '';
	$categories = get_categories(['hide_empty' => 0]);

	if( $categories ){

		$html = '<h3>Ваша любимая рубрика?</h3>';

		foreach( $categories as $cat ){

			$html .= sprintf('
			<label>
				<span class="wpcf7-list-item">
					<input value=" %1$s" type="checkbox" name="category-like[]">
				</span>
				%1$s
			</label>',
			$cat->name );

		}
	}

	return $html;
}
add_shortcode('cat_like', 'cat_like_shortcode_func');
// wpcf7_add_form_tag('cat_like', 'cat_like_shortcode_func');

// ! привет
function hello_worldd_cf7_func() {
   return "Привет! Я шорткод для Contact Form 7!";
}
add_shortcode('hello_worldd', 'hello_worldd_cf7_func');

// ! Выберите город
function city_sh_shortcode_func(){
   $html = '';

   // Когда у вас есть ключ, вы можете загрузить объект поля и вывести его значения

$field_key = "field_5f0dd30bb217f"; // ключ
$field = get_field_object($field_key); 


if( $field ) {  
   $html .=  '<select class="wpcf7-form-control wpcf7-select" name="category-like2[]">'; 
   $html .=  '<option value="vibor">Выберите город</option>';
   $i=0;
   foreach( $field['choices'] as $k => $v ) {
   ++$i;

   if( isset($_COOKIE['city']) and $_COOKIE['city'] == $v) {
      $html .= sprintf('<option  id="' . $i . '" value=" '. $v .'" name="'.$k.'" selected>' . $v . '</option>' ); 
      
   } else {
      $html .= sprintf('<option id="' . $i . '" value="'. $v .'" name="'.$k.'" >' . $v . '</option>' ); 
//    echo '<option id="' . $i . '" name="'.$k.'">' . $v . '</option>';
    } 
   }
   $html .=  '</select>';  
}
return $html;
}
add_shortcode('city_sh', 'city_sh_shortcode_func');

// ? Как сделать обязательным одно из полей: почта или телефон 
add_filter( 'wpcf7_validate', 'my_form_validate', 10, 2 );

/**
 * Проверяет поля формы.
 *
 * @param WPCF7_Validation $result
 * @param WPCF7_FormTag[]  $tags
 *
 * @return WPCF7_Validation
 */
function my_form_validate( $result, $tags ) {
	$form = WPCF7_Submission::get_instance();

	// Получаем данные полей
	$marker = $form->get_posted_data( 'vid_sv' );
	$email  = $form->get_posted_data( 'your-email' );
	$phone  = $form->get_posted_data( 'tel_kl' );

	// Текст ошибки
   $error_msg_em = 'Заполните email';
   $error_msg_ph = 'Заполните телефон';

	// Проверяем наличие метки с нужным значением.
	// Затем, если оба поля не заполонены - выдаем ошибку
	if ( $marker[0] === 'Электронная почта'  && empty( $email ) ) {
		$result->invalidate( 'your-email', $error_msg_em );
   }
   if ( $marker[0] === 'Телефон' && empty( $phone )  ) {
		$result->invalidate( 'tel_kl', $error_msg_ph );
	}

	return $result;
}
//

// ?Добавив такой хук, мы можем создать обычный шорткод WordPress с помощью add_shortcode() и он будет работать в форме CF7: и там  и там
add_filter( 'wpcf7_form_elements', 'do_shortcode' );

//Включаем работу тега формы (шорткода) в шаблоне письма
add_filter('wpcf7_mail_components', 'do_shortcode_mail', 10, 3);
function do_shortcode_mail( $components, $contactForm, $mailComponent ){
	if( isset($components['body']) ){
		$components['body'] = do_shortcode($components['body']);
	}

	return $components;
}
//

// ! Обзор вывод записей из рубрик / кол-во

   add_shortcode( 'wfm-cats', 'wfm_add_category_posts' );
   function wfm_add_category_posts($atts){
    //if( empty($atts['id']) ) return;
    if( empty($atts['cat_name']) ) return;

    $per_page = !empty($atts['count']) ? (int)$atts['count'] : 3;
    if( $per_page < 1 ) $per_page = 3;
   
//    $cats_id = explode(',', $atts['id']);
    $cat_name = explode(',', $atts['cat_name']);

    
    $the_query = new WP_Query(
     array(
   // 'category__in' => $cats_id,
    'category_name' => $atts['cat_name'],
    'posts_per_page' => $per_page ,
     )
    );
    $string = '';

    $query = new WP_Query( $args );
    $count = $the_query ->post_count; // ! кол-во пуленных записей

    if ($atts['cat_name'] != 'actions') {

    if ( $the_query->have_posts() ) {   //have_posts() будет возвращать true до тех пор, пока мы не дошли до последнего поста цикла
     
      if (isset($count) && !empty($count)) {
         /*
         if ($count == 1) { 
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto ;"> ';
         } elseif ($count == 2) { 
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto auto ;"> ';
         } elseif  ($count == 3) { 
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto auto auto;"> ';            
         } elseif  ($count == 3) { 
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto auto auto;"> ';            
         } else {
            $string .= '<div class="stat_col_4" style="grid-template-columns: repeat(4, 1fr);">  ';
         }
         */
    
      switch ($count) {
         case '1':
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto ;"> ';
            break;

         case '2':
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto auto ;"> ';
            break;

         case '3':
            $string .= '<div class="stat_col_4" style="grid-template-columns: auto auto auto;"> ';            
            break;

         default:
         $string .= '<div class="stat_col_4" style="grid-template-columns: repeat(4, 1fr);">  ';
         break;
       }
      }
      
      $i = 0;

      
      while ( $the_query->have_posts() ) {
         $the_query->the_post();
         $post_id = get_the_ID(); // $post_id будет содержать ID текущего в цикле поста
         
         $data =get_the_date();
         ++$i;
        /*
         if ($i == 3) {
            $string .= '<div class="stat__col_break"> </div>';
         }
         */
         $string .= '<div class=" stat__col stat__col_glav"> ';
         $string .= '<article class="art__stat">
         <a class="stat__link" href="' .get_the_permalink().'"> ';
         $string .= '<div class="img_glav_cont">'.get_the_post_thumbnail($post_id, array( 150, 150) ).'</div>';
         $string .= '<div class="stat__date">   '. $data.'    </div>';
         $string .= '<h4 class="stat__title">'.get_the_title().' </h4>';
         if( has_excerpt() ){
            $string .= '<p class="stat__description">'.get_the_excerpt() .' </p> </a>';
         }
         $string .='<div class="but_podr"><a href="'.get_the_permalink().'" class="button-podr" rel="nofollow">Подробнее</a></div>';
         $string .= '</article></div>';
   
            }
            $string .= '</div>';
      } else {
      // ни одной записи не найдено
   }
   
   
} else { // если акции

   
   if ( $the_query->have_posts() ) {         //have_posts() будет возвращать true до тех пор, пока мы не дошли до последнего поста цикла
     // $the_query->the_post();
    /*  if(get_field('period')) {
   
         $xdata =  get_field('period'); //getdate(); // использовано текущее время
         // $xdata['ac_do'];
         $cur_data = date("Y.m.d");
         $data_s = strtotime(str_replace('/', '-', $xdata['ac_s']));  // strtotime() может преобразовать текстовое представление даты/времени в метку времени
         $data_do = strtotime(str_replace('/', '-', $xdata['ac_do']));
    if ( date("Y.m.d") >=  date("Y.m.d",$data_s)  and ( date("Y.m.d")  <= date("Y.m.d",$data_do) ) ) {
*/
      $string .= '<div class="stat_col_4"> ';
      
      while ( $the_query->have_posts() ) {
         $the_query->the_post();
         $post_id = get_the_ID(); // $post_id будет содержать ID текущего в цикле поста   
         $data =get_the_date();

         if(get_field('period')) {
   
            $xdata =  get_field('period'); //getdate(); // использовано текущее время
            // $xdata['ac_do'];
            $cur_data = date("Y.m.d");
            $data_s = strtotime(str_replace('/', '-', $xdata['ac_s']));  // strtotime() может преобразовать текстовое представление даты/времени в метку времени
            $data_do = strtotime(str_replace('/', '-', $xdata['ac_do']));
            if ( date("Y.m.d") >=  date("Y.m.d",$data_s)  and ( date("Y.m.d")  <= date("Y.m.d",$data_do) ) ) {
   
               $string .= '<div class="stat__col"> ';
               $string .= '<article class="art__stat">
               <a class="stat__link" href="' .get_the_permalink().'"> ';
               $string .= '<div class="img_glav_cont">'.get_the_post_thumbnail($post_id, array( 200, 100) ).'</div>';
               $string .= '<div class="stat__date">   '. $data.'    </div>';
               $string .= '<h4 class="stat__title">'.get_the_title().' </h4>';
               if( has_excerpt() ){
                  $string .= '<p class="stat__description">'.get_the_excerpt() .' </p> </a>';
               }
               $string .= '</article></a></div>';
            }
         }
   } $string .= '</div>';
   }
}
   /* Восстанавливаем оригинальные данные записи */
   wp_reset_postdata();
   return $string;
   }


// ! шорткод брендов
add_shortcode( 'wtf_brend', 'wtf_brend_pop' );
   function wtf_brend_pop($atts){
    if( empty($atts['atribut']) ) return;

    // Вот так один атрибут без пустых терминов
      $tax = 'pa_'.$atts['atribut']; //'pa_brend';
   /*   $pa_args = get_terms( $tax, array(
         'hide_empty' => false,
      )
      );
*/
      $pa_args = get_terms( [
         'taxonomy' =>  $tax,
         'hide_empty' => false,
         //'number' => 4,
         'order' => 'ASC', // по порядку
       //  'fields'        => 'all', 
      ] );

      $string = '';

      if ( 0 !== count( $pa_args ) ) {
         $string .= '<div class="stat_col_4"> ';

      foreach ($pa_args as $key => $value) {
         if ( get_field('brend_top', 'pa_brend_'.$value->term_id) and (get_field('brend_top', 'pa_brend_'.$value->term_id)) =='true' ) {

            $string .= '<div class="stat__col"> ';
            $string .= '<article class="art__stat">
                <a class="stat__link" href="/shop/?filter_brend='.$value->slug.'"> ';
            $string .= '<div class="img_glav_cont" ><img src="'.get_field('woo_img_brands', 'pa_brend_'.$value->term_id).'" 
               class="img_brend" alt="'.$value->name.'"></div>';
            $string .= '<h4 class="stat__title">'.$value->name.' </h4>';            
            $string .= '</article></a></div>';
/*
      echo '<a href="/shop/?filter_brend='.$value->name.'"><span itemprop="name">'.$value->name.'</span></a>';

         echo '<img src="'.get_field('woo_img_brands', 'pa_brend_'.$value->term_id).'" class="img_brend" alt="'.$value->name.'">'.'<br>'; 
            $string .= '</div>';
*/
   }
}  $string .= '</div>';
   }
   return $string;
}
//



// ! шорткод номер телефона
add_shortcode( 'er_num_phone', 'er_num_phone_f' );

function er_num_phone_f(){
   if( isset($_COOKIE['city'])) {   
      $string = '';
   //  post_type_exists() // Проверяет зарегистрирован ли указанный тип записи.
   query_posts( array(
        'post_type'  =>  'adr_mag',
        'meta_query' => array(
          array(
            'key' 	=> 'city',
            'value' => $_COOKIE['city'] ,
       //     'compare' => 'IN',
       )
       )   
   )
  );
  
   if(have_posts()): // все начинается глобальной функции have_post() без аргументов
                  // синтаксис : endif; тоже чтои {}
                  

     while(have_posts()):  the_post(); // перебираем посты 
   
        if (get_field('glav_mag') == 1) {  // проверка главный магазин ?
           $zap_glav_mag[]= get_field('tel');
        }
  
     endwhile; 
  endif;

   if( isset($zap_glav_mag[0])) {
      $string = "<div class='tel_fot'><span class='small'>  Тел.( Вашего города ): </span>".$zap_glav_mag[0]."</div>";
   }
  
  wp_reset_query();
  }
  return $string;
}

// ! Обзор вывод записей из тип записи / кол-во

add_shortcode( 'wfm_type_z', 'wfm_type_z_posts' );
function wfm_type_z_posts($atts){
 //if( empty($atts['id']) ) return;
 if( empty($atts['type_z']) ) return;

 $per_page = !empty($atts['count']) ? (int)$atts['count'] : 3;
 if( $per_page < 1 ) $per_page = 3;

//    $cats_id = explode(',', $atts['id']);
 $type_z = explode(',', $atts['type_z']);

 
 $the_query = new WP_Query(
  array(
// 'category__in' => $cats_id,
//'taxonomy' => 'dogi',
'post_type'  =>  $atts['type_z'],
//'post_type' => 'dog_name', 
'field'    => 'slug',
 //'category_name' => $atts['type_z'],
 'posts_per_page' => $per_page ,
  )
 );
 $string = '';

 if ( $the_query->have_posts() ) {   //have_posts() будет возвращать true до тех пор, пока мы не дошли до последнего поста цикла
   $string .= '<div class="stat_col_4"> ';
   
   while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $post_id = get_the_ID(); // $post_id будет содержать ID текущего в цикле поста

      $string .= '<div class="stat__col"> ';
      $string .= '<article class="art__stat">
      <a class="stat__link" href="'.get_the_permalink().'"> ';
      $string .= '<div class="img_glav_cont">'.get_the_post_thumbnail($post_id, array( 200, 100) ).'</div>';
      $string .= '<h4 class="stat__title">'.get_the_title().' </h4>';
      if( has_excerpt() ){
         $string .= '<p class="stat__description">'.get_the_excerpt() .' </p> </a>';
      }
      $string .='<a href="'.get_the_permalink().'" class="button-podr" rel="nofollow">Подробнее</a>';
      $string .= '</article></a></div>';

         }
         $string .= '</div>';
   } else {
   // ни одной записи не найдено

}
/* Восстанавливаем оригинальные данные записи */
wp_reset_postdata();
return $string;
}

//

// ? Активируем выполнение шорткода в текстовом виджете
add_filter('widget_text', 'do_shortcode');

//! Добавьте текст с динамическим именем пользователя
/*display current username*/
/*
add_shortcode( 'current-username' , 'ss_get_current_username' );
function ss_get_current_username(){
    $user = wp_get_current_user();
    return $user->display_name;
}
*/


// ! Карусель вывод записей из тип записи / кол-во

add_shortcode( 'carus_tz', 'wfm_car_type_z_posts' );
function wfm_car_type_z_posts($atts){
 //if( empty($atts['id']) ) return;
 if( empty($atts['type_z']) ) return;

 $per_page = !empty($atts['count']) ? (int)$atts['count'] : 3;
 if( $per_page < 1 ) $per_page = 3;

//    $cats_id = explode(',', $atts['id']);
 $type_z = explode(',', $atts['type_z']);


 $reviews = new WP_Query(
  array(
// 'category__in' => $cats_id,
//'taxonomy' => 'dogi',
'post_type'  =>  $atts['type_z'],
//'post_type' => 'dog_name', 
'field'    => 'slug',
 //'category_name' => $atts['type_z'],
 'posts_per_page' => $per_page ,
  )
 );
 $string = '';
 $string .= '<!--section 4 -->
 <section>
 <div class="user-slider">
     <p class="zag-rev">    
         <span>
             <mark>Отзывы  </mark>Клиентов	</span>
     </p>
 
 <div class="user-slides">' ;

 if ( $reviews->have_posts() ) {   //have_posts() будет возвращать true до тех пор, пока мы не дошли до последнего поста цикла
   $string .= '<div class="stat_col_4"> ';
   
   while ( $reviews->have_posts() ) {
      $reviews->the_post();
      $post_id = get_the_ID(); // $post_id будет содержать ID текущего в цикле поста
/*
      $string .= '<div class="user"> ';
      $string .= '<article class="art__stat">
      <a class="stat__link" href="'.get_the_permalink().'"> ';
      $string .= '<div class="user__img">'.get_the_post_thumbnail($post_id, array( 200, 100) ).'</div>';
      $string .= '<h4 class="user__name">'.get_the_title().' </h4>';
      if( has_excerpt() ){
         $string .= '<p class="user__post">'.get_the_excerpt() .' </p> </a>';
      }
      $string .='<a href="'.get_the_permalink().'" class="button-podr" rel="nofollow">Подробнее</a>';
      $string .= '</article></a></div>';

*/
$string .= '<div class="user">  
               <div class="user__img">' .get_the_post_thumbnail($review->ID, "size300-200").'</div>';
$string .= '   <div class="user__name">'.$review->post_title .'</div>';
$string .= ' </div>';


         }
      //   $string .= '</div>';

        
   } else {
   // ни одной записи не найдено

}

$string .= '</div>
</div>
</section> <!-- end section carusel--> ';
/* Восстанавливаем оригинальные данные записи */
wp_reset_postdata();
return $string;
}
//

// ! Вывод конкретного поста

add_shortcode( 'post_tz', 'wfm_post_type_z' );
function wfm_post_type_z($atts){
      //if( empty($atts['id']) ) return;
      if( empty($atts['type_z']) && empty($atts['id'] )) return;

      $per_page = !empty($atts['count']) ? (int)$atts['count'] : 3;
      if( $per_page < 1 ) $per_page = 3;

      //    $cats_id = explode(',', $atts['id']);
      $mpost_id = explode(',', $atts['id']);
     // $mpost_id = implode(',', $atts['id']);


            $the_query = new WP_Query(
            array(
            // 'category__in' => $cats_id,
            //'taxonomy' => 'dogi',
            'post_type'  =>  $atts['type_z'],
            //'p'  =>  $atts['id'],  // ID поста  xbckj
            'post__in' =>  $mpost_id,  // массив ID постов
            //'post_type' => 'dog_name', 
            'field'    => 'slug',
            //'category_name' => $atts['type_z'],
            'posts_per_page' => $per_page ,
            )
            );
            $string = '';

if ( $the_query->have_posts() ) {   //have_posts() будет возвращать true до тех пор, пока мы не дошли до последнего поста цикла
  $string .= '<div class="stat_col_osn"> ';
  $string .= '<div class="div_sbor"> ';
  while ( $the_query->have_posts() ) {
     $the_query->the_post();
     $post_id = get_the_ID(); // $post_id будет содержать ID текущего в цикле поста

     $string .= '<div class="stat__col"> ';
     $string .= '<article class="art__stat">
     <a class="stat__link" href="'.get_the_permalink().'"> ';
     $string .= '<div class="img_glav_cont">'.get_the_post_thumbnail($post_id, array( 768, 512) ).'</div>';
     $string .= '<h4 class="stat__title">'.get_the_title().' </h4>';
     if( has_excerpt() ){
        $string .= '<p class="stat__description">'.get_the_excerpt() .' </p> ';
     }
     $string .= '</a> </article>  </div>';

        }
        $string .= '<div class="sbor_tu t-c"> ';
        $string .='<a href="/nashi_love/" class="but_v1" rel="nofollow">Посмотреть ВСЕХ питомцев</a>';

        $string .= '</div> </div>';
  } else {
  // ни одной записи не найдено

}
/* Восстанавливаем оригинальные данные записи */
wp_reset_postdata();
return $string;
}
//
   
// end шорткоды
