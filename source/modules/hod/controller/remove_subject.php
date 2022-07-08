<?php
include("../includes/connection1.php");
include("../includes/classess/c_hod.php");
$obj=new hod();

$subjectid=$_GET['subjectid'];	
$classid=$_GET['classid'];

$value=$obj->remove_subject("$subjectid","$classid");

if($value=="deleted")
{
    echo '<script type="text/javascript"> alert("Deleted Successfully");
    location.replace("../view/subject_view.php");
    </script> '; 
}
else {
    # code...
    echo '<script type="text/javascript"> alert("Deletion failed");
    location.replace("../view/subject_view.phpp");
     </script>';
}

?>