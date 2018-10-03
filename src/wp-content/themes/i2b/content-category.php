<?php 
    get_header(); 
     if(isset($_GET['pag'])){
        $num_pag = (int)urldecode($_GET['pag']);        
    } else {
        $num_pag = 1;
    }
    
    $args = array(
            'cat' => get_query_var('cat'),    
            'posts_per_page' => 4,
            'paged' => $num_pag,
    );
    
    $the_query = new WP_Query($args);    
?>
<div id="content-page" role="main" class="clearfix">
    <?php the_breadcrumb(); ?> 
    <div class="subtitulo t1">                    
        <?php echo category_description(); ?>
    </div> 
    <div class="grid3 flotar_der categorias">        
        <?php 
            global $wp_query;
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="clearfix fila">
                    <div class="clearfix t2 textoexp grid2">                        
                        <h4 class="efecto3d"><a href="<?php echo get_permalink(); ?>"><?php  the_title(); ?></a></h4>                        
                        <?php the_excerpt(); ?>                        
                    </div>
                    <div class="clearfix publicado t3 flotar_izq">
                        Publicado hace <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> por <span class="autor"><?php the_author(); ?></span>
                    </div> 
                </div>   
        <?php endwhile; wp_reset_query(); ?>
        
        <!-- PAGINADOR PARA MOVIL -->
        <div class="botones">
           <?php wp_pag_blog($the_query, $num_pag); ?>
        </div>
        <!-- //PAGINADOR -->
    </div>    
</div>
<?php get_footer(); ?>