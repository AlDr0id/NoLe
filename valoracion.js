$(".valorar").click(function(){
   	$('.popupValorar').show();
});
$('.popupCloseButton').click(function(){
    $('.popupLogin').hide();
    $('.popupReg').hide();
    $('.popupPuja').hide();
    $('.popupValorar').hide();
});
function valorarPuja(id,nickname) {
	var path = "procesarValoracion.php?id="+id+"&nickname="+nickname;
	$(".valForm").attr("action", path);
}