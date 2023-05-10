<?php 
// criação das variáveis
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = ''; 
    $dbName = 'dblocadora';

//conexao
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    //   if ($conexao->connect_errno) {
    //      echo "Erroooooo"; 
    //  } else {
    //   echo "conexão efetuada"; 
    // }
    
?>