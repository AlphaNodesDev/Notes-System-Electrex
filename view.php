<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>


    <main>
        <?php
 
    
    $get_notes = "SELECT * FROM notes WHERE faculty = '$username'";
    $result_get_notes = $conn->query($get_notes);
if ($result_get_notes->num_rows > 0) {
    while ($row = $result_get_notes->fetch_assoc()) {
?>
        <div class="note">
        <table>
        <tr>
            <td>Semester:</td>
            <td><?php echo $row['semester']; ?></td>
        </tr>
        <tr>
            <td>Module:</td>
            <td><?php echo $row['module']; ?></td>
        </tr>
        <tr>
            <td>Module Name:</td>
            <td><?php echo $row['module_name']; ?></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?php echo $row['subject_name']; ?></td>
        </tr>
        <tr>
            <td>Upload By:</td>
            <td><?php echo $row['faculty']; ?></td>
        </tr>
    </table>
            <a class="button" href="notes/<?php echo $row['file_name'];?>" >View</a>
            <a class="button1" href="./edit.php?file_name=<?php echo $row['file_name'];?>" >Edit</a>
        </div>
<?php
    }
} else {
    echo "0 results";
}
$conn->close();

  
?>
    </main>
<?php include('./includes/footer.php');?>
