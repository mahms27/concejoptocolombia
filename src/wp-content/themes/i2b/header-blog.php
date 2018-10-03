<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <link href="<?php bloginfo('template_url') ?>/img/icono.png" rel="shortcut icon" type="image/x-icon" /> 
        <title>
	  
            <?php if ( is_author() ) { ?><?php bloginfo('name'); ?> | Archivo por autor<?php } ?>
            <?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
            <?php if ( is_page() ) { ?><?php bloginfo('name'); ?> | <?php wp_title(''); ?><?php } ?>
            <?php if ( is_category() ) { ?><?php bloginfo('name'); ?> | <?php single_cat_title(); ?><?php } ?>
            <?php if ( is_month() ) { ?><?php bloginfo('name'); ?> | Archivo por Mes | <?php the_time('F'); ?><?php } ?>
            <?php if ( is_search() ) { ?><?php bloginfo('name'); ?> | Resultados<?php } ?>
            <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?> | Archivo por Tag | <?php  single_tag_title("", true); } } ?>                                    
        </title>      
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />       
        <!-- CSS -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/library/jquery-filestyle.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/general.css?v=5" />        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/desktop.css?v=4" />        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog.css?v=9" /> 
        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet.css?v=3" media="screen and (min-width:497px) and (max-width:968px)"  />        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/movil.css?v=3" media="screen and (max-width:496px) " />
        
        
        <!-- IPHONE -->
        <meta name="apple-mobile-web-app-title" content="I2B Intelligence to Business">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
        
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/iconos/i2b-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/iconos/i2b-72x72.png" />
        <link rel="apple-touch-icon" sizes="48x48" href="<?php echo get_template_directory_uri(); ?>/img/iconos/i2b-78x78.png" />
        <link rel="apple-touch-icon" sizes="29x29" href="<?php echo get_template_directory_uri(); ?>/img/iconos/i2b-29x29.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/iconos/i2b-114x114.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/iconos/i2b-144x144.png" />
        
        <script type="text/javascript">
            var addToHomeConfig = {
                animationIn: 'bubble',
                animationOut: 'drop',
                lifespan:10000,
                expire:2,
                touchIcon:true,
                message:'Para instalar esta app en su %device, pulse %icon y seleccione <b>A&ntilde;adir a pantalla de inicio</b>.'
            };
        </script>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/library/add2home.css" />
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/librerias/add2home.js"></script>
        <!-- // IPHONE -->
        
        <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script> 
	<?php wp_head(); ?>
    </head>    
    <body> 
        
            <!-- Google Tag Manager prueba -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W3PPN5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W3PPN5');</script>
			<!-- End Google Tag Manager prueba -->
        
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5G8X43"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-5G8X43');</script>
        <!-- End Google Tag Manager -->
        
        
        <div id="wrap">
            <!-- envolvente general de nuestra página -->
            <div id="main">    
                <div class="contenedor clearfix blog"> 
                    <input type="hidden" name="tipo" value="desktop"></input>
                    <div class="header">                        
                        <div class="contenedor-logo-menus"> 
                            <div class="center-header clearfix"> 

                                <div class="logo logo-desktop">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
                                </div>

                                <div class="clearfix logo-moviles flechaMenu_Der">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo menu-desplegable"></a>                                            
                                    <span class="mnu-desplegable">Intelligence to Business</span>
                                </div>

                                <!-- MENUS PARA DISPOSITIVOS MOVILES -->
                                <div class="menuDesplegable">
                                    <?php 
                                        wp_nav_menu(
                                        array(
                                            'container' => false,
                                            'items_wrap' => '<ul id="menu-principal-movil">%3$s</ul>',
                                            'theme_location' => 'menu-principal'
                                        ));
                                    ?>
                                 </div> 
                                 <!-- FIN MENUS PARA DISPOSITIVOS MOVILES -->

                                 <!-- MENUS PARA DESKTOP -->
                                 <div class="menus clearfix">
                                    <div class="menu-principal clearfix t4">
                                        <?php    
                                            wp_nav_menu(
                                                array(
                                                  'container' => false,
                                                  'items_wrap' => '<ul id="menu-principal">%3$s</ul>',
                                                  'theme_location' => 'menu-principal'
                                            ));
                                          ?>
                                    </div>
                                </div>
                                <!-- MENUS PARA DESKTOP -->

                                <?php                         
                                    $result = categorias_post(11);
                                    $idcategoria = get_query_var('cat'); 
                                    $sw = 1;                                    
                                ?>

                                <!-- MENUS SOLO PARA EL BLOG -->
                                <div class="menu-blog">
                                    <ul class='item-mnu-blog'>
                                        <?php foreach($result['categorias'] as $value): ?>
                                                 <li class="menu-item"><a href="<?php echo bloginfo(url) . '/' . $value['slug']; ?>?tipo=movil"><?php echo $value['name']; ?></a></li>                             
                                        <?php endforeach; ?>
                                        <li class="menu-item"><a href="<?php echo bloginfo('url'). '/' . 'blog-i2b' ?>">Todos</a></li>
                                    </ul>         
                                </div>    
                                <!-- //MENUS SOLO PARA EL BLOG -->                    

                            </div>                                
                        </div>

                        <?php if(is_category()): ?>
                                <div class="foto-cover clearfix">

                                    <div class="titulo-blog center-blog">
        
                                        <a href="<?php echo esc_url( home_url( 'blog-i2b' ) ); ?>">I2B Inteligencia </a>
                                        
                                    </div>                

                                    <div class="menus-destacados center-blog clearfix">
                                        <ul class='mnu-blog-destacados flotar_izq'>                              
                                            <?php foreach($result['categorias'] as $value): ?>
                                                    <?php 
                                                        if($idcategoria != 11){
                                                            if($idcategoria == $value['term_id']){
                                                                $class = ' class="activo" ';
                                                                $post = $value;
                                                                define('ID_POST_DES', $value['post']->ID);
                                                            }else 
                                                                $class = '';
                                                        }else{                                        
                                                            if($sw == 1) {
                                                                $post = $value;
                                                                $sw = 0;
                                                               // $class = ' class="activo" ';
                                                            }
                                                            define('ID_POST_DES', $value['post']->ID);
                                                        }
                                                    ?>                                                                                                
                                                    <li <?php  echo $class; ?>><a href="<?php echo bloginfo(url) . '/' . $value['slug']; ?>"><?php echo $value['name']; ?></a></li>
                                                    <?php $class = ''; ?>
                                            <?php endforeach; ?>                                                      
                                            <li class="menu-item <?php echo $idcategoria == 11 ?  ' activo' : ''; ?>"><a href="<?php echo bloginfo('url'). '/' . 'blog-i2b' ?>">Todos</a></li>
                                        </ul>
                                        <div class='cdo-blog-destacados flotar_izq efecto3d'>
                                            <div class='articulo flotar_izq'>
                                                <a href="<?php echo bloginfo(url) . '/' . $post['slug'] . '/' . $post['post']->post_name; ?>"><?php echo $post['post']->post_title; ?></a>
                                                <span class="excerpt">
                                                    <?php echo $post['post']->post_excerpt; ?>
                                                </span>
                                            </div>
                                            <div class='clearfix flotar_izq img-header'>
                                                <a href="<?php echo bloginfo(url) . '/' . $post['slug'] . '/' . $post['post']->post_name; ?>">
                                                    <?php echo  get_the_post_thumbnail($post['post']->ID, 'img-header-home-blog'); ?>
                                                </a>
                                            </div>                        
                                        </div>

                                    </div>
                                </div>
                          <?php else: ?>      
                                <div class="foto-cover-blog-cont clearfix">                        
                                    <?php echo  get_the_post_thumbnail(get_the_ID(), 'img-header-contenido-blog'); ?>                        
                                </div>
                          <?php endif; ?>              
                    </div>
