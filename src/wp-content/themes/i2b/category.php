<?php 
    $idcategoria = get_query_var('cat');  
    $id = pa_category_top_parent_id($idcategoria);
    
    if(is_category(3)): //CARRERAS
        get_template_part('content', 'carreras');
    elseif($id == 14):
        wp_redirect(get_permalink(29));
    elseif (is_category(11) || $id == 11): //BLOG
        get_template_part('content', 'home_blog'); 
    else:
        get_template_part('content', 'category'); 
    endif; 
?>