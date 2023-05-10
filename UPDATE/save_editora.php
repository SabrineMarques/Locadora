<?php 

include_once('../config.php'); 

if(isset($_POST['update'])) {

    $id_editora = $_POST['id_editora']; 
    $nome_editora = $_POST['nome_editora']; 
    $cidade = $_POST['cidade'];

    $sqlUpdate = "UPDATE editora SET nome_editora='$nome_editora', cidade='$cidade'
    WHERE id_editora='$id_editora'";

    $result = $conexao->query($sqlUpdate); 
    print_r($result);
}
header('Location: ../READ/editora.php');
?>