function confirmarSenha() {
    if (senhaAtual == document.getElementById('usuaSenha').value && document.getElementById('novaUsuaSenha').value == document.getElementById('novaUsuaSenhaConfirma').value) {
        document.getElementById('enviar').disabled = false;
    } else {
        document.getElementById('enviar').disabled = true;
    }
}