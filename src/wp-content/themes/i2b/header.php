<!-- Buscamos WebDeveloper
  ____                                           __        __   _       ____                 _                       
 | __ ) _   _ ___  ___ __ _ _ __ ___   ___  ___  \ \      / /__| |__   |  _ \  _____   _____| | ___  _ __   ___ _ __ 
 |  _ \| | | / __|/ __/ _` | '_ ` _ \ / _ \/ __|  \ \ /\ / / _ \ '_ \  | | | |/ _ \ \ / / _ \ |/ _ \| '_ \ / _ \ '__|
 | |_) | |_| \__ \ (_| (_| | | | | | | (_) \__ \   \ V  V /  __/ |_) | | |_| |  __/\ V /  __/ | (_) | |_) |  __/ |   
 |____/ \__,_|___/\___\__,_|_| |_| |_|\___/|___/    \_/\_/ \___|_.__/  |____/ \___| \_/ \___|_|\___/| .__/ \___|_|   
                                                                                                    |_|              
  _____                              _                                       _ _            ______     __            
 |_   _|   _   _ __   ___  _ __ ___ | |__  _ __ ___      ___ _ __ ___   __ _(_) |  _   _   / ___\ \   / /   __ _ _   
   | || | | | | '_ \ / _ \| '_ ` _ \| '_ \| '__/ _ \    / _ \ '_ ` _ \ / _` | | | | | | | | |    \ \ / /   / _` (_)  
   | || |_| | | | | | (_) | | | | | | |_) | | |  __/_  |  __/ | | | | | (_| | | | | |_| | | |___  \ V /   | (_| |_   
   |_| \__,_| |_| |_|\___/|_| |_| |_|_.__/|_|  \___( )  \___|_| |_| |_|\__,_|_|_|  \__, |  \____|  \_/     \__,_(_)  
                                                   |/                              |___/                             
  _        _            _              ____  _ ____  _     _            _                                            
 | |_ __ _| | ___ _ __ | |_ ___  ___  / __ \(_)___ \| |__ | |_ ___  ___| |__    ___ ___  _ __ ___                    
 | __/ _` | |/ _ \ '_ \| __/ _ \/ __|/ / _` | | __) | '_ \| __/ _ \/ __| '_ \  / __/ _ \| '_ ` _ \                   
 | || (_| | |  __/ | | | || (_) \__ \ | (_| | |/ __/| |_) | ||  __/ (__| | | || (_| (_) | | | | | |                  
  \__\__,_|_|\___|_| |_|\__\___/|___/\ \__,_|_|_____|_.__/ \__\___|\___|_| |_(_)___\___/|_| |_| |_|                  
                                      \____/                                                                                                                                                                                        
talentos@i2btech.com -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta http-equiv="x-rim-auto-match" content="none" />
        <meta name="format-detection" content="telephone=no" />
        <link href="<?php bloginfo('template_url') ?>/img/icono.png" rel="shortcut icon" type="image/x-icon" /> 
        <title>
            <?php if ( is_home() )?><?php echo "I2B Intelligence to Business"; ?>
            <?php if ( is_author() ) { ?><?php bloginfo('name'); ?> | Archivo por autor<?php } ?>
            <?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php wp_title(''); ?><?php } ?>
            <?php if ( is_page() ) { ?><?php bloginfo('name'); ?> | <?php wp_title(''); ?><?php } ?>
            <?php if ( is_category() ) { ?><?php bloginfo('name'); ?> | Archivo por Categoria | <?php single_cat_title(); ?><?php } ?>
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
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox-1.3.4.css?v=1" />        
        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet.css?v=2" media="screen and (min-width:497px) and (max-width:968px)"  />
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet2.css?v=1" media="screen and (max-width: 806px)"  />
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet3.css?v=1" media="screen and (max-width: 805px)"  />        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet4.css?v=1" media="screen and (max-width: 603px)"  />        
        
        <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/movil.css?v=11" media="screen and (max-width:496px) " />

        
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
        
        
        <!-- <script type="text/javascript">document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>-->
        <?php $images = imagenes_foto_cover(); 
        ?>
        <script type="text/javascript">           
            var BASE_IMG = '<?php bloginfo('template_url'); ?>/img/';
            
            var IMG_HEADER_DESKTOP = '<?php echo $images['desktop']; ?>';            
            var IMG_HEADER_TABLET = '<?php echo $images['tablet']; ?>';            
            var IMG_HEADER_MOVIL = '<?php echo $images['movil']; ?>';  
            
            var MARCAS_DESKTOP_FILE = new Array();
            var MARCAS_DESKTOP_LINK= new Array();
            var MARCAS_DESKTOP_WIDTH = new Array();
            var MARCAS_DESKTOP_HEIGHT = new Array();
            
            var MARCAS_TABLET_FILE = new Array();
            var MARCAS_TABLET_LINK = new Array();
            var MARCAS_TABLET_WIDTH = new Array();
            var MARCAS_TABLET_HEIGHT = new Array();

            var MARCAS_MOVIL_FILE = new Array();
            var MARCAS_MOVIL_LINK = new Array();            
            var MARCAS_MOVIL_WIDTH = new Array();
            var MARCAS_MOVIL_HEIGHT = new Array();
            <?php
                $i = 0;
                $file = 'ruta';
                $link = 'link';
                $width  = 'width';
                $height = 'height';
                $marcas_desktop = imagen_marcas_desktop();
                foreach ($marcas_desktop as $value){
                    echo "\nMARCAS_DESKTOP_FILE[$i] = '$value[$file]';"; 
                    echo "\nMARCAS_DESKTOP_LINK[$i] = '$value[$link]';";  
                    echo "\nMARCAS_DESKTOP_WIDTH[$i] = '$value[$width]';";  
                    echo "\nMARCAS_DESKTOP_HEIGHT[$i] = '$value[$height]';"; 
                    $i++;
                } 
                
                $marcas_tablet = imagen_marcas_tablet();
                $i = 0;
                foreach ($marcas_tablet as $value){
                    echo "\nMARCAS_TABLET_FILE[$i] = '$value[$file]';"; 
                    echo "\nMARCAS_TABLET_LINK[$i] = '$value[$link]';";    
                    echo "\nMARCAS_TABLET_WIDTH[$i] = '$value[$width]';";  
                    echo "\nMARCAS_TABLET_HEIGHT[$i] = '$value[$height]';";  
                    $i++;
                }

                $marcas_movil = imagen_marcas_movil();
                $i = 0;
                foreach ($marcas_movil as $value){
                    echo "\nMARCAS_MOVIL_FILE[$i] = '$value[$file]';"; 
                    echo "\nMARCAS_MOVIL_LINK[$i] = '$value[$link]';"; 
                    echo "\nMARCAS_MOVIL_WIDTH[$i] = '$value[$width]';";  
                    echo "\nMARCAS_MOVIL_HEIGHT[$i] = '$value[$height]';"; 
                    $i++;
                }                
            ?>                                
                
        </script>
        
                <script src='https://www.google.com/recaptcha/api.js'></script>

        
         <?php        
            if(is_home()){ //Para aplicar el alto del foto cover segun la pagina
                $alto = '';
            } else {
                $alto = 'wcontenido';
            }
         ?>  
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
                <div class="contenedor clearfix"> 
                    <input type="hidden" name="tipo" value="desktop"></input>
                    <div class="header">                        
                        <?php
                           //MENUS 
                           get_template_part( 'menus' ); 
                        ?> 
                        <div class="contenido-cover">
                           <div class="texto">
                               <span> 
                                   <?php 
                                       $class = '';
                                       global $post;
                                       if(!is_home()){
                                           if(is_category()) 
                                               single_cat_title(); 
                                           elseif(is_404()) { 
                                                echo '<span class="title-error-404">ERROR 404</span>';
                                                echo '<span class="txt-error-404">No se ha encontrado la página que busca</span>';
                                           } elseif(in_category( 14, $post->ID )) {
                                               echo get_cat_name(14);
                                           } else the_title();
                                           $class = ' foto-contenido ';
                                       }elseif(is_home)
                                           $class = 'bg-foto-cover-home';
                                   ?>
                               </span>
                           </div>
                        </div>
                        
                         <?php if(is_home()){ ?>
                        <div class="granContenedorCarrusel">
                            <div class="contGranContenedor">
                                <div class="flechaIzq"></div>
                                <div class="contenedorCarrusel">
                                    <?php carrusel_fotoCover(); ?>

                                </div>
                                <div class="flechaDer"></div>
                                <div id='paginador_carruselHome'></div>
                            </div>
                        </div>
                       <?php } else {?>
                       <div class="foto-cover <?php echo $class; ?>"> 
                            <div class="<?php if(is_home()) echo ' center '; ?> clearfix">
                                <img src="<?php echo $images['desktop']; ?>"  alt="I2B Intelligence to bussines" class="<?php echo $alto;?>"/>               
                            </div>    
                        </div> 
                        <?php }?>
                        
                    </div>
                
					
        
        