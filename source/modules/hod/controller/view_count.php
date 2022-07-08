<?php
include("../includes/connection1.php");
include("../includes/report_errors.php");
 //if(isset($_POST["submit"]))
//{
	 $title=$_POST['subdrop'];
    
	// echo $title;


//..............current date
$l=$conn->query("select acd_year from academic_year where status=1") ;
			$r=$l->fetch_assoc();
			$prev=$r["acd_year"];
             
$l1=$conn->query("select * from class_details where classid='$title'") ;
			$r1=$l1->fetch_assoc();
			$deptname1=$r1["deptname"];
            $semid1=$r1["semid"];
            


//...................number of students responded to quetionnaire based on subjects
//$sql=mysql_query("SELECT sa.classid,sc.subjectid, sc.subject_title, fs.acdyear, count( fs.studid ) as cnt,fd.name
//FROM subject_class sc, feedback_stud fs,faculty_details fd,subject_allocation sa
//WHERE fs.subjectid = sc.subjectid  AND fs.acdyear = '$prev' and sa.subjectid = sc.subjectid and fd.fid=sa.fid and fs.fid=fd.fid and sa.subjectid=fs.subjectid
//AND sc.classid = '$title' and sa.classid='$title'and sa.fid=fd.fid group by fs.subjectid,fs.fid");

/*$sql=mysql_query("select fs.subjectid,sc.subject_title,fd.name,fs.acdyear,count(fs.studid) as cnt from subject_class sc,feedback_stud fs,faculty_details fd,subject_allocation sa
where sc.subjectid=fs.subjectid and sc.subjectid=sa.subjectid and fs.subjectid=sa.subjectid and fs.fid=fd.fid and fs.fid=sa.fid and
fd.fid=sa.fid and sa.classid='$title' and sc.classid='$title' and fs.acdyear='$prev' group by fs.subjectid,fs.fid");
$chr=mysql_num_rows($sql); */
//echo "SELECT m.subjectid,sc.subject_title,fd.name,m.acdyear,COUNT( distinct m.responseid) as cnt FROM mainfeedback m,faculty_details fd,subject_class sc,subject_allocation sa WHERE m.fid=sa.fid and m.subjectid=sa.subjectid and sa.classid='$title' and sa.fid=fd.fid and m.subjectid=sc.subjectid and m.fid=fd.fid and m.deptname='$deptname1' and m.semid='$semid1' and m.acdyear='$prev' group by m.fid,m.subjectid,m.deptname,m.semid";
$sql=$conn->query("SELECT m.subjectid,sc.subject_title,fd.name,m.acdyear,COUNT( distinct m.responseid) as cnt FROM mainfeedback m,faculty_details fd,subject_class sc,subject_allocation sa WHERE m.fid=sa.fid and m.subjectid=sa.subjectid and sa.classid='$title' and sa.fid=fd.fid and m.subjectid=sc.subjectid and m.fid=fd.fid and m.deptname='$deptname1' and m.semid='$semid1' and m.acdyear='$prev' group by m.fid,m.subjectid,m.deptname,m.semid");
$chr=$sql->num_rows;
if($chr>=1)
{
	
	?>
		 <div class="row">
                <div class="col-lg-12">
			
	<div class=".col-sm-6 .col-md-5 .col-md-offset-2 .col-lg-6 .col-lg-offset-0">
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <tr>
    <th>Subject id</th>
	 <th>Subject title</th>
	 <th>Faculty</th>
	 <th>Academic Year</th>
    <th>Number of Students Responded</th>
	</tr>

	<?php
while ($re=$sql->fetch_array())
{
	$sid=$re['subjectid'];
	$st=$re['subject_title'];
	$y=$re['acdyear'];
	$count=$re['cnt'];
	$fname=$re["name"];
	//display into table
	?>

	
	<tr>
	<td>
	<?php
	echo $sid;
	?>
	</td>
	<td>
	<?php
	echo $st;
	?>
	</td>
	<td>
		<?php
		echo $fname;
		?>
	</td>
		<td>
	<?php
	echo $y;
	?>
	</td>

	<td>
	<?php
	echo $count;
	?>
	</td>
	</tr>
	<?php

}
}
else
{
		echo "<script type='text/javascript'>alert('No Records')</script>";

}
//}//close of submit button
?>
	</table>
	</table>
 </div>
                       
                    </div>
                  
            </div>