<?php
include("../includes/header.php");
include("../includes/sidenav.php");
include("../includes/connection1.php");
$obj=new hod();
$obj->getinfo();
$deptname=$obj->deptname;
$i=1;

	?>
	<html>
<head>
<title>
feedback_results
</title>
</head>
<body>
<br>
 <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Faculty Performance </h1>
                    </div>
				</div>
<?php if (isset($_POST["subdrop"])) {
	$s=$_POST["subdrop"];
} 
else
$s="";  ?>
<form method="post">
 <select class="form-control" name="subdrop" required="required">
  <option value="">--select--</option>

<?php
//..........select active classes
 $sql=$conn->query("SELECT * FROM `class_details` WHERE `deptname`='$deptname' and `active`='YES'");
 //echo "SELECT * FROM `class_details` WHERE `deptname`='$deptname' and `active`='YES'";
 while ($result=$sql->fetch_assoc())
 {   include("../includes/report_errors.php");
 	if($result["classid"]==$s){
		$se='selected="selected"'; }
 	else{
 		$se="";
        
 	$class=$result['courseid']."-S".$result['semid']."-".$result['branch_or_specialisation'];
 echo '<option value="'.$result['classid'].'"'.$se.'>'.$class.'</option>' ;
    }
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
<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit" align="middle"/>
</div>
</div>
<br>
<?php
if(isset($_POST["submit"]))
{ 
	include("../controller/view_feedback.php");
}
?>

<center>

<!-- <a href="feedback_more.php">View Previous Feedback</a> -->
</center>
<br>


	<center>
<!-- <input type="button" name="close" value="Close">-->
 </center>
 </body>
 </div>
                <!-- /.row -->
 </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        </div>
    <!-- /#wrapper --> 

</html>
<?php
//echo "select status from feedback_status where classid='$title' and deptname='$deptname'";
include("../includes/footer.php");
?>
