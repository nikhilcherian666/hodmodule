<?php
include("../includes/header.php");
include("../includes/connection1.php");
include("../includes/report_errors.php");
include("../includes/sidenav.php");
$obj=new hod();
$obj->getinfo();
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" align="center"><span>View Staff Advisors</span></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">


			<form id="subview" action = "" method = "POST" enctype = "">
				<?php
				 $hodid=$obj->hodid;
				// echo $hodid;
				// $s=$conn->query("select deptname from faculty_details where fid ='$hodid'");
				// $r =$s-> fetch_assoc();
				$deptname=$obj->deptname;
				//  echo $deptname;

				$sql ="select * from class_details  where deptname='$deptname'";
				$result = $conn->query($sql);
		//and active like '%YES%'"
				?>

			</form>
			<br><br>
			<div class=".col-sm-6 .col-md-5 .col-md-offset-2 .col-lg-6 .col-lg-offset-0">


				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

					<tr>
						<th>Faculty Name</th>
						<th>Semester</th>
						<th>Students List</th>
						<th>Remove</th>
					</tr>
					<?php

					$sql =$conn->query("select * from staff_advisor where classid in (select classid from class_details where deptname in(select deptname from department where hod='$hodid'))");

					while($dat=$sql->fetch_array())
					{
						$staffid=$dat['fid'];
			//$fid=$dat["fid"];
						$class=$dat["classid"];
						$stud=$dat["students_list"];
						

						$sql1=$conn->query("select name from faculty_details where fid='$staffid'");
						while($r=$sql1->fetch_array()){
							$name=$r["name"];

							$sql2 =$conn->query("select semid  from class_details where classid ='$class'");
							while($res=$sql2->fetch_array()){
								$sem=$res["semid"];
								?>
								
								<tr>
									<td><?php echo $name;?></td>
									<td><?php echo "S";echo $sem;?></td>
									<td><?php echo $stud;?></td>
									<td><a href="../controller/delete_staffadvisor.php?staffid=<?php echo $staffid;?> & clid=<?php echo $class;?>" onclick="return confirm('Are you sure to delete?');">REMOVE</a></td>
								</tr>

							</tr>
							
							<?php
						}
					}
				}	 
				?>

			</table>

		</div>
	</div>
</div>
</div>
<?php 
include("../includes/footer.php");
?>
