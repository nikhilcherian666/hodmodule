<?php
$mariaservername = "localhost";
$mariausername = "testuser";
$mariapassword = "testpassword";
$mariadatabase = "testdatabase";

// Create connection
$conn = new mysqli($mariaservername, $mariausername, $mariapassword, $mariadatabase);

/* Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else { return $conn; 
}*/
?>
