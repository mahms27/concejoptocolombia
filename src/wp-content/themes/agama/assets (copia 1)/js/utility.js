(function($) {
	 $(".page-item-2  a:eq(0)").removeAttr("href");
	 $(".page-item-57  a:eq(0)").removeAttr("href");
	 $(".page-item-57  a:eq(0)").removeAttr("href");
	 $(".vision-search-field").attr("placeholder", "Buscar");
	 $(".tribe-events-back a").text("Volver a la Agenda");
	 $(".tribe-events-widget-link a").text("Ver la Agenda de Eventos");
	 $(".label-tribe-bar-date").text("Eventos en ");
	 $(".label-tribe-bar-search").text("Buscar");
	 $("#tribe-bar-collapse-toggle").text("Buscar Eventos");
	 $("#tribe-bar-search").attr("placeholder", "Palabra Clave");
	 $("#tribe-bar-date").attr("placeholder", "Fecha");
	 $("#tribe-events-monday").attr("data-day-abbr", "Lun");
	 $("#tribe-events-monday").attr("title", "Lunes");
	 $("#tribe-events-monday").text("Lunes");
	 //martes
	 $("#tribe-events-tuesday").attr("data-day-abbr", "Mar");
	 $("#tribe-events-tuesday").attr("title", "Martes");
	 $("#tribe-events-tuesday").text("Martes");
	 //miercoles
	 $("#tribe-events-wednesday").attr("data-day-abbr", "Mie");
	 $("#tribe-events-wednesday").attr("title", "Miercoles");
	 $("#tribe-events-wednesday").text("Miercoles");
	 //jueves
	 $("#tribe-events-thursday").attr("data-day-abbr", "Jue");
	 $("#tribe-events-thursday").attr("title", "Jueves");
	 $("#tribe-events-thursday").text("Jueves");
	 //viernes
	 $("#tribe-events-friday").attr("data-day-abbr", "Vie");
	 $("#tribe-events-friday").attr("title", "Viernes");
	 $("#tribe-events-friday").text("Viernes");
	 //sabado
	 $("#tribe-events-saturday").attr("data-day-abbr", "Sab");
	 $("#tribe-events-saturday").attr("title", "Sabado");
	 $("#tribe-events-saturday").text("Sabado");
	 //domingo
	 $("#tribe-events-sunday").attr("data-day-abbr", "Dom");
	 $("#tribe-events-sunday").attr("title", "Domingo");
	 $("#tribe-events-sunday").text("Domingo");
	 setTimeout(function(){
	 	$(".tribe-icon-month").html("Mes");
	 	$(".tribe-icon-list").text("Lista");
	 	$(".tribe-icon-day").text("Día");
	 	var text_original = $(".tribe-events-page-title").text();
	 	$(".tribe-events-page-title").text(change_languaje_title_events(text_original));
	 	if($("#tribe-events").length >0){
	 		$(".container.clearfix").html('<div class="container clearfix">Agenda del Concejo<ol class="breadcrumb"><li><a href="http://localhost/"><i class="fa fa-home"></i></a></li><li class="active">Agenda del Concejo</li></ol></div>');	 		
	 	}
	 	$(".tribe-events-ical tribe-events-button a").text("+ Exportar Eventos");
	 }, 0);
	 


})(jQuery);


function openTab(evt, option) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(option).style.display = "block";
    evt.currentTarget.className += " active";
}

function change_languaje_title_events(text_original){
    var text_split= text_original.split('for');
    var text_new = text_split[1].split(' ');
    var month=text_new[1];
    if(month.trim() == "January"){month ="Enero";}
    if(month.trim() == "February"){month ="Febrero";}
    if(month.trim() == "March"){month ="Marzo";}
    if(month.trim() == "April"){month ="Abril";}
    if(month.trim() == "May"){month ="Mayo";}
    if(month.trim() == "June"){month ="Junio";}
    if(month.trim() == "July"){month ="Julio";}
    if(month.trim() == "Agoust"){month ="Agosto";}
    if(month.trim() == "September"){month ="Septiembre";}
    if(month.trim() == "October"){month ="Octubre";}
    if(month.trim() == "November"){month ="Noviembre";}
    if(month.trim() == "December"){month ="Diciembre";}
    var text_final = "Eventos para " + month +" "+ text_new[2];
    return text_final;   
}