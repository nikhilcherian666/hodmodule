<?php
include("../includes/connection1.php");
include("../includes/report_errors.php");
include("../includes/classess/c_hod.php");
$staffid=$_GET['staffid'];	
$obj=new hod();
$value=$obj->delete_faculty("$staffid");
if($value=="deleted")
{
    echo '<script type="text/javascript"> alert("Deleted Successfully");
    location.replace("../view/viewaddstaffindex.php");
    </script> '; 
}
elseif ($value=="failed") {
    # code...
    	
		echo '<script type="text/javascript"> alert("Deletion failed");
        location.replace("../view/viewaddstaffindex.php");
        </script>'; 
	
}
?>