<div class="footer">
    <a style="text-decoration: none; color: white;" href="./index.php"> <i class="fas fa-home"></i> </a>
    <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 'faculty') { ?>
    <a style="text-decoration: none; color: white;" href="./add.php"> <i class="fas fa-plus"></i></a>
    <a style="text-decoration: none; color: white;" href="./view.php">   <i class="fas fa-list"></i></a>
    <?php } ?>
    <a style="text-decoration: none; color: white;" href="./login-register.php">   <i class="fas fa-user"></i></a>
    </div>
<script>
   function closeAlert() {
    document.querySelector('.alert-overlay').style.display = 'none';
    
}

</script>
    </body>
</html>