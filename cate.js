$(".cateP").change(function(){
	var value = $(".cateP").val();
	if(value = '0'){
		$(".numis").show();
	}
});
$('.newProdForm').submit(function(event) {
        var formData = {
            'nomP'              : $('input[name=nomP]').val(),
            'cateP'              : $('select[name=cateP]').val(),
            'precio'              : $('input[name=precio]').val(),
            'descP'              : $('textarea[name=descP]').val(),
            'paisP'              : $('input[name=paisP]').val(),
            'anioP'              : $('input[name=anioP]').val(),
            'consP'              : $('input[name=consP]').val()
        };
        alert(formData);
        $.ajax({
            type        : 'POST',
            url         : 'procesarNuevoProducto.php',
            data        : formData,
            dataType    : 'json',
            encode          : true
        })

            .done(function(data) {
                if (data['success']) {
                    $(".newProd").html("<p class='exito'>El producto se ha añadido/actualizado</p>");
                }
                else{
                    $(".pError").html(data['error']);
                }
            });

        event.preventDefault();
    });