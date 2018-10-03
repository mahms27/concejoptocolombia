            <?php get_header(); ?>
             <div class="clearfix contenido-home">
                <div class="contenedor-marcas">
                    <div class="marcas clearfix">
                        <h3>Nuestros Clientes</h3>
                        <div class="grupo-marcas">           
                        </div>  
                    </div>
                </div>
                <div class="contenido clearfix efecto3d">
                    <div class="row-1 clearfix">        
                        <div class="grafico-metodologia clearfix">
                            <h2>Centrados en su problema de negocio</h2>                        
                            <img src="<?php bloginfo('template_url') ?>/img/desktop/contenido/modelo_i2b.gif" alt="Modelo I2B" />
                        </div>
                        <div class="eventos clearfix">
                            <h3 class="ico-personas">Vacantes</h3>
                            <div class="contenedorVacantes_CO24062014">
                                <?php 
                                    query_posts(array(
                                        'cat' => 1,
                                        'posts_per_page' => 3,
                                        'post__not_in' => array(67)
                                    ));
                                    $i = 1;
                                    if ( have_posts() ) :                 
                                        while ( have_posts() ) : 
                                            the_post();?>                        
                                            <h1 class="<?php echo $i == 3 ? ' ultimo': ''; ?>"><a href="<?php echo get_permalink(); ?> " class="t4"><?php  the_title(); ?></a></h1>                        
                                            <span class="t2 <?php echo $i == 3 ? ' ultimo': ''; ?>">
                                                <?php echo  obtenerCampoAdicional("ca_subtitulo"); ?>
                                            </span>                        
                                           <?php  $i++; ?>
                                        <?php endwhile; wp_reset_query(); ?>            
                                <?php endif; ?>    
                            </div>                         
                                <div class="clearfix ver-mas" style="margin-top: 19px;"><div class="ver-eventos"></div><a href="<?php echo esc_url( home_url( '/category/carreras' ) ); ?> ">Ver todos</a></div>
                        </div>
                    </div>     
                    <div class="row-2 clearfix">
                        <div class="noticias clearfix">
                            <h2>I2B Inteligencia</h2>
                            <?php query_posts('cat=11&posts_per_page=3' );
                            $i = 1;
                            while ( have_posts() ) : the_post(); ?>      
                                <div class="clearfix news t2 <?php echo $i == 3 ? 'ultimo' : ''; ?>">
                                    <h2><a class="post-destacado-home" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>   
                                     <a href="<?php echo get_permalink(); ?>">
                                        <?php echo get_the_post_thumbnail($the_query->post->ID, 'img-contenido-home-blog'); ?>
                                    </a>                 
                                    <?php 
                                         the_excerpt(); ?>
                                        <a href="<?php echo get_permalink(); ?>" class="leermas">Ver más</a> 
                                        <?php $i++; ?>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>          
                        </div>                
                    </div>
                    <div class="eventos-movil clearfix">
                        <h3 class="ico-personas">Vacantes</h3>
                        <?php 
                            query_posts(array(
                                'cat' => 10,
                                'posts_per_page' => 3
                            ));
                            $i = 1;
                            if ( have_posts() ) :                 
                                while ( have_posts() ) : 
                                    the_post();?>                        
                                    <h1 class="<?php echo $i == 3 ? ' ultimo': ''; ?>"><a href="<?php echo get_permalink(); ?> " class="t4"><?php  the_title(); ?></a></h1>                        
                                    <span class="t2 <?php echo $i == 3 ? ' ultimo': ''; ?>">
                                        <?php echo  obtenerCampoAdicional("ca_subtitulo"); ?>
                                    </span>                        
                                   <?php  $i++; ?>
                                <?php endwhile; wp_reset_query(); ?>            
                        <?php endif; ?>                    
                            <div class="clearfix ver-mas"><div class="ver-eventos"></div><a href="<?php echo esc_url( home_url( '/category/carreras' ) ); ?> ">Ver todos</a></div>
                    </div>
                    <div class="certificados clearfix">
                        <h2>Alianzas y Certificaciones</h2>
                        <div class="certificaciones">
                            <div class="contenedorCert">
                                <div class="cert1 certGeneral"></div>
                            </div>
                            <div class="contenedorCert">
                                <div class="cert2 certGeneral"></div>
                            </div>
                            <div class="contenedorCert">
                                <div class="cert3 certGeneral"></div>
                            </div>
                            <div class="contenedorCert">
                                <div class="cert8 certGeneral"></div>
                            </div>
                            <div class="contenedorCert" style="display: none;">
                                <div class="cert4 certGeneral"></div>
                            </div>
                            <div class="contenedorCert">
                                <div class="cert5 certGeneral"></div>
                            </div>
                            <div class="contenedorCert">
                                <div class="cert6 certGeneral"></div>
                            </div>
                            <div class="contenedorCert">
                                <div class="cert7 certGeneral"></div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>