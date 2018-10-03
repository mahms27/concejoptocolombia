<?php 
    $class = 'ancho-col_2'; 
    if ( is_active_sidebar( 'sidebar-clientes' ) )  :  
        get_sidebar('clientes_right'); 
        $class = 'ancho-col_1'; 
    endif; 
?>
<div class="<?php echo $class; ?> col-right t2 clearfix" style="margin-right: 0;"> 
    
    <?php while ( have_posts() ) : the_post(); ?>                
        <?php the_content(); ?>
    <?php endwhile; wp_reset_query(); ?>     
</div>