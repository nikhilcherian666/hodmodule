<?php
include("../includes/connection1.php");
// if(isset($_POST["submit"]))
//{
	 $title=$_POST['subdrop'];
	 //.........status checking
	 $sql=$conn->query("select status from feedback_status where classid='$title' and deptname='$deptname'");
if($sql)
{
	$result=$sql->fetch_array();
}
$st=$result['status'];
if($st==1)
{
	echo "<script type='text/javascript'>alert('You Need to Stop Feedback Session to View the Results')</script>";
	echo "<script>window.location.href='view_all_feedback.php'</script>";
}
if($st==0)
{


////////
//current date
$l=$conn->query("select acd_year from academic_year where status=1") ;
			$r=$l->fetch_assoc();
			$prev=$r["acd_year"];
//selection based on academic year
//echo $prev;
//select mark of faculties of chosen department
//echo "SELECT f.fid, f.subjectid, f.indexmark,f.acdyear,sc.subject_title, fd.name FROM feedback_index f, subject_class sc, faculty_details fd,subject_allocation sa WHERE f.fid = fd.fid AND f.subjectid = sc.subjectid AND sc.classid='$title' AND f.deptname ='$deptname' and f.acdyear='$prev' and sa.fid=fd.fid and sa.fid=f.fid and sa.classid='$title' and sa.subjectid=f.subjectid";

$sql1=$conn->query("SELECT f.fid, f.subjectid, f.indexmark,f.acdyear,sc.subject_title, fd.name FROM feedback_index f, subject_class sc, faculty_details fd,subject_allocation sa WHERE f.fid = fd.fid AND f.subjectid = sc.subjectid AND sc.classid='$title' AND f.deptname ='$deptname' and f.acdyear='$prev' and sa.fid=fd.fid and sa.fid=f.fid and sa.classid='$title' and sa.subjectid=f.subjectid");

$chr=$sql1->num_rows;
if($chr>=1)
{
	?>
		 <div class="row">
                <div class="col-lg-12">
			
	<div class=".col-sm-6 .col-md-5 .col-md-offset-2 .col-lg-6 .col-lg-offset-0">
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <tr>
    <th>Sl no.</th>
	 <th>Faculty id</th>
    <th>Name</th>
	<th>Subject</th>
	<th>Academic Year</th>
	<th>Index Mark</th>
	<th>View Datasheet</th>
	<th>Create pdf</th>
	<th>Additional Feedback</th>
	<th>Create pdf</th>
	</tr>
	<?php
	
while ($re=$sql1->fetch_array())
{
	$vf=$re['fid'];
	$nm=$re['name'];
	$im=$re['indexmark'];
	$ay=$re['acdyear'];
	$st=$re['subject_title'];
	$subid=$re['subjectid'];
	//display into table
	?>

	
	<tr>
	<td>
	<?php
	echo $i;
	$i = $i + 1;
	?>
	</td>
	<td>
	<?php
	echo $vf;
	?>
	</td>
	<td>
	<?php
	echo $nm;
	?>
	</td>
	<td>
	<?php
	echo $st;
	?>
	</td>
	<td>
	<?php
	echo $ay;
	?>
	</td>
	<td>
	<?php
	echo round($im,2);
	?>
	</td>
	<td>
	<a href="datafaculty.php? subid=<?php echo $subid;?> & ay=<?php echo $ay;?> & fid=<?php echo $vf;?> & classid1=<?php echo $title;?>">VIEW</a>
	</td>
	<td>
	<a href="feedback_pdf.php? subid=<?php echo $subid;?> & ay=<?php echo $ay;?> & fid=<?php echo $vf ;?> & classid1=<?php echo $title;?>" target="_blank">CREATE</a>
	</td>
	<td>
		<a href="feedback_online.php? subid=<?php echo $subid;?> & ay=<?php echo $ay;?> & fid=<?php echo $vf ;?> & classid1=<?php echo $title;?>">VIEW</a>
	</td>
	<td>
		<a href="feedbackadd_pdf.php? subid=<?php echo $subid;?> & ay=<?php echo $ay;?> & fid=<?php echo $vf ;?> & classid1=<?php echo $title;?>" target="_blank">CREATE</a>
	</td>
	</tr>
	<?php
}
}
else
{
			echo "<script type='text/javascript'>alert('No Records')</script>";

}
}//close if st=1
//}//button close
?>
	
	
	</table>
	</table>
 </div>
                       
                    </div>
                  
            </div>
