            <?php get_header(); ?>    
            <div class="content categorias">                    
                <?php the_breadcrumb(); ?>                                
                <div class="subtitulo t1">                    
                    <?php echo category_description(); ?>
                </div>                
                <div class="clearfix">
                    <div class="cargos clearfix columna-1">
                        <div class="clearfix destacados encabezado-moviles">
                            <div class="encabezado">
                              <span class="enc-imagen border-right icon-encabezado"></span> 
                              <div class="border-left efecto3d clearfix titulo-encabezado">
                                  <a href="<?php echo home_url() . '/form-curriculums/recepcion-de-curriculums' ?>">Recepción de Currículum</a>
                              </div>
                            </div>
                        </div>   
                        <div class="encabezado t5"><span class="border-right cargo">Cargo</span><span class="border-left border-right descripcion">Descripción</span><span class="border-left pais">País</span></div>
                        <div class="detalle clearfix efecto3d"> 
                        <?php 
                            query_posts(array(
                                'cat' => 3,
                                'post__not_in' => array(67)
                                ));
                            if ( have_posts() ) : ?> 
                            <?php $pos = 'par'; ?>
                            <?php while ( have_posts() ) : the_post(); ?>                    
                                <div class="conPost clearfix <?php echo $pos; ?>">
                                    <?php echo '<span class="cargo t4">'; ?>
                                    <span class="t4"><a class="t4" href="<?php echo get_permalink(); ?>"><?php  the_title(); ?></a></span>
                                    <?php echo '</span>'; ?>
                                    <?php echo '<span class="descripcion t2">' . obtenerCampoAdicional("ca_subtitulo") . '</span>'; ?>
                                    <?php $pais = maybe_unserialize(obtenerCampoAdicional("ca_carrera_pais")); ?>
                                    <?php echo '<span class="pais t2">' . $pais[0] . '</span>'; ?>
                                </div>                    
                            <?php if($pos == 'par'){
                                $pos = 'impar';
                            }else{
                                $pos = 'par';
                            }
                            ?>
                            <?php endwhile; wp_reset_query(); ?>            
                        <?php endif; ?> 
                        </div>
                    </div>

                     <div class="clearfix destacados columna-2">
                         
                        <div class="encabezado">
                            <span class="enc-imagen border-right icon-encabezado"></span> 
                            <div class="border-left efecto3d clearfix titulo-encabezado">
                                <a href="<?php echo home_url() . '/form-curriculums/recepcion-de-curriculums' ?>">Recepción de Currículum</a>
                            </div>
                        </div>
                         
                        <!-- DESTACADOS --> 
                        <!-- <div class="detalle clearfix efecto3d">
                            <h3 class="ico-personas">Cargos Destacados</h3>
                            <?php /*
                                query_posts(array(
                                    'post_type' => 'post',                                
                                    'order' => 'ASC',
                                    'cat' => '3',
                                    'meta_query'  => array(
                                        array(
                                            'key' => 'post_destacado',
                                            'value'  => 'Si'  
                                        )
                                    ))
                                );*/
                            ?>
                            <?php //while ( have_posts() ) : the_post(); ?>    
                                  <a href="<?php //echo get_permalink(); ?>" class="t4"><?php  //the_title(); ?></a>
                                  <span class="t2">
                                    <?php //echo  obtenerCampoAdicional("ca_subtitulo"); ?>
                                  </span>
                            <?php //endwhile; wp_reset_query(); ?>
                        </div>
                    </div> ->
                     <!-- //DESTACADOS -->
                    
                    
                </div>                                    
            </div>   
        </div> <!-- contenedor -->
    </div> <!-- main -->
</div><!-- wrap -->
<?php get_footer(); ?>
