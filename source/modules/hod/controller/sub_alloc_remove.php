<?php
include("../includes/connection1.php");
include("../includes/report_errors.php");
include("../includes/classess/c_hod.php");
$obj=new hod();

$staffid=$_GET['staffid'];
$classid=$_GET['classid'];
$subjectid=$_GET['subid'];
$type=$_GET['type'];

$value=$obj->sub_alloc_remove("$staffid","$classid","$subjectid","$type");

if($value=="deleted")
{
    echo '<script type="text/javascript"> alert("Deleted Successfully");
	location.replace("../view/sub_alloc_view.php");
	</script> '; 
}
else {
    # code...
    echo '<script type="text/javascript"> alert("Deletion failed");
	location.replace("suballoc_view.php");
	</script>';
}

?>