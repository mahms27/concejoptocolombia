<div class="contenedor-logo-menus"> 
    <div class="center-header clearfix">                    
        
        <div class="logo logo-desktop">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
        </div>
        
        <div class="clearfix logo-moviles flechaMenu_Der">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo menu-desplegable"></a>                                            
            <span class="mnu-desplegable">Concejo de Puerto Colombia</span>
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

       <!-- <?php $result = categorias_post(11); ?>-->

        <!-- MENUS SOLO PARA EL BLOG -->
        <div class="menu-blog">
            <ul class='item-mnu-blog'>
                <?php foreach($result['categorias'] as $value): ?>
                         <li class="menu-item"><a href="<?php echo bloginfo(url) . '/' . $value['slug']; ?>"><?php echo $value['name']; ?></a></li>                             
                <?php endforeach; ?>
                <li class="menu-item"><a href="<?php echo bloginfo('url'). '/' . 'blog-i2b' ?>">Todos</a></li>         
            </ul>         
        </div>    
        <!-- //MENUS SOLO PARA EL BLOG -->
        
        <div class="sombra"></div>        
    </div>   
</div>    