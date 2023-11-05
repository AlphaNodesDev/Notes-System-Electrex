<?php 

$servername = "localhost"; // Change this if your database is on a different server
$server_username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "notes";
// Create connection
$conn = new mysqli($servername, $server_username, $password, $database);

if ($conn->connect_error) {
    
    echo('<div class="alert-overlay" style="background-color: red">
    <div class="alert-container">
        <div class="alert alert-success" role="alert">
            <strong>Error code 4060</strong>
            <p>Seems Like Database Connection Failed Try Again Later</p>
              
        </div>
    </div>
</div>');

}

?>