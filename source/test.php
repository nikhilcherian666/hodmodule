<html>
<h1> WELCOME </h1>
<?php
include "connection.php";
$sql="SELECT * FROM mytable";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]."<br>";
    }
}
close($conn);
?>
</html>
