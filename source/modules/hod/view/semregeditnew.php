<?php
include("../includes/connection1.php");
include("../includes/errors_report.php");
$previous_sem=$_GET['id'];
$classid=$_GET['id2'];
$admno=$_GET['id3'];
//echo $previous_sem;
//echo $classid;
$sql="SELECT * FROM `class_details` where classid ='$classid'";
$r=$conn->query($sql);
while($row=$r->fetch_assoc())
{
    $courseid=$row['courseid'];
    $branch_or_specialisation=$row['branch_or_specialisation'];
}

echo $courseid;
echo "<br>";
echo $branch_or_specialisation;

?>
