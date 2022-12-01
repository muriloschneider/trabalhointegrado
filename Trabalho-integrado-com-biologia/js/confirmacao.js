// A variável "objeto" receve o objeto XMLHttpRequest --> Usada para enviar requisições HTTPS diretamente com o servidor
var objeto;

// Função que realiza a validação dos dados
function validar(input, value) {
	// Envio dos valores para a página de controle e validação.
    var link ="../../php/utils/validacao.php?input="+input+"&value="+value;

	if(window.XMLHttpRequest) {
		objeto	= new XMLHttpRequest();
	}
		
	// Processamento da requisição feita:
	// O método envia os dados para a página php que realiza as validações
	objeto.open("Get", link, true); 
	
	// Função que cria a div com a mensagem
	objeto.onreadystatechange = function() {
		// Verificação do AJAX
		// ReadyState --> Retorna o status XMLHttpRequest
		// Status --> Retorna o status da página (Ex: error 404)
		if(objeto.readyState == 4 && objeto.status == 200) {
			// Valor retornado pela página de controle
			var resposta = objeto.responseText;			
			document.getElementById('div_'+ input +'').innerHTML = resposta;
		}
	}
	// envia nulo
	objeto.send(null);
}