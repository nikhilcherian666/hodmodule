<?php
  include("../includes/classess/c_hod.php");
  include("../includes/report_errors.php");
  $obj=new hod();
  
if (isset($_POST['submit'])) {
	
	$classid=$_POST['deptname'];
	$fid=$_POST['fid'];
	$list=$_POST['list'];
  $value=$obj->allot_staffadvisor("$classid","$fid","$list");
    
  if($value=="already_added")
  {
    
   echo" <script type=\"text/javascript\"> alert(\"Staff Advisor Already Alloted to this Class\");
  	location.replace(\"../view/addstaffadvisor_index.php\");
  	</script> ";
  }
  elseif($value=="added_Successfully"){
  echo "<script type=\"text/javascript\"> alert(\"Staff Advisor Added Successfully\");
		location.replace(\"../view/addstaffadvisor_index.php\");
		</script>";
  }
  elseif($value=="falied")
  {  
    include("../incluses/report_errors.php");

   echo ' <script type="text/javascript\"> alert("Failed");
		location.replace("../view/addstaffadvisor_index.php");
        </script>';
  }
}
?>