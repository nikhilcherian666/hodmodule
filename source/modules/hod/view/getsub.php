<?php
include("../includes/connection1.php");
if (isset($_POST['key'])) {
	
$classid=$_POST["key"];

	 		    $sql="select subject_title,subjectid from subject_class where classid='$classid'";
		
		?>	    
		
   <select name="subjectid" class="form-control">
   		<option value="--select--">--select--</option>
   		
   		
<?php
			     $r=$conn->query($sql) ;
	 		    while($result=$r->fetch_array())    {
	   		      echo '<option value="'.$result['subjectid'].'">'.$result['subject_title'].'</option>';
	 		    }?>

 </select>

	 <?php		}
		  ?>	
		 