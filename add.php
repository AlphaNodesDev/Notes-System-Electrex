<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>
<body>
    <header>
        <h2><?php echo $_SESSION["username"]; ?></h2>
        <h1>Notes</h1>
    </header>
    <main>
      <div class="note">
      <form>
        <label for="module">Module Name</label>
      <input name="module"></input>
      <label for="module">Module
      <div class="custom-select">
                    <select name="module-update" id="module">
                        <option value="MODULE 1">MODULE 1</option>
                        <option value="MODULE 2">MODULE 2</option>
                        <option value="MODULE 3">MODULE 3</option>
                    </select>
                </div>
              </label>
              <label for="module">Subject
      <div class="custom-select" >
                    <select name="module-update" id="module">
                        <option value="Life Skill">Life Skill</option>
                    </select>
                </div>
              </label>
              <label for="module">Semester
      <div class="custom-select">
                    <select name="module-update" id="module">
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="S4">S4</option>
                        <option value="S5">S5</option>
                        <option value="S6">S6</option>
                        <option value="S7">S7</option>
                        <option value="S8">S8</option>
                        
                    </select>
                </div>
              </label>
    </form>
    </div>
    </main>
    <?php include('./includes/footer.php');?>

</body>
</html>
