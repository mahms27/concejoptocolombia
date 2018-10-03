var ancho_ant = 0;

$(window).resize(function(){
    tamanio_ventana();
});

$(document).ready(function(e) { 

    //Buscador del blog
    $('#s').keypress(function(e) {
        if (e.keyCode === 13 && $.trim($(this).val()) !== '') {            
            e.preventDefault();
            if ($.trim($('#s').val()) !== '')
                $('#searchform').submit();
        }
	});
        
     //Deshabilita el estado de error de una caja de texto
    $('input').keypress(function(e) {
		if (e.keyCode != 13) {
            $(this).removeClass('input-error');                
		}	        
	});
    
    //Efecto a los link
    //link3d();
    
    if($('select').length)
        $('.selectBox').selectBox();
    
    tamanio_ventana();

    if($('.jquery-filestyle').length)
        $('.inputs .jquery-filestyle label span').html('Buscar documento');
    
    $('.titulo-servicio').click(function(){
        var nom_class_cont = $(this).attr('id');        
        if ( $('.' + nom_class_cont).is( ":hidden" ) ) {
            $('.contenido-servicio').slideUp( "slow" );
            $('.' + nom_class_cont).slideDown( "slow" );                        
            $('.titulo-servicio').css('border-bottom', 'solid 5px #444444');
            $('.titulo-servicio').css('color', '#FF2626');
            $(this).css('border-bottom', '0');
            $(this).css('color', '#444444');
        }
    });    
        
});

function tamanio_ventana(){
    var ancho_ventana = $('.contenedor').width(); 
    if(ancho_ventana >= 952){ //Desktop
        acciones_tipo('desktop');
    } else if(ancho_ventana < 952 && ancho_ventana >= 480){ // Tablet        
        acciones_tipo('tablet'); 
    }else if(ancho_ventana <= 479){//movil            
        acciones_tipo('movil');  
    }  
}

function acciones_tipo(tipo){    
    //Reinicia al menus si lo deja abierto al redimencionar
    $('.menuDesplegable').hide();
    $(".menuDesplegable").removeClass('mini');
    $(".menuDesplegable").removeAttr('style');
    $('.menu-blog').hide();        
    $(".menu-blog").removeAttr('style'); 
    
    if(tipo == 'desktop'){ 
        $('input[name=tipo]').val('desktop');
        $('.contenedor-logo-menus').height(58);
        $('.center-header').height(58);         
        $('.menuDesplegable').hide();

        $('.evt:last').css('display','block');
    }else if(tipo == 'tablet') {
        $('.evt:last').css('display','none');
        $('.menuDesplegable').hide();
        $('input[name=tipo]').val('tablet');
        $('.contenedor-logo-menus').height(58);
        $('.center-header').height(58);
        $('.flechaMenu_Der').removeClass('fmdHover'); 
        $('.mnu-desplegable').removeClass('checked');
        
    } else if(tipo == 'movil') { 
        $('.evt:last').css('display','none');
        $('.center-header').height(40);        
        $('.contenedor-logo-menus').height(40);        
        $('input[name=tipo]').val('movil');               
       
    }    
}

