<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>

    <main>
        <?php
        if(isset($_GET['semester'])){
    $semester = $_GET['semester'];
    $subject_name = $_GET['subject_name'];
    $get_notes = "SELECT * FROM notes WHERE semester = '$semester' AND subject_name='$subject_name'";
    $result_get_notes = $conn->query($get_notes);
if ($result_get_notes->num_rows > 0) {
    // Output data of each row
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
    <a href="./functions/pdf.php?pdf=<?php echo $row['file_name']; ?>" class="button view-pdf" data-file="<?php echo $row['file_name']; ?>">View</a>
</div>
<?php
    }
} else {
    echo "0 results";
}
$conn->close();

        }else {
            echo "0 results";
        }
?>
    </main>

   

<?php include('./includes/footer.php');?>
