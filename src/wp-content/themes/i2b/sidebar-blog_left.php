
<div class="buscador desktop tablet">
    <form id="searchform" action="<?php echo bloginfo("url") . '/blog-i2b'; ?>" method="post" role="search"> 
        <input type="text" id="s" name="s" value="" width="100%" class="buscar" /> 
    </form>    
</div>
<?php if ( is_active_sidebar( 'sidebar-blog_right' ) ) : ?> 
    <?php dynamic_sidebar( 'sidebar-blog_right' ); ?>    
<?php endif; ?>
<div class="suscribirse clearfix">
    <h3>Suscribase a nuestro Newsletter</h3>
    <form action="http://i2b.us1.list-manage.com/subscribe/post?u=0e2220be0e524fb3cc0407bfe&amp;id=21f942eb63" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="suscribir" target="_blank" novalidate>
        <fieldset>
            <label>Correo</label>
            <input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            <input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="button flotar_der">            
        </fieldset>
    </form>    
</div>        
        