function link3d(){
    var html;
    var explore = comprobarnavegador();
    if( explore !== 'ie'){
       $(".efecto3d a").each(function (index) {
           html = $(this).html();
           $(this).addClass('external roll-link');
           $(this).html('<span data-title="' + html + '">' + html + '</span>');
       });
    }else if(explore == 'ie'){
        $(".efecto3d").each(function (index) {
            $(this).removeClass('efecto3d');
        });
    }     
}

 $('form.suscribir').validate({
    onkeyup: false,
    onfocusout: false,
    rules :{
        EMAIL :{
            required : true,
            email    : true
        }
    },
    submitHandler: function(form) {
        form.submit();
    },
    messages: {        
        EMAIL: {
            required: "Este campo es obligatorio",
            email: "Ingrese un E-mail vailido"
        }            
    },errorPlacement: function(error, element){				
        var $form = element.parents('form:first');
        var firstError = $form.validate().errorList[0].message;					

        var num_elem = $form.validate().errorList.length;
        var obj;
        if(num_elem > 1) firstError = 'Por favor verifique los siguientes';

        msjErr = '<div class="errorCuadro margenBottom" style="width:100%; margin: 0 0 20px;">' + firstError + '</div>';

        for (var i = 0; i < num_elem; i++){
            obj = $($form.validate().errorList[i].element);           
            obj.addClass('input-error');
            if(obj.parents('form').find(".errorCuadro").length == 0){
                obj.parents('form').prepend(msjErr);
            }else{
                obj.parents('form').find(".errorCuadro").text(firstError);
                $( ".errorCuadro" ).show();
            }
            obj = $($form.validate().errorList[0].element);
            obj.focus();
        }            
        $( ".errorCuadro" ).fadeOut(2500);
    }
}); 

function comprobarnavegador() 
{
    /* Variables para cada navegador, la funcion indexof() si no encuentra la cadena devuelve -1, 
    las variables se quedaran sin valor si la funcion indexof() no ha encontrado la cadena. */
    var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1;
    var is_chrome= navigator.userAgent.toLowerCase().indexOf('chrome/') > -1;
    var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/') > -1;
    var is_ie = navigator.userAgent.toLowerCase().indexOf('msie ') > -1;

    /* Detectando  si es Safari, vereis que en esta condicion preguntaremos por chrome ademas, esto es porque el 
    la cadena de texto userAgent de Safari es un poco especial y muy parecida a chrome debido a que los dos navegadores
    usan webkit. */

    if (is_safari && !is_chrome ) {

        /* Buscamos la cadena 'Version' para obtener su posicion en la cadena de texto, para ello
        utilizaremos la funcion, tolowercase() e indexof() que explicamos anteriormente */
        var posicion = navigator.userAgent.toLowerCase().indexOf('Version/');

        /* Una vez que tenemos la posición de la cadena de texto que indica la version capturamos la
        subcadena con substring(), como son 4 caracteres los obtendremos de 9 al 12 que es donde 
        acaba la palabra 'version'. Tambien podraimos obtener la version con navigator.appVersion, pero
        la gran mayoria de las veces no es la version correcta. */
        var ver_safari = navigator.userAgent.toLowerCase().substring(posicion+9, posicion+12);

        // Convertimos la cadena de texto a float y mostramos la version y el navegador
        ver_safari = parseFloat(ver_safari);
        return 'safari';
        //alert('Su navegador es Safari, Version: ' + ver_safari);
    }

    //Detectando si es Chrome
    if (is_chrome ) {
        var posicion = navigator.userAgent.toLowerCase().indexOf('chrome/');
        var ver_chrome = navigator.userAgent.toLowerCase().substring(posicion+7, posicion+11);
        //Comprobar version
        ver_chrome = parseFloat(ver_chrome);
        //alert('Su navegador es Google Chrome, Version: ' + ver_chrome);
        return 'chrome';
    }

    //Detectando si es Firefox
    if (is_firefox ) {
        var posicion = navigator.userAgent.toLowerCase().lastIndexOf('firefox/');
        var ver_firefox = navigator.userAgent.toLowerCase().substring(posicion+8, posicion+12);
        //Comprobar version
        ver_firefox = parseFloat(ver_firefox); 
       // alert('Su navegador es Firefox, Version: ' + ver_firefox);
       return 'firefox';
    }

    //Detectando Cualquier version de IE
    if (is_ie ) {
        var posicion = navigator.userAgent.toLowerCase().lastIndexOf('msie ');
        var ver_ie = navigator.userAgent.toLowerCase().substring(posicion+5, posicion+8);
        //Comprobar version
        ver_ie = parseFloat(ver_ie);
        //alert('Su navegador es Internet Explorer, Version: ' + ver_ie);
        return 'ie';
    }
}