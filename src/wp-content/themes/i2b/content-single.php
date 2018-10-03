<?php get_header(); ?>
<div id="content-page" role="main">
    <?php the_breadcrumb(); ?>      
    <div class="subtitulo t1"><?php echo obtenerCampoAdicional("ca_subtitulo"); ?></div>
    <div class="clearfix">
        <div class="clearfix column-1 t2">
            <?php 
                $class = 'ancho-col_2'; 
                if ( is_active_sidebar( 'sidebar-general' ) ) :  
                    get_sidebar('general_right'); 
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
        </div>
    </div>
</div>      
<?php get_footer(); ?>