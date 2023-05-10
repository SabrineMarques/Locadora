 <?php


    if (isset($_POST['submit'])) {
        include_once('../config.php');

        $username = $_POST['username'];
        $celular = $_POST['celular'];
        $cidade = $_POST['cidade'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $cpf = $_POST['cpf'];

                $sqlcliente = "SELECT * FROM usuario WHERE email = '$email'"; 
                $resultado = $conexao->query($sqlcliente); // executa a consulta

            if (mysqli_num_rows($resultado) >= 1) { // verifica se encontrou algum registro
            $mensagem = 'E-mail já existente'; // define a mensagem de erro
      } else {
         $result = mysqli_query($conexao, "INSERT INTO usuario (nome_usuario, celular, cidade, email, endereco, cpf) VALUES ('$username', '$celular','$cidade', '$email', '$endereco', '$cpf')");
         
        }
        if (isset($mensagem)) { // verifica se há alguma mensagem de erro
            echo "<script type='text/javascript'>alert('$mensagem').then(() => {window.location.href = '../READ/usuario.php';})</script>"; // exibe a mensagem de erro
        }else{

            header('location: ../READ/usuario.php');
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cadastro de Usuário - WDA Livraria</title>
     <link rel="stylesheet" href="../estilos/style_cadastro2.css">
 </head>

 <body>
     <button><a href="../READ/usuario.php">Voltar</a></button>
     <div class="container">

         <img id="imglogin" src="../img/cadastros/background2.png">

         <div class="form">
             <img id="logo4branca" src="../img/logo4branca.png">
             <form action="c_usuario.php" method="POST">
                 <div class="form-header">
                     <div class="title">
                         <h1>Cadastro de Usuário</h1>
                     </div>
                 </div>
                 <div class="input-group">
                     <div class="input-box">
                         <label for="nomeusuario"><b>Nome do usuário:</b></label>
                         <input name="username" id="nomeusuario" type="text" placeholder="Digite seu nome" required>
                     </div>
                     <div class="input-box">
                         <label for="celular"><b>Número de telefone:</b></label>
                         <input name="celular" id="celular" type="tel" placeholder="Digite seu telefone" required>
                     </div>
                     <div class="input-box">
                         <label for="cidade"><b>Cidade:</b></label>
                         <input name="cidade" id="cidade" type="text" placeholder="Digite sua cidade" required>
                     </div>
                     <div class="input-box">
                         <label for="email"><b>E-mail:</b></label>
                         <input name="email" id="email" type="email" placeholder="Digite seu e-mail" required>
                     </div>
                     <div class="input-box">
                         <label for="endereco"><b>Endereço completo:</b></label>
                         <input name="endereco" id="endereco" type="text" placeholder="Digite seu endereço completo " required>
                     </div>
                     <div class="input-box">
                         <label for="cpf"><b>CPF:</b></label>
                         <input name="cpf" id="cpf" type="text" placeholder="Digite seu CPF (opcional)">
                     </div>

                     <input type="submit" name="submit" id="submit" class="continue-button" value="Continuar">
                 </div>
             </form>
         </div>
     </div>
 </body>

 </html>