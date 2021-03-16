
<?php 
// !Страница отображает  пост из типа записи "dogii"
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
   <h1 class="page-title ast-archive-title">  <?php the_title();  ?></h1>									
   </section>

 <main id="main" class="site-main"> 

	<div class="cont_singl">


   
<?php 
/*

            query_posts( array(
               'post_type'  =>  'dogii',
            )
            );
         */
    if(have_posts()) { // все начинается глобальной функции have_post() без аргументов
                        // синтаксис : endif; тоже чтои {}                        
                        
                        ?>

   
	<div class="name_block" > 

 <?php   // while(have_posts()): 
  the_post(); // перебираем посты 
  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
?>


	<div class="comp-wrap">  

	   <div class="item-page t-c">	

		<Div  class="item-vnutr-one">

		<a class="fancybox image" href="<?php the_post_thumbnail_url(); ?>">
				<?php //the_post_thumbnail('large'); // thumbnail/ medium / large вставляем миниатюры
				//	the_post_thumbnail('large', array('class' => 'img_singl'));					
				?>

		 <Div class="item-vnutr" style="background-image: url(<?php  echo $image_url[0]; ?>) ">  
								
			</Div>	
			</a>
			</Div>

	<Div class="vnutr_tu"> 
				<p>
			<strong>Имя:</strong> 
			<?php 	
					$cur_terms = get_the_terms( $post->ID, 'dogi_name'); //( $post->ID, 'my_tax' );					
					if( is_array( $cur_terms  )) {
						foreach( $cur_terms as $cur_term ){
								echo $cur_term->name;
									}
								} ?>
		
		</p>

		<p>
			<strong>Порода:</strong> 
			<?php 	
					$cur_terms = get_the_terms( $post->ID, 'dogi_poroda');
					if( is_array( $cur_terms  )) {
						foreach( $cur_terms as $cur_term ){
								echo $cur_term->name;
									}
								} ?>
		
		</p>

			<p><strong>Дата рождения:</strong> 
			 <?php 			$cur_terms = get_the_terms( $post->ID, 'dogi_data');
		if( is_array( $cur_terms  )) {
			foreach( $cur_terms as $cur_term ){
					echo $cur_term->name;
						}
					} ?>
			</p>

			<p><strong>Пол:</strong>
			 <?php 			$cur_terms = get_the_terms( $post->ID, 'dogi_pol');
		if( is_array( $cur_terms  )) {
			foreach( $cur_terms as $cur_term ){
					echo $cur_term->name;
						}
					} ?> 
			</p>

			<p><strong>Окрас:</strong>
			 <?php 			$cur_terms = get_the_terms( $post->ID, 'dogi_okras');
		if( is_array( $cur_terms  )) {
			foreach( $cur_terms as $cur_term ){
					echo $cur_term->name;
						}
					} ?> 
			</p>
			
			<p><strong>Титулы:</strong> <?php 			$cur_terms = get_the_terms( $post->ID, 'dogi_titul');
		if( is_array( $cur_terms  )) {
			foreach( $cur_terms as $cur_term ){
					echo $cur_term->name;
						}
					} ?> 
			</p>

			<p><strong></strong>
			<?php 			$cur_terms = get_the_terms( $post->ID, 'dogi_link_ing');
		if( is_array( $cur_terms  )) {
			foreach( $cur_terms as $cur_term ){
					echo '<a href="'.$cur_term->name.'" target="_blank">
					<img src="'.IMG_DIR.'ingrus.png" border="0" rel="nofollow"></a>'
					;
						}
					} ?>  </p>
			</div>
			
			<!-- <hr> -->

	</div>


		 <?php
	
		  the_content();  
		  
		 if (get_field('code') && get_field('code') != 'Только код ( берем из поделиться)' ) {
		
		 ?> 
		  	<!-- -->
			<div class="vieo_cont">
			 <iframe  width="100%" height="100%" title="Видео питомник ши-тцу" src="https://www.youtube.com/embed/<?php  echo get_field('code');  // 3_2 короткое описание с помощью доп поля и плагин Advanced Custom Fields
		?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="200" height="113" frameborder="0"></iframe>
				<!-- width="480" height="300"
				<iframe width="280" height="157" src="https://www.youtube.com/embed/<?php  //echo get_field('code');  // 3_2 короткое описание с помощью доп поля и плагин Advanced Custom Fields
				?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; 
				picture-in-picture" allowfullscreen></iframe>
				-->
			</div> 
		<?php } ?>

		</div>               
	</div>

	<?php
	//	endwhile; 
	?>

	<?php
 } else {
      
      echo '<div class="d_osh"> Питомцы не найдены! </div>';
   }
    

// wp_reset_query();


?>

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

