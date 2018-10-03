/**
 * I2B Forms
 * 
 * ATENCION: esta version del script ha sido modificada segun las necesidades
 * del proyecto Mi Entel.
 * 
 */
$.fn.selectBox = function(options){
    return this.each(function(){
        var w = $(this).css('width');
        w = (/[0-9]*px/i.test(w)) ? parseInt(w) : 200;        
        var opt = {
            'border': 'none',
            'background': 'transparent',
            'height': 32,
            'width': w,
            'textAlign': 'left'
        };
        
        if ($(this).attr('opt')) {
            $.extend(opt, eval('(' + $(this).attr('opt') + ')'));
        }
                
        //var input_hidden = '<input type="hidden" name="motivo" value=""/>';
        
        var select = $(this).hide();
        var options = select[0].options;
        var input_s = $('<input readonly="readonly" type="text" class="input_s" />').css({
            'border': opt.border,
            'background': opt.background,
            'padding-left': '4px'
        });
        var container = select.parent();
        
        var css_divs = {
            'float': 'left',
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_select.jpg)',
            'backgroundRepeat': 'no-repeat',
            'width': 0,
            'height': opt.height
        };
		var css_divs_error = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_input_error.gif)'
		};
        var css_arrow = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/img_select_arrow.jpg)',
            'width': 32,
            'height': opt.height
        };
		var css_arrow_error = {
			'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/img_select_arrow_error.gif)'
		};
        var css_option = {
            'height': 30,
            'color': '#777777',
            'background': '#fff',
            'cursor': 'pointer',
            'fontSize': '13px',
            'fontFamily': 'Droid Sans',
            'paddingLeft': 10,
            'paddingRight': 10
        };
        
        var css_option_over = {};
        $.extend(css_option_over, css_option)
        css_option_over.color = '#777777';
        css_option_over.background = '#eeeeee';
        
        var drop_down = function(){
            options = select[0].options;
            if (options.length > 0) {
                divl.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_select.jpg)');
                divc.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_select.jpg)');
                diva.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_select.jpg)');
                divr.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_select.jpg)');
				arrow.css('backgroundImage', css_arrow.backgroundImage);
                options_div.empty().show();
                
                if (options.length > 6) 
                    options_div.css({
                        'overflowY': 'scroll',
                        'overflowX': 'hidden',
                        'height': css_option.height * 6
                    })
                var table = $('<table></table>').appendTo(options_div).css('borderCollapse', 'collapse');
                $.each(options, function(i, val){
                    var tr = $('<tr></tr>').appendTo(table);
                    var td = $('<td></td>').attr({
                        'align': 'left',
                        'value': val.value
                    }).html(val.text).appendTo(tr).css(css_option).bind('mouseover', function(){
                        $(this).css(css_option_over);
                    }).bind('mouseout', function(){
                        $(this).css(css_option);
                    }).bind('mousedown', function(){
                        select.attr('value', $(this).attr('value'));
                        input_s.val($(this).html());
                        
                        if (select.change) {
                            select.change();
                           //$('input[name='+ select[0].name + ']').val($(this).attr('value'));                            
                        }
                    });
                });
                
                $(document).bind('mousedown', function(e){
                    if (!$(e.target).is('.options_div')) {
                        /*divl.css('backgroundImage', css_divs.backgroundImage);
                        divc.css('backgroundImage', css_divs.backgroundImage);
                        diva.css('backgroundImage', css_divs.backgroundImage);
                        divr.css('backgroundImage', css_divs.backgroundImage);
						arrow.css('backgroundImage', css_arrow.backgroundImage);*/
                        options_div.hide();
                        input_s.focus();
                        $(document).unbind('mousedown');
                    }
                });
            }
        }
        
        //var div = $('<div>'+input_hidden+'</div>').appendTo(container).css({
        var div = $('<div></div>').appendTo(container).css({
            'zIndex': 900	,
            'float': 'left',
            'position': 'relative',
            'height': css_divs.height,/*'width':opt.width,*/
            'cursor': 'pointer'
        }).bind('click', drop_down);
        var divl = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '0px 0px'
        });
        var divc = $('<div class="divc"></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': opt.width - css_arrow.width - (css_divs.width * 2) //MODIFICAR*/
        });
        var diva = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': css_arrow.width
        });
        var divr = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': 'right 0px'
        });
        var arrow = $('<div></div>').appendTo(diva).css(css_arrow);
        
        // Solo para centrar verticalmente el input ******
        var table = $('<table></table>').appendTo(divc).css({
            'height': '100%',
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        });
        var tr = $('<tr></tr>').appendTo(table);
        var td = $('<td></td>').appendTo(tr);
        // *****************
        
        input_s.appendTo(td).css({
            'cursor': 'pointer',
            'textAlign': opt.textAlign,
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        }).bind('blur', function(){
            divl.css('backgroundImage', css_divs.backgroundImage);
            divc.css('backgroundImage', css_divs.backgroundImage);
            diva.css('backgroundImage', css_divs.backgroundImage);
            divr.css('backgroundImage', css_divs.backgroundImage);
            options_div.hide();
        });
        
        // Options **********
        var css_options_div = {
            'position': 'absolute',
            'background': '#555',
            'width': opt.width,
            'top': 31,
            'left': 0,
            'border': '1px solid #cccccc',
            'overflowX': 'hidden',
            'zIndex': 5001            
        }
        
        var options_div = $('<div class="divsel"></div>').addClass('options_div').appendTo(div).css(css_options_div).hide();
        // ******************
        
        if(options.length > 0) {
            input_s.val(options[0].text);
            select.val(options[0].value);
        }
        
        var div_disabled = $('<div></div>').hide().appendTo(div).css({
            position: 'absolute',
            top: 0,
            left: 0,
            width: ($.browser.msie && $.browser.version == '6.0') ? opt.width + 4 : opt.width,
            height: opt.height,
            background: '#ccc',
            opacity: 0.7
        });
        
        this.enable = function(){
            div_disabled.hide();
            div.bind('click', drop_down);
        };
        this.disable = function(){
            div_disabled.show().css('cursor', 'default');
            div.unbind('click', drop_down);
        };
        this.setValue = function(v){
            select.attr('value', v);
            input_s.val(select[0].options[select[0].selectedIndex].text);            
        };
		
		this.enableError = function() {
			divl.css('backgroundImage', css_divs_error.backgroundImage);
			divc.css('backgroundImage', css_divs_error.backgroundImage);
			diva.css('backgroundImage', css_divs_error.backgroundImage);
			divr.css('backgroundImage', css_divs_error.backgroundImage);
			arrow.css('backgroundImage', css_arrow_error.backgroundImage);
		};
		
		this.disableError = function() {
			divl.css('backgroundImage', css_divs.backgroundImage);
			divc.css('backgroundImage', css_divs.backgroundImage);
			diva.css('backgroundImage', css_divs.backgroundImage);
			divr.css('backgroundImage', css_divs.backgroundImage);
			arrow.css('backgroundImage', css_arrow.backgroundImage);
		};
        
        if (select.attr('disabled')) {
            this.disable();
        }
    });
};

