$('.adv-search').submit(function(event){
    busca();
    event.preventDefault();
});
$("#categorias").change(function(event){
    hideAllCates();
    switch($('select[name=cateP]').val()){
        case '0':
            showCate('.numiBuscar');
            console.log('hla');
        break;
        case '1':
            showCate('.rdlaBuscar');
        break;
        case '2':
            showCate('.figBuscar');
        break;
        case '3':
            showCate('.filBuscar');
        break;
        case '4':
            showCate('.viniBuscar');
        break;
        case '5':
            showCate('.cromosBuscar');
        break;
        case '6':
            showCate('.libBuscar');
        break;
        case '7':
            showCate('.trasteroBuscar');
        break;
        default:
            hideAllCates();
    }
    busca();
    event.preventDefault();
});
$(".campo").change(function(event){
    busca();
    event.preventDefault();
});
function hideAllCates() {
    $('.numiBuscar').hide();
    $('.cromosBuscar').hide();
    $('.trasteroBuscar').hide();
    $('.viniBuscar').hide();
    $('.libBuscar').hide();
    $('.rdlaBuscar').hide();
    $('.figBuscar').hide();
    $('.filBuscar').hide();
    $('.numiBuscar').removeClass('opciones');
    $('.cromosBuscar').removeClass('opciones');
    $('.trasteroBuscar').removeClass('opciones');
    $('.viniBuscar').removeClass('opciones');
    $('.libBuscar').removeClass('opciones');
    $('.rdlaBuscar').removeClass('opciones');
    $('.figBuscar').removeClass('opciones');
    $('.filBuscar').removeClass('opciones');
}
function showCate(cate){
    $(cate).show();
    $(cate).addClass('opciones');
}
function busca() {
    var formData = {
        'cateP'              : $('select[name=cateP]').val(),
        'nomProd'              : $('input[name=nomProd]').val(),
        'minPre'              : $('select[name=minPre]').val(),
        'maxPre'              : $('select[name=maxPre]').val(),
        'anio'              : $('input[name=anio]').val(),
        'pais'              : $('input[name=pais]').val(),
        'cons'              : $('input[name=cons]').val()
    };

    $.ajax({
        type        : 'POST',
        url         : 'procesarBusquedaAvanzada.php',
        data        : formData,
        dataType    : 'json',
                    encode          : true
    })

        .done(function(data) {
            var path = "product-display.php?Categoria="+data['Categoria']+"&nombre="+data['nombre']+"&preciomax="+data['preciomax']+"&preciomin="+data['preciomin']+"&Fecha="+data['Fecha']+"&pais="+data['pais']+"&conservacion="+data['conservacion'];
            $('.productos').load(path);
            $('.busc').css("flex-direction","row");
            $('.adv-search-div').css("width","450px");
            $('.productos').css({"margin-left":"20px","width":"100%", "margin-right":"20px"});
            $('.opciones').css("flex-direction","column");
        });

} 