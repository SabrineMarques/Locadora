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
  $sql = "SELECT * FROM aluga WHERE id_aluguel LIKE '%$data%' or livro LIKE '%$data%' or usuario LIKE '%$data%' or data_aluguel LIKE '%$data%' or data_devolucao LIKE '%$data%' or data_previsao LIKE '%$data%'ORDER BY id_aluguel DESC";
} else {
  $sql = "SELECT * FROM aluga ORDER BY id_aluguel DESC";
}


//dados

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aluguel │ WDA Livraria</title>
  <link rel="stylesheet" href="../estilos/style_tabelas.css">
  <script src="https://kit.fontawesome.com/0bfe50ba03.js" crossorigin="anonymous"></script>
</head>

<body>
<header>
      <nav>
        <a class="logo" href="sistema.php"><img src="../img/logo4branca.png"></a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="sistema.php"><i class="fa-solid fa-house"></i>Início</a></li>
          <li><a href="usuario.php"><i class="fa-solid fa-user"></i>Usuário</a></li>
          <li><a href="editora.php"><i class="fa-solid fa-building"></i>Editora</a></li>
          <li><a href="livro.php"><i class="fa-solid fa-book"></i>Livros</a></li>
          <li><a href="aluguel.php"><i class="fa-solid fa-address-book"></i>Aluguel</a></li>
          <li><a href="sair.php">Sair</a></li>
        </ul>
      </nav>
    </header>
  <div class="container-usuario">

    <h1 class="usuarioh1"> Aluguéis </h1>
    <div class="search2">
      <div class="search">
        <input type="search" class="input-search" id="input-search" placeholder="Pesquisar...">
        <button onclick="searchData()">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
    <div class="novo">
      <button><a href='../CREATE/c_aluguel.php?id_aluguel=$user_data[id_aluguel]'><b>Novo aluguel</b></a></button>
    </div>
    <div class="tabela">
      <table>
        <thead>
          <div class="headers">
            <tr class="thead">
              <!-- Table Headers - Dados que irão ser retornados -->
              <th>#</th>
              <th>Livro</th>
              <th>Usuário</th>
              <th>Data do Aluguel</th>
              <th>Data da Previsão de Entrega</th>
              <th>Data da Devolução</th>
              <th>Status</th>
              <th>Devolver</th> 
            </tr>
          </div>
        </thead>
        <tbody>

          <?php
          while ($user_data =  mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . "<b>" . $user_data['id_aluguel'] . "</td>";
            echo "<td>" . "<b>" . "<b>" . $user_data['livro'] . "</b>" . "</td>";
            echo "<td>" . "<b>" . $user_data['usuario'] . "</td>";
            echo "<td>" . "<b>" . $user_data['data_aluguel'] . "</td>";
            echo "<td>" . "<b>" . $user_data['data_previsao'] . "</td>";
            echo "<td>" . "<b>" .$user_data['data_devolucao'] . "</td>";
            if ($user_data['data_devolucao'] == '') {
              echo "<td>" . "Não devolvido" . "</td>";
              echo "<td>"
              . "<button>" . "<a href='../UPDATE/u_aluguel.php?id_aluguel=$user_data[id_aluguel]'>" . "<img class='iconusuario' src='img/devolver.png'>" . "</a>" . "</button>"
              . "</td>";
            } else {
              $hoje = date("Y-m-d");
              $previsao = $user_data['data_previsao'];
              
              if ($previsao >= $hoje) {
                echo "<td>" . "No prazo" . "</td>";
                echo "<td>"
                  . "<button class='trash'>" . "<a href='../DELETE/d_aluguel.php?id_aluguel=$user_data[id_aluguel]'>" . "<img class='iconusuario' src='img/trash.png'>" . "</a>" . "</button>"
                  . "</td>";
              } else {
                echo "<td>" . "Atrasado" . "</td>";
                echo "<td>"
                  . "<button class='trash'>" . "<a href='../DELETE/d_aluguel.php?id_aluguel=$user_data[id_aluguel]'>" . "<img class='iconusuario' src='img/trash.png'>" . "</a>" . "</button>"
                  . "</td>";
              }
            }
          }
          echo "</tr";

          //   if ($user_data['data_previsao'] >= $user_data['data_devolucao']) {
          //     echo "<td>No prazo</td>";
          //   } else {
          //     echo "<td> Em atraso </td>";
          //   }
          //   echo "<td>"
          //     . "<button class='trash'>" . "<a href='../DELETE/d_aluguel.php?id_aluguel=$user_data[id_aluguel]'>" . "<img class='iconusuario' src='img/trash.png'>" . "</a>" . "</button>"
          //     . "</td>";
          //   echo "</tr";
          //   echo "<br>";
          ?>

        </tbody>
      </table>
    </div>
  </div>
  <input type="hidden" value="<?php $user_data['id_aluguel'] ?>">
</body>
<script lang="javascript">
  var search = document.getElementById('input-search');

  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      searchData();
    }
  });

  function searchData() {
    window.location = 'aluguel.php?search=' + search.value;
  }
</script>

</html>