$.fn.inputBox = function(){
    return this.each(function(){
        var w = $(this).width();         
        //w = (/[0-9]*px/i.test(w)) ? parseInt(w) : 280;          
        var opt = {
            'border': 'none',
            'background': 'transparent',
            'height': 32,
            'width': w,
            'textAlign': 'left',
            'bg':  'bg_input.jpg'
        };
        
        if ($(this).attr('opt')) {
            $.extend(opt, eval('(' + $(this).attr('opt') + ')'));
        }
        
        if (arguments.length > 0) {
			if (typeof arguments[0] == 'object') {
				$.extend(opt, arguments[0]);
			}
		}
        
        var input = $(this).css({
            'border': opt.border,
            'background': opt.background
        });
        var container = input.parent();
        
        var css_divs = {
            'float': 'left',
            'backgroundImage': 'url('+ BASE_IMG +'i2bforms/' + opt.bg + ')',
            'backgroundRepeat': 'no-repeat',
            'width': 4,            
            'height': opt.height            
        };
        var css_divs_error = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_input_error.jpg)'
		};
        var div = $('<div></div>').appendTo(container).css({
            'float': 'left',
            'position': 'relative',
            'height': css_divs.height/*'width':opt.width,*/
        });
        var divl = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '0px 0px'
        });
        var divc = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': opt.width - (css_divs.width * 2)
        });
        var divr = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': 'right 0px'
        });
        
        // Solo para centrar verticalmente el input ******
        var table = $('<table></table>').appendTo(divc).css({
            'height': '100%',
            'width': opt.width - (css_divs.width * 2)
        });
        var tr = $('<tr></tr>').appendTo(table);
        var td = $('<td></td>').appendTo(tr);
        // *****************
        
        input.appendTo(td).css({
            'textAlign': opt.textAlign,
            'width': opt.width - (css_divs.width * 2)
        }).bind('blur', function(){
            /*divl.css('backgroundImage', css_divs.backgroundImage);
            divc.css('backgroundImage', css_divs.backgroundImage);
            divr.css('backgroundImage', css_divs.backgroundImage);*/
        }).val(this.value);
		
		
		this.enableError = function() {
			divl.css('backgroundImage', css_divs_error.backgroundImage);
			divc.css('backgroundImage', css_divs_error.backgroundImage);
			divr.css('backgroundImage', css_divs_error.backgroundImage);
		};
		
		this.disableError = function() {
			divl.css('backgroundImage', css_divs.backgroundImage);
			divc.css('backgroundImage', css_divs.backgroundImage);
			divr.css('backgroundImage', css_divs.backgroundImage);
		};
		
    });
};


