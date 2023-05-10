<?php
session_start();
include_once('../config.php');
include_once('funcoes.php');
//
if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {

  unset($_SESSION['username']);
  unset($_SESSION['senha']);
  header('Location: ../login.php');
}
$logado = $_SESSION['username'];
//
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM livro WHERE id_livro LIKE '%$data%' or nome_livro LIKE '%$data%' or editora LIKE '%$data%' or autor LIKE '%$data%' or lancamento LIKE '%$data%' ORDER BY id_livro DESC";
} else {
  $sql = "SELECT * FROM livro ORDER BY id_livro DESC";
}

$result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livro │ WDA Livraria</title>
  <link rel="stylesheet" href="../estilos/style_tabelas.css">
  <script src="https://kit.fontawesome.com/0bfe50ba03.js" crossorigin="anonymous"></script>
</head>

<body>
<nav id="menu">
            <ul>
                <a href="sistema.php"><img id="logo4branca" src="../img/logo4branca.png" alt="logo4branca"></a></li>
             
                <li><a href="sistema.php"><i class="fa-solid fa-house"></i><b>Início</b></a></li>
                <li><a href="usuario.php"><i class="fa-solid fa-user"></i><b>Usuário</b></a></a></li>
                <li><a href="editora.php"><i class="fa-solid fa-building"></i><b>Editora</b></a></a></li>
                <li><a href="livro.php"><i class="fa-solid fa-book"></i><b>Livros</b></a></a></li>
                <li><a href="aluguel.php"><i class="fa-solid fa-address-book"></i><b>Aluguel</b></a></a></li>
   
                <li><a href="sair.php"><b>Sair</b></a></li>
            </ul>
        </nav>
  <div class="container-usuario">

    <h1 class="usuarioh1">Livros</h1>
    <div class="search2">
      <div class="search">
        <input type="search" class="input-search" id="input-search" placeholder="Pesquisar...">
        <button onclick="searchData()">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
    <div class="novo">
      <button><a href='../CREATE/c_livro.php?id_livro=$user_data[id_livro]'><b>Cadastrar Novo</b></a></button>
    </div>
    <div class="tabela">
      <table>
        <thead>
          <div class="headers">
            <tr class="thead">
              <!-- Table Headers - Dados que irão ser retornados -->
              <th>#</th>
              <th>Nome</th>
              <th>Editora</th>
              <th>Autor</th>
              <th>Lançamento</th>
              <th>...</th>
            </tr>
          </div>
        </thead>
        <tbody>
          <?php
          while ($user_data =  mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . "<b>" . $user_data['id_livro'] . "</td>";
            echo "<td>" . "<b>" . "<b>" . $user_data['nome_livro'] . "</b>" . "</td>";
            echo "<td>" . "<b>" . $user_data['editora'] . "</td>";
            echo "<td>" . "<b>" . $user_data['autor'] . "</td>";
            echo "<td>" . "<b>" . $user_data['lancamento'] . "</td>";
            echo "<td>"

              . "<button>" . "<a href='../UPDATE/u_livro.php?id_livro=$user_data[id_livro]'>" . "<img class='iconusuario' src='img/pencil.png'>" . "</a>" . "</button>" .
              "<button class='trash'>" . "<a href='../DELETE/d_livro.php?id_livro=$user_data[id_livro]'>" . "<img class='iconusuario' src='img/trash.png'>" . "</a>" . "</button>"

              . "</td>";
            echo "</tr";
            echo "<br>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</body>
<script lang="javascript">
  var search = document.getElementById('input-search');

  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      searchData();
    }
  });

  function searchData() {
    window.location = 'livro.php?search=' + search.value;
  }
</script>

</html>