$(document).ready(function(){
    setTimeout(function() {
      $(".alert").fadeOut('slow ').empty();
    }, 6000);


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

    $('.cabecera .dropdown').hover(function(){
        $(".menu").css("position","initial");
    },function() {
        $(".menu").css("position","sticky");
    });
    

    $('#regSubmit').prop('disabled', true);
    

    $(".logo").click(function(){
        window.location = 'index.php';
    });

    function correoValido(correo) {
        var arroba = correo.indexOf("@");
        correo = correo.substring(arroba,correo.length);
        var punto = correo.indexOf(".");
        correo = correo.substring(punto + 1,correo.length);

        return ( arroba > 0 && punto > 1 && correo.length > 0);
    }

    $('#mail').on('input', function(){
        if(correoValido($('#mail').val())){
            if($('#passReg').val() == $('#passReg2').val())$('#regSubmit').prop('disabled', false);
            $('#errMail').hide();
        }
        else{
            $('#regSubmit').prop('disabled', true);
            $('#errMail').show();
        }
    });

    $('#passReg2').on('input', function(){
        if($('#passReg').val() == $('#passReg2').val()){
            if(correoValido($('#mail').val())) $('#regSubmit').prop('disabled', false);
            $('#errPass').hide();
        }
        else{
            $('#regSubmit').prop('disabled', true);
            $('#errPass').show();
        }
    });

    $('#passReg').on('input', function(){
        if($('#passReg').val() == $('#passReg2').val()){
            if(correoValido($('#mail').val())) $('#regSubmit').prop('disabled', false);
            $('#errPass').hide();
        }
        else{
            $('#regSubmit').prop('disabled', true);
            $('#errPass').show();
        }
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
                    $(".regError").hide();
                    $(".regCont").css("height","");
                }
                else{
                    $("#general").html(data['errors']);
                    $('#general').show();
                }
            });

        event.preventDefault();
    });



});