// intento de implementacion de carga de datos en formulario 'ver factura' seccion facturacion
function carga(){
    var cuenta = document.getElementById('cuenta').value
    if (cuenta == '4') {
        document.getElementById('uno').style.display = 'block'
    }
    else {
        document.getElementById('uno').style.display = 'none'
    }
}


$.fn.selectBoxAmarillo = function(){
    return this.each(function(){
        var w = $(this).css('width');
        w = (/[0-9]*px/i.test(w)) ? parseInt(w) : 200;
        var opt = {
            'border': 'none',
            'background': 'transparent',
            'height': 26,
            'width': w,
            'textAlign': 'left'
        };
        
        if ($(this).attr('opt')) {
            $.extend(opt, eval('(' + $(this).attr('opt') + ')'));
        }
        
        var select = $(this).hide();
        var options = select[0].options;
        var input_s = $('<input readonly="readonly" type="text" />').css({
            'border': opt.border,
            'background': opt.background
        });
        var container = select.parent();
        
        var css_divs = {
            'float': 'left',
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_inputYellow.gif)',
            'backgroundRepeat': 'no-repeat',
            'width': 4,
            'height': opt.height
        };
        var css_arrow = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_inputYellowArrow.gif)',
            'width': 18,
            'height': opt.height
        };
        var css_option = {
            'height': 20,
            'color': '#444',
            'background': '#fff',
            'cursor': 'pointer',
            'fontSize': '11px',
            'fontFamily': 'Arial',
            'paddingLeft': 10,
            'paddingRight': 10
        };
        var css_option_over = {};
        $.extend(css_option_over, css_option)
        css_option_over.color = '#fff';
        css_option_over.background = '#555';
        
        var drop_down = function(){
            options = select[0].options;
            div.css("position", "relative");
            if (options.length > 0) {
                divl.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_inputYellow.gif)');
                divc.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_inputYellow.gif)');
                diva.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_inputYellow.gif)');
                divr.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_inputYellow.gif)');
                options_div.empty().show();
                
                if (options.length > 6) 
                    options_div.css({
                        'overflowY': 'scroll',
                        'overflowX': 'hidden',
                        'height': css_option.height * 6
                    });
                var table = $('<table></table>').appendTo(options_div).css('borderCollapse', 'collapse');
                $.each(options, function(i, val){
                    var tr = $('<tr></tr>').appendTo(table);
                    var td = $('<td></td>').attr({
                        'align': 'left',
                        'value': val.value
                    }).html(val.text).appendTo(tr).css(css_option).bind('mouseover', function(){
                        $(this).css(css_option_over);
                    }).bind('mouseout', function(){
                        $(this).css(css_option);
                    }).bind('mousedown', function(){
                        select.attr('value', $(this).attr('value'));
                        input_s.val($(this).html());
                        
                        if (select.change) {
                            select.change();
                        }
                    });
                });
                
                $(document).bind('mousedown', function(e){
                    if (!$(e.target).is('.options_div')) {
                        divl.css('backgroundImage', css_divs.backgroundImage);
                        divc.css('backgroundImage', css_divs.backgroundImage);
                        diva.css('backgroundImage', css_divs.backgroundImage);
                        divr.css('backgroundImage', css_divs.backgroundImage);
                        options_div.hide();
                        divl.parent().css("position", "static");
                        input_s.focus();
                        $(document).unbind('mousedown');
                    }
                });
            }
        };
        
        var div = $('<div></div>').appendTo(container).css({
            'zIndex': 5000,
            'float': 'left',
            'position': 'inline',
            'height': css_divs.height,/*'width':opt.width,*/
            'cursor': 'pointer'
        }).bind('click', drop_down);
        var divl = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '0px 0px'
        });
        var divc = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        });
        var diva = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': css_arrow.width
        });
        var divr = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': 'right 0px'
        });
        var arrow = $('<div></div>').appendTo(diva).css(css_arrow);
        
        // Solo para centrar verticalmente el input ******
        var table = $('<table></table>').appendTo(divc).css({
            'height': '100%',
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        });
        var tr = $('<tr></tr>').appendTo(table);
        var td = $('<td></td>').appendTo(tr);
        // *****************
        
        input_s.appendTo(td).css({
            'cursor': 'pointer',
            'textAlign': opt.textAlign,
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        }).bind('blur', function(){
            divl.css('backgroundImage', css_divs.backgroundImage);
            divc.css('backgroundImage', css_divs.backgroundImage);
            diva.css('backgroundImage', css_divs.backgroundImage);
            divr.css('backgroundImage', css_divs.backgroundImage);
            divl.parent().css("position", "static");
            options_div.hide();
        });
        
        // Options **********
        var css_options_div = {
            'position': 'absolute',
            'background': '#555',
            'width': opt.width,
            'top': 25,
            'left': 0,
            'border': '1px solid #999',
            'overflowX': 'hidden',
            'zIndex': 5001
        }
        
        var options_div = $('<div></div>').addClass('options_div').appendTo(div).css(css_options_div).hide();
        // ******************
        
        if(options.length > 0) {
            input_s.val(options[0].text);
            select.val(options[0].value);
        }
        
        var div_disabled = $('<div></div>').hide().appendTo(div).css({
            position: 'absolute',
            top: 0,
            left: 0,
            width: ($.browser.msie && $.browser.version == '6.0') ? opt.width + 4 : opt.width,
            height: opt.height,
            background: '#ccc',
            opacity: 0.7
        });
        
        this.enable = function(){
            div_disabled.hide();
            div.bind('click', drop_down);
        };
        this.disable = function(){
            div_disabled.show().css('cursor', 'default');
            div.unbind('click', drop_down);
        };
        this.setValue = function(v){
            select.attr('value', v);
            input_s.val(select[0].options[select[0].selectedIndex].text);
        };
        
        if (select.attr('disabled')) {
            this.disable();
        }
    });
};

