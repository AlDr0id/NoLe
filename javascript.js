$(document).ready(function(){
    $(".login").click(function(){
        $('.popupReg').hide();
        $('.popupLogin').show();
    });
    $('.popupCloseButton').click(function(){
        $('.popupLogin').hide();
        $('.popupReg').hide();
        $('.popupPuja').hide();
    });
    $(".reg").click(function(){
        $('.popupLogin').hide();
        $('.popupReg').show();
    });

    $(".logo").click(function(){
        window.location = 'index.php';
    });

    $('.buscNombre').submit(function(event) {
        var formData = {
            'buscNom'              : $('input[name=buscNom]').val()
        };

        $.ajax({
            type        : 'POST',
            url         : 'procesarBusqueda.php',
            data        : formData,
            dataType    : 'json',
                        encode          : true
        })

            .done(function(data) {

                $(".container").load("resultsSearch.php?nom="+data);
                $(".hero-banner").hide();

            });

        event.preventDefault();
    });
    $('.pLogin').submit(function(event) {
        var formData = {
            'user'              : $('input[name=user]').val(),
            'pass'              : $('input[name=pass]').val()
        };

        $.ajax({
            type        : 'POST',
            url         : 'procesarLogin.php',
            data        : formData,
            dataType    : 'json',
            encode          : true
        })

            .done(function(data) {
                if (data['success']) {
                    $('.popupLogin').hide();
                    var currentLocation = window.location;
                    window.location = currentLocation;
                }
                else{
                    $(".logError").html(data['errors']);
                }

            });

        event.preventDefault();
    });

    $('.peReg').submit(function(event) {
        var formData = {
            'nom'              : $('input[name=nom]').val(),
            'ape'              : $('input[name=ape]').val(),
            'userReg'              : $('input[name=userReg]').val(),
            'mail'              : $('input[name=mail]').val(),
            'passReg'              : $('input[name=passReg]').val(),
            'passReg2'              : $('input[name=passReg2]').val()
        };
        console.log(formData);
        $.ajax({
            type        : 'POST',
            url         : 'procesarRegistro.php',
            data        : formData,
            dataType    : 'json',
            encode          : true
        })

            .done(function(data) {
                if (data.success) {
                    $(".peReg").html("<p class='exito'>El registro se ha efectuado correctamente</p>");
                    $(".regCont").css("height","");
                }
                else{
                    $(".regError").html(data['errors']);
                }
            });

        event.preventDefault();
    });

    function correoValido(correo) {
        var arroba = correo.indexOf("@");
        correo = correo.substring(arroba,correo.length);
        var punto = correo.indexOf(".");
        correo = correo.substring(punto + 1,correo.length);

        return ( arroba > 0 && punto > 1 && correo.length > 0);
    }

    $("#mail").change(function(){

        if (correoValido($("#mail").val() ) ) {

            $("#correoNoValido").hide();

        } else {

            $("#correoNoValido").show();

        }
    });

    

    
});