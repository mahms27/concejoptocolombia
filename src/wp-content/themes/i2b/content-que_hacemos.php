<?php global $post ?>
<?php if(in_category( 14, $post->ID )): ?>
            <?php get_header(); ?> 
            <div id="content-page" role="main">
                <div class="breadcrumb efecto3d t6"><a href="<?php echo get_site_url(); ?>" class="breadcrumb_red t3"> Inicio </a> | Qu&eacute; hacemos</div>
                <div class="subtitulo t1"><?php echo obtenerCampoAdicional("paginas_subtitulos"); ?></div>
                <div class="clearfix">
                    <div class="clearfix column-1 t2">
<?php endif; ?>

<?php 
    $class = 'ancho-col_2'; 
    if ( is_active_sidebar( 'sidebar-que_hacemos_right' ) ) :  
        get_sidebar('que_hacemos_right');; 
        $class = 'ancho-col_1'; 
    endif; 
?>
<div class="<?php echo $class; ?> col-right t2 clearfix"> 
    <?php while ( have_posts() ) : the_post(); ?>         
        <?php the_content(); ?>
    <?php endwhile; wp_reset_query(); ?>
</div>    
<?php query_posts(array('cat' => 14));?>
<div class="clearfix servicios">
    <h1><?php single_cat_title(); ?></h1>
    <?php
        $post_ser = get_post(99);         
        $post_cont[99] = array(
            'titulo' => $post_ser->post_title,
            'contenido' => $post_ser->post_content,
            'link' => get_permalink($post_ser->ID)
        );
        $post_ser = get_post(101);
        $post_cont[101] = array(
            'titulo' => $post_ser->post_title,
            'contenido' => $post_ser->post_content,
            'link' => get_permalink($post_ser->ID)
        );
        $post_ser = get_post(103);
        $post_cont[103] = array(
            'titulo' => $post_ser->post_title,
            'contenido' => $post_ser->post_content,
            'link' => get_permalink($post_ser->ID)
        );
        $post_ser = get_post(113);
        $post_cont[113] = array(
            'titulo' => $post_ser->post_title,
            'contenido' => $post_ser->post_content,
            'link' => get_permalink($post_ser->ID)
        );
        $post_ser = get_post(116);
        $post_cont[116] = array(
            'titulo' => $post_ser->post_title,
            'contenido' => $post_ser->post_content,
            'link' => get_permalink($post_ser->ID)
        );

    ?>
    
    <ul class="btn-servicios clearfix">      
        <li id="contenido_1" class="clearfix margin-der">
            <a href="<?php echo $post_cont[99]['link']; ?>" class="bot_estrat margin-der <?php echo 99 == $post->ID  || $post->ID == 29 ? ' activo ' : ''; ?>">
                <span class="texto"><?php echo $post_cont[99]['titulo']; ?></span>
            </a>
        </li>
        <li id="contenido_2" class="clearfix margin-der ">
            <a href="<?php echo $post_cont[101]['link']; ?>" class="bot_consult margin-der <?php echo 101 == $post->ID ? ' activo ' : ''; ?>">
                <span class="texto"><?php echo $post_cont[101]['titulo']; ?></span>
            </a>
        </li>
        <li id="contenido_3" class="clearfix margin-der ">
            <a href="<?php echo $post_cont[103]['link']; ?>" class="bot_prese margin-der <?php echo 103 == $post->ID ? ' activo ' : ''; ?>">
                <span class="texto"><?php echo $post_cont[103]['titulo']; ?></span>
            </a>
        </li>
        <li id="contenido_4" class="clearfix margin-der ">
            <a href="<?php echo $post_cont[116]['link']; ?>" class="bot_expe margin-der <?php echo 116 == $post->ID ? ' activo ' : ''; ?>">
                <span class="texto"><?php echo $post_cont[116]['titulo']; ?></span>
            </a>
        </li>
        <li id="contenido_5" class="clearfix ">
            <a href="<?php echo $post_cont[113]['link']; ?>" class="bot_rendi <?php echo 113 == $post->ID ? ' activo ' : ''; ?>">
                <span class="texto"><?php echo $post_cont[113]['titulo']; ?></span>
            </a>
        </li>
    </ul>
    <div class="clearfix contenido-servicios">
        <div class="loading"></div>
        <div class="conte contenido_1 clearfix">
            <div class="texto">
                <?php
                    echo '<h3>' .  $post_cont[99]['titulo'] . '</h3>'; 
                    echo '<span>' . $post_cont[99]['contenido'] . '</span>';                 
                ?>
            </div>
            <div class="imagen"><?php echo get_the_post_thumbnail(99); ?></div>
        </div>
        
        <div class="conte contenido_2 clearfix">                        
            <div class="texto">
                <?php
                    echo '<h3>' . $post_cont[101]['titulo'] . '</h3>'; 
                    echo '<span>' . $post_cont[101]['contenido'] . '</span>';                 
                ?>
            </div>
            <div class="imagen"><?php echo get_the_post_thumbnail(101); ?></div>
        </div>        
        
        <div class="conte contenido_3 clearfix">            
            <div class="texto">
                <?php
                    echo '<h3>' . $post_cont[103]['titulo'] . '</h3>'; 
                    echo '<span>' . $post_cont[103]['contenido'] . '</span>';                 
                ?>
            </div>
            <div class="imagen"><?php echo get_the_post_thumbnail(103); ?></div>
        </div>        
        
        <div class="conte contenido_4 clearfix">            
            <div class="texto">
                <?php
                    echo '<h3>' . $post_cont[116]['titulo'] . '</h3>'; 
                    echo '<span>' . $post_cont[116]['contenido'] . '</span>';                 
                ?>
            </div>
            <div class="imagen"><?php echo get_the_post_thumbnail(116); ?></div>
        </div>        
        
        <div class="conte contenido_5 clearfix">            
            <div class="texto">
                <?php
                    echo '<h3>' . $post_cont[113]['titulo'] . '</h3>'; 
                    echo '<span>' . $post_cont[113]['contenido'] . '</span>';                 
                ?>
            </div>
            <div class="imagen"><?php echo get_the_post_thumbnail(113); ?></div>
        </div>        
    </div>    
