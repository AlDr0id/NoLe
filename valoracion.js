$(".valorar").click(function(){
   	$('.popupValorar').show();
});
$('.popupCloseButton').click(function(){
    $('.popupLogin').hide();
    $('.popupReg').hide();
    $('.popupPuja').hide();
    $('.popupValorar').hide();
});
function valorarPuja(id) {
	var path = "procesarValoracion.php?id="+id;
	$(".valForm").attr("action", path);
}