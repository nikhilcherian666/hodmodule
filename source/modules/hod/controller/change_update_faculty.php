<?php
include("../includes/connection1.php");
include("../includes/classess/c_hod.php");
$obj=new hod();

if (isset($_POST['submit']))
 {	
	$staffid=$_POST['fid'];
	$name=strtoupper($_POST['name']);
	$deptname=$_POST['deptname'];	
	$email=$_POST['email'];
	$phoneno=$_POST['phoneno'];
    // echo $staffid;
    // echo "<br>";
    // echo $name;
    // echo "<br>";
    // echo $deptname;
    // echo "<br>";
    // echo $email;
    // echo "<br>";
    // echo $phoneno;
   $value=$obj->faculty_update("$staffid","$name","$deptname","$email","$phoneno");
  // echo $value;
   if($value=="exist_email_id")
   {
         echo '<script type="text/javascript"> alert("Another User Already Exists with the given mail id.");
		location.replace("../view/viewaddstaffindex.php");
		</script> ';
   }
   elseif ($value=="update") {
    # code...
    echo '<script type="text/javascript">;
    alert("Updated Successfully");
		location.replace("../view/viewaddstaffindex.php");
			</script> ';
   }
   elseif ($value=="failed") {
    # code...
           echo '<script type="text/javascript"> alert("Updation failed");
			location.replace("../view/viewaddstaffindex.php");
			</script>'; 
   }
 }
?>