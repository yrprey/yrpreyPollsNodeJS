<?php 
session_start();

include 'db.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Enquete</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<?php
    if (isset($_SESSION["user"])) {
        include("block_menu.php");
    }
    ?>
<body>
    <div class="container mt-5">
        <h1>Resultados da Enquete</h1>
        <div id="resultsDetails">
            <!-- Resultados da enquete serão carregados aqui via Ajax -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
