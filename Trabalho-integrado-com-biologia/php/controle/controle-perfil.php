<?php
    include_once (__DIR__."/../utils/autoload.php");
    session_start();
    error_reporting(0);
    
    $pathToSave = "../../img/perfil/";
    if ($_FILES) {
        // Verificando se existe o envio de arquivos.
        if ($_FILES['imagem']['error'] == 0) { // Verifica se o campo não está vazio.
        // print_r($_FILES['imagem']);
        // print_r($_FILES['imagem']['error']);
        // die();
            $dir = $pathToSave; // Diretório que vai receber o arquivo.
            $tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.
            $name = $_FILES['imagem']['name']; // Recebe o nome do arquivo.
            preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
            
            
            $separacao = explode(".", $name);
            $separacao[0] = $_SESSION['usuaId'];
            $nomeFinal = implode(".", $separacao);

            move_uploaded_file($tmpName, $dir.$nomeFinal);
            $imagem = "../../img/perfil/".$nomeFinal;
        } else {
            // $imagem == $_POST['usuaFoto'];
        }
    }

    try {
        if(isset($_GET['acao']) && $_GET['acao'] == 'delete') {
            //Excluir usuario
            $usua = new Usuario($_SESSION['usuaId'], '', '', '', '', '');
            $usua->delete();
            $_SESSION['dispId'] = '';
            header("Location: ../../php/controle/controle-login.php");
        } else{
        if(strlen($_POST['novaUsuaSenha']) >= 8) {
            //Atualizar as informações do usuário e SENHA
            if($_POST['usuaFoto'] == ""){
                $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['novaUsuaSenha'], $imagem);
            } else {
                if($imagem == ""){
                    $x = $_POST['usuaFoto'];
                } else {
                    $x = $imagem;
                }
                
                $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['novaUsuaSenha'], $x);
            }
            
            // if($imagem == '../../img/perfil/'){
            //     $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['novaUsuaSenha'], $imagem);
            // } else {
            //     $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['novaUsuaSenha'], $_POST['usuaFoto']);
            // }
           
        } else {
            if($_POST['usuaFoto'] == ""){
                $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['usuaSenha'], $imagem);
            } else {
                if($imagem == ""){
                    $x = $_POST['usuaFoto'];
                } else {
                    $x = $imagem;
                }
                
                $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['usuaSenha'], $x);
            } 
        }
        if($usua->update()) {
            header("Location: ../../view/usuario/perfil.php?msg=Usuário alterado com sucesso!");
        } else {
            header("Location: ../../view/usuario/perfil.php?msg=falha");
        }

        
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
    
    
    
    
?>