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
 

if (isset($_POST['module-update'])) {
    // Retrieve form data
    $note_id = $_POST['note-id'];
    $module_update = $_POST['module-update'];
    $module_name_update = $_POST['module-name-update'];
    $subject_name_update = $_POST['subject-update'];
    $file_name_update = $_POST['file-name'];

    $note_id = mysqli_real_escape_string($conn, $note_id);
    $module_update = mysqli_real_escape_string($conn, $module_update);
    $module_name_update = mysqli_real_escape_string($conn, $module_name_update);
    $subject_name_update = mysqli_real_escape_string($conn, $subject_name_update);

    if (isset($_FILES['file-update']) && $_FILES['file-update']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file-update']['name'];
        $temp_name = $_FILES['file-update']['tmp_name'];
        $file_size = $_FILES['file-update']['size'];

        if ($file_size > 0) {
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $random_name = uniqid() . '.' . $file_extension;

            $folder = './notes/';
            $destination = $folder . $random_name;

            if (move_uploaded_file($temp_name, $destination)) {
                // Get the old file name from the database
                $get_old_file_name = "SELECT file_name FROM notes WHERE id = '$note_id'";
                $old_file_result = $conn->query($get_old_file_name);

                if ($old_file_result->num_rows > 0) {
                    $row = $old_file_result->fetch_assoc();
                    $old_file_name = $row['file_name'];

                    if ($old_file_name !== '') {
                        // Delete the old file if it exists
                        $old_file_path = $folder . $old_file_name;
                        if (file_exists($old_file_path)) {
                            unlink($old_file_path);
                        }
                    }
                }

                // Update the record with the new file name
                $update_module = "UPDATE notes SET module = '$module_update', module_name = '$module_name_update', subject_name = '$subject_name_update', file_name = '$random_name' WHERE id = '$note_id'";

                if (mysqli_query($conn, $update_module)) {
                    header("location: ./edit.php?file_name=$random_name&&alert_green=Successfully Updated");
                    exit;
                } else {
                    echo "Update failed: Please Contact Developers";
                }
            } else {
                echo "File move failed.";
            }
        } else {
            echo "File size is 0 or the file is invalid.";
        }
    } else {
        echo "No file uploaded or file upload error.";
    }
}






        if (isset($_GET['file_name']) && $_GET['file_name'] != NULL) {
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
            <form action="" method="post" enctype="multipart/form-data">
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
    <label for="file-input">Upload File<input type="file" name="file-update"></label>
    <button class="button" type="submit">Submit</button>  

</form>
        </div>
    </main>

    <?php } ?>


<?php include('./includes/footer.php');?>
