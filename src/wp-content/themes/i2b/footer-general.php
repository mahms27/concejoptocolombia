        </div> <!-- contenedor -->
    </div> <!-- main -->
</div><!-- wrap -->

<div id="footer" class="footer clearfix">
    <div class="center-footer clearfix">  
        <div class="footer-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
        </div>  
    </div>    
    <?php $datos_sitio = datos_sitio(); ?>
    <div class="center-footer clearfix">
        <div class="clearfix footer-column">
            <div class="contacto clearfix">
                <h3>Chile</h3>			                        
                <p class="t3">  
                    <?php 
                        $str = array('[', ']', '+', '(', ')', ' ');
                        $tel = str_replace($str, '', $datos_sitio['telefono_chile']);                            
                    ?>
                    <?php echo $datos_sitio['direccion_chile']; ?>  
                    <br />
                    <a href="tel:<?php echo $tel; ?>" class="telefono"><?php echo $datos_sitio['telefono_chile']; ?> </a>
                </p>                         
            </div>
        </div>    
        <div class="clearfix footer-column">
            <div class="contacto clearfix">
                <h3>Colombia</h3>			                        
                <p class="t3">
                    <?php 
                        $str = array('[', ']', '+', '(', ')', ' ');
                        $tel = str_replace($str, '', $datos_sitio['telefono_colombia']) ;                            
                    ?>
                    <?php echo $datos_sitio['direccion_colombia']; ?>
                    <br />
                    <a href="tel:<?php echo $tel; ?>" class="telefono"><?php echo $datos_sitio['telefono_colombia']; ?>  </a>                                
                </p>                         
            </div>
        </div>    
        <div class="clearfix footer-column">
            <div class="contacto clearfix">
                <h3>Perú</h3>			                        
                <p class="t3">
                    <?php 
                        $str = array('[', ']', '+', '(', ')', ' ');
                        $tel = str_replace($str, '', $datos_sitio['telefono_peru']) ;                            
                    ?>
                    <?php echo $datos_sitio['direccion_peru']; ?> 
                    <br />                         
                    <a href="tel:<?php echo $tel; ?>" class="telefono"><?php echo $datos_sitio['telefono_peru']; ?></a>                               
                </p>                         
            </div>                
        </div>  
         <div class="clearfix footer-column ultimo efecto3d">
            <ul class="contacto">                        
                <li><a href="<?php echo bloginfo('url') . '/contacto'; ?>">Comuníquese con nosotros</a></li>
                <li><a href="<?php echo bloginfo('url') . '/carreras'; ?>">Trabaje con nosotros</a></li>
            </ul>                
        </div> 
    </div>                               
    <div class="clearfix footer-redes-sociales efecto3d">
         <div class="center-footer clearfix"> 
            <div class="clearfix footer-column ancho-red-soc">
                <div class="in"></div><a class="link-redes-sociales" href="http://www.linkedin.com/company/1358465?trk=vsrp_companies_res_name&trkInfo=VSRPsearchId%3A656249181383574316121%2CVSRPtargetId%3A1358465%2CVSRPcmpt%3Aprimary" target="_blank">Únete</a>
            </div>    
            <div class="clearfix footer-column ancho-red-soc">
                <div class="twitter"></div><a class="link-redes-sociales" href="http://www.twitter.com/i2b" target="_blank">Síguenos</a>
            </div> 
            <div class="clearfix footer-column ancho-red-soc">
                <div class="facebook"></div><a class="link-redes-sociales" href="https://www.facebook.com/pages/I2B-Tech/173808992765729" target="_blank">Comparte</a>
            </div>
        </div>     
    </div>  
</div>           
