<?php 
    /**
     * PAGINA PRINCIPAL DEL BLOG
     */

    get_header('blog'); 
    $sw = 0;
    if(isset($_GET['pag'])){
        $num_pag = (int)urldecode($_GET['pag']);        
    } else {
        $num_pag = 1;
    }
    
    if(!isset($_POST['s'])) {        
        $args = array(
            'cat' => get_query_var('cat'),    
            'posts_per_page' => 4,
            'paged' => $num_pag
        );       
    } else{
        $args = array(
            'cat' => get_query_var('cat'),    
            'posts_per_page' => 4,
            'paged' => $num_pag,
            's' => $_POST['s']
        );
    }        
    
    $the_query = new WP_Query($args);
 ?>
        <div id="content-page" role="main" class="clearfix">
                <div class="grid3 flotar_der cont-blog">        
                    <?php            
                        global $wp_query;
                        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>        
                            <?php $cat = get_the_category();?>                                                   
                            <div class="clearfix fila <?php echo ID_POST_DES == get_the_ID() ? ' movil' : '' ?>">                      
                                <div class='clearfix flotar_der imagen'>
                                    <a href="<?php echo bloginfo('url') . '/' . $cat[0]->slug; ?>" class="btRojo tag"><span><?php echo $cat[0]->name; ?></span></a>
                                    <h4 class="movil"><a href="<?php echo get_permalink(); ?>"><?php  the_title(); ?></a></h4> 
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php echo get_the_post_thumbnail($the_query->post->ID, 'img-contenido-home-blog'); ?>
                                    </a>
                                </div>
                                <div class="clearfix t2 textoexp grid2">
                                    <a href="<?php echo bloginfo('url') . '/' . $cat[0]->slug; ?>" class="btRojo tag desktop tablet"><span><?php echo $cat[0]->name; ?></span></a>
                                    <h4 class="desktop tablet efecto3d"><a href="<?php echo get_permalink(); ?>"><?php  the_title(); ?></a></h4>                        
                                    <?php the_excerpt(); ?>                        
                                </div>
                                <div class="clearfix" style="width: 100%">
                                    <div class="clearfix publicado t3 flotar_izq">
                                        Publicado hace <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> por <a href="<?php  the_author_meta('user_url'); ?>" target="_black"><span class="autor"><?php the_author(); ?></span></a>
                                    </div> 
                                    <!-- <div class="compartir clearfix flotar_der phome-blog">
                                        <div class="flotar_izq tw">
                                            <?php  //if(function_exists('display_social4i')) echo display_social4i('large', 'float-right', 's4_twitter');?> 
                                        </div>
                                        <div class="flotar_izq fb">
                                            <?php //if(function_exists('display_social4i')) echo display_social4i('large', 'float-right', 's4_fblike'); ?>                                                                                       
                                        </div>
                                        <div class="flotar_izq">
                                            <?php  // if(function_exists('display_social4i')) echo display_social4i('large', 'float-right', 's4_linkedin'); ?>
                                        </div>
                                    </div> -->
                                </div>    
                            </div>   
                            <?php $sw = 1; ?>       
                    <?php endwhile; wp_reset_query(); ?>

                    <?php if($sw == 1 ): ?>
                        <!-- PAGINADOR DESKTOP-->  
                        <div class="botones desktop">
                            <?php wp_pag_blog($the_query, $num_pag); ?>            
                        </div>    
                        <!-- //PAGINADOR -->
                    <?php else: ?>    
                        <?php if(isset($_POST['s'])) : ?>
                            <span class="no_encontrado desktop">No se han encontrado resultados a su búsqueda</span>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="destacados-blog grid1 flotar_der">              
                    <?php get_sidebar('blog_left'); ?>
                    <!-- PAGINADOR PARA MOVIL -->
                    <div class="botones movil">
                       <?php wp_pag_blog($the_query, $num_pag); ?>
                    </div>
                    <!-- //PAGINADOR -->   
                </div>        
            </div>
<?php get_footer('blog'); ?>