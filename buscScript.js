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
            showCate('.librosBuscar');
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
    $('.librosBuscar').hide();
    $('.rdlaBuscar').hide();
    $('.figBuscar').hide();
    $('.filBuscar').hide();
    $('.numiBuscar').removeClass('opciones');
    $('.cromosBuscar').removeClass('opciones');
    $('.trasteroBuscar').removeClass('opciones');
    $('.viniBuscar').removeClass('opciones');
    $('.librosBuscar').removeClass('opciones');
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
        'cons'              : $('input[name=cons]').val(),
        'rclaTipo'          : $('select[name=rclaTipo]').val(),
        'rclaOrigen'        : $('input[name=rclaOrigen]').val(),
        'figTema'           : $('input[name=figTema]').val(),
        'figMaterial'       : $('input[name=figMaterial]').val(),
        'figFabricante'     : $('input[name=figFabricante]').val(),
        'filPais'           : $('input[name=filPais]').val(),
        'filAnyo'           : $('input[name=filAnyo]').val(),
        'viniAnyo'          : $('input[name=viniAnyo]').val(),
        'viniComp'          : $('input[name=viniComp]').val(),
        'viniGrupo'         : $('input[name=viniGrupo]').val(),
        'viniGenero'        : $('input[name=viniGenero]').val(),
        'cromosAnyo'        : $('input[name=cromosAnyo]').val(),
        'cromosColec'       : $('input[name=cromosColec]').val(),
        'cromosNum'         : $('input[name=cromosNum]').val(),
        'librosAnyo'        : $('input[name=librosAnyo]').val(),
        'librosAutor'       : $('input[name=librosAutor]').val(),
        'librosEditorial'   : $('input[name=librosEditorial]').val(),
        'librosGenero'      : $('input[name=librosGenero]').val(),
        'librosIdioma'      : $('input[name=librosIdioma]').val(),
        'trasteroAnyo'      : $('input[name=trasteroAnyo]').val(),
        'trasteroOrigen'    : $('input[name=trasteroOrigen]').val()
    };
    console.log(formData);
    $.ajax({
        type        : 'POST',
        url         : 'procesarBusquedaAvanzada.php',
        data        : formData,
        dataType    : 'json',
                    encode          : true
    })

        .done(function(data) {
            var general = "product-display.php?Categoria="+data['Categoria']+"&nombre="+data['nombre']+"&preciomax="+data['preciomax']+"&preciomin="+data['preciomin'];
            var numismatica = "&numiFecha="+data['numiFecha']+"&numipais="+data['numipais']+"&numiconservacion="+data['numiconservacion'];
            var rdla = "&rdlaTipo="+data['rdlaTipo']+"&rdlaOrigen="+data['rdlaOrigen'];
            var figuras = "&figTema="+data['figTema']+"&figMaterial="+data['figMaterial']+"&figFabricante="+data['figFabricante'];
            var filatelia = "&filPais="+data['filPais']+"&filFecha="+data['filFecha'];
            var vinilos_discos = "&viniFecha="+data['viniFecha']+"&viniAutor="+data['viniAutor']+"&viniGrupo="+data['viniGrupo']+"&viniGenero="+data['viniGenero'];
            var cromos = "&cromosFecha="+data['cromosFecha']+"&cromosColeccion="+data['cromosColeccion']+"&cromosNcomro="+data['cromosNcomro'];
            var libros = "&librosFecha="+data['librosFecha']+"&librosAutor="+data['librosAutor']+"&librosEditorial="+data['librosEditorial']+"&librosGenero="+data['librosGenero']+"&librosIdioma="+data['librosIdioma'];
            var trastero = "&trasteroFecha="+data['trasteroFecha']+"&trasteroOrigen="+data['trasteroOrigen'];

            var path = general + numismatica + rdla + figuras + filatelia + vinilos_discos + cromos + libros + trastero;
            $('.productos').load(path);
            $('.busc').css("flex-direction","row");
            $('.adv-search-div').css("width","450px");
            $('.productos').css({"margin-left":"20px","width":"100%", "margin-right":"20px"});
            $('.opciones').css("flex-direction","column");
        });

} 