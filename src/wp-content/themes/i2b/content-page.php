<div class="efecto3d">
<?php while ( have_posts() ) :     
        the_post(); 
        $contenido[] = get_the_content(); 
        $column = obtenerCampoAdicional('columna_2_pagina');
        if($column != '') 
            $contenido[] = $column; 

        $column = obtenerCampoAdicional('columna_3_pagina');
        if($column != '')         
           $contenido[] = $column;   
        $column = obtenerCampoAdicional('columna_4_pagina');
        if($column != '')         
           $contenido[] = $column;           
    endwhile; wp_reset_query();
        
    $cant_columna = count($contenido);
    if($cant_columna == 1) $css = 'width-columnpag-1';
    else if($cant_columna == 2) $css = 'width-columnpag-2';
    else if($cant_columna == 3) $css = 'width-columnpag-3';
    else if($cant_columna == 4) $css = 'width-columnpag-4';
    
    $i = 1;
    foreach($contenido as $value) {  
        $i == 4 ? $css .= ' cero-margen-right' : '';
        echo '<div class="clearfix columnapag ' . $css . '">' . $value . '</div>';
        $i++;
    }
            
    unset($contenido);
 ?>       
</div>    