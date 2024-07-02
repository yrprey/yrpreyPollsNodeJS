<?php
session_start();
if (isset($_GET["url"])) {

    $url = $_GET["url"];

if ($url === "signout.php") {
    unset($_SESSION["user"]);
    unset($_SESSION["permission"]);
    unset($_SESSION["permission"]);
    unset($_SESSION["token"]);
    unset($_SESSION['user_id']);
    session_destroy();

header("location: login.php");

}
else {

    header("location: $url");

    }   
}
?>