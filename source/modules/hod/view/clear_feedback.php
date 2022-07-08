<?php
include("../includes/header.php");
include("../includes/sidenav.php");
include("../includes/connection1.php");
include("../includes/report_errors.php");
$i=1;
$deptname=$_SESSION["deptname"];
//select department of login hod
// $sql=$conn->query("select deptname from department where hod='$hodid'");
// if($sql)
// {
// 	$result=$sql->fetch_array();
// }
// $deptname=$result['deptname'];
//////
	?>
	<html>
<head>
<title>
feedback_clear
</title>
</head>
<body>
<br>
 <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Clear Feedback..... </h1>
                        <h4 style="color: blue;">This will permanently delete all previous feedback details of the selected class. </h4> <br /><br /><br />

                    </div>
				</div>
<?php if (isset($_POST["subdrop"])) {
	$s=$_POST["subdrop"];
} 
else
$s="";  ?>
								<form method="post" onsubmit="return confirm('Do You want to continue? This will permanently delete previous feedback details completely.');"> SELECT CLASS
				 <select class="form-control" name="subdrop" required="required">
                    <option value="">--select--</option>

<?php
//..........select active classes
$sql=$conn->query("SELECT * FROM `class_details` WHERE `deptname`='$deptname' and `active`='YES'");
while ($result=$sql->fetch_array()){
	if($result["classid"]==$s)
		$se='selected="selected"';
	else
		$se="";
	$class=$result['courseid']."-S".$result['semid']."-".$result['branch_or_specialisation'];
echo '<option value="'.$result['classid'].'"'.$se.'>'.$class.'</option>' ;
  }
?>
 </select>
 </div>
<br>
<br>
 <div class="row">
 	<div class="col-md-4">
 		
 	</div>
 	<div class="col-md-4">
   <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit" align="middle"  />
</div>
</div>
<br>
</form>

<br>

<?php
include("../includes/report_errors.php");
if(isset($_POST["submit"]))
{
 
	 $classid1=$_POST['subdrop'];
	 $sql=$conn->query("select acd_year from academic_year where status=1");
     if($sql->num_rows == 1)
     	{  $res=$sql->fetch_assoc();
           $acdyear = $res['acd_year'];
     	 }

    //    echo $acdyear;
    //    echo $classid1;

  // echo "Delete from count_feedback where classid='$classid1' ";
  //echo "Delete from mainfeedback where (deptname,semid) in (select deptname, semid from class_details where classid='$classid1' ) and (subjectid,fid) in (select subjectid,fid from subject_allocation where classid='$classid1' ) and acdyear ='$acdyear'";
//   echo "Delete from online_feedback where classid='$classid1' ";
//   echo "Delete from feedback_stud where studid in (select studid from current_class where classid='$classid1') and (fid,subjectid) in (select fid,subjectid from subject_allocation where classid='$classid1') and acdyear ='$acdyear' ";
//   echo "Delete from feedback_index where classid='$classid1' ";
  
$q1=$conn->query("Delete from count_feedback where classid='$classid1' ");
$q2=$conn->query("Delete from mainfeedback where (deptname,semid) in (select deptname, semid from class_details where classid='$classid1' ) and (subjectid,fid) in (select subjectid,fid from subject_allocation where classid='$classid1' ) and acdyear ='$acdyear'");
$q3=$conn->query("Delete from online_feedback where classid='$classid1' ");
$q4=$conn->query("Delete from feedback_stud where studid in (select studid from current_class where classid='$classid1') and (fid,subjectid) in (select fid,subjectid from subject_allocation where classid='$classid1') and acdyear ='$acdyear' ");
$q5=$conn->query("Delete from feedback_index where classid='$classid1' ");
  


 if($q1==TRUE && $q2==TRUE && $q3==TRUE && $q4==TRUE && $q5==TRUE)
 {
 echo "<script type='text/javascript'> alert('Feedback Cleared Successfully');	window.location='clear_feedback.php';</script>";
 
}

else

{
echo "<script type='text/javascript'> alert('Failed');  window.location='clear_feedback.php';</script>";
}

	}
include("../includes/footer.php");
?>
