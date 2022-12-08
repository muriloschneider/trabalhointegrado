window.onload = (function(){
    $.ajax({
        url: '../../php/controle/queryajax.php',
        method : 'POST',
        dataType: 'JSON'
    }).done(function(r){
        console.log(r);
        Grafico(r);
    }).fail(function(request){
        console.log(request.responseText);
    });;
});