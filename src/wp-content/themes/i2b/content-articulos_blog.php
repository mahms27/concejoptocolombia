<?php get_header('blog'); ?>
<div id="content-page" role="main" class="clearfix">   
    <div class="blog-cont">  
        
        <?php $cat = get_the_category(); ?> 
        
        <a href="<?php echo  bloginfo('url') . '/' . $cat[0]->slug; ?>" class="btRojo tag mayus desktop"><span><?php echo $cat[0]->name; ?></span></a>
                
        <h2><?php the_title(); ?></h2>
        <p class="subtitulo t1"><?php echo obtenerCampoAdicional('ca_subtitulo'); ?></p>
        <!-- COMPARTIR EN MOVIL -->
        <div class="compartir clearfix movil">
        
        
                                                                      <?php
if(function_exists('display_social4i'))
echo display_social4i("large","float-right");
?>   
        
            
        </div>
        <!-- //COMPARTIR EN MOVIL -->
        <?php $id = get_the_ID(); ?>    
        <div class="clearfix columnblog grid5 flotar_izq t4 width-columnblog-1">
            <?php while ( have_posts() ) : the_post(); ?>
                    <div class="clearfix publicado t3 ">
                        Publicado hace <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> por <a href="<?php  the_author_meta('user_url'); ?>" target="_black"><span id="autor" class="autor"><?php the_author(); ?></span></a>
                    </div>             
                    <?php the_content(); ?>
            <?php endwhile; wp_reset_query(); ?>   
        </div>

        <div class="flotar_izq clearfix grid6 art-relacionados">
            <!-- COMPARTIR EN DESKTOP -->
            <div class="compartir clearfix desktop tablet">
            
            
               <!-- <div class="flotar_izq">
                   <?php 
                        if(function_exists('display_social4i'))
                         echo display_social4i('large', 'float-right', 's4_twitter');
                    ?>   
       
                </div>  
                <div class="flotar_izq fb-cont">
                    <?php 
                         if(function_exists('display_social4i'))
                             echo display_social4i('large', 'float-right', 's4_fblike');
                    ?>                    
                </div>
                <div class="flotar_izq">  
                    <?php 
                        if(function_exists('display_social4i'))
                         echo display_social4i('large', 'float-right', 's4_linkedin');
                    ?>                    
                </div> -->
                
                                                              <?php
if(function_exists('display_social4i'))
echo display_social4i("large","float-right");
?>        
<!-- Inserta esta etiqueta en la sección "head" o justo antes de la etiqueta "body" de cierre. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'es'}
</script>

            
</div>
            <!-- //COMPATIR EN DESKTOP -->
            
            <!-- BUSCADOR -->
            <div class="buscador desktop tablet">
                <form id="searchform" action="<?php echo bloginfo("url") . '/blog-i2b'; ?>" method="post" role="search"> 
                    <input type="text" id="s" name="s" value="" width="100%" class="buscar" /> 
                </form>    
            </div>
            <!-- //BUSCADOR -->
                        
            <!-- SUSCRIBIR -->
            <div class="suscribirse clearfix">
                <h3>Suscríbase a nuestro Newsletter</h3>
                <form action="http://i2b.us1.list-manage.com/subscribe/post?u=0e2220be0e524fb3cc0407bfe&amp;id=21f942eb63" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="suscribir" target="_blank" novalidate>
                    <fieldset>
                        <label>Correo</label>
                        <input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        <input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="button flotar_der">            
                    </fieldset>
                </form>    
            </div>              
            <!-- //SUSCRIBIR -->
            
            <?php
            $orig_post = $post;
            global $post;
            $tags = wp_get_post_tags($post->ID);
            if ($tags) :
                $tag_ids = array();
                foreach($tags as $individual_tag) 
                    $tag_ids[] = $individual_tag->term_id;

                    $args = array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 2,
                        'caller_get_posts' => 1);
                    query_posts($args);                
                    $t = 1;
                    while ( have_posts() ) : 
                        the_post(); 
                        if($t == 1){
                            echo '<h3>Artículos relacionados</h3>';  
                            $t = 0;
                        }
                        $sw = 1;?>   
                        <div class="fila efecto3d t2 <?php echo $i == 2 ? 'ultimo' : ''; ?>">
                            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="clearfix publicado t3">
                                Hace <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> por <span class="autor"><?php the_author(); ?></span>
                            </div>           
                            <?php the_excerpt();  ?>
                            <a href="<?php echo get_permalink(); ?>" class="t2 ver_mas">Leer más</a>
                        </div>    
                <?php endwhile; wp_reset_query(); ?>
            <?php endif; ?>   
        </div>
    </div> 
</div>
<?php get_footer('blog'); ?>