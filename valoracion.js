
	$(".valorar").click(function(){
	   	$('.popupValorar').show();
	});
	$('.popupCloseButton').click(function(){
	    $('.popupLogin').hide();
	    $('.popupReg').hide();
	    $('.popupPuja').hide();
	    $('.popupValorar').hide();
	});
	function valorarPuja(idPuja) {
		var path = "procesarValoracion.php?idpuja="+idPuja;
		$(".valForm").attr("action", path);
	}
 