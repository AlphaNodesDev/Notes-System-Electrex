<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>


    <main>
        <?php
 
    
    $get_notes = "SELECT * FROM users WHERE username = '$username'";
    $result_get_notes = $conn->query($get_notes);
if ($result_get_notes->num_rows > 0) {
   $row = $result_get_notes->fetch_assoc(); {
?>
<div class="note">
<div class="profile-card">
  <div class="profile-header">
    <div class="profile-image">
      <img src="./profile/<?php echo $row['profile']; ?>" alt="Profile">
    </div>
    <div class="user-details">
      <p><?php echo $username ?></p>
    </div>
  </div>
  <div class="profile-body">
    <div class="details-section">
      <h3>Profile Details</h3>
      <div class="detail-item">
        <span class="detail-label">Username:</span>
        <span class="detail-value"><?php echo $username ?></span>
      </div>
      <div class="detail-item">
        <span class="detail-label">Email:</span>
        <span class="detail-value"><?php echo $email ?></span>
      </div>
      <div class="detail-item">
        <span class="detail-label">Password:</span>
        <span class="detail-value"><?php echo $password ?></span>
      </div>
    </div>
    <div class="edit-button">
      <a href="#" class="edit-link">
        <i class="fas fa-edit"></i> Edit Profile
      </a>
    </div>
  </div>
</div>

</div>


<?php
    }
} else {
    echo "0 results";
}
$conn->close();

  
?>
<div class="popup" id="editPopup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
<h1>Due To Some Techinical Issues This Feature Have Bean Locked</h1>

    <!---
    <form id="editProfileForm" action="./functions/update-profile.php" method="post">
       <label for="profile">Profile:</label>
        <input type="file" name="profile-update" >
    <label for="newUsername">New Username:</label>
      <input type="text" id="newUsername" name="newUsername"  >
      <label for="newEmail">New Email:</label>
      <input type="email" id="newEmail" name="newEmail" >
      <label for="newPassword">New Password:</label>
      <input type="password" id="newPassword" name="newPassword" >
   
    </form>

    <button class="button1" type="submit">Save Changes</button>
    ---->
  </div>
</div>

    </main>


    <script>
        function openPopup() {
  document.getElementById("editPopup").style.display = "block";
}

function closePopup() {
  document.getElementById("editPopup").style.display = "none";
}

document.querySelector(".edit-link").addEventListener("click", openPopup);

    </script>
<?php include('./includes/footer.php');?>
