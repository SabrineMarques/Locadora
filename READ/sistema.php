<?php
session_start();
include_once('../config.php');
// print_r($_SESSION);
if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['username']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}
$logado = $_SESSION['username'];


//dados


//Livros dentro e fora do prazo
$sql = "SELECT * FROM aluga ORDER BY id_aluguel DESC";
$result = mysqli_query($conexao, $sql);
$total_prazo = 0;
$total_foraprazo = 0;
$total_alugados = 0;
while ($user_data = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    $user_data['id_aluguel'];
    $user_data['livro'];
    $user_data['usuario'];
    $data_pre = $user_data['data_previsao'];
    $data_dev = $user_data['data_devolucao'];
    //   $user_data['Quantidade'];
    //Livro no prazo
    $hoje = date("Y-m-d");
    $previsao = $user_data['data_previsao'];
    

    if ($data_dev !== '') {
        if ($previsao >= $hoje)  {
            $total_prazo++;
        }
    }
    //Livro fora prazo
    if (($previsao < $hoje) && $data_dev !== '') {
      $total_foraprazo++;
    }
    if ($data_dev == '') {
        $total_alugados++;
    }
}
    //Total de livros
    $sql_total_livros = "SELECT COUNT(*) AS nome_livro FROM livro";
    $resultado_total_livros = $conexao->query($sql_total_livros);
    $linha_total_livros = $resultado_total_livros->fetch_assoc();
    if (isset($linha_total_livros['nome_livro'])) {
        $total_livros = $linha_total_livros['nome_livro'];
    }
// Consulta SQL para selecionar o registro mais recente
$sql = "SELECT * FROM aluga ORDER BY id_aluguel DESC LIMIT 1";
$resultado = mysqli_query($conexao, $sql);

// Verifica se ocorreu um erro na consulta SQL
if (!$resultado) {
    die("Erro ao consultar o banco de dados: " . mysqli_error($conexao));
}

// Obtém o registro mais recente da tabela
$registro = mysqli_fetch_assoc($resultado);

// Livro mais alugado 
$sql_mais_alugado = "SELECT livro FROM aluga WHERE livro=livro GROUP BY livro ORDER BY COUNT(livro) DESC LIMIT 1";
$resultado_mais_alugado = $conexao->query($sql_mais_alugado);
$mais_alugado = $resultado_mais_alugado->fetch_assoc();
if(isset( $mais_alugado['livro'])){
$mais_alug=  $mais_alugado['livro'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDA Livraria │ Bem vindo!</title>
    <link rel="stylesheet" href="../estilos/style_home.css">
    <script src="https://kit.fontawesome.com/0bfe50ba03.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
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
             <img class="banner" id="bannerwelcome" src="../img/home/Banner welcome.png">
    </div>
    <div id="texto1">
        <h1><u><?php echo $logado; ?></u>, aqui estão <br> seus relatórios.</h1>
    </div>

    <div class="relatorios">
        <main class="cards">
            <section class="card contact">
                <div class="icon">
                    <img src="../img/ícones/e-book (1).png">
                </div>
                <h3><?php echo $total_alugados; ?></h3>
                <span>Livros não entregues.</span>
                <button><a href="aluguel.php"><b>Saiba mais</b></a></button>
            </section>
            <section class="card shop">
                <div class="icon">
                    <img src="../img/ícones/e-book.png" alt="Shop here.">
                </div>
                <h3><?php echo $total_livros; ?></h3>
                <span>Quantidade de livros do sistema.</span>

                <button><a href="livro.php"><b>Saiba mais</b></a></button>
            </section>
            <section class="card about">
                <div class="icon">
                    <img src="../img/ícones/e-book (2).png" alt="About us.">
                </div>
                <h3><?php echo $total_foraprazo; ?></h3>
                <span>Quantidade de livros em atraso.</span>

                <button><a href="aluguel.php"><b>Saiba mais</b></a></button>
            </section>
 <section class="card about">
                <div class="icon">
                    <img src="../img/ícones/trofeu.png">
                </div>
                <h3> <?php if(isset($mais_alug)){
              echo "<h4>".$mais_alug."</h4>"."<br>";
              
            }else{
              echo "<h5>O livro mais alugado vai aparecer aqui!</h5>";
            }
            
            ?></h3>
                <span class="maisalug">O livro mais alugado</span>
                <button><a href="aluguel.php"><b>Saiba mais</b></a></button>
            </section>
          
            
        </main>
    </div>
    <div class="ultimoaluguel">
        <h1>Último aluguel</h1>
        <h2><i class="fa-solid fa-book"></i><?php echo "Livro: " . "<span>" . $registro['livro'] . "</span>"; ?></h2>
        <h2><i class="fa-solid fa-user"></i><?php echo "Alugado por: " . "<span>" . $registro['usuario'] . "</span>"; ?></h2>
        <h2><i class="fa-solid fa-clock"></i><?php echo "Data: " . "<span>" . $registro['data_aluguel'] . "</span>"; ?></h2>
        <button><a href="aluguel.php"><b>Ver o aluguel</b></a></button>
    </div>
    </div>
    <footer>
        <ul>
            <li><a href="index.html"><b>Início</b></a></li>
            <li><a href="usuario.php"><b>Usuário</b> </a></li>
            <li><a href="editora.php"><b>Editora</b></a></li>
            <li><a href="livro.php"><b>Livros</b></a></li>
            <li><a href="aluguel.php"><b>Aluguel</b></a></li>
        </ul>
        <p>&copy; 2023 - Por: Sabrine Marques</p>
    </footer>

</body>
<script lang="javascript">

class MobileNavbar {
  constructor(mobileMenu, navList, navLinks) {
    this.mobileMenu = document.querySelector(mobileMenu);
    this.navList = document.querySelector(navList);
    this.navLinks = document.querySelectorAll(navLinks);
    this.activeClass = "active";

    this.handleClick = this.handleClick.bind(this);
  }

  animateLinks() {
    this.navLinks.forEach((link, index) => {
      link.style.animation
        ? (link.style.animation = "")
        : (link.style.animation = `navLinkFade 0.5s ease forwards ${
            index / 7 + 0.3
          }s`);
    });
  }

  handleClick() {
    this.navList.classList.toggle(this.activeClass);
    this.mobileMenu.classList.toggle(this.activeClass);
    this.animateLinks();
  }

  addClickEvent() {
    this.mobileMenu.addEventListener("click", this.handleClick);
  }

  init() {
    if (this.mobileMenu) {
      this.addClickEvent();
    }
    return this;
  }
}

const mobileNavbar = new MobileNavbar(
  ".mobile-menu",
  ".nav-list",
  ".nav-list li",
);
mobileNavbar.init();


</script>
</html>
