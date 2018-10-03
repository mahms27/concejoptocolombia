$(document).ready(function() {

    $("a[rel=example_group]").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        maxWidth    : 559,
        maxHeight   : 400,
        width       : 559,
        height      : 400,
          'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
            //return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });
   

    // $("img.imgEmpresa").click(function(){

    //     $.fancybox.open({
    //         wrapCSS: 'fancybox_custom',
    //         href        : '#fancyImgPais',
    //         maxWidth    : 559,
    //         maxHeight   : 400,
    //         fitToView   : false,
    //         width       : 559,
    //         height      : 400,
    //         margin      : 100,
    //         autoSize    : false,
    //         /*closeClick    : true,*/
    //         openEffect  : 'fade',
    //         closeEffect : 'fade',
    //         scrolling: 'no',/*
    //         closeBtn: false,*/
    //         padding: 0,
    //         modal: false

    //     });


    //     $("#background_videoYouTube img").on('click', function(){
    //             $.fancybox.close();
    //     });
    // });
    




});