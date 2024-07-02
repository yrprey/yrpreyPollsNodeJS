<?php 
session_start();

if (isset($_SESSION["user"])) {
    if (!empty($_SESSION["user"])) {
        exit(header("location: index.php"));
    }
}

include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form id="loginForm">
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
           
            <button type="submit" class="btn waves-effect waves-light" style="background-color:#B71C1C">Login
                <i class="material-icons right">send</i>
            </button>
        </form>
        <p class="mt-3">Não tem uma conta? <a href="register.php" style="color: #B71C1C;">Registrar</a></p>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
