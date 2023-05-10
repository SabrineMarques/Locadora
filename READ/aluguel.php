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
              <th>...</th>
            </tr>
          </div>
        </thead>
        <tbody>
          <!-- O MySQL é um sistema de gerenciamento de banco de dados (SGBD) amplamente utilizado para armazenar, gerenciar e recuperar informações.

  O método mysqli_fetch_assoc() é usado em conjunto com a extensão MySQLi do PHP para recuperar uma linha de resultado de uma consulta MySQL como um array associativo. Isso significa que, em vez de indexar os dados por meio de números (como em um array numérico), os dados são indexados por meio de chaves de strings que correspondem aos nomes das colunas da tabela do banco de dados.
CALMAI HMHMHMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
Por exemplo, se você tiver uma tabela de usuários com as colunas "id", "nome", "email" e "idade", o método mysqli_fetch_assoc() pode ser usado para recuperar cada linha de dados como um array associativo com as chaves "id", "nome", "email" e "idade". Esses dados podem então ser usados ​​para exibir informações na sua aplicação web, ou para manipular ou atualizar os dados na tabela do banco de dados.

Espero que isso ajude você a entender o que o método mysqli_fetch_assoc() faz! -->
          <?php
          while ($user_data =  mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . "<b>" . $user_data['id_aluguel'] . "</td>";
            echo "<td>" . "<b>" . "<b>" . $user_data['livro'] . "</b>" . "</td>";
            echo "<td>" . "<b>" . $user_data['usuario'] . "</td>";
            echo "<td>" . "<b>" . $user_data['data_aluguel'] . "</td>";
            echo "<td>" . "<b>" . $user_data['data_previsao'] . "</td>";
            echo "<td>" . "<b>" . $user_data['data_devolucao'] . "</td>";
            if ($user_data['data_previsao'] >= $user_data['data_devolucao']) {
              echo "<td>No prazo</td>";
            } else {
              echo "<td> Em atraso </td>";
            }
            echo "<td>"
              . "<button class='trash'>" . "<a href='../DELETE/d_aluguel.php?id_aluguel=$user_data[id_aluguel]'>" . "<img class='iconusuario' src='img/trash.png'>" . "</a>" . "</button>"
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
    window.location = 'aluguel.php?search=' + search.value;
  }
</script>

</html>