<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Application </title>
    <script src="https://kit.fontawesome.com/your-unique-kit-code.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" id="custom-style" href="./assets/css/style.css">
</head>
<body>
<header>
    <div class="topnav">
    <?php if(isset($_SESSION['username'])){ ?>
        <div class="user">
            <h2>
                <img src="./profile/<?php echo $_SESSION["profile"];?>" alt="User Icon">
                <?php echo $_SESSION["username"];?>
            </h2>
        </div>
  <?php  } ?>
        <h1>Notes</h1>
        <a style="text-decoration: none; color: red; " href="./about.php">  <i class="fas fa-info"></i></a>
        <button id="mode-switch" class="mode-switch-button"></button>
    

    </div>

</header>


