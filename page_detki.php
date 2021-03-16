<?php 
/*
    Template Name: Наши детки
    Template Post Type: post, page, product
*/

//  "Наши детки", 
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


<?php      
    //the_post(); // перебираем посты   
  
           ?>
  <div class="container">
 <div class="comp-wrap">   
 <div class="item-page t-c">
    <?php  the_content();
  //  $cont = get_the_content();
   // wtf($cont);
   /// $gal = get_post_gallery( 411, true );
   // echo $gal;
   get_the_content();
  // echo do_shortcode( '[gallery]' );
    ?>







<!--
<ul>							
							 <?php /*
        $gallery = get_post_gallery_images($post->ID);
        foreach ($gallery as $image) {
            // Loop through each image in each gallery
            $image_list .= '<li><a rel="prettyPhoto[gal]" href=" ' . str_replace('-150x150', '', $image) . ' "><img src="' . str_replace('-150x150', '', $image) . '"  /></li></a>';
        }
        echo $image_list; */
        ?>
								
								<div class="clear"></div>
						</ul>

      -->
      </div>
</div>
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
  <?php // get_sidebar('');
    
?>
	</div><!-- .sidebar-main -->
</div>
<?php
 endif ;

   // dynamic_sidebar('sidebar-top'); //для вызова по ид сайдбар
   //get_sidebar('adres-mag'); // для вызова из фала sidebar-adres-mag.php
  ?>


<?php get_footer(); ?>



