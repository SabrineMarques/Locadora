<?php

    if(!empty($_GET['id_editora']))
    {
        include_once('../config.php');

        $id_editora = $_GET['id_editora'];

        $sqlSelect = "SELECT *  FROM editora WHERE id_editora=$id_editora";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM editora WHERE id_editora=$id_editora";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: ../READ/editora.php');
   
?>
