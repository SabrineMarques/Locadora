<?php
 include_once('../config.php');
if (isset($_POST['submit'])) {


    $nome_livro = $_POST['nome_livro'];
    $editora = $_POST['editora'];
    $autor = $_POST['autor'];
    $lancamento = $_POST['lancamento'];
    $quantidade = $_POST['quantidade'];
    
    $sqlcliente = "SELECT * FROM livro WHERE nome_livro = '$nome_livro'";

                $resultado = $conexao->query($sqlcliente); // executa a consulta

            if (mysqli_num_rows($resultado) > 0) { // verifica se encontrou algum registro
            $mensagem = 'Livro já cadastrado'; // define a mensagem de erro
      } else {
        $result = mysqli_query($conexao, "INSERT INTO livro (nome_livro, autor, editora, lancamento, quantidade) VALUES ('$nome_livro', '$autor','$editora', '$lancamento','$quantidade')");
         
        }
        if (isset($mensagem)) { // verifica se há alguma mensagem de erro
            echo "<script type='text/javascript'>alert('$mensagem').then(() => {window.location.href = '../READ/usuario.php';})</script>"; // exibe a mensagem de erro
        }else{

            header('location: ../READ/livro.php');
        }
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro - WDA Livraria</title>
    <link rel="stylesheet" href="../estilos/style_cadastro2.css">
</head>

<body>
    <button><a href="../READ/livro.php">Voltar</a></button>
    <div class="container">

        <img id="imglogin" src="../img/cadastros/background2.png">

        <div class="form">
            <img id="logo4branca" src="../img/logo4branca.png">
            <form action="c_livro.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro de Livro</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome_livro"><b>Nome do livro:</b></label>
                        <input name="nome_livro" id="nome_livro" type="text" placeholder="Digite o nome" required>
                    </div>
                    <div class="input-box">
                        <div class="select">
                        <label for="Editora"><b>Editora:</b></label>
                            <select class="select" name="editora">
                                <option>Selecione</option>
                                <?php
                                include_once('../config.php');
                                $sql = "SELECT * FROM editora ORDER BY id_editora";
                                $res = mysqli_query($conexao, $sql);
                                while ($user_livro = mysqli_fetch_row($res)) {
                                    //puxar dados pelo id
                                    $id_livro = $user_livro[0];
                                    //
                                    $nome_editora = $user_livro[1];

                                    echo "<option class='editora' value='$nome_editora'>$nome_editora</option>";
                                }
                                ?>
                            </select>
                        
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="autor"><b>Autor do livro:</b></label>
                        <input name="autor" id="autor" type="text" placeholder="Digite o autor" required>
                    </div>
                    <div class="input-box">
                        <label for="lancamento"><b>Lançamento:</b></label>
                        <input name="lancamento" id="lancamento" type="text" placeholder="Digite o lançamento do livro" required>
                    </div>
                    <div class="input-box">
                        <label for="quantidade"><b>Quantidade do estoque:</b></label>
                        <input name="quantidade" id="quantidade" type="text" placeholder="Digite a quantidade de livros" required>
                    </div>
                    <input type="submit" name="submit" id="submit" class="continue-button" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>