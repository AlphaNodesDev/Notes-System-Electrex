
<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>
<body>

    <main>
      <div class="note">
      <form action="./functions/login_process.php" methode="GET">
      <label for="module">Enter Your Username
      <input name="username_email" type="text"></input></label>
      <label for="module">Enter Your Password
      <input name="password" type="text"></input></label>
      <button type="submit" class="button" name="login">login</button>
</form>
    </div>
    </main>
    <?php include('./includes/footer.php');?>

</body>
</html>
