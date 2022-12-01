<?php
// Pega os elementos enviados do input
$input = $_GET['input'];
$value = $_GET['value'];


// Verificação dos valores inseridos:

	// Verificando o input de Nome:
	if ($input == "usuaNome") {
		if ($value == "") {
			echo "Insira seu nome";
		} else if (strlen($value) > 28) {
			echo "O nome deve ter no máximo 28 caracteres";				
		} else if (strlen($value) < 4) {
			echo "O nome deve ter no minímo 4 caracteres";		
		} 
	}
?> 
