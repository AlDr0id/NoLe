$(document).ready(function(){
    function disactivePerfil() {
        $('.actividadReciente').removeClass('activePerfil');
        $('.verProductos').removeClass('activePerfil');
        $('.verPujas').removeClass('activePerfil');
        $('.verProductosPuja').removeClass('activePerfil');
        $('.cambiarPass').removeClass('activePerfil');
        $('.deleteCuenta').removeClass('activePerfil');
        $('.anadirProducto').removeClass('activePerfil');
        $('.verPerfil').removeClass('activePerfil');
    }

    disactivePerfil();
    var loc = String(window.location);
    console.log(loc);
    if (loc.indexOf('actividadReciente') != -1) {
        $('.actividadReciente').addClass('activePerfil');
    }
    if (loc.indexOf('verProds') != -1) {
        $('.verProductos').addClass('activePerfil');
        $(".verOpts").slideToggle("slow");
        $('.ver i').attr('class','up');
    }
    if (loc.indexOf('verPujas') != -1) {
        $('.verPujas').addClass('activePerfil');
        $(".verOpts").slideToggle("slow");
        $('.ver i').attr('class','up');
    }
    if (loc.indexOf('verProdPuja') != -1) {
        $('.verProductosPuja').addClass('activePerfil');
        $(".verOpts").slideToggle("slow");
        $('.ver i').attr('class','up');
    }
    if (loc.indexOf('camPass') != -1) {
        $('.cambiarPass').addClass('activePerfil');
    }
    if (loc.indexOf('deleteCuenta') != -1) {
        $('.deleteCuenta').addClass('activePerfil');
    }
    if (loc.indexOf('anadProd') != -1) {
        $('.anadirProducto').addClass('activePerfil');
    }
    if (loc.indexOf('verPerfil') != -1) {
        $('.verPerfil').addClass('activePerfil');
    }
    if (loc.indexOf('verProdSolic') != -1) {
        $('.verProductosSolicitados').addClass('activePerfil');
        $(".verOpts").slideToggle("slow");
        $('.ver i').attr('class','up');
    }
    if (loc.indexOf('solicitarProd') != -1) {
        $('.solicitarProducto').addClass('activePerfil');
    }
    
  $('.ver').click(function () {
    $(".verOpts").slideToggle("slow");
    if ($('.ver i').attr('class') == 'down') {
        $('.ver i').attr('class','up');
    }
    else{
        $('.ver i').attr('class','down');
    }
    
  });
});
