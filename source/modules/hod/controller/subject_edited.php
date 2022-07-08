<?php
include("../includes/connection1.php");
include("../includes/classess/c_hod.php");
$obj=new hod();
$obj->getinfo();
$dept=$obj->deptname;

if (isset($_POST['submit'])) {
   
    $sidp=$_POST['sid'];
	$sub_id=$_POST['subid'];
	$subid=strtoupper($_POST['subid']);
	$name=strtoupper($_POST['name']);
	$classid=$_POST['deptname'];
	$type=strtoupper($_POST['type']);
	$inpass=$_POST['inpass'];
	$inmax=$_POST['inmax'];
	$expass=$_POST['expass'];
	$exmax=$_POST['exmax'];
	//$dept = $_SESSION["$deptn1"];
    if($type == 'ELECTIVEG')
	{
    if ($dept == 'CIVIL')
	{ 
		$apendstr =  "CEGLOBAL";
	}
	if ($dept == 'COMPUTER APPLICATIONS')
	{ 
		$apendstr =  "MCAGLOBAL";
	}
	if ($dept == 'MECHANICAL')
	{ 
		$apendstr =  "MEGLOBAL";
	}
	if ($dept == 'COMPUTER SCIENCE')
	{ 
		$apendstr =  "CSGLOBAL";
	}
	if ($dept == 'ELECTRONICS AND COMMUNICATION')
	{ 
		$apendstr =  "ECGLOBAL";
	}
	if ($dept == 'ARCHITECTURE')
	{ 
		$apendstr =  "ARCHGLOBAL";
	}
	if ($dept == 'ELECTRICAL AND ELECTRONICS')
	{ 
		$apendstr =  "EEGLOBAL";
	}

		$type = "ELECTIVE"; // type is again set as elective for global electives. to avoid changes in other modules.
        $lastch = substr($subid,-8); //extract last 8 characters from subjectid
		if($lastch!=$apendstr) // check whether the appended string is already added.
		{
		$subid = "${subid}${apendstr}";  //if not append the string at the end of subkect id , to make subject id unique in the case of global elective.
		}
    }


		$sql ="UPDATE  subject_class SET subjectid='$subid',subject_title='$name',classid='$classid',type='$type',internal_passmark='$inpass',internal_mark='$inmax',external_pass_mark='$expass',external_mark='$exmax' where subjectid='$sidp' and classid='$classid'";
		if($conn->query($sql)== TRUE) { 
		$conn->query("UPDATE elective_student SET sub_code ='$subid' where sub_code = '$sidp' and stud_id in (select studid from current_class where classid='$classid')");

?>
		<script type="text/javascript"> alert("Subject Updated Successfully");
		location.replace("../view/subject_view.php");
		</script>
<?php    
		}
		else
		{
?>
		<script type="text/javascript"> alert("Failed");
		location.replace("../view/subject_view.php");
        </script> 
<?php	  
	} 
	}
?>