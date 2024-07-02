<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>
    <div class="container">
        <h1>Registrar</h1>
        <form id="registerForm">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="username" class="validate" required>
                    <label for="username">Nome de Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" id="password" class="validate" required>
                    <label for="password">Senha</label>
                </div>
            </div>
            <button type="submit" class="btn waves-effect waves-light" style="background-color:#B71C1C">Registrar
                <i class="material-icons right">send</i>
            </button>
        </form>
        <p class="mt-3">Já tem uma conta? <a href="login.php" style="color: #B71C1C;">Login</a></p>
    </div>

    <script src="componente/bootstrap.min.js"></script>
    <script src="componente/jquery.min.js"></script>
    <script src="componente/lodash.min.js"></script>
    <script src="componente/materialize.min.js"></script>
    <script src="componente/moment.min.js"></script>
    <script src="componente/select2.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
