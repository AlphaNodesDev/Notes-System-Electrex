<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>

<body>
    <header>

        <h1>Notes</h1>
        <?php if(isset($_GET['alert_green'])) { ?>
        <div class="alert-overlay">
            <div class="alert-container">
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong>
                    <p><?php echo $_GET['alert_green']; ?></p>
                    <button onclick="closeAlert()" type="button" class="button" data-dismiss="alert" aria-label="Close">
                       Close
                    </button>
                </div>
            </div>
    </div>
       <?php } ?>
       
        <h2><?php echo $username ?></h2>

    </header>
    <main>
        
        <?php
 
 if (isset($_GET['module-update'])) {
    $note_id =  $_GET['note-id'];
    $module_update = $_GET['module-update'];
    $module_name_update = $_GET['module-name-update'];
    $subject_name_update = $_GET['subject-update'];
    $file_name_update = $_GET['file-name'];
    $note_id = mysqli_real_escape_string($conn, $note_id);
    $module_update = mysqli_real_escape_string($conn, $module_update);
    $module_name_update = mysqli_real_escape_string($conn, $module_name_update);
    $subject_name_update = mysqli_real_escape_string($conn, $subject_name_update);

    // Update query
    $update_module = "UPDATE notes SET module = '$module_update', module_name = '$module_name_update', subject_name = '$subject_name_update' WHERE id = '$note_id'";

    // Perform the query
    if (mysqli_query($conn, $update_module)) {
       
   header("location: ./edit.php?file_name=$file_name_update&&alert_green=Successfully Updated");
    } else {
        echo "Update failed: Please Contact Developers" ;
    }
}


if(isset($_GET['file_name']) && $_GET['file_name'] != NULL){
    $file_name = $_GET['file_name'];
    $get_notes = "SELECT * FROM notes WHERE file_name = '$file_name'";
    $result_get_notes = $conn->query($get_notes);

   if ($result_get_notes->num_rows > 0) {
        while ($row = $result_get_notes->fetch_assoc()) {
            $note_id = $row["id"];
            $module = $row['module'];
            $module_name = $row['module_name'];
            $subject_name = $row['subject_name'];
            $faculty = $row['faculty'];
            $file_name = $row['file_name'];
        
        }
}


  
?>

<div class="note">
            <h3><?php echo $module; ?></h3>
            <h3><?php echo $module_name; ?></h3>
            <h3><?php echo $subject_name; ?></h3>
            <form action="" methode="GET">
    <label for="module-update">Module 
    <select class="custom-select" name="module-update" id="module">
    <option value="MODULE 1">MODULE 1</option>
    <option value="MODULE 2">MODULE 2</option>
    <option value="MODULE 3">MODULE 3</option>
   </select>
    </label>
    <input type="hidden" name="note-id" value="<?php echo $note_id ?>">
    <input type="hidden" name="file-name" value="<?php echo $file_name ?>">
    <label for="module-name-update">Module name
   <input name="module-name-update"type="text">
    </label>
    <label for="subject-update">Subject 
    <select class="custom-select" name="subject-update" id="module">
    <option value="Life Skill">Life Skill</option>
 </select>
    </label>
    <button class="button" type="submit">Submit</button>  

</form>
        </div>
    </main>

    <?php } ?>


<?php include('./includes/footer.php');?>
