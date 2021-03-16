
<?php get_header(); // типо include header.php 
 // the_post(); // the_post - функция которая все функции глобально перенастраивать с одного поста на другой

?>
<div class="body_ind">

<?php if(have_posts()): // все начинается глобальной функции have_post() без аргументов
                // синтаксис : endif; тоже чтои {}
                ?> 

                 <?php while(have_posts()):  the_post(); // перебираем посты
                 ?> 
                    <article class="posyItem">
                    
					<a href="<?php the_permalink();  // ссылка правильная
                        ?>">
                            <?php the_post_thumbnail('medium'); // вставляем миниатюры
                            ?>
                        </a>

                        <h2> <?php the_title();  ?>  </h2>
                        <!-- выведем короткое описание разными способами  -->
                            <div>
                                <?php // the_content(); по метки more - далее 
                                 the_excerpt();
                               // echo get_field('intro');  // 3_2 короткое описание с помощью доп поля и плагин Advanced Custom Fields
                                ?>
                            </div>

                            <span> Автор: <?=get_the_author(); 
                            ?> </span>
                            <br>

                            <span>  <?=get_the_date(); //   
                            //the_date(); или php echo get_the_date();
                            ?> </span>

                        <div>
                            <?php
                                $cats = get_the_category();  // берем данных в массив
                                // print_r($cats);
                                // echo $cats[0]->name;
                            //    $cat_link = get_category_link($category_id);
                            ?>
                            Категория:
                            <a href="<?php echo get_category_link($cats[0]->term_id); ?>">
                                <?php  echo $cats[0]->name; ?>
                            </a>
                        </div>
                       
                    </article>
                 <?php  endwhile; ?>

            <?php  endif; ?>  
               
                <div class="pagination">
                
                <?php the_posts_pagination([
                    'show_all'     => false, // показаны все страницы участвующие в пагинации
                    'end_size'     => 1,     // количество страниц на концах
                    'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => 'Назад',
                    'next_text'    => 'Вперед',
                    'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                    'screen_reader_text' => __( 'Posts navigation' ),
                ]); ?>
                </div>
            
                <?php // dynamic_sidebar(); //для вызова по ид сайдбар
                    get_sidebar();  // для вызова из фала sidebar.php

                ?>  
</div>


<?php get_footer(); ?>			