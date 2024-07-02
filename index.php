<?php 
session_start();
if (!isset($_SESSION["user"]) && !isset($_SESSION["token"])) {
    if (empty($_SESSION["user"]) && empty($_SESSION["token"])) {
        exit(header("location: login.php"));
    }
}
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Enquetes</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>

<?php

include("block_menu.php");

$result = $mysqli->query("SELECT * FROM users WHERE id='".$_SESSION["user_id"]."'");
$row = $result->fetch_assoc();
$exist = $result->num_rows;

    $id = $row["id"];
    $token = $row["token"];
    $permission = $row['permission'];
    $username = $row["username"];
  
?>
<div class="container">
    <?php

    if ($permission !== "admin") { ?>
    <h3 class="center-align">Bem-vindo ao Sistema de Enquetes <?php echo $username; ?></h3>
    <?php
    }
    ?>
    <div id="message"></div>
    <?php if ($permission === "admin"): ?>
        <?php include("manage.php"); ?>
    <?php else: 
$result = $mysqli->query("SELECT polls.question,polls.id FROM polls LEFT JOIN votes ON polls.id=votes.poll_id WHERE votes.user_id='$id' GROUP BY votes.id");
?>                
        <h3 class="center-align">Enquetes Recentes</h3>
        <ul class="collection">
            <?php
            $exist = $result->num_rows;
            while ($row = $result->fetch_assoc()) {
?>                
            <li class="collection-item"><a href="poll.php?id=<?php echo $row['id']; ?>"><?php echo $row['question']; ?></a></li>
<?php
            }
?>        
            <!-- Adicione mais itens conforme necessário -->
        </ul>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var id = "<?php echo $id; ?>";
    </script>
<script src="mainNode.js"></script>
</body>
</html>
