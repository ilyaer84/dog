<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<!--
<link rel="shortcut icon" type="image/png" href="/favicon.jpg"/>
-->
     <?php

// Когда у вас есть ключ, вы можете загрузить объект поля и вывести его значения
/*
$field_key = "field_5f0dd30bb217f"; // ключ
$field = get_field_object($field_key); 
// wtf($field);
// echo '<p>'.$field['label'].'</p>' ; 

if( $field ) { echo '<select id="selectItem" name="' . $field['key'] . '">'; 
   echo '<option value="vibor">Выберите город</option>';
   $i=0;
   foreach( $field['choices'] as $k => $v ) {
   ++$i;
   if( isset($_COOKIE['city']) and $_COOKIE['city'] == $v) {
      echo '<option id="' . $i . '" name="'.$k.'" selected>' . $v . '</option>'; 
      
   } else {
    echo '<option id="' . $i . '" name="'.$k.'">' . $v . '</option>';
    } 
    
   }
   echo '</select>';  
}
*/
?>


<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>

<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
	<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?></a>

	<?php astra_header_before(); ?>
   <?php // get_search_form() ; ?>
	<?php astra_header(); ?>

	<?php astra_header_after(); ?>

	<?php astra_content_before(); ?>

	<div id="content" class="site-content">

		<div class="ast-container">

		<?php astra_content_top(); ?>

      <!--  кнопка вверх  -->

      <button class="but__backToTop">
        <svg viewBox="0 0 8 11" class="App__backToTopIcon----3FHO" width="8" height="11">
        <path d="M0 3.99h3V11h2V3.99h3L4 0 0 3.99z"></path></svg></button>
