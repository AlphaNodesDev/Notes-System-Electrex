<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>
<body>
    <header>
        <h1>Notes</h1>
    </header>
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
            <h3><?php echo $row['semester']; ?></h3>
            <h3><?php echo $row['module']; ?></h3>
            <h3><?php echo $row['module_name']; ?></h3>
            <h3><?php echo $row['subject_name']; ?></h3>
            <h3><?php echo $row['faculty']; ?></h3>
            <a class="button" href="notes/<?php echo $row['file_name'];?>" >View</a>
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
