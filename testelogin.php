<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('./config.php');
        // variavel 
        $username = $_POST['username'];
        $senha = $_POST['senha'];

        // print_r('username: ' . $username);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM acesso WHERE username = '$username' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        // if(mysqli_num_rows($result) < 1)
        // {
        //     unset($_SESSION['username']);
        //     unset($_SESSION['senha']);
        //     header('location: ./login.php');
        // }
        // else {
        //     $_SESSION['username'] = $username;
        //     $_SESSION['senha'] = $senha;
        //     header('location: ../READ/sistema.php');
        // }
        if (mysqli_num_rows($result) < 1) {
        
            unset($_SESSION['username']);//destruir dados
            unset($_SESSION['senha']);//destruir dados
            header('location: ./login.php');
        } else {
            $_SESSION['username']=$username;
            $_SESSION['senha']=$senha;
         header('location: ./READ/sistema.php');
        }
    
    }
    else
    {
        // Não acessa
        header('Location: login.php');
    }
