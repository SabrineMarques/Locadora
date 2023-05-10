<?php
include_once('../config.php');

// Se o id_livro não estiver vazio...
if (!empty($_GET['id_livro'])) {

    $id_livro = $_GET['id_livro'];
    $sqlSelect = "SELECT * FROM livro WHERE id_livro=$id_livro";

    $result = $conexao->query($sqlSelect);
    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {

            $nome_livro = $user_data['nome_livro'];
            $editora = $user_data['editora'];
            $autor = $user_data['autor'];
            $lancamento = $user_data['lancamento'];
        }
    } else {
        header('Location: ../READ/livro.php');
        exit();
    }
} else {
    header('Location: ../READ/livro.php');
    exit();
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
            <form action="./save_livro.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro de Livro</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome_livro"><b>Nome do Livro:</b></label>
                        <input name="nome_livro" id="nome_livro" type="text" value="<?php echo $nome_livro ?>" placeholder="Digite o nome do livro" required>
                    </div>
                    <div class="input-box">
                        <div class="select">
                            <label for="editora">Editora</label>
                            <select class="select" name="editora">
                                <option>Selecione</option>
                                <?php
                                include_once('../config.php');
                                $sql = "SELECT * FROM editora ORDER BY id_editora";
                                $res = mysqli_query($conexao, $sql);
                                while ($user_editora = mysqli_fetch_assoc($res)) {
                                    $id_editora = $user_editora['id_editora'];
                                    $nome_editora = $user_editora['nome_editora'];
                                    if ($nome_editora == $editora) {
                                        echo "<option value='$nome_editora' selected >$nome_editora</option>";
                                    } else {
                                        echo "<option value='$nome_editora'>$nome_editora</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="autor"><b>Autor:</b></label>
                        <input name="autor" id="autor" type="text" value="<?php echo $autor ?>" placeholder="Digite o autor
                        <div class=" input-box">
                    </div>
                    <div class="input-box">
                        <label for="lancamento"><b>Lançamento:</b></label>
                        <input name="lancamento" id="lancamento" type="lancamento" value="<?php echo $lancamento ?>" placeholder="Digite o lançamento" required>
                    </div>
                    <input type="hidden" name="id_livro" value="<?php echo $id_livro ?>">
                    <input type="submit" name="update" id="update" class="continue-button" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
