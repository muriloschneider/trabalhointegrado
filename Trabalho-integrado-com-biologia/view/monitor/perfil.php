<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
    }
    if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == '') {
        header("Location: login-cadastro.php");
    }

    include_once (__DIR__."/../../php/utils/autoload.php");

    //Salvar contexto
    $info = Monitor::consultarId($_SESSION['id_moni'])[0];
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do lixo ao luxo</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/perfil.css">

</head> 
<body>   
    <header>
        <div class="navbar">
        <ul>
            <li><a href="../vermonAll.php">VER MONITORAMENTOS</a></li>
            <li><a href="../monitor/perfil.php">INICIAL</a></li>
            <li><a href="../monitoramentosAll.php">FAZER NOVO MONITORAMENTO</a></li>
        </ul>
        </div>
    </header>
    
        <main>
            <div class="info">
                <center><h2>BEM VINDO USUÁRIO <?php echo $info['nome_moni']?>!</h2></center>

                <form action="../../php/controle/controle-perfil.php?acao=update" method="post" enctype="multipart/form-data">                           
                    <div class="input-wrap">
                        <label for="nome_moni">NOME</label>
                        <input  required class="" type="" id="nome_moni" name="nome_moni" placeholder="" minlength="3" value="<?php echo $info['nome_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                    </div>

                    <div class="input-wrap">
                        <label for="cpf_moni">CPF</label>
                        <input required class="" type="text" id="text" name="cpf_moni" placeholder="" value="<?php echo $info['cpf_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                    </div>

                    <div class="input-wrap">
                        <label for="contato_moni">Contato</label>
                        <input required class="" type="email" id="telefone" name="contato_moni" placeholder="" value="<?php echo $info['contato_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                    </div>

                    <div class="input-wrap">
                        <label for="login_moni">Login</label>
                        <input required class="" type="text" id="telefone" name="login_moni" placeholder="" value="<?php echo $info['login_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                    </div>

                    <div class="input-wrap">
                        <label for="senha_moni">Senha</label>
                        <input required class="" type="password" id="senha_moni" name="senha_moni" placeholder="" minlength="8" value="<?php echo $info['senha_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                    </div>

                     <!-- <label <?php //if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenha">Nova senha</label>
                            <input onkeyup='confirmarSenha();' class="<?php //if(!isset($_GET['update'])) {echo "oculto";} else {echo "show";}?>" type="password" id="novaUsuaSenha" name="novaUsuaSenha" placeholder="" minlength="8" maxlength="20" value="">

                            <label <?php //if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenhaConfirma">Confirmar senha</label>
                            <input onkeyup='confirmarSenha();' class="" type="password" id="novaUsuaSenhaConfirma" name="" placeholder="" minlength="8" maxlength="20" value="" <?php // if(!isset($_GET['update'])) {echo "hidden";}?>> -->


            </div>
        
            <div class="botoes" > 
                
                   <button div class="button" class="" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>SALVAR</button>
          

               
                    <button class="button" type="button"><a style="color:#76a90f;" onclick="return confirm('Deseja mesmo encerrar?')" <?php if(!isset($_GET['update'])) {echo "hidden";}?> href="../../php/controle/controle-perfil.php?acao=delete">EXCLUIR</a></button>
                
                
                   <a class="button" style="font-size:240%; color:#76a90f;" onclick="<?php if(isset($_GET['update'])) {echo "return confirm('Deseja mesmo cancelar?')";}?>" href="<?php if(!isset($_GET['update'])) {echo "perfil.php?update=true";} else {echo "perfil.php";}?>">
                   <center>  <button class="" type="button" id="editarEcancelar" name="" value="" onclick="editarEcancela()"><?php if(!isset($_GET['update'])) {echo "Editar";} else {echo "Cancelar";}?></button></center>
                    </a>
                
                
               
                    <button class="button" type="button"><a style="color:#76a90f;" onclick="return confirm('Deseja mesmo encerrar?')" href="../../php/controle/controle-login.php">ENCERRAR A SESSÃO</a></button>


        </form>


                    

                    <!--<div class="button"><a onclick="confirmar()"><button type="button" id="" name="" >Encerrar sessão</button></a></div>-->
                    
                    
                    

        <!-- <div class="confirmar" id="confirmar">
           <div class="confirmar-content">
                <a>
                    <span class="close-button" onclick="closeConfirmar()">
                        &times;
                    </span>
                </a>
                <h1>Deseja encerrar a sessão?</h1>
                 <div class="div-botao-modal">
                <a onclick="closeConfirmar()"><button type="button"class="btn-modal">Cancelar</button></a>
                <a href="../../php/controle/controle-login.php"><button type="button" class="btn-modal">Encerrar sessão</button></a>
            </div>
            </div>
        </div>
              
              
        <div class="excluir" id="excluir">
           <div class="excluir-content">
                <a>
                    <span class="close-button" onclick="closeExcluir()">
                        &times;
                    </span>
                </a>
                <h1>Deseja excluir o perfil?</h1>
                 <div class="div-botao-modal">
                <a onclick="closeExcluir()"><button type="button"class="btn-modal">Cancelar</button></a>
                <a href="../../php/controle/controle-perfil.php?acao=delete"><button type="button" class="btn-modal">Excluir perfil</button></a>
            </div>
            </div> -->
        <!-- </div>     -->
                  </div>
    </body>
</html>