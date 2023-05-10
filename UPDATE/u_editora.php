<?php
     include_once('../config.php'); 
     // Se id_editora não estiver vazio...
     if(!empty($_GET['id_editora'])) {
         
         include_once('../config.php'); 
        $id_editora = $_GET['id_editora'];
        $sqlSelect = "SELECT * FROM editora WHERE id_editora=$id_editora";

        
        
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {

                $nome_editora = $user_data['nome_editora']; 
                $cidade = $user_data['cidade'];
            }
        } else {
            header('Location: ../READ/editoraphp');
        }
} else {
    header('Location: ../READ/editora.php');
}
        
?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - WDA Livraria</title>
     <link rel="stylesheet" href="../CREATE/style_cadastro2.css">
</head>
<body>
<button><a href="../READ/usuario.php">Voltar</a></button>    
<div class="container">
        <img id="imglogin" src="../img/cadastros/background2.png">
        <div class="form">
            <img id="logo4branca" src="../img/logo4branca.png">
            <form action="./save_editora.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre sua Editora</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome_editora"><b>Nome da Editora:</b></label>
                        <input name="nome_editora" id="nome_editora" type="text"  value="<?php echo $nome_editora?>" placeholder="Digite seu nome" required>
                    </div>
                    <div class="input-box">
                        <label for="cidade"><b>Cidade da editora:</b></label>
                        <input name="cidade" id="cidade" type="tel"  value="<?php echo $cidade?>"  placeholder="Digite seu telefone" required>
                    </div>
                        <input type="hidden" name="id_editora" value="<?php echo $id_editora?>">
                        <input type="submit" name="update" id="update" class="continue-button" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>