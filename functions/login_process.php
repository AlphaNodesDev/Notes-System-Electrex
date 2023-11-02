<?php

include("./db.php");

    $username = $_GET["username_email"];
    $password = $_GET["password"];

    // Escaping user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);



    $query = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["user_type"] = $row["user_type"];
        $_SESSION["id"] = $row["id"];
        header("location:../index.php");
        exit;
    } else {
        echo "Invalid Username or Password"; // Use a more generic message in production
    }

?>
