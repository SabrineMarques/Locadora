<?php
session_start();
include_once('../config.php');
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
    $sql = "SELECT * FROM usuario WHERE id_usuario LIKE '%$data%' or nome_usuario LIKE '%$data%' or cidade LIKE '%$data%' or email LIKE '%$data%' or endereco LIKE '%$data%' or cidade LIKE '%$data%' ORDER BY id_usuario DESC";

  } else {
  $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
}

$result = $conexao->query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuário │ WDA Livraria</title>
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
    <h1 class="usuarioh1">Usuários</h1>
    <div class="search2">
      <div class="search">
        <input type="search" class="input-search" id="input-search" placeholder="Pesquisar...">
        <button onclick="searchData()">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
    <div class="novo">
      <button><a href='../CREATE/c_usuario.php?id_usuario=$user_data[id_usuario]'><b>Cadastrar Novo</b></a></button>
    </div>
    <div class="tabela">
      <table>
        <thead>
          <div class="headers">
            <tr class="thead">
              <!-- Table Headers - Dados que irão ser retornados -->
              <th>#</th>
              <th>Nome</th>
              <th>Celular</th>
              <th>Cidade</th>
              <th>E-mail</th>
              <th>Endereço</th>
              <th>CPF</th>
              <th>...</th>
            </tr>
          </div>
        </thead>
        <tbody>
          <?php
          while ($user_data =  mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . "<b>" . $user_data['id_usuario'] . "</td>";
            echo "<td>" . "<b>" . "<b>" . $user_data['nome_usuario'] . "</b>" . "</td>";
            echo "<td>" . "<b>" . $user_data['celular'] . "</td>";
            echo "<td>" . "<b>" . $user_data['cidade'] . "</td>";
            echo "<td>" . "<b>" . $user_data['email'] . "</td>";
            echo "<td>" . "<b>" . $user_data['endereco'] . "</td>";
            echo "<td>" . "<b>" . $user_data['cpf'] . "</td>";
            echo "<td>"

              . "<button>" . "<a href='../UPDATE/u_usuario.php?id_usuario=$user_data[id_usuario]'>" . "<img class='iconusuario' src='img/pencil.png'>" . "</a>" . "</button>" .
              "<button class='trash'>" . "<a href='../DELETE/d_usuario.php?id_usuario=$user_data[id_usuario]'>" . "<img class='iconusuario' src='img/trash.png'>" . "</a>" . "</button>"

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
              }});

  function searchData() {
    window.location = 'usuario.php?search=' + search.value;
  }
</script>

</html>