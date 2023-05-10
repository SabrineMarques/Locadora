<?php 
include_once('../config.php');
//Livos dentro e fora do prazo
$sql = "SELECT * FROM aluga ORDER BY id_aluguel DESC";
$result = $conexao->query($sql);
$total_prazo = 0;
$total_foraprazo = 0;
$status = 0;
while ($user_data = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  $user_data['id_aluguel'];
  $user_data['livro'];
  $user_data['usuario'];
  $data_pre = $user_data['data_previsao'];
  $data_dev = $user_data['data_devolucao'];
  //     //   $user_data['Quantidade'];
  //     //Livro no prazo
  //     $total_prazo = 0;
  // $total_foraprazo = 0;
  //     if ($data_pre >= $data_dev) {
  //         $total_prazo++;
  //          $status = "No prazo"; 
  //     }else{
  //         $total_foraprazo++;
  //         $status = "Atrasado"; 
  //     }
  //Total de livros
  $sql_total_livros = "SELECT COUNT(*) AS nome_livro FROM livro";
  $resultado_total_livros = $conexao->query($sql_total_livros);
  $linha_total_livros = $resultado_total_livros->fetch_assoc();
  if (isset($linha_total_livros['nome_livro'])) {
    $total_livros = $linha_total_livros['nome_livro'];
  }
}
