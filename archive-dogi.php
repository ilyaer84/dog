111111111
<?php 

// реагирует на ти записи (index)
?>


<?php 
//  
get_header();

 if ( astra_page_layout() == 'left-sidebar' ) :
   ?>
<!-- sidebar -->
<div class="widget-area secondary" id="secondary" role="complementary" itemtype="https://schema.org/WPSideBar" itemscope="itemscope">
	<div class="sidebar-main">
  <?php get_sidebar('adres-mag');
     

//wtf($_COOKIE);
?>
	</div><!-- .sidebar-main -->
</div>
<?php endif ;
?>

<div id="primary" class="content-area primary">
		


   <section class="ast-archive-description">
   <h1 class="page-title ast-archive-title"> archive <?php the_title();  ?></h1>									
   </section>

 <main id="main" class="site-main"> 


<?php          /*  query_posts( array(
               'post_type'  =>  'dogi',
       //        'category__in' => 6,
       //        'cat' => '-12,-34,-56', // все посты, кроме
        //       'category_name' =>   'info' ,
        /*
               'meta_query' => array(
                  array(
                     'key' 	=> 'city',
                     'value' => $_COOKIE['city'] ,
               //     'compare' => 'IN',
               
               )
               )  
               */ 
    /*        )
            );*/
         

     if(have_posts()) { // все начинается глобальной функции have_post() без аргументов
                        // синтаксис : endif; тоже чтои {}                        
                        
                        ?>

      <div class="cont_singl">

      <div class="name_block" >   

 <?php    while(have_posts()):  the_post(); // перебираем посты          ?>
 
                        <div id="comp-wrap">  

                        <div class="item-page t-c">	

                           <Div>
                              <a class="fancybox image" href="<?php the_post_thumbnail_url(); ?>">
                              <?php //the_post_thumbnail('large'); // thumbnail/ medium / large вставляем миниатюры
                                 the_post_thumbnail('large', array('class' => 'img_singl'));					
                              ?>
                              </a>
                           </Div>	

                           <div>
                              <p>
                           <strong>Полное имя:</strong> 
                           <?php 	
                                 $cur_terms = get_the_terms( $post->ID, 'dog_name');
                                 if( is_array( $cur_terms  )) {
                                    foreach( $cur_terms as $cur_term ){
                                          echo $cur_term->name;
                                             }
                                          } ?>

                        </p>

                           <p><strong>Дата рождения:</strong> 
                           <?php 			$cur_terms = get_the_terms( $post->ID, 'dog_data');
                        if( is_array( $cur_terms  )) {
                           foreach( $cur_terms as $cur_term ){
                                 echo $cur_term->name;
                                    }
                                 } ?>
                           </p>

                           <p><strong>Пол:</strong>
                           <?php 			$cur_terms = get_the_terms( $post->ID, 'dog_pol');
                        if( is_array( $cur_terms  )) {
                           foreach( $cur_terms as $cur_term ){
                                 echo $cur_term->name;
                                    }
                                 } ?> 
                           </p>

                           <p><strong>Титул:</strong> <?php 			$cur_terms = get_the_terms( $post->ID, 'dog_titul');
                        if( is_array( $cur_terms  )) {
                           foreach( $cur_terms as $cur_term ){
                                 echo $cur_term->name;
                                    }
                                 } ?> 
                           </p>

                           <p><strong>Ссылка :</strong>
                           <?php 			$cur_terms = get_the_terms( $post->ID, 'dog_link_ing');
                        if( is_array( $cur_terms  )) {
                           foreach( $cur_terms as $cur_term ){
                                 echo $cur_term->name;
                                    }
                                 } ?>  </p>
                           </div>
                           
                           <!-- <hr> -->

                        </div>
      <?php
      endwhile; 
      ?>

   </div>


      <?php
         } else {
            
            echo '<div class="d_osh"> Адреса магазинов не найдены! </div>';
         }
         

      wp_reset_query();

      // echo '<div class="d_osh"> Выберете город! </div>';

      ?>


</div>


</main> 
<!-- #main -->

</div>

<!-- sidebar -->
<?php
if ( astra_page_layout() == 'right-sidebar' ) :
   ?>
<!-- sidebar -->
<div class="widget-area secondary" id="secondary" role="complementary" itemtype="https://schema.org/WPSideBar" itemscope="itemscope">
	<div class="sidebar-main">
  <?php get_sidebar('adres-mag');
    
?>
	</div><!-- .sidebar-main -->
</div>
<?php
 endif ;

   // dynamic_sidebar('sidebar-top'); //для вызова по ид сайдбар
   //get_sidebar('adres-mag'); // для вызова из фала sidebar-adres-mag.php
  ?>


<?php get_footer(); ?>

