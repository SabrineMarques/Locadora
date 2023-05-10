<?php

    if(!empty($_GET['id_aluguel']))
    {
        include_once('../config.php');

        $id_aluguel = $_GET['id_aluguel'];

        $sqlSelect = "SELECT *  FROM aluga WHERE id_aluguel=$id_aluguel";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM aluga WHERE id_aluguel=$id_aluguel";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: ../READ/aluguel.php');
?>
