<?php
include("../includes/report_errors.php");
include("../includes/classess/c_hod.php");
$obj=new hod();
$obj->getinfo();
$deptname=$obj->deptname;
if (isset($_POST['submit'])) 
{
	$subid=strtoupper($_POST['subid']);
	$name=strtoupper($_POST['name']);
	$classid=$_POST['deptname'];
	$type=strtoupper($_POST['type']);
	$inpass=$_POST['inpass'];
	$inmax=$_POST['inmax'];
	$expass=$_POST['expass'];
	$exmax=$_POST['exmax'];
	$dept = $deptname;
	
	$co_limit =$_POST['co_limit'];
	$status=1;
    // $co_code = $_POST['co_code'.$i];
	// $co_description = $_POST['co_description'.$i];

    // echo $subid;
    // echo  $name ;
    // echo $classid ;
    // echo  $type  ;
    // echo $type ;
    // echo $inpass ; 
    // echo $inmax ; 
    // echo $expass ; 
    // echo $exmax ;
    // echo  $co_limit ;
    //echo $dept;
   $value= $obj->addsubject("$subid","$name","$classid","$type","$inpass","$inmax","$expass","$exmax","$dept","$co_limit");
 
    if($value=="already_added")
    {
        echo " <script type=\"text/javascript\"> alert(\"Subject Already Exists\");
        location.replace(\"../view/addsubject_index.php\");
        </script>";
    }
    if($value=="true")
    {
        for($i=1;$i<=$co_limit;$i++)
            {
                $co_code = $_POST['co_code'.$i];
				$co_description = $_POST['co_description'.$i];
			
				$sql1 = $conn->query( "insert into course_outcome(co_code,subject_id,co_description,status)VALUES ('$co_code','$subid','$co_description','$status')");
			
            }
            echo "<script type=\"text/javascript\"> alert(\"Subject Added Successfully\");
            location.replace(\"../view/addsubject_index.php\");
            </script>";
    }
}

?>
