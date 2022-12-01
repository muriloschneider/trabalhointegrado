function confirmarSenha() {
    if (document.getElementById('usuaSenha').value == document.getElementById('usuaSenhaConfirma').value && document.getElementById('usuaSenha').value.length >= 8) {
        document.getElementById('enviar').disabled = false;
        document.getElementById('mensagemSenha').style.display = "none";
    } else {
        document.getElementById('enviar').disabled = true;
        document.getElementById('mensagemSenhaPequena').style.display = "none";
    }
    
    // if (document.getElementById('usuaSenha').value.length > 0  && document.getElementById('usuaSenha').value.length < 8 || document.getElementById('usuaSenha').value.length >= 21) {
    //     document.getElementById('mensagemSenhaPequena').style.display = "show";
    // } else {
    //     document.getElementById('mensagemSenhaPequena').style.display = "none";
    // }
}

function formatar(mascara, documento){
var i = documento.value.length;
var saida = mascara.substring(0,1);
var texto = mascara.substring(i);

if (texto.substring(0,1) != saida){
	documento.value += texto.substring(0,1);
}
}
    