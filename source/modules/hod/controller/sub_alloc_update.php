<?php
include("../includes/connection1.php");
include("../includes/classess/c_hod.php");
include("../includes/report_errors.php");
$obj=new hod();

if (isset($_POST["submit"])) 
{
	$subjectid=$_POST["subjectid"];
	$staffid=$_POST["fid"];
	$classid=$_POST["classid"];
	$oldfid=$_POST["oldfid"];
	$type=$_POST["type"];
//--------------------------------------------------------------------
// echo $subjectid;
// echo "<br>";
// echo $staffid;
// echo "<br>";
// echo $classid;
// echo "<br>";
// echo $oldfid;
// echo "<br>";
// echo $type;
$value=$obj->sub_alloc_edit("$subjectid","$staffid","$classid","$oldfid","$type");

if ($value=="updated") {
    # code...
    echo "<script>alert('Subject Allocation Updated ')</script>";
    echo "<script>window.location.href='../view/sub_alloc_view.php'</script>";
}
elseif ($value=="only_one_main_faculty") {
    # code...
    echo "<script>alert('Only one main faculty allowed')</script>";
    echo "<script>window.location.href='../view/sub_alloc_view.php'</script>";
}

}
?>