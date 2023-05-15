<?php
if (isset($_POST['submit'])) {

    include_once('../config.php');

    $livro = $_POST['livro'];
    $usuario = $_POST['usuario'];
    $data_aluguel = $_POST['data_aluguel'];
    $data_devolucao = $_POST['data_devolucao'];
    $data_previsao = $_POST['data_previsao'];
    $quantidade = 1;

    $result = mysqli_query($conexao, "INSERT INTO aluga (livro, usuario, data_aluguel, data_previsao,  quantidade_alugada ) 
    VALUES ('$livro', '$usuario', '$data_aluguel','$data_previsao','$quantidade')");


    $sqllivro_conect = "SELECT * FROM livro WHERE nome_livro = '$livro'";
    $resultlivro_conect = $conexao->query($sqllivro_conect);
    $livro_data = mysqli_fetch_assoc($resultlivro_conect);
    $nomeLivro_BD = $livro_data['nome_livro'];
    $quantidade_BD = $livro_data['quantidade'];
    $quantidade_nova = $quantidade_BD - 1;

    $sqlAlterar = "UPDATE livro SET quantidade = '$quantidade_nova' WHERE nome_livro = '$nomeLivro_BD'";
    $sqlResultAlterar = $conexao->query($sqlAlterar);
    header('location: ../READ/aluguel.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel de Livros - WDA Livraria</title>
    <link rel="stylesheet" href="../estilos/style_cadastro2.css">
</head>

<body>
    <button><a href="../READ/aluguel.php">Voltar</a></button>
    <div class="container">

        <img id="imglogin" src="../img/cadastros/background2.png">

        <div class="form">
            <img id="logo4branca" src="../img/logo4branca.png">
            <form action="c_aluguel.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Realize o aluguel</h1>
                    </div>
                </div>
                <div class="input-group">
                    <!-- Livro puxar do banco -->
                    <div class="input-box">


                        <label for="Editora"><b>Livro:</b></label>
                        <select class="select" name="livro">
                            <option>Selecione</option>
                            <?php
                            include_once('../config.php');
                            $sql = "SELECT * FROM livro ORDER BY id_livro";
                            $res = mysqli_query($conexao, $sql);
                            while ($user_aluga = mysqli_fetch_row($res)) {
                                //puxar dados pelo id
                                $id_aluguel = $user_aluga[0];
                                //
                                $livro = $user_aluga[1];

                                echo "<option class='livro' value='$livro'>$livro</option>";
                            }
                            ?>
                        </select>


                    </div>
                    <!-- // -->
                    <div class="input-box">
                        <label for="Editora"><b>Usuários:</b></label>
                        <select class="select" name="usuario">
                            <option>Selecione</option>
                            <?php
                            include_once('../Config.php');
                            $sql = "SELECT * FROM usuario ORDER BY id_usuario";
                            $res = mysqli_query($conexao, $sql);
                            while ($user_livro = mysqli_fetch_row($res)) {
                                //puxar dados pelo id
                                $id_livro = $user_livro[0];
                                //
                                $nome_livro = $user_livro[1];

                                echo "<option class='usuario' value='$nome_livro'>$nome_livro</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="data_aluguel"><b>Data do aluguel:</b></label>
                        <input name="data_aluguel" id="data_aluguel" type="date" placeholder="Digite a data do aluguel" required>
                    </div>
                    <div class="input-box">
                        <label for="data_previsao"><b>Data da previsão de entrega:</b></label>
                        <input name="data_previsao" id="data_previsao" type="date" placeholder="Selecione a data da previsão de entrega" required>
                    </div>
                    <input type="hidden" name="data_devolucao" id="data_devolucao" value="">
                    <input type="submit" name="submit" id="submit" class="continue-button" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>