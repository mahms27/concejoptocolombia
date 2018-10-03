<?php 
    $class = 'ancho-col_2'; 
    if ( is_active_sidebar( 'sidebar-metodologia' ) ) :  
        get_sidebar('metodologia_right'); 
        $class = 'ancho-col_1'; 
    endif; 
?>
<div class="<?php echo $class; ?> col-right t2 clearfix efecto3d"> 
    <?php while ( have_posts() ) : the_post(); ?>                
        <?php the_content(); ?>
    <?php endwhile; wp_reset_query(); // end of the loop. ?>
    <?php 
        query_posts(array('category__in' => array(5), 'posts_per_page' => 2));
    ?>     
</div> 