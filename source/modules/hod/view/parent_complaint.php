<?php
	include("../includes/header.php");
	include("../includes/sidenav.php");
?>
         
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span>GRIEVANCE                 
                    </span></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
  
            <!-- /.row -->
            <div class="table-responsive">
              <?php
             $hodid= $_SESSION['fid'];
			$query="select id_com,stud_id,name,subject from complaint c,stud_details s where c.status=0 and s.admissionno=c.stud_id and fid='$hodid' and c.designation='hod' order by com_time desc";//addd fid according to hod / staff advisor.............................................................................................................................
		 	$res=$conn->query($query);
			 echo "<table class='table table-hover table-bordered'>
                <tr>
					<th>STUD ID : </th>
					<th> STUD NAME : </th>
					<th> SUBJECT : </th>
                    <th>View</th>
                 </tr>";
				$i=0;
			while($row=$res->fetch_assoc())
			{
						echo "<tr>";
									$id=$row['id_com'];
						echo "<td>".$row['stud_id']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['subject']."</td>";
				//		echo "<td>".$row['content']."</td>";
					//	echo "<td>".$row['com_time']."</td>";
						//echo "<td>".$row['response']."</td>";
						echo '<td><a href="AddResponse.php?id='.$id.'">view details & reply</a></td>';
									//if(isset($_POST["Submit"]))
						//{
						}
							/*$sql="update complaint1 set response='".$_POST['response']."', res_time='".$date."' where id_com='".$row['id_com']."'";
							$query=mysqli_query($conn,$sql);*/
						
			if($i==0)
			{
				echo '<tr><td colspan="4"><center>No new complaints</center></td></tr>'; 
			}
		?>
       
		</div>
       </tbody>
     </table>
     </div>
	 <a href="Complaints.php">View Replied grievances</a> 
                </div>
                
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    
                        </div>
                        <!-- /.panel-heading -->
                       
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
                        <!-- /.panel-body -->
                      
                        <!-- /.panel-footer -->
                  </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->   
<?php
	include("../includes/footer.php");
?>