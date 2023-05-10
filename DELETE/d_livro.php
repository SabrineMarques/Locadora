
<?php

    if(!empty($_GET['id_livro']))
    {
        include_once('../config.php');

        $id_livro = $_GET['id_livro'];

        $sqlSelect = "SELECT *  FROM livro WHERE id_livro=$id_livro";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM livro WHERE id_livro=$id_livro";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: ../READ/livro.php');
   
?>