</div>
<div class="contenido-servicios_movil clearfix">
    <a href="<?php echo $post_cont[99]['link']; ?>" id="servicio_1" class="titulo-servicio" <?php echo 99 == $post->ID  || $post->ID == 29 ? ' style="border-bottom:0; color: #444444;" ' : ''; ?>><?php echo $post_cont[99]['titulo']; ?></a>
    <div class="contenido-servicio servicio_1" <?php echo 99 == $post->ID  || $post->ID == 29 ? ' style="display: block;" ' : ''; ?> >        
        <?php echo $post_cont[99]['contenido']; ?>
    </div>
    <a href="<?php echo $post_cont[101]['link']; ?>" id="servicio_2" class="titulo-servicio" <?php echo $post->ID == 101 ? ' style="border-bottom:0; color: #444444;" ' : ''; ?>><?php echo $post_cont[101]['titulo']; ?></a>
    <div class="contenido-servicio servicio_2" <?php echo 101 == $post->ID  ? ' style="display: block;" ' : ''; ?>>        
        <?php echo $post_cont[101]['contenido']; ?>
    </div>
    <a href="<?php echo $post_cont[103]['link']; ?>" id="servicio_3" class="titulo-servicio" <?php echo $post->ID == 103 ? ' style="border-bottom:0; color: #444444;" ' : ''; ?>><?php echo $post_cont[103]['titulo']; ?></a>
    <div class="contenido-servicio servicio_3" <?php echo 103 == $post->ID  ? ' style="display: block;" ' : ''; ?>>        
        <?php echo $post_cont[103]['contenido']; ?>
    </div>
    <a href="<?php echo $post_cont[116]['link']; ?>" id="servicio_4" class="titulo-servicio" <?php echo $post->ID == 116 ? ' style="border-bottom:0; color: #444444;" ' : ''; ?>><?php echo $post_cont[116]['titulo']; ?></a>
    <div class="contenido-servicio servicio_4" <?php echo 116 == $post->ID  ? ' style="display: block;" ' : ''; ?>>        
        <?php echo $post_cont[116]['contenido']; ?>
    </div>
    <a href="<?php echo $post_cont[113]['link']; ?>" id="servicio_5" class="titulo-servicio" <?php echo $post->ID == 113 ? ' style="border-bottom:0; color: #444444;" ' : ''; ?>><?php echo $post_cont[113]['titulo']; ?></a>
    <div class="contenido-servicio servicio_5" <?php echo 113 == $post->ID  ? ' style="display: block;" ' : ''; ?>>        
        <?php echo $post_cont[113]['contenido']; ?>
    </div>
</div>
            
<?php if(in_category( 14, $post->ID )): ?>
                    </div>
                </div>
            </div>
            <?php get_footer(); ?>                       
<?php endif; ?>
