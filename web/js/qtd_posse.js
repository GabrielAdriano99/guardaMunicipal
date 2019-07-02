$(function(){

    $("#funcionariohasmaterial-material_idmaterial").focusout(function(){
        var qtdPosse = document.querySelector('#funcionariohasmaterial-material_idmaterial').value;
        console.log(qtdPosse);
        //return document.write(qtdPosse);
        return qtdPosse;
    });

});