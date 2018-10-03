<?php

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


    //Registro de menus
    register_nav_menus( array(
        'menu-principal' => 'Menú principal',
        'menus_404' => 'Menús 404'
    ));

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