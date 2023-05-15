<?php 
    if(!empty($_GET['id_aluguel'])){
        include_once('../config.php');
        
        date_default_timezone_set('America/Sao_Paulo');

        $id_aluguel = $_GET['id_aluguel'];

        $sqlSelect = "SELECT * FROM aluga WHERE id_aluguel = $id_aluguel";
        $resultSelect = $conexao -> query($sqlSelect);

        $aluguel_data = mysqli_fetch_assoc($resultSelect);
        $livro = $aluguel_data['livro'];

        $hoje = new DateTime();
        $hoje2 = $hoje -> format('Y-m-d');


        // Conexão tabela Livros
        $sqllivro_conect = "SELECT * FROM livro WHERE nome_livro = '$livro'";
        $resultlivro_conect = $conexao -> query($sqllivro_conect);

        $livro_data = mysqli_fetch_assoc($resultlivro_conect);
        $nomeLivro_BD = $livro_data['nome_livro'];   
        $quantidade_BD = $livro_data['quantidade'];
        $quantidade_nova = $quantidade_BD + 1;
        
        $sqlAlterar = "UPDATE livro SET quantidade = '$quantidade_nova' WHERE nome = '$nomeLivro_BD'";
        $sqlResultAlterar = $conexao -> query($sqlAlterar);

        if($resultSelect -> num_rows > 0){
            $sqlUpdate = "UPDATE aluga SET data_devolucao = '$hoje2' WHERE id_aluguel = $id_aluguel";
            $resultUpdate = $conexao -> query($sqlUpdate);
        }
        else{
            header('Location: ../READ/aluguel.php');
        }
        header('Location: ../READ/aluguel.php');
}

?>