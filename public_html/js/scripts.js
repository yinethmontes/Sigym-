/*
 * SCRIPTS OSHUNU
 *
 */
// MENUS
$().ready(function() {
	$("ul.subnav").parent().append("<span></span>"); 	
	$("ul.topnav li span").click(function() { 		
		$(this).parent().find("ul.subnav").slideDown('fast').show(); 

		$(this).parent().hover(function() {
		}, function(){	
			$(this).parent().find("ul.subnav").slideUp('slow'); 
		});

		}).hover(function() { 
			$(this).addClass("subhover"); 
		}, function(){	
			$(this).removeClass("subhover"); 
	});
	
		
	
	$("#btn_buscar").bind("click", function(e) {	
		var txt_buscar = $("#txt_buscar").val();
		$("#gri1").setGridParam({url:"?grilla=1&buscar="+txt_buscar,page:1}).trigger("reloadGrid");
	});
	$("#txt_buscar").bind("keydown", function(e) {	
		var codigo = $(this).val();	
		if(e.keyCode==13){
			var txt_buscar = $("#txt_buscar").val();
			$("#gri1").setGridParam({url:"?grilla=1&buscar="+txt_buscar,page:1}).trigger("reloadGrid");
		}	
	});
	$(".aplicar").bind("click", function(e) {	
		$("#ctr").val("apli");
		$("#form1").submit();
	});


});
// FUNCION PARA CONFIRMAR 
function confi ( mensaje ) {
	return confirm( mensaje );	
}
function confi_btn ( mensaje , dat) {
	var r = confirm(mensaje);
	if (r){ 
		location.href='?' + dat;
	}
}

