<?php
if (isset($_POST['submit'])) {

    include_once('../config.php');

    $nome_editora = $_POST['nome_editora'];
    $cidade = $_POST['cidade'];

                $sqlcliente = "SELECT * FROM editora WHERE nome_editora = '$nome_editora'"; 
                $resultado = $conexao->query($sqlcliente); // executa a consulta

            if (mysqli_num_rows($resultado) >= 1) { // verifica se encontrou algum registro
            $mensagem = 'Editora já existente'; // define a mensagem de erro
      } else {
         $result = mysqli_query($conexao, "INSERT INTO editora (nome_editora, cidade) VALUES ('$nome_editora', '$cidade')");
         
        }
        if (isset($mensagem)) { // verifica se há alguma mensagem de erro
            echo "<script type='text/javascript'>alert('$mensagem').then(() => {window.location.href = '../READ/editora.php';})</script>"; // exibe a mensagem de erro
        }else{

            header('location: ../READ/editora.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Editora - WDA Livraria</title>
    <link rel="stylesheet" href="../estilos/style_cadastro2.css">
</head>

<body>
    <button><a href="../READ/editora.php">Voltar</a></button>
    <div class="container">

        <img id="imglogin" src="../img/cadastros/background2.png">

        <div class="form">
            <img id="logo4branca" src="../img/logo4branca.png">
            <form action="c_editora.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro de Editora</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome_editora"><b>Nome da Editora:</b></label>
                        <input name="nome_editora" id="nome_editora" type="text" placeholder="Digite o nome da editora" required>
                    </div>
                    <div class="input-box">
                        <label for="cidade"><b>Cidade da Editora: </b></label>
                        <input name="cidade" id="cidade" type="text" placeholder="Digite o usuário" required>
                    </div>
                    <input type="submit" name="submit" id="submit" class="continue-button" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>