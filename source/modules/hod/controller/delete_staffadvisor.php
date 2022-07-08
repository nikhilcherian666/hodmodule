<?php
include("../includes/connection1.php");
include("../includes/report_errors.php");
include("../includes/classess/c_hod.php");
$staffid=$_GET['staffid'];
$clid=$_GET['clid'];
$obj=new hod();
$value=$obj->delete_staffadvisor("$staffid","$clid");
if($value=="deleted")
{
    echo '<script type="text/javascript"> alert("Deleted Successfully");
    location.replace("../view/viewstaffadvisor.php");
    </script> ';  
}
else
{
    echo '<script type="text/javascript"> alert("Deletion failed");
    location.replace("../view/viewstaffadvisor.php");
    </script>'; 
}
?>