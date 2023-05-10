<?php 

include_once('../config.php'); 

if(isset($_POST['update'])) {

    $id_livro = $_POST['id_livro']; 
    $nome_livro = $_POST['nome_livro']; 
    $editora = $_POST['editora'];
    $autor = $_POST['autor'];
    $lancamento = $_POST['lancamento'];


    $sqlUpdate = "UPDATE livro SET nome_livro='$nome_livro', editora='$editora', autor='$autor', lancamento='$lancamento'
    WHERE id_livro='$id_livro'";

    $result = $conexao->query($sqlUpdate); 
    print_r($result);

}
header('Location: ../READ/livro.php');
?>