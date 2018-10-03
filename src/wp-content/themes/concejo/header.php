<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="x-rim-auto-match" content="none" />
    <meta name="format-detection" content="telephone=no" />
	<title>
			<?php if ( is_home() )?><?php echo "Concejo Municipal de Puerto Colombia"; ?>
            <?php if ( is_author() ) { ?><?php bloginfo('name'); ?> | Archivo por autor<?php } ?>
            <?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php wp_title(''); ?><?php } ?>
            <?php if ( is_page() ) { ?><?php bloginfo('name'); ?> | <?php wp_title(''); ?><?php } ?>
            <?php if ( is_category() ) { ?><?php bloginfo('name'); ?> | Archivo por Categoria | <?php single_cat_title(); ?><?php } ?>
            <?php if ( is_month() ) { ?><?php bloginfo('name'); ?> | Archivo por Mes | <?php the_time('F'); ?><?php } ?>
            <?php if ( is_search() ) { ?><?php bloginfo('name'); ?> | Resultados<?php } ?>
            <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); 	?> | Archivo por Tag | <?php  single_tag_title("", true); } } ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!-- START CSS -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />  
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/library/jquery-filestyle.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/general.css" />        
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/desktop.css" /> 
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox-1.3.4.css" />

    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet.css" media="screen and (min-width:497px) and (max-width:968px)"  />
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet2.css" media="screen and (max-width: 806px)"  />
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet3.css" media="screen and (max-width: 805px)"  />        
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet4.css" media="screen and (max-width: 603px)"  />        

    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/movil.css" media="screen and (max-width:496px) " />    
    <!-- END CSS -->

    <!-- START IPHONE -->
    <meta name="apple-mobile-web-app-title" content="I2B Intelligence to Business">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
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
    <!-- END IPHONE -->
    <?php wp_head(); ?>
</head>
<body>
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
                                       }elseif(is_home())
                                           $class = 'bg-foto-cover-home';
                                   ?>
                               </span>
                           </div>
                        </div>

                       
                    </div>    