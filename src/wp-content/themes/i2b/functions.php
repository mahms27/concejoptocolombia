<?php
    require_once get_template_directory() . '/includes/registry.class.php';
    /**
     *  Elimina barra de herramientas en el sitio
     * @return boolean
     */
    function elimina_barra_administracion(){
        return false;
    } 
    add_filter( 'show_admin_bar' , 'elimina_barra_administracion');
    
    /**
     * Elimina checkbox en el administrador que activa/desactiva
     * la barra de herramientas en el sitio
     */
    function quitar_preferencias_barra_admin() { ?>
        <style type="text/css">
            .show-admin-bar { display: none; }
        </style><?php 
    } 
    add_action( 'admin_print_scripts-profile.php', 'quitar_preferencias_barra_admin' );
    
    /**
     * Registro de sidebar
     */
    if (function_exists('register_sidebar')) {
                               
       //certificaciones
       register_sidebar(array(  
            'name' => 'Certificaciones',  
            'id'   => 'sidebar-certificaciones',  
            'description'   => 'Certificaciones',  
            'before_widget' => '<div class="certificaciones">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h2>',  
            'after_title'   => '</h2>'  
       ));
                                
       //Contacto right
       register_sidebar(array(  
            'name' => 'Columna derecha nuestra empresa',  
            'id'   => 'sidebar-nuestra_emp_right',  
            'description'   => 'Columna de la derecha de nuestra empresa',  
            'before_widget' => '<div class="clearfix">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h3>',  
            'after_title'   => '</h3>'  
       ));
       
       //Contacto right
       register_sidebar(array(  
            'name' => 'Columna derecha del blog',  
            'id'   => 'sidebar-blog_right',  
            'description'   => 'Columna de la derecha del blog',  
            'before_widget' => '<div class="clearfix">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h3>',  
            'after_title'   => '</h3>'  
       ));
       
       //Contacto que hacemos
       register_sidebar(array(  
            'name' => 'Columna derecha pagina que hacemos',  
            'id'   => 'sidebar-que_hacemos_right',  
            'description'   => 'Columna derecha pagina que hacemos',  
            'before_widget' => '<div class="clearfix">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h3>',  
            'after_title'   => '</h3>'  
       ));
       
       
       //Grafico metodologia
        register_sidebar(array(  
            'name' => 'Columna derecha pagina metodologia',  
            'id'   => 'sidebar-metodologia',  
            'description'   => 'Columna derecha pagina que metodologia',  
            'before_widget' => '<div class="metodologia">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h3>',  
            'after_title'   => '</h3>'  
       ));
        
       //Grafico metodologia
       register_sidebar(array(  
            'name' => 'Columna derecha pagina clientes',  
            'id'   => 'sidebar-clientes',  
            'description'   => 'Columna derecha pagina que clientes',  
            'before_widget' => '<div class="clientes">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h3>',  
            'after_title'   => '</h3>'  
       ));
       
       //Grafico general para los demas post 
       register_sidebar(array(  
            'name' => 'Columna derecha para los demas post',  
            'id'   => 'sidebar-general',  
            'description'   => 'Columna derecha para los post que no son por defecto',  
            'before_widget' => '<div class="generales">',  
            'after_widget'  => '</div>',  
            'before_title'  => '<h3>',  
            'after_title'   => '</h3>'  
       ));
    }
    
    //Registro de menus
    register_nav_menus( array(
        'menu-principal' => 'Menú principal',
        'menus_404' => 'Menús 404'
    ));
        
    /**
     * Camino de migas
     * @param boolean $categoria si es true visualiza el nombre de la categoria en el camino de migas
     */
    function the_breadcrumb($categoria = false) 
    {                
       echo '<div class="breadcrumb efecto3d t6">';
       $breadcrumb = array();       
       echo '<a href="' . get_option('home') . '" class="breadcrumb_red t3"> Inicio </a>';
       if (is_category() || is_single()) {              
            $categories = get_the_category();            
            if(count($categories) > 0){ 
                $arr['name'] = $categories[0]->name;
                $arr['link'] = get_category_link($categories[0]->cat_ID);                        
                $breadcrumb[] =  $arr;
            }    
            
            if (is_single()) {              
                $post = get_post();      
                $arr['name'] = $post->post_title;
                $arr['link'] = get_permalink($post->ID);
                $breadcrumb[] =  $arr;
            }            
        } elseif (is_page()) { 
            $post = get_post();
            $arr['name'] = $post->post_title;
            $arr['link'] = get_permalink($post->ID);
            $breadcrumb[] =  $arr;            
        }
        $i = 1;
        foreach ($breadcrumb as $value) {
            if($i < count($breadcrumb))
                echo ' | ' . '<a href="'. $value['link'] . '" class="breadcrumb_red t3">' . $value['name'] . '</a>';
            else                
                echo ' | ' . $value['name'];
            
            $i++;
        }
        echo '</div>';
    }
    
    /**
     * Retorna un arreglo con nombres de imagenes aleatorias 
     * @return array
     */ 
    function imagen_header_aleatoria($tipo)
    {   
        $imagenes = array();
        $result = array();
        
        if($tipo == 'desktop'){
        //Imagen aleatoria desktop
        $imagenes = leer_imagenes(get_template_directory() . '/img/desktop/header/foto_cover');
        shuffle($imagenes);
        $result = $imagenes[array_rand($imagenes, 1)];
        } elseif($tipo == 'tablet') {
            $imagenes = leer_imagenes(get_template_directory() . '/img/tablet/header/foto_cover');
            shuffle($imagenes);
            $result = $imagenes[array_rand($imagenes, 1)];
        } elseif($tipo == 'movil') {            
            $imagenes = leer_imagenes(get_template_directory() . '/img/movil/header/foto_cover');
            shuffle($imagenes);
            $result = $imagenes[array_rand($imagenes, 1)];
        }
        unset($imagenes);
        
        return $result;
    } 
    
    /**
     * Retorna la imagen para el header Desktop
     * @return string nombre del archivo de imagen
     */
    function imagen_desktop()
    {
        $imagen = get_All_imagenes_foto_Cover('desktop');        
        if(count($imagen) > 0){
            $imagen = $imagen[array_rand($imagen, 1)];        
        } else {            
            $imagen['ruta'] = get_template_directory_uri() . '/img/desktop/header/foto_cover/' . imagen_header_aleatoria('desktop');
        }
        return $imagen;
    }
    
    /**
     * Retorna la imagen para el header tablet
     * @return string nombre del archivo de imagen
     */
    function imagen_tablet()
    {
        $imagen = get_All_imagenes_foto_Cover('tablet');
        if(count($imagen) > 0){
            $imagen = $imagen[array_rand($imagen, 1)];        
        } else {            
            $imagen['ruta'] = get_template_directory_uri() . '/img/tablet/header/foto_cover/' . imagen_header_aleatoria('tablet');
        }
        return $imagen;
    }
    
    /**
     * Retorna la imagen para el header movil
     * @return string nombre del archivo de imagen
     */
    function imagen_movil()
    {
        $imagen = get_All_imagenes_foto_Cover('movil');
        $imagen = $imagen[array_rand($imagen, 1)];        
        return $imagen;
    }
    
    /**
     * Retorna los nombres de todas las imagenes que estan en un directorio 
     * especifico
     * @param string $ruta Directorio de imagenes
     * @return array arreglo con nombre de las imagenes
     */
    function leer_imagenes($ruta)
    {
        $imagenes = array();
        $directorio = opendir($ruta);
        while ($archivo = readdir($directorio))
        {
            if (!is_dir($archivo))
            {
               $imagenes[] = $archivo;               
            }
        }
        return $imagenes;
    }
    
    /**
     * Retorna las imagenes de marcas desktop
     * @return array nombre de las imagenes
     */
    function imagen_marcas_desktop()
    {
        $imagen = get_All_imagenes_marcas('desktop', true);
        $arr = array();
        foreach ($imagen as $value){
            $arr[] = $value;            
        }
        return $arr;
    }
    
    /**
     * Retorna las imagenes de marcas tablet
     * @return array nombre de las imagenes
     */
    function imagen_marcas_tablet()
    {
        $imagen = get_All_imagenes_marcas('tablet', true);
        $arr = array();
        foreach ($imagen as $value){
            $arr[] = $value;            
        }
        return $arr;
    }
    
    /**
     * Retorna las imagenes de marcas movil
     * @return array nombre de las imagenes
     */
    function imagen_marcas_movil()
    {
        $imagen = get_All_imagenes_marcas('movil', true);
        $arr = array();
        foreach ($imagen as $value){
            $arr[] = $value;            
        }
        return $arr;
    }
    
    /**
     * Retorna el contenido de un campo adicional creado con magic fields
     * @param string $campoAdicional
     * @return string
     */
    function obtenerCampoAdicional($campoAdicional)
    {
        $campo = get_post_custom_values($campoAdicional);
        if ($campo == !NULL){
            return $campo[0];
        }
    }
    
    /**
    * Envia correos electronicos
    *
    * @param string $emailDe email de quien envia
    * @param string $emailPara email a quien se envia
    * @param string $nombre nombre del remitente
    * @param string $asunto Asunto del correo
    * @param string $mensaje Mensaje del correo
    * @param string $archivo_adjunto archivo adjunto
    * @param string $emailCC copia oculta
    * @return int 1 se se envio el correo correctamente de lo contrario 0
    */
    function sendMail($emailDe, $emailPara, $nombre, $asunto, $mensaje, $archivo_adjunto = false, $emailCc = false)
    {
       require_once get_template_directory() . '/includes/lib/phpmailer/class.phpmailer.php';

       ini_set('memory_limit','1024M');
       set_time_limit(50000);       
       $result = 0;  
       if($archivo_adjunto != false){
            $varname = $archivo_adjunto['archivo']['name'];        
            $vartemp = $archivo_adjunto['archivo']['tmp_name'];
       } 
       
       if (!empty($emailDe) && !empty($asunto) && !empty($mensaje)) {
           $mail = new PHPMailer();
           $mail->IsSMTP();
           $mail->Port = '465';
           $mail->Host = 'smtp.gmail.com';
           $mail->Username = 'sitio@i2btech.com';
           $mail->Password = 'hD1gt3vv';
           $mail->SMTPAuth = true;
           $mail->SMTPSecure = 'ssl';
           $mail->CharSet = 'UTF-8';
           $mail->From = $emailDe;
           $mail->FromName = $nombre;
           $mail->IsHTML(true);
           $mail->Subject = $asunto;
           $mail->AltBody = $mensaje;
           $mail->AddAddress($emailPara, '');
           $mail->Body = $mensaje;
           
           if($archivo_adjunto != false){
            if ($varname != '') 
                 $mail->AddAttachment($vartemp, $varname);            
           }

           if ($emailCc)
               $mail->AddAddress($emailCc, '');

           if(!$mail->Send()) {
               $result = 0;
           } else {
               $result = 1;
           }
       }

       ini_set('memory_limit', '128M');
       set_time_limit(30);

       return $result;
    }
    
    //Tamaño de la imagen de la categoria en el header
    //Imagen del header de la pagina principal del home
    add_image_size( 'img-header-home-blog', 360, 196, true );
    //Imagenes que aparecen en la descripcion del blog en la pagina principal
    add_image_size( 'img-contenido-home-blog', 250, 138, true );
    //Imagen que aparece en el header de las paginas de contenido del blog
    add_image_size( 'img-header-contenido-blog', 1260, 337, true );
     //Imagen que aparece en el carrusel del home
    add_image_size( 'config_img', 1440, 264, true );
        
    //add_image_size( 'post-header-blog', 638, 274 );
    add_theme_support('post-thumbnails');
    
    /**
     * Imagenes para el foto cover segun la pagina cargada
     * @return array
     */
    function imagenes_foto_cover()
    {
        global $post;
        $cat = get_the_category();
		$idCategoria = $cat[0]->cat_ID;
        $id_post_pag = get_the_ID();
        $img = array(           
            'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/home.png',
            'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/home.png',
            'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/home.png'
        );   
        if(is_home()){
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/home.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/home.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/home.png'
            );            
        } elseif(is_category(3) || $idCategoria == 3){ //Si es la categoria carrera
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/carreras.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/carreras.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/carreras.png'
            );
        } else if($id_post_pag == 29 || in_category(14,$post->ID)){ // Si es la pagina que hacemos
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/quehacemos.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/quehacemos.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/quehacemos.png'
            );
        } else if($id_post_pag == 35) { // Si es la pagina metodologia
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/metodologia.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/metodologia.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/metodologia.png'
            );
        } else if($id_post_pag == 33) { // Si es la pagina nuestra empresa
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/empresa.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/empresa.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/empresa.png'
            );
        }else if($id_post_pag == 37) { // Si es la pagina clientes
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/clientes.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/clientes.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/clientes.png'
            );
        }else if($id_post_pag == 92) { // Si es la pagina de contactos
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/contacto.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/contacto.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/contacto.png'
            );
        }else if(is_404()){
            $img = array(           
                'desktop' => get_template_directory_uri() . '/img/desktop/header/foto_cover/404.png',
                'tablet' => get_template_directory_uri() . '/img/tablet/header/foto_cover/404.png',
                'movil' => get_template_directory_uri() . '/img/movil/header/foto_cover/404.png'
            );
        }
        return $img;
    }
    
    /**
     * Crea un mensaje
     * @param array $data
     * @return string
     */
    function mensaje_contacto($data){
        $msg = '';
        foreach ($data as $key => $value) {
            $msg .= '<strong>'.$key.'</strong>' . ': ' . $value . '<br /><br />';
        }   
        return $msg;
    }
    
    /**
     * Retorna los post de la categoria servicio consultado en la página de que hacemos
     */
    function pagina_servicios() 
    {         
        $post = get_post($_POST['id']);
        $post->thumbnail = get_the_post_thumbnail($_POST['id']);                        
        echo json_encode($post);        
        die();        
    }
    add_action( 'wp_ajax_pagina_servicios', 'pagina_servicios' );

    /**
    * Obtiene los datos del sitio como la direccion de las oficinas
    * de cada pais
    */
    function datos_sitio() {
        $result = wp_cache_get('datos_sitio');
        if (false === $result) {        
            query_posts('post_type=datos_del_sitio&posts_per_page=1');
            if (have_posts()) {
                the_post();
                $result = array(
                    'direccion_chile' => get('direccion_chile'),
                    'direccion_colombia' => get('direccion_colombia'),
                    'direccion_peru' => get('direccion_peru'),
                    'telefono_chile' => get('telefono_chile'),
                    'telefono_colombia' => get('telefono_colombia'),
                    'telefono_peru' => get('telefono_peru'),
                    'email_de_contacto' => get('email_de_contacto'),
                    'email_rec_curriculum' => get('email_rec_curriculum')
                );

                wp_cache_set('datos_sitio', $result);
                wp_reset_query();	
            }
        }	
        return $result;
    }
    
    function carrusel_fotoCover() {                        
                 $element = get_group('configuracion_img_carrusel_home', 1070);
                 foreach($element as $elements): ?>
                    <div class="contenedorCarrusel_inner">                            
                        <?php $url = isset($elements['config_url_img'][1]) && $elements['config_url_img'][1] != '' ? $elements['config_url_img'][1] : '' ?>
                       <a href="<?php echo $url; ?>"></a>
                       <img class="imgHomeCarrusel desktop" src="<?php echo $elements['config_img'][1]['original']; ?> " alt="" />                                            
                       <img class="imgHomeCarrusel tablet" src="<?php echo $elements['config_imagen_tablet'][1]['original']; ?> " alt="" />                   
                       <img class="imgHomeCarrusel movil" src="<?php echo $elements['config_imagen_movil'][1]['original']; ?> " alt="" />                        
                    </div>
                <?php endforeach; ?>
          <?php 
    }

    function contentEmpresas(){
        query_posts('post_type=img_fondo_empresa&posts_per_page=1');
            if (have_posts()) {
                 $elementEmp = get_group('empresa_paises', 1144);

                 foreach($elementEmp as $elementEmps):?>
                 
                    <div class="img_empresaBottom">
                        <a rel="example_group" href="<?php echo $elementEmps['empresa_paises_img'][1]['original'] ?> ">
                            <img class="imgEmpresa" src="<?php echo $elementEmps['img_paises_thumbnail'][1]['original'] ?> " alt="" />
                        </a> 
                        <div class="textEmpresa">
                            <?php echo $elementEmps['empresa_paises_text'][1] ?>
                        </div>
                    </div> 
                              
                
                    <?php endforeach;?>
          <?php }
          wp_reset_query();
        return $result;
    }

    function sideBarEmpresas(){
        query_posts('post_type=sidebar_dir_emp&posts_per_page=1');
            if (have_posts()) {
                 $elementsideBarEmp = get_group('directorio_empresa', 1139);
                    // echo print_r($elementsideBarEmp);
                    ?>
                        <div class="tituloDirectorio"> 
                            <h3>Equipo</h3>
                        </div>
                    <?php
                 foreach($elementsideBarEmp as $elementsideBarEmps):?>


                 
                    <div class="contenedorDirector">
                        <img class="imgDirector " src="<?php echo $elementsideBarEmps['img_director_emp'][1]['original'] ?> " alt="I2B Directores" />
                        <div class="detalleDirector">
                            <h3><?php echo $elementsideBarEmps['nom_director'][1] ?></h3>
                            <span><?php echo $elementsideBarEmps['cargo_director'][1] ?></span>
                            <p><?php echo $elementsideBarEmps['desc_director'][1] ?></p>
                            <div class="cont_RS_directores">
                               <!--  <a class="dir_tw" href="<?php echo $elementsideBarEmps['url_twitter'][1]?> ">
                                    
                                </a> -->
                                <a target="_blank" class="dir_li" href="<?php echo $elementsideBarEmps['url_linkedin'][1]?> ">
                                    
                                </a>
                                
                            </div>
                        </div>
                    </div>        
                
                    <?php endforeach;?>
          <?php }
          wp_reset_query();
        return $result;
    }
    
    function categorias_post($idcategoria)
    {
        $args = array(
            'category' => $idcategoria,
            'orderby' => 'post_date',
            'order' => 'DESC', 
            'posts_per_page' => -1,            
            'meta_query'  => array(                
                array(
                    'key' => 'post_destacado',                 
                    'value'  => 'Si'
                ),
                'relation' => 'OR',
                array(
                    'key' =>  'post_destacado',
                    'compare' => 'NOT EXISTS',
                    'value' => ''
                )
            )
        );

        $posts_array = get_posts( $args );
        $arr = array();
        $categoria = array();
        $ids = array();

        foreach ($posts_array as $value) {
            $arr = get_the_category($value->ID);
            $clave = array_search($arr[0]->term_id, $ids);                        
            if($clave === false){
                $categoria[] = array(
                   'term_id' => $arr[0]->term_id,
                   'name' => $arr[0]->name,
                   'slug' => $arr[0]->slug,
                   'post' => $value     
                );
                $ids[] = $arr[0]->term_id;
            }            
        }
        $resul['categorias'] = $categoria;        
                
        return $resul;
        
    }
    
    function pa_category_top_parent_id ($catid) { 
        while ($catid) {
            $cat = get_category($catid);
            $catid = $cat->category_parent;
            $catParent = $cat->cat_ID;
        }
       return $catParent;
    }
    
    
    /**
     * Paginador 
     * @global type $wp_query
     * @global type $wp_rewrite
     */
    function wp_pagenavi() {
        global $wp_query, $wp_rewrite;
        $pages = '';
        $max =  $wp_query->max_num_pages;
        
        if (!$current = get_query_var('paged')) $current = 1;
        $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
        $args['total'] = $max;
        $args['current'] = $current;
        $total = 1;
        $args['mid_size'] = 3;
        $args['end_size'] = 1;
        $args['prev_text'] = 'ant';
        $args['next_text'] = 'sig';
        if ($max > 1) echo '<div class="wp-pagenavi">';
        if ($total == 1 && $max > 1) $pages = '<span class="pages">P&aacute;gina ' . $current . ' de ' . $max . '</span>';
        echo $pages . paginate_links($args);
        if ($max > 1) echo '</div>';
    }
    
    
    /**
     * Paginador del blog, muestra los botones mas nuevo, mas antiguo
     * @global gloabal $wp_query variable global
     * @param array $query  el query de wp
     * @param int $PagCurrent Numero de la pagina
     */
    function wp_pag_blog($query = null, $PagCurrent) { 
        if (!$query) {
            global $wp_query;
            $query = $wp_query;
        }        
        
        $max = $query->max_num_pages;        
        if ($PagCurrent == "") $PagCurrent = 1;
        
        $args['base'] = add_query_arg( 'pag', '%#%' );
        $args['format'] = '';
        $args['total'] = $max;
        $args['current'] = $PagCurrent;          
        $args['mid_size'] = 3;
        $args['end_size'] = 1;
        $args['prev_text'] = '<div class="btRojo btnNuevos flotar_izq"><span>Más nuevos</span></div>';
        $args['next_text'] = '<div class="btRojo btnAntiguos flotar_der"><span>Más antiguos</span></div>  ';
        //if ($max > 1) echo '<div class="botones desktop">';        
        echo paginate_links($args);
        //if ($max > 1) echo '</div>';
    }
        
?>