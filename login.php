
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login │ WDA Livraria</title>
    <link rel="stylesheet" href="estilos/style_login.css">
</head>
<body>
    <div class="container">

        <img id="imglogin" src="img/login/background.png">

        <div class="form">
            <img id="logo4branca" src="img/logo4branca.png">
            <form action="testelogin.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Faça seu login</h1>
                        <br>
                        <h2>É rapidinho!</h2>

                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nomeusuario"><b>Nome de usuário</b></label>
                        <input name="username" id="nomeusuario" type="text" placeholder="Digite seu nome de usuário" required>
                    </div>
                    <div class="input-box">
                        <label for="senha"><b>Senha</b></label>
                        <input name="senha" id="senha" type="password" placeholder="Digite sua senha" required>
                    </div>
                        <input type="submit" name="submit" id="submit" class="continue-button" value="Acessar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>