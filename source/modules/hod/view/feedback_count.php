<?php
include("../includes/header.php");
include("../includes/sidenav.php");
include("../includes/connection1.php");
include("../includes/report_errors.php");
//..........select department of login hod
// $sql=mysql_query("select deptname from department where hod='$hodid'");
// if($sql)
// {
// 	$result=mysql_fetch_array($sql);
// }
// $deptname=$result['deptname'];
$deptname=$_SESSION["deptname"];
?>

	<html>
<head>
<title>
Feedback Count
</title>


</head>
<body>
<br>
 <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Feedback Count</h1>
                    </div>
				</div>

<?php if (isset($_POST["subdrop"])) {
	$s=$_POST["subdrop"];
} 
else
$s="";  ?>
				<form method="post" action="">
				 <select class="form-control" name="subdrop" required="required">
                    <option value="">--select--</option>
<?php
//...........select details of active classes
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
 <div class="row">
 	<div class="col-sm-4">
 	</div>
 	<div class="col-sm-4">
<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit" align="middle"/>
</div>
</div>
<br>

<?php 
if(isset($_POST["submit"]))
{
include("../controller/view_count.php");
}
?>

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
include("../includes/footer.php");
?>



	
	
	
	
	
