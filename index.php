<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/login.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="container">
        <img src="imagens/perfil.png">
            <form id="loginForm" action="salvar.php" method="post">
                <div>
                    <input type="text" name="email" id="email" placeholder="Digite o seu e-mail">
                </div>
                <div id = "password-wrapper">
                    <input type="password" name="senha" id="senha" placeholder="Digite a sua senha">
                     <span id="toggleEye" onclick="toggleSenha()" style="cursor:pointer;">👁️‍🗨️</span>
                </div>
                <div>
                    <input type="submit" value="Logar" id="logar">
                </div>
            </form>
    </div>
</body>
</html>