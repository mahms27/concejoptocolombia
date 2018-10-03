        <?php get_footer('general'); ?>

        <!-- JS -->
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery-1.8.3.min.js?v=4"></script> 
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/inc/respond.min.js?v=4"></script>        
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery.i2bforms.js?v=4"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery.carouFredSel.js?v=4"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery.form.min.js?v=4"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery.validate.min.js?v=4"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery-filestyle.min.js?v=4"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/librerias/jquery.touchSwipe.min.js?v=4"></script>        
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/funciones-blog.js?v=4"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/menuDesplegable.js?v=4"></script>

        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        <script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
        <script type="text/javascript">           
                var BASE_IMG = '<?php bloginfo('template_url'); ?>/img/';                
        </script>     

        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=206707629514524";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script>

        <div id="fb-root"></div>        
        <?php wp_footer(); ?>                 
    </body>
</html>