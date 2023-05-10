<?php
     include_once('../config.php'); 
     // Se id_usuario não estiver vazio...
     if(!empty($_GET['id_usuario'])) {
         
         include_once('../config.php'); 
        $id_usuario = $_GET['id_usuario'];
        $sqlSelect = "SELECT * FROM usuario WHERE id_usuario=$id_usuario";

        
        
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {

                $nome_usuario = $user_data['nome_usuario']; 
                $celular = $user_data['celular'];
                $cidade = $user_data['cidade'];
                $email = $user_data['email'];
                $endereco = $user_data['endereco'];
                $cpf = $user_data['cpf'];
            }
        
        } else {
            header('Location: ../READ/usuario.php');
        }
} else {
    header('Location: ../READ/usuario.php');
}
        
?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - WDA Livraria</title>
     <link rel="stylesheet" href="../estilos/style_cadastro2.css">
</head>
<body>
<button><a href="../READ/usuario.php">Voltar</a></button>    
<div class="container">
        <img id="imglogin" src="../img/cadastros/background2.png">
        <div class="form">
            <img id="logo4branca" src="../img/logo4branca.png">
            <form action="./save_usuario.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre seu usuário</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome_usuario"><b>Nome do usuário:</b></label>
                        <input name="nome_usuario" id="nome_usuario" type="text"  value="<?php echo $nome_usuario?>" placeholder="Digite seu nome" required>
                    </div>
                    <div class="input-box">
                        <label for="celular"><b>Número de telefone:</b></label>
                        <input name="celular" id="celular" type="tel"  value="<?php echo $celular?>"  placeholder="Digite seu telefone" required>
                    </div>
                    <div class="input-box">
                        <label for="cidade"><b>Cidade:</b></label>
                        <input name="cidade" id="cidade" type="text"  value="<?php echo $cidade?>"  placeholder="Digite sua cidade" required>
                    </div>
                    <div class="input-box">
                        <label for="email"><b>E-mail:</b></label>
                        <input name="email" id="email" type="email"  value="<?php echo $email?>"  placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input-box">
                        <label for="endereco"><b>Endereço completo:</b></label>
                        <input name="endereco" id="endereco" type="text"  value="<?php echo $endereco?>"  placeholder="Digite seu endereço completo " required>
                    </div>
                    <div class="input-box">
                        <label for="cpf"><b>CPF:</b></label>
                        <input name="cpf" id="cpf" type="text"  value="<?php echo $cpf?>"  placeholder="Digite seu CPF (opcional)">
                    </div>
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>">
                        <input type="submit" name="update" id="update" class="continue-button" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
