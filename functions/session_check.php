<?php 

session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] != "NULL") {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $user_type = $_SESSION["user_type"];
    $id = $_SESSION["id"];
    }

?>