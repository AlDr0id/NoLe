$('.adv-search').submit(function(event){
    busca();
    event.preventDefault();
});
$("#categorias").change(function(event){
   if ($('select[name=cateP]').val() == 0) {
        $('.numiBuscar').show();
        $('.numiBuscar').addClass('opciones');
    }
    else{
        $('.numiBuscar').hide();
        $('.numiBuscar').delClass('opciones');
    }
    busca();
    event.preventDefault();
});
$(".campo").change(function(event){
    busca();
    event.preventDefault();
});

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