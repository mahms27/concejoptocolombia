$(document).ready(function(){      
   /*
     * Menu desplegable
     */
    if($('.menuDesplegable').length)
        $('.menuDesplegable').hide();        
    
    if($('.menu-blog').length)
        $('.menu-blog').hide();
    
    /* Despliega el menus del blog*/        
    $('#menu-item-82').live('click', function(event){ 
        event.preventDefault();        
        if(!$(".menuDesplegable").hasClass('mini')){  //abre el menus del blog                           
          $(this).addClass('checked');
          $(this).addClass('fmdHover');
          $(".menuDesplegable").addClass('mini');
          var tip = $('input[name=tipo]').val();
          if(tip == 'tablet') { //si es tablet se aplican medidas diferentes
              $(".menuDesplegable").animate({
                  left: "-=187"
              });      
              $(".menu-blog").show();
              $(".menu-blog").animate({
                   left: "+=49"
              });                           
          } else {
              $(".menuDesplegable").animate({
                  left: "-=175"
              });   
              $(".menu-blog").show();
              $(".menu-blog").animate({
                   left: "+=20"
             });
          }          
       } else { //cierra el menus del blog
            $(".menuDesplegable").removeClass('mini');
            var tip = $('input[name=tipo]').val();
            $(this).removeClass('checked');
            $(this).removeClass('fmdHover');
            if(tip == 'tablet') {                
                $(".menuDesplegable").animate({
                    left: "+=187"
                });
                $(".menu-blog").animate({
                     left: "-=49"
                });                
            } else {
                $(".menuDesplegable").animate({
                    left: "+=175"
                });
                $(".menu-blog").animate({
                     left: "-=20"
                });
            } 
            $(".menu-blog").animate({                            
                width: "toggle"                       
            });
       }               
    });
    
    
    $('.mnu-desplegable, .mnu-desplegableHover').live('click', function(event){         
        if(!$(this).hasClass('.menu-item-82')){                        
            var tip = $('input[name=tipo]').val(); 
            if ( tip == 'tablet'  || tip == 'movil') {
                event.preventDefault();                  
                if($(this).parent('.flechaMenu_Der').hasClass('checked')){
                    $(this).parent('.flechaMenu_Der').removeClass('checked');
                    $(this).parent('.flechaMenu_Der').removeClass('fmdHover');
                } else {
                    $(this).parent('.flechaMenu_Der').addClass('checked');
                    $(this).parent('.flechaMenu_Der').addClass('fmdHover');
                }      
                if(!$(".menuDesplegable").hasClass('mini')){
                    $(".menuDesplegable").animate({                            
                        width: "toggle"                       
                    });                                            
                } else { //si el munus y el menus desplegable del blog estan abiertos                     
                    $('#menu-item-82').removeClass('checked');
                    $('#menu-item-82').removeClass('fmdHover');
                    if ( tip == 'tablet') {                         
                        $(".menu-blog").animate({
                            left: "-=49"
                        });
                        $(".menuDesplegable").removeClass('mini');
                        $(".menu-blog").hide(); 
                        $(".menuDesplegable").animate({                           
                            left: "-=100"
                        },{
                            complete: function( now, fx ) {
                               $(".menuDesplegable").hide();                               
                               $(".menuDesplegable").css("left" , '0');
                            }
                        });
                    } if ( tip == 'movil') { 
                        $(".menu-blog").animate({
                            left: "-=20"
                        });
                        $(".menuDesplegable").removeClass('mini');
                        $(".menu-blog").hide(); 
                        $(".menuDesplegable").animate({                           
                            left: "-=100"
                        },{
                            complete: function( now, fx ) {
                               $(".menuDesplegable").hide();                               
                               $(".menuDesplegable").css("left" , '0');
                            }
                        });  
                    }
                }
            } 
        } 
    });
       
    $('.menu-item-82').addClass('flechaMenu_Der');    
    
    $('.logo,  #content-page, .menuDesplegable ul li, .footer, .foto-cover, .contenedor-marcas, .contenido, .content').click(function(event){                
        if($('.menuDesplegable').hasClass('mini') && !$(this).hasClass('menu-item-82') && !$(this).hasClass('menu-item')){
            event.preventDefault(); 
            $('#menu-item-82').removeClass('checked');
            $('#menu-item-82').removeClass('fmdHover');
            var tip = $('input[name=tipo]').val();
            if ( tip == 'tablet') {                         
                $(".menu-blog").animate({
                    left: "-=49"
                });
                $(".menuDesplegable").removeClass('mini');
                $(".menu-blog").hide(); 
                $(".menuDesplegable").animate({                           
                    left: "-=100"
                },{
                    complete: function( now, fx ) {
                       $(".menuDesplegable").hide();                               
                       $(".menuDesplegable").css("left" , '0');
                    }
                });
            } if ( tip == 'movil') { 
                $(".menu-blog").animate({
                    left: "-=20"
                });
                $(".menuDesplegable").removeClass('mini');
                $(".menu-blog").hide(); 
                $(".menuDesplegable").animate({                           
                    left: "-=100"
                },{
                    complete: function( now, fx ) {
                       $(".menuDesplegable").hide();                               
                       $(".menuDesplegable").css("left" , '0');
                    }
                });  
            }
            $('.flechaMenu_Der').removeClass('checked');
            $('.flechaMenu_Der').removeClass('fmdHover');            
        }else{                           
            if($('.menuDesplegable').is(':visible') && !$('.menu-blog').is(':visible') && !$(this).hasClass('menu-item-82')){
                 $(".menuDesplegable").animate({
                    width: "toggle"
                 });                                  
                 $('.flechaMenu_Der').removeClass('checked');
                 $('.flechaMenu_Der').removeClass('fmdHover');
            }else if($('.menuDesplegable').hasClass('mini') && !$(this).hasClass('menu-item-82')){
                event.preventDefault();                
            }                       
        }        
    });
});     
    