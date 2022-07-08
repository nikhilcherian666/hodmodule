<?php
	include("../includes/header.php");
	include("../includes/sidenav.php");
	include("../includes/connection1.php");
    $obj=new hod();
     $obj->getinfo();
     $deptname=$obj->deptname;
// $sql=mysql_query("select * from department where hod='$hodid'",$con);
// if($sql)
// {
// 	$result=mysql_fetch_array($sql);
// }
// $deptname=$result['deptname'];
// $_SESSION["$deptn"] = $deptname;


?>
<script>

	// function validate()
	// {
	// 	var s1 = document.getElementById('deptname').value;
	// 	var s2 = document.getElementById('type').value;
	// 	if(s1=="--select--"){
	// 		alert("Please select class");
	// 		return false;
	// 	}

	// 	if(s2=="--select--"){
	// 		alert("Please select type");
	// 		return false;
	// 	}
	// 	return true;
	// }

	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode != 46 && charCode > 31 
			&& (charCode < 48 || charCode > 57))
			return false;

		return true;
	}
	//   var count = 1;
	function add_field()
	{
		document.getElementById('co_table').style = "block";
		var limit = document.getElementById('co_limit').value;
		console.log('co_limit is '+limit);
	
		for( var count=1; count<=limit; count++){

			var newRow = document.createElement("tr");
    	    newRow.setAttribute("id", "row" + count);

			var co_code_hidden = document.createElement("input");
			co_code_hidden.setAttribute("type","hidden");
			co_code_hidden.setAttribute("value",limit);
			co_code_hidden.setAttribute("name","co_limit");
			newRow.appendChild(co_code_hidden);
		
			// column1
			var newColumn1 = document.createElement("td");
			var newco_code = document.createElement("input");
			newco_code.setAttribute("class","form-control");
			newco_code.setAttribute("type","text");
			newco_code.setAttribute("id","co_code"+count);
			newco_code.setAttribute("name","co_code"+count);
			newColumn1.appendChild(newco_code);

			// column2
			var newColumn2 = document.createElement("td");
			var newco_description = document.createElement("textarea");
			newco_description.setAttribute("class","form-control");
			newco_description.setAttribute("id","co_description"+count);
			newco_description.setAttribute("name","co_description"+count);
			newColumn2.appendChild(newco_description);

			var tBody = document.getElementById("tBody");
    	    newRow.appendChild(newColumn1);
    	    newRow.appendChild(newColumn2);
			tBody.appendChild(newRow);
		}

		$('#btnAddfield').hide();
		

		// count++;


	}
</script>

<div id="page-wrapper">

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Subject</h1>
			</div>
		</div>

		

		<form id="addsub" action = "../controller/addsubject.php" method = "POST" enctype = "" onsubmit="return validate();">
			<table  id="outer1" align="center" style="padding-top:40px;margin-bottom:25px;">
				<tr>
					<td>Subject-ID: <span class="required">*</span></td>
					<td>
						<input required="required" class="form-control" pattern="^[A-Za-z0-9]+$" id="Text1" type="text" name="subid" style="text-transform:uppercase; width: 400px" />
					</td>
				</tr>
				<tr>
					<td>Subject Title: <span class="required">*</span></td>
					<td>
						<input required="required" class="form-control" autocomplete="off" id="Text1" type="text" name="name" style="text-transform:uppercase; width: 400px" />
					</td>
				</tr>
				<tr>
					<td>Semester: <span class="required">*</span></td>
					<td>
						<select name="deptname" id="deptname" class="form-control">
							<option value="--select--">--select--</option>
							<?php

							 $sql="select * from class_details where deptname='$deptname' and active like '%YES%' ";
							 $r=$conn->query($sql);
							 while($result=$r->fetch_array()){
							//echo '<option value="'.$result['semid'].'">'.$result['semid'].'</option>';
							echo "<option value='" . $result["classid"] ."'>".$result["courseid"]."-".$result["semid"]."-".$result["branch_or_specialisation"]."</option>";
							 }
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Type: <span class="required">*</span></td>
					<td>
						<select name="type" id="type" class="form-control">
							<option value="--select--">--select--</option>
							<option value="CORE">THEORY</option>
							<option value="LAB">PRACTICAL</option>
							<option value="ELECTIVE">ELECTIVE</option>
							<option value="ELECTIVEG">GLOBAL ELECTIVE</option>
							<option value="LAB">MINI PROJECT</option>
							<option value="LAB">MAIN PROJECT</option>
							
						</td>
					</tr>
					<tr>
						<td>Internal Pass Mark : <span class="required">*</span></td>
						<td>
							<input required="required" class="form-control" id="Text1" type="text" step="any" name="inpass" style="text-transform:uppercase; width: 400px" onkeypress="return isNumberKey(event)" />
						</td>
					</tr>
					<tr>
						<td>Internal Maximum Mark : <span class="required">*</span></td>
						<td>
							<input required="required" class="form-control" id="Text1" type="text" name="inmax" style="text-transform:uppercase; width: 400px" />
						</td>	
					</tr>
					<tr>
						<td>External Pass Mark : <span class="required">*</span></td>
						<td>
							<input required="required" class="form-control" id="Text1" type="text" name="expass" style="text-transform:uppercase; width: 400px" onkeypress="return isNumberKey(event)"/>
						</td>
					</tr>
					<tr>
						<td>External Maximum Mark : <span class="required">*</span></td>
						<td>
							<input required="required" class="form-control" id="Text1" type="text" name="exmax" style="text-transform:uppercase; width: 400px" />
						</td>
						
						<tr>
						<td>Number of Course Outcome : <span class="required">*</span></td>
						<td>
							<input required="required" class="form-control" id="co_limit" type="number" name="co_limit" style="width: 400px" />
						</td>
						
						
							<td><button type ="button"  style="margin-left:10px;" class="btn btn-primary" id="btnAddfield" onclick="add_field()" >Add CO</button>
						</td>

						</tr>

					</table>
					<div style="width:60%;margin-left:250px;">
						<table class="table table-striped table-bordered" id="co_table" style="margin-top: 20px; display:none;">
							<thead>
								<tr>
									<th>CO Code</th>
									<th>CO Description</th>
								</tr>
							</thead>
							<tbody id="tBody">

							</tbody>
						</table>
					</div>
					<input style="width:200px; margin-top:25px; margin-left:450px;" class="btn btn-primary" id="submit" type="submit" value="Submit" name="submit"/>
				</form>
				<?php include("../includes/footer.php");?>