<?php 

include_once('../config.php'); 

if(isset($_POST['update'])) {

    $id_usuario = $_POST['id_usuario']; 
    $nome_usuario = $_POST['nome_usuario']; 
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];

    $sqlUpdate = "UPDATE usuario SET nome_usuario='$nome_usuario', celular='$celular', cidade='$cidade', email='$email', endereco='$endereco', cpf='$cpf'
    WHERE id_usuario='$id_usuario'";

    $result = $conexao->query($sqlUpdate); 
    print_r($result);
}
header('Location: ../READ/usuario.php');
?>