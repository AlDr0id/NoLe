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
    }
    if (loc.indexOf('verPujas') != -1) {
        $('.verPujas').addClass('activePerfil');
    }
    if (loc.indexOf('verProdPuja') != -1) {
        $('.verProductosPuja').addClass('activePerfil');
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

});
