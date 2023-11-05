<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>

    <main>
        <?php

        if(isset($_GET['semester'])){
    $semester = $_GET['semester'];
$get_subjects = "SELECT * FROM subjects WHERE semester = '$semester'";
$result_get_subjects = $conn->query($get_subjects);
if ($result_get_subjects->num_rows > 0) {
    // Output data of each row
    while ($row = $result_get_subjects->fetch_assoc()) {
?>
        <div class="note">
            <h3><?php echo $row['subject_name']; ?></h3>
            <a class="button" href="./notes.php?semester=<?php echo $row['semester']; ?>&&subject_name=<?php echo $row['subject_name']; ?>">View</a>
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
