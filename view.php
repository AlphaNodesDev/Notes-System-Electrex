<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>

<body>
    <header>
        <h1>Notes</h1>
        <h2><?php echo $username ?></h2>

    </header>
    <main>
        <?php
 
    
    $get_notes = "SELECT * FROM notes WHERE faculty = '$username'";
    $result_get_notes = $conn->query($get_notes);
if ($result_get_notes->num_rows > 0) {
    while ($row = $result_get_notes->fetch_assoc()) {
?>
        <div class="note">
            <h3><?php echo $row['semester']; ?></h3>
            <h3><?php echo $row['module']; ?></h3>
            <h3><?php echo $row['module_name']; ?></h3>
            <h3><?php echo $row['subject_name']; ?></h3>
            <h3><?php echo $row['faculty']; ?></h3>
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
