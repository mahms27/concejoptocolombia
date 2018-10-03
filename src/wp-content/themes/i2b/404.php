            <?php get_header(); ?>
            <div class="contenido">
                <div class="row-1 clearfix">
                    <div class="mnu-404">
                        <span class="titulo">¿Que desea hacer?</span>
                         <?php 
                            wp_nav_menu(
                            array(
                                'container' => false,
                                'items_wrap' => '<ul id="menu-404">%3$s</ul>',
                                'theme_location' => 'menus_404'
                            ));
                        ?>
                    </div>
                </div>    
            </div>
        </div> <!-- contenedor -->
    </div> <!-- main -->
</div><!-- wrap -->    
<?php get_footer(); ?>