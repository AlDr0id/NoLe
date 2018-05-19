$(document).ready(function(){

    $(".cateP").change(function(){
    	hideAllCates();
        switch($('select[name=cateP]').val()){
            case '0':
                $('.numis').show();
            break;
            case '1':
                $('.rdla').show();
            break;
            case '2':
                $('.fig').show();
            break;
            case '3':
                $('.fil').show()
            break;
            case '4':
                $('.vini').show()
            break;
            case '5':
                $('.cromos').show()
            break;
            case '6':
                $('.libros').show()
            break;
            case '7':
                $('.trastero').show();
            break;
            default:
                hideAllCates();
        }
    });
    function hideAllCates() {
        $('.numis').hide();
        $('.cromos').hide();
        $('.trastero').hide();
        $('.vini').hide();
        $('.libros').hide();
        $('.rdla').hide();
        $('.fig').hide();
        $('.fil').hide();
    }
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
 });