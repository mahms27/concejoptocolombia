<div id="content-page" role="main" class="clearfix">   
    <?php the_breadcrumb(); ?> 
    <p class="subtitulo t1"><?php echo obtenerCampoAdicional("ca_subtitulo"); ?></p>
    <?php  
        if(isset($_POST) && count($_POST) > 0 && filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){             
            $datos_sitio = datos_sitio();
            $admin_email = $datos_sitio['email_rec_curriculum'];
            $asunto =  'Postulación';
            
            $mensaje = array(
                'Nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'],  
                'Mensaje' => $_POST['mensaje']
            );

            $msg = mensaje_contacto($mensaje); 
            
            
            $result = sendMail($_POST['correo'], $admin_email, $_POST['nombre'], $asunto, $msg, $_FILES);                    
        } 
    ?>
    <div class="columna-1 col-postulaciones">
        <div class="formulario"> 
            <form method="post" action="" enctype="multipart/form-data" class="postular formulario-cargo">
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
                        <input type="text" name="nombre" value="" class="inputBox t2 input-activo" maxlength="80" />                    
                    </div>
                    <div class="inputs clearfix">
                        <label class="t6">Correo electrónico</label>
                        <input type="text" name="correo" value="" class="inputBox t2 input-activo" maxlength="60" />
                    </div>
                </fieldset>  
                <fieldset class="clearfix">
                    <div class="inputs clearfix" style="">
                        <label class="t6">Profesión</label>
                        <select id="select-profesion" name="profesion" class="selectBox">
                            <option value="1">Profesion</option>
                        </select>
                    </div>
                    <div class="inputs clearfix">
                        <label class="t6">País al que postula</label> 
                        <select id="select-pais" name="pais" class="selectBox">
                            <option value="1">Chile</option>                        
                            <option value="2">Colombia</option>
                            <option value="3">Perú</option>
                        </select>
                    </div>
                </fieldset> 
                <fieldset class="clearfix">
                    <div class="inputs clearfix" style="">
                        <label class="t6">Adjuntar documento</label> 
                        <label class="t2"><span class="archivo">Puedes agergar subir tu currículum, o book de trabajos.</span></label>                        
                   </div>
                   <div class="inputs clearfix"> 
                       <input type="file" class="jfilestyle" data-input="false" name="archivo" />
                   </div>                                                            
               </fieldset>
               <fieldset class="clearfix">
                   <div class="textareas">
                       <label class="t6">¿Quieres agregar algo?</label>
                       <textarea name="mensaje" rows="10" cols="50" class="t2"></textarea>
                   </div>
               </fieldset>
               <fieldset class="clearfix boton-postular">
                   <input type="submit" value="Postular"/>
               </fieldset> 
            </form>
        </div>
    </div>
    <div class="columna-2 column-destacados">
        <div class="clearfix destacados ">               
            <div class="detalle clearfix efecto3d">
                <h3 class="ico-personas">Cargos Destacados</h3>
                <?php 
                    query_posts(array(
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
                 ?>
                <?php while ( have_posts() ) : the_post(); ?>    
                      <a href="<?php echo get_permalink(); ?>" class="t4"><?php  the_title(); ?></a>
                      <span class="t2">
                        <?php echo obtenerCampoAdicional("ca_subtitulo"); ?>
                      </span>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div> 
    </div> 
</div>