$.fn.inputBoxAmarillo = function(){
    return this.each(function(){
        var w = $(this).css('width');
        w = (/[0-9]*px/i.test(w)) ? parseInt(w) : 225;
        var opt = {
            'border': 'none',
            'background': 'transparent',
            'height': 26,
            'width': w,
            'textAlign': 'left'
        }
        
        if ($(this).attr('opt')) {
            $.extend(opt, eval('(' + $(this).attr('opt') + ')'));
        }
        
        var input = $(this).css({
            'border': opt.border,
            'background': opt.background
        });
        var container = input.parent();
        
        var css_divs = {
            'float': 'left',
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_inputYellow.gif)',
            'backgroundRepeat': 'no-repeat',
            'width': 4,
            'height': opt.height
        };
        
        var div = $('<div></div>').appendTo(container).css({
            'float': 'left',
            'position': 'relative',
            'height': css_divs.height/*'width':opt.width,*/
        });
        var divl = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '0px 0px'
        });
        var divc = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': opt.width - (css_divs.width * 2)
        });
        var divr = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': 'right 0px'
        });
        
        // Solo para centrar verticalmente el input ******
        var table = $('<table></table>').appendTo(divc).css({
            'height': '100%',
            'width': opt.width - (css_divs.width * 2)
        });
        var tr = $('<tr></tr>').appendTo(table);
        var td = $('<td></td>').appendTo(tr);
        // *****************
        
        input.appendTo(td).css({
            'textAlign': opt.textAlign,
            'width': opt.width - (css_divs.width * 2)
        }).bind('blur', function(){
            divl.css('backgroundImage', css_divs.backgroundImage);
            divc.css('backgroundImage', css_divs.backgroundImage);
            divr.css('backgroundImage', css_divs.backgroundImage);
        }).val(this.value);
    });
};

