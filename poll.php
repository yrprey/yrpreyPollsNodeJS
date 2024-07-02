<?php 

session_start();
$user_id = $_SESSION["user_id"];
include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquete</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <link rel="icon" href="img/favicon.svg" title="YRprey">   
</head>
<body>
    <?php
    if (isset($_SESSION["user"])) {
        include("block_menu.php");
    }
    ?>
    <div class="container">
        <h1>Enquete</h1>
<?php

if (isset($_SESSION["user"])) {
    if (!empty($_SESSION["user"])) {
?>

        <div id="pollDetails">
            <!-- Detalhes da enquete serão carregados aqui via Ajax -->
        </div>
<?php
    }
} else {
    if (isset($_GET["id"])) {
        
        $id = $_GET["id"];

        $result = $mysqli->query("SELECT * FROM polls WHERE id='$id'");
        $row = $result->fetch_assoc();
        $question = $row['question'];
        print "<br>".$question.'<br><br><button type="submit" class="btn waves-effect waves-light">Vote</button><br><br> Please <a href="login.php">Login in</a> to vote!';
    }
}
?> 
<script>
        var user_id = "<?php echo $user_id; ?>";
    </script>       
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="mainNode.js"></script>
</body>
</html>
