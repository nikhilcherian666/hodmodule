<?php
	include("includes/connection1.php");
    include("../includes/classess/c_hod.php");
    $obj=new hod();
	if (isset($_POST['submit'])) 
	{

		$classid=$_POST['classid'];
		$subjectid=$_POST['subjectid'];
		$fid=$_POST['fid'];
		$name=$_POST['name'];
		$type=$_POST['type'];
      
        // echo $classid;
        // echo $subjectid;  
        // echo  $fid;
        // echo  $name; 
        // echo $type;
       $value= $obj-> sub_alloc("$classid","$subjectid","$fid","$name","$type");
       
	   if($value=="Already_allotted")
	   {
		echo "<script type=\"text/javascript\"> alert(\"Already allotted as Main or Sub Faculty\");
      	location.replace(\"../view/subject_allocation.php\");
        </script> ";
	   }
	   elseif($value=="Subject_allotted")
	   {
		echo "<script type=\"text/javascript\"> alert(\"Subject Allotted Successfully\");
		location.replace(\"../view/subject_allocation.php\");
        </script> ";
	   }
	   

    }
?>
