 <?php $class = 'ancho-col_2'; 
       if ( is_active_sidebar( 'sidebar-nuestra_emp_right' ) ) :  
           // get_sidebar('nuestra_emp_right');  
           $class = 'ancho-col_1'; 
       endif; 
 ?>
<div class="<?php echo $class; ?> col-right t2 clearfix efecto3d"> 
    <?php while ( have_posts() ) : the_post(); ?>                
        <?php the_content(); ?>
    <?php endwhile; wp_reset_query(); // end of the loop. ?>
    <?php 
       // query_posts(array('category__in' => array(5), 'posts_per_page' => 2));
       // $count = 1;
       // $class = 'margin-right';
    ?>
    <?php /*while ( have_posts() ) : 
            if($count == 1) echo '<div class="nuestra-empresa clearfix">';
            echo '<div class="temas-nuestra-empresa t2 clearfix ' . $class .' ">';
            the_post();
            the_excerpt(); ?>
            <a href="<?php echo get_permalink(); ?>">Ver más</a> 
            <?php echo '</div>'; ?>
            <?php if($count == 2) echo '</div>'; $count++; 
            if($count > 2) $count = 1;
            if($count == 1)
                $class = 'margin-right';
            else 
                $class = '';
        endwhile; wp_reset_query(); */
    ?>
    <div id="contenedorImg_empresaBottom">   
     <?php contentEmpresas(); ?>
   </div>
</div>
<?php $class = 'ancho-col_2'; 
       if ( is_active_sidebar( 'sidebar-nuestra_emp_right' ) ) :  
           get_sidebar('nuestra_emp_right');  
           $class = 'ancho-col_1'; 
       endif; 
 ?>