$.fn.selectBoxNormal = function(options){
    return this.each(function(){
        var w = $(this).css('width');
        w = (/[0-9]*px/i.test(w)) ? parseInt(w) : 200;
        var opt = {
            'border': 'none',
            'background': 'transparent',
            'height': 26,
            'width': w,
            'textAlign': 'left'
        };
        
        if ($(this).attr('opt')) {
            $.extend(opt, eval('(' + $(this).attr('opt') + ')'));
        }
        
        var select = $(this).hide();
        var options = select[0].options;
        var input_s = $('<input readonly="readonly" type="text" />').css({
            'border': opt.border,
            'background': opt.background
        });
        var container = select.parent();
        
        var css_divs = {
            'float': 'left',
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_input_normar.gif)',
            'backgroundRepeat': 'no-repeat',
            'width': 4,
            'height': opt.height
        };
		var css_divs_error = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_input_error.gif)'
		};
        var css_arrow = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/img_select_arrow_normal.gif)',
            'width': 18,
            'height': opt.height
        };
		var css_arrow_error = {
			'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/img_select_arrow_error.gif)'
		};
        var css_option = {
            'height': 20,
            'color': '#444',
            'background': '#fff',
            'cursor': 'pointer',
            'fontSize': '11px',
            'fontFamily': 'Arial',
            'paddingLeft': 10,
            'paddingRight': 10
        };
        
        var css_option_over = {};
        $.extend(css_option_over, css_option)
        css_option_over.color = '#fff';
        css_option_over.background = '#555';
        
        var drop_down = function(){
            options = select[0].options;
            if (options.length > 0) {
                divl.css('backgroundImage', 'url('+ BASE_IMG +'i2bforms/bg_input_normar.gif)');
                divc.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_input_normar.gif)');
                diva.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_input_normar.gif)');
                divr.css('backgroundImage', 'url('+ BASE_IMG +'/i2bforms/bg_input_normar.gif)');
				arrow.css('backgroundImage', css_arrow.backgroundImage);
                options_div.empty().show();
                
                if (options.length > 6) 
                    options_div.css({
                        'overflowY': 'scroll',
                        'overflowX': 'hidden',
                        'height': css_option.height * 6
                    })
                var table = $('<table></table>').appendTo(options_div).css('borderCollapse', 'collapse');
                $.each(options, function(i, val){
                    var tr = $('<tr></tr>').appendTo(table);
                    var td = $('<td></td>').attr({
                        'align': 'left',
                        'value': val.value
                    }).html(val.text).appendTo(tr).css(css_option).bind('mouseover', function(){
                        $(this).css(css_option_over);
                    }).bind('mouseout', function(){
                        $(this).css(css_option);
                    }).bind('mousedown', function(){
                        select.attr('value', $(this).attr('value'));
                        input_s.val($(this).html());
                        
                        if (select.change) {
                            select.change();
                        }
                    });
                });
                
                $(document).bind('mousedown', function(e){
                    if (!$(e.target).is('.options_div')) {
                        /*divl.css('backgroundImage', css_divs.backgroundImage);
                        divc.css('backgroundImage', css_divs.backgroundImage);
                        diva.css('backgroundImage', css_divs.backgroundImage);
                        divr.css('backgroundImage', css_divs.backgroundImage);
						arrow.css('backgroundImage', css_arrow.backgroundImage);*/
                        options_div.hide();
                        input_s.focus();
                        $(document).unbind('mousedown');
                    }
                });
            }
        }
        
        var div = $('<div></div>').appendTo(container).css({
            'zIndex': 900	,
            'float': 'left',
            'position': 'relative',
            'height': css_divs.height,/*'width':opt.width,*/
            'cursor': 'pointer'
        }).bind('click', drop_down);
        var divl = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '0px 0px'
        });
        var divc = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        });
        var diva = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': css_arrow.width
        });
        var divr = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': 'right 0px'
        });
        var arrow = $('<div></div>').appendTo(diva).css(css_arrow);
        
        // Solo para centrar verticalmente el input ******
        var table = $('<table></table>').appendTo(divc).css({
            'height': '100%',
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        });
        var tr = $('<tr></tr>').appendTo(table);
        var td = $('<td></td>').appendTo(tr);
        // *****************
        
        input_s.appendTo(td).css({
            'cursor': 'pointer',
            'textAlign': opt.textAlign,
            'width': opt.width - css_arrow.width - (css_divs.width * 2)
        }).bind('blur', function(){
            divl.css('backgroundImage', css_divs.backgroundImage);
            divc.css('backgroundImage', css_divs.backgroundImage);
            diva.css('backgroundImage', css_divs.backgroundImage);
            divr.css('backgroundImage', css_divs.backgroundImage);
            options_div.hide();
        });
        
        // Options **********
        var css_options_div = {
            'position': 'absolute',
            'background': '#555',
            'width': opt.width,
            'top': 25,
            'left': 0,
            'border': '1px solid #ccc',
            'overflowX': 'hidden',
            'zIndex': 5001
        }
        
        var options_div = $('<div></div>').addClass('options_div').appendTo(div).css(css_options_div).hide();
        // ******************
        
        if(options.length > 0) {
            input_s.val(options[0].text);
            select.val(options[0].value);
        }
        
        var div_disabled = $('<div></div>').hide().appendTo(div).css({
            position: 'absolute',
            top: 0,
            left: 0,
            width: ($.browser.msie && $.browser.version == '6.0') ? opt.width + 4 : opt.width,
            height: opt.height,
            background: '#ccc',
            opacity: 0.7
        });
        
        this.enable = function(){
            div_disabled.hide();
            div.bind('click', drop_down);
        };
        this.disable = function(){
            div_disabled.show().css('cursor', 'default');
            div.unbind('click', drop_down);
        };
        this.setValue = function(v){
            select.attr('value', v);
            input_s.val(select[0].options[select[0].selectedIndex].text);
        };
		
		this.enableError = function() {
			divl.css('backgroundImage', css_divs_error.backgroundImage);
			divc.css('backgroundImage', css_divs_error.backgroundImage);
			diva.css('backgroundImage', css_divs_error.backgroundImage);
			divr.css('backgroundImage', css_divs_error.backgroundImage);
			arrow.css('backgroundImage', css_arrow_error.backgroundImage);
		};
		
		this.disableError = function() {
			divl.css('backgroundImage', css_divs.backgroundImage);
			divc.css('backgroundImage', css_divs.backgroundImage);
			diva.css('backgroundImage', css_divs.backgroundImage);
			divr.css('backgroundImage', css_divs.backgroundImage);
			arrow.css('backgroundImage', css_arrow.backgroundImage);
		};
        
        if (select.attr('disabled')) {
            this.disable();
        }
    });
};

