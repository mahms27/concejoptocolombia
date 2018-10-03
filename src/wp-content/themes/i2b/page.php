<?php get_header(); ?>    
            <div id="content-page" role="main">

                <?php the_breadcrumb(); ?>      

                <div class="subtitulo t1"><?php echo obtenerCampoAdicional("paginas_subtitulos"); ?></div>
                <div class="clearfix">
                    <div class="clearfix column-1 t2">

                        <?php                  
                        $id = get_the_ID();?>
                        <?php
                        if($id == 92){
                            get_template_part('content', 'contacto' );                                                
                        } else if($id == 33) { // PAGINA NUESTRA EMPRESA                   
                            get_template_part('content', 'nuestra_empresa' );  
                        } else if($id == 29) { // PAGINA QUE HACEMOS                     
                            get_template_part('content', 'que_hacemos' );  
                        } else if($id == 35) { // PAGINA METODOLOGIA
                            get_template_part('content', 'metodologia' );
                        } else if($id == 37) { // PAGINA CLIENTE
                            get_template_part('content', 'clientes' );                    
                        } else { // PARA OTRAS PAGINAS DE CONTENIDO
                            get_template_part('content', 'page' );   
                        }?>                    
                    </div>
                </div>
            </div>        
<?php get_footer(); ?>
