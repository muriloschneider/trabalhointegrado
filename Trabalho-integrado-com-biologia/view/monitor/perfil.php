<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == '') {
            header("Location: login-cadastro.php");
        }
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
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head> 
<body>   
    <section>
        
        
        <main>
            <div class="heading">
                <h2>Informações do perfil</h2>
                <a href="../../index.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a>            
            </div>
        
            <form action="../../php/controle/controle-perfil.php" method="post" enctype="multipart/form-data">                           
                            <label for="nome_moni">Nome completo</label>
                            <input required class="" type="" id="nome_moni" name="nome_moni" placeholder="" minlength="3" value="<?php echo $info['nome_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>

                            <label for="cpf_moni">Certidão de Pessoa Física</label>
                            <input required class="" type="email" id="text" name="cpf_moni" placeholder="" value="<?php echo $info['cpf_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>

                            <label for="contato_moni">Contato</label>
                            <input required class="" type="email" id="telefone" name="contato_moni" placeholder="" value="<?php echo $info['contato_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>

                            <label for="login_moni">Login</label>
                            <input required class="" type="email" id="telefone" name="login_moni" placeholder="" value="<?php echo $info['login_moni'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        
                            <label for="usuaSenha">Senha</label>
                            <input required onkeyup='confirmarSenha();' class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="" minlength="8" value="<?php if(!isset($_GET['update'])) {echo $info['usuaSenha'];}?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>

                            <label <?php if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenha">Nova senha</label>
                            <input onkeyup='confirmarSenha();' class="<?php if(!isset($_GET['update'])) {echo "oculto";} else {echo "show";}?>" type="password" id="novaUsuaSenha" name="novaUsuaSenha" placeholder="" minlength="8" maxlength="20" value="">

                            <label <?php if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenhaConfirma">Confirmar senha</label>
                            <input onkeyup='confirmarSenha();' class="" type="password" id="novaUsuaSenhaConfirma" name="" placeholder="" minlength="8" maxlength="20" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>


                            <button class="" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?> disabled>Salvar</button>

                            <button class="delete" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?> disabled><a onclick="excluir()"> Excluir perfil</a></button>
                     
                            <div class="button"><a onclick="<?php if(isset($_GET['update'])) {echo "return confirm('Deseja mesmo cancelar?')";}?>" href="<?php if(!isset($_GET['update'])) {echo "perfil.php?update=true";} else {echo "perfil.php";}?>"><button class="" type="button" id="editarEcancelar" name="" value="" onclick="editarEcancela()"><?php if(!isset($_GET['update'])) {echo "Editar";} else {echo "Cancelar";}?></button></a></div>
            </form>
    </section>
    <script>var senhaAtual = "<?php echo $info["senha_moni"];?>";</script>
    <script src="../../js/perfil.js"></script>
</body>
</html>