$.fn.inputBoxNormal = function(){
    return this.each(function(){
        var w = $(this).css('width');
        w = (/[0-9]*px/i.test(w)) ? parseInt(w) : 225;
        var opt = {
            'border': 'none',
            'background': 'transparent',
            'height': 26,
            'width': w,
            'textAlign': 'left',
            'bg':  'bg_input_normar.gif'
        };
        
        if ($(this).attr('opt')) {
            $.extend(opt, eval('(' + $(this).attr('opt') + ')'));
        }
        
        if (arguments.length > 0) {
			if (typeof arguments[0] == 'object') {
				$.extend(opt, arguments[0]);
			}
		}
        
        var input = $(this).css({
            'border': opt.border,
            'background': opt.background
        });
        var container = input.parent();
        
        var css_divs = {
            'float': 'left',
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/' + opt.bg + ')',
            'backgroundRepeat': 'no-repeat',
            'width': 4,
            'height': opt.height
        };
        var css_divs_error = {
            'backgroundImage': 'url('+ BASE_IMG +'/i2bforms/bg_input_error.gif)'
		};
        var div = $('<div></div>').appendTo(container).css({
            'float': 'left',
            'position': 'relative',
            'height': css_divs.height/*'width':opt.width,*/
        });
        var divl = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '0px 0px'
        });
        var divc = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': '-' + css_divs.width + 'px 0px',
            'width': opt.width - (css_divs.width * 2)
        });
        var divr = $('<div></div>').appendTo(div).css(css_divs).css({
            'backgroundPosition': 'right 0px'
        });
        
        // Solo para centrar verticalmente el input ******
        var table = $('<table></table>').appendTo(divc).css({
            'height': '100%',
            'width': opt.width - (css_divs.width * 2)
        });
        var tr = $('<tr></tr>').appendTo(table);
        var td = $('<td></td>').appendTo(tr);
        // *****************
        
        input.appendTo(td).css({
            'textAlign': opt.textAlign,
            'width': opt.width - (css_divs.width * 2)
        }).bind('blur', function(){
            /*divl.css('backgroundImage', css_divs.backgroundImage);
            divc.css('backgroundImage', css_divs.backgroundImage);
            divr.css('backgroundImage', css_divs.backgroundImage);*/
        }).val(this.value);
		
		
		this.enableError = function() {
			divl.css('backgroundImage', css_divs_error.backgroundImage);
			divc.css('backgroundImage', css_divs_error.backgroundImage);
			divr.css('backgroundImage', css_divs_error.backgroundImage);
		};
		
		this.disableError = function() {
			divl.css('backgroundImage', css_divs.backgroundImage);
			divc.css('backgroundImage', css_divs.backgroundImage);
			divr.css('backgroundImage', css_divs.backgroundImage);
		};
		
    });
};
