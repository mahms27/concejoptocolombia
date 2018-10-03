            <div id="content-page" role="main" class="clearfix"> 
                <?php the_breadcrumb(); ?> 
                <p class="subtitulo t1"><?php echo obtenerCampoAdicional("ca_subtitulo"); ?></p>
                <div class="clearfix content-postulaciones efecto3d">
                    <div class="columna-1 descripcion-postulacion t2">
                        <?php while ( have_posts() ) : the_post(); ?> 
                            <?php the_content();?>
                        <?php endwhile; wp_reset_query(); ?>  
                        <div class="formulario">
                            <?php  
                                if(isset($_POST) && count($_POST) > 0 && filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){ 

                                    if($_POST['pais'] == 1) $setPais = 'Chile';
                                    elseif($_POST['pais'] == 2) $setPais = 'Colombia';
                                    elseif($_POST['pais'] == 3) $setPais = 'Perú';


                                    $datos_sitio = datos_sitio();
                                    $admin_email = $datos_sitio['email_rec_curriculum'];     
                                    $asunto =  'Postulación: '.  get_the_title() . ' ' . $setPais;

                                   
                                    
                                    $mensaje = array(
                                        'Nombre' => $_POST['nombre'],
                                        'Correo' => $_POST['correo'],  
                                        'Mensaje' => $_POST['mensaje'],
                                        'Pais' => $setPais
                                    );

                                    $msg = mensaje_contacto($mensaje); 
            
                                    $result = sendMail($_POST['correo'], $admin_email, $_POST['nombre'], $asunto, $msg, $_FILES);                                                
                                } 
                            ?>
                            <h3>Postula a este cargo</h3>     
                            <form method="post" action="" enctype="multipart/form-data" class="form-postulacion formulario-cargo">  
                                <?php if(isset($result)): ?>
                                        <?php if($result == 1): ?>
                                             <div class="okCuadro margenBottom" style="width: 96%; margin: 0px 0px 20px; display: block;">Los datos fueron enviados con exito</div>
                                        <?php else: ?>     
                                             <div class="errorCuadro margenBottom" style="width: 96%; margin: 0px 0px 20px; display: block;">Se produjo un error al enviar la información</div>
                                        <?php endif; ?>                                 
                                <?php endif; ?>
                                <fieldset class="clearfix">
                                    <div class="inputs clearfix" style="">
                                        <label class="t6">Su nombre</label>
                                        <input type="text" name="nombre" value="" class="t2 input-activo" maxlength="80" />
                                    </div>

                                    <div class="inputs clearfix">
                                        <label class="t6 label-correo">Correo electrónico</label>
                                        <input type="text" name="correo" value="" class="t2 input-activo" maxlength="60" />
                                    </div>
                                    <div class="inputs selectPais clearfix">
                                        <label class="t6">País al que postula</label> 
                                        <select id="select-pais" name="pais" class="selectBox">
                                            <option value="1">Chile</option>                        
                                            <option value="2">Colombia</option>
                                            <option value="3">Perú</option>
                                        </select>
                                    </div>
                                </fieldset>  
                                <fieldset class="clearfix">
                                     <div class="inputs clearfix texto-adjuntar">
                                         <label class="t6">Adjuntar documento</label> 
                                         <label class="t2"><span class="archivo">Puedes agergar subir tu currículum, o book de trabajos.</span></label>                        
                                    </div>
                                    <div class="inputs clearfix"> 
                                        <!--<input type="file" class="jfilestyle" data-input="false" name="documento">-->
                                        <input type="file" name="archivo">
                                    </div>                                                            
                                </fieldset>
                                <fieldset class="clearfix">
                                    <div class="textareas">
                                        <label class="t6">¿Quieres agregar algo?</label>
                                        <textarea name="mensaje" rows="10" cols="50" class="t2"></textarea>
                                    </div>
                                </fieldset>
								<fieldset class="clearfix" style="margin-top: 31px;">                                 
                                     <div class="g-recaptcha" data-sitekey="6Le5nwQTAAAAAFqv5Y_LDBtdftoncSXP8IBm8NuO"></div>                                    
                                </fieldset>
                                <fieldset class="clearfix boton-postular">
                                    <input type="submit" value="Postular"/>
                                </fieldset>     
                            </form>  
                        </div>

                    </div>

                    <div class="columna-2 column-destacados">        
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
                                    'cat' => 3,
                                    'posts_per_page' => 5,
                                    'caller_get_posts' => 1);
                                query_posts($args);
                                $sw = 0;
                                $t = 1;
                                while ( have_posts() ) : 
                                    the_post(); 
                                    if($t == 1){
                                      echo '<h3 class="ico-personas">Cargos relacionados</h3>';  
                                      $t = 0;
                                    }
                                    $sw = 1;?>    
                                    <h1><a href="<?php echo get_permalink(); ?> " class="t4"><?php  the_title(); ?></a></h1>
                                    <span class="t2">
                                        <?php echo  obtenerCampoAdicional("ca_subtitulo"); ?>
                                    </span>
                        <?php endwhile; wp_reset_query(); ?>
                        <?php endif; ?>   

                        <?php if($sw == 0) :   ?>
                                <h3 class="ico-personas">Cargos destacados</h3>
                                <?php $popular = new  WP_Query(array(
                                    'post_type' => 'post',                                
                                    'order' => 'ASC',
                                    'cat' => 3,
                                    'meta_query'  => array(
                                        array(
                                            'key' => 'post_destacado',
                                            'value'  => 'Si'  
                                        )
                                    ))
                                );
                                while ($popular->have_posts()) : $popular->the_post(); ?>                
                                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" class="t4"><?php the_title(); ?></a>              
                                    <span class="t2">
                                        <?php echo  obtenerCampoAdicional("ca_subtitulo"); ?>
                                    </span>
                                <?php endwhile; wp_reset_query();?>
                        <?php endif; ?>  
                    </div>    
                </div>
            </div>  
 