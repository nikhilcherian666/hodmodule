<?php
session_start();
include("../includes/classess/c_hod.php");
include("../includes/report_errors.php"); 
$obj=new hod;
if (isset($_POST['submit'])) 
{  
	$fid=strtoupper($_POST['fid']);
	$name=strtoupper($_POST['name']);
	$deptname=$_SESSION['depname'];
	$phoneno=$_POST['phoneno'];
	$email=$_POST['email'];
	// echo $fid;
	// echo $name;
	// echo $deptname;
	// echo $phoneno;
	// echo $email;
   $check= $obj->faculty_registration("$fid","$name","$deptname","$phoneno","$email");
   if($check=="Exists_email")
   {
	echo " 
         <script type=\"text/javascript\"> 
         alert(\"User Already Exists with the given mail id.\");
         location.replace(\"../view/addfacultyindex.php\");
         </script> " ;
   }
   elseif($check=="Exists_userid")
   {
	echo "
	<script type=\"text/javascript\"> alert(\"User Already Exists\");
	location.replace(\"../view/addfacultyindex.php\");
    </script> ";
   }
   elseif($check=="added")
   {
	echo 
	"<script type=\"text/javascript\"> alert(\"Staff Added Successfully\");
		location.replace(\"../view/addfacultyindex.php\");
	</script>";

   }
}

?>