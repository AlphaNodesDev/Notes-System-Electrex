<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>
<body onload="hide_forms()">
    <header>
        <h2><?php echo $_SESSION["username"]; ?></h2>
        <h1>Notes</h1>
    </header>
    <main>
        <div onclick="open_upload_notes()" class="button1">Upload Notes</div>
        <div onclick="open_edit_semesters()" class="button1">Edit/Add Semester</div>
        <div onclick="open_edit_modules()" class="button1">Edit/Add Mudules</div>
        <div onclick="open_edit_subjects()"class="button1">Edit/Add Subjects</div>
<!--------------------------------------Upload notes Section ------------------------------------->
      <div class="note" id="upload-notes">
      <form>
        <h1>Upload Notes</h1>
        <label for="module">Module Name</label>
      <input name="module"></input>
      <label for="module">Module
      <div class="custom-select">
                    <select name="module-update" id="module">
                       
                        <option value="MODULE 1">MODULE 1</option>
                    </select>
                </div>
              </label>
              <label for="module">Subject
      <div class="custom-select" >
                    <select name="module-update" id="module">
                    <?php 
                        $sql_get_modules = "SELECT * FROM subjects";
                        $result_get_modules = mysqli_query($conn, $sql_get_modules);
                        while ($row_get_modules = mysqli_fetch_assoc($result_get_modules)) {
                            echo "<option value=".$row_get_modules['subject_name'].">".$row_get_modules['subject_name']."</option>";
                        }
                       
                        ?>
                     
                    </select>
                </div>
              </label>
              <label for="module">Semester
      <div class="custom-select">
                    <select name="module-update" id="module">
                    <?php 
                        $sql_get_semesters = "SELECT * FROM semesters";
                        $result_get_semester = mysqli_query($conn, $sql_get_semesters);
                        while ($row_get_semester = mysqli_fetch_assoc($result_get_semester)) {
                            echo "<option value=".$row_get_semester['semester'].">".$row_get_semester['semester']."</option>";
                        }
                        ?>
                    </select>
                </div>
              </label>
    </form>
    </div>
<!--------------------------------------Upload notes Section END ------------------------------------->


<!--------------------------------------Add Edit Semester Section ------------------------------------->
<div id="edit-semester">
    <div class="note">
      <form>
        <h1>Delete Semester</h1>

      <label for="module">Module
        <form methode="post" action="./add/delete-semester.php">
      <select name="module-update" id="module"  class="custom-select">
      <?php 
                        $sql_get_semesters = "SELECT * FROM semesters";
                        $result_get_semester = mysqli_query($conn, $sql_get_semesters);
                        while ($row_get_semester = mysqli_fetch_assoc($result_get_semester)) {
                            echo "<option value=".$row_get_semester['semester'].">".$row_get_semester['semester']."</option>";
                        }
                        ?>
      </select>
      <button type="submit" class="button">Delete Semester</button>
                    </form>

      </label>
    </form>
                    </div>

    <div class="note">
      <form>
        <h1>Add Semester</h1>

      <label for="module">Module
      <form methode="post" action="./add/add-semester.php">
      <input type="text" name="semester" >
      <button type="submit" class="button">Add Semester</button>
                    </form>
                    
      </label>
    </form>
    </div>
  </div>
            
    <!--------------------------------------Add Edit Semester Section END ------------------------------------->



    <!--------------------------------------Add Edit Module Section-------------------------------------->
    <div id="edit-module">
    <div class="note">
      <form>
        <h1>Add Module</h1>
  
    </form>
    </div>
    <div class="note">
      <form>
        <h1>Delete Module</h1>

    </form>
    </div>
    </div>
        <!--------------------------------------Add Edit Module Section END-------------------------------------->



                <!--------------------------------------Add Edit Subjects Section-------------------------------------->
    
    

        <div class="note" id="edit-subjects">
      <form>
        <h1>Add OR Edit Subjects</h1>
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


   <!--------------------------------------Add Edit Subjects Section END-------------------------------------->


    </main>
    <?php include('./includes/footer.php');?>

</body>
</html>
