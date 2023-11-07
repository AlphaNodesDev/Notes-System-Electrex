<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>


    <main>
        <?php
$get_semesters = "SELECT * FROM semesters";
$result_get_semesters = $conn->query($get_semesters);
if ($result_get_semesters->num_rows > 0) {
    // Output data of each row
    while ($row = $result_get_semesters->fetch_assoc()) {
?>
        <div class="note">
            <h3><?php echo $row['semester']; ?></h3>
            <a class="button" href="./subjects.php?semester=<?php echo $row['semester']; ?>">View</a>
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

    