<?php 
/*
    Template Name: Наши любимые питомцы
*/

// Страница отображает посты из типа записи  "Наши питомцы", 
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

 <div class="container">
<?php      
  
  query_posts( array(
               'post_type'  =>  'dogi',
               'field'    => 'slug',
         //      'taxonomy' => 'dogii',
//post_type'  =>  $atts['type_z'],
//'post_type' => 'dogi_name', 
         )
            );

     if(have_posts()) { // все начинается глобальной функции have_post() без аргументов
                        // синтаксис : endif; тоже чтои {}                        
                        
                        ?>

      <div class="cont_singl">

          

 <?php    while(have_posts()):  the_post(); // перебираем посты          ?>

 <div class="pit_cont">  

		
		<?php // echo '<a href="'. get_the_permalink() .'"  rel="nofollow">'; // full 
		// $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
<!--
   <Div class="item-vnutr" style="background-image: url(<?php //  echo $image_url[0]; ?>) "> 
	  --> 
	  
	  <div class="pit_one"> 
				<?php 
				
				// 
				//the_post_thumbnail('large'); // thumbnail/ medium / large вставляем миниатюры
				// the_post_thumbnail('large', array('class' => 'img_singl'));					
				?>
				<a class="stat__link" href="<?php echo get_the_permalink(); ?>"> 
				<article class="art__stat">
					
						<div class="img_pit"> <?php the_post_thumbnail('size600-400', array('class' => ''));	 ?></div>     
				</article>
					
						<h1 class="t-c page-title ast-archive-title">  <?php the_title();  ?></h1>
						</a> 
   	</div>	
			
			
			 

   <Div class="pit_tu"> 
   <p>
			<strong>Имя:</strong> 
			<?php 	
					$cur_terms = get_the_terms( $post->ID, 'dogi_name');
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
					<img src="'.IMG_DIR.'ingrus.png" border="0"></a>'
					;
						}
					} ?>  </p>
          <div class="but_podr">
            <a href="<?php the_permalink( $post->ID );?>" class="but-ii" rel="nofollow">Подробнее</a>
         </div>

   </div>
   
   <!-- <hr> -->

</div>

                      
      <?php
      endwhile; 
      ?>

   </div>

  
      <?php
         } else {
            
            echo '<div class="d_osh"> Питомцы не найдены! </div>';
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



