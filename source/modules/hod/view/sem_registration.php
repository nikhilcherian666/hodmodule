<?php
include("../includes/header.php");
?>

<?php
include("../includes/sidenav.php");


if(isset($_POST["classid"]))  
  $classid=$_POST["classid"]; 
else
  $classid="";



$nomorris = true;
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<script  src="jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  function getsemdata(a)  {  
    console.log(a);
    $.post("fetchsemdatanew1.php",{ key : a},
      function(data)  {
        $('#data').html(data);

        $('.DataTable').DataTable();
      });
  }

  function setid(a,b) {
    console.log(a); 
    document.getElementById('reg_id').value = a;
    document.getElementById('classid').value = b;

  }
</script>

<div id="page-wrapper">
  <div class="row">

    <br><br>
    <?php
    $obj=new hod();
    $obj->getinfo();
    $deptname=$obj->deptname;
    // $s=mysql_query("select deptname from faculty_details where fid ='$hodid'",$con);
    // $r = mysql_fetch_assoc($s);
    // $deptname=$r["deptname"];
//and classid in (select curr_sem from semregstatus where current_class=1)";
    //$sql ="select * from class_details  where deptname='$deptname' and active like '%YES'";
$sql ="select * from class_details  where deptname='$deptname' and active like '%YES' ";
    

    $result = $conn->query($sql);
    ?>

    <select name='clsid' id="clsid" class="form-control" onchange="getsemdata(this.value)">
      <option value =''>Select</option>
      <?php
      while ($row = $result->fetch_array()) {
         // if($row["classid"]==$clsid)
              //echo '<option value="' . $row["classid"] .'" selected="selected">' . $row["classid"] .'</option>';
         // else
            //  echo '<option value="' . $row["classid"] .'">' . $row["classid"] .'</option>';
       if ($classid==$row["classid"]) 
        $se="selected";
      else
        $se="";
      echo "<option value='" . $row["classid"] ."'".$se.">".$row["courseid"]."-S".$row["semid"]."-".$row["branch_or_specialisation"]."</option>";   

    }
    echo "</select>";
    echo "<script>getsemdata('$classid');</script>";
    ?>        

    <div class="col-lg-12" >
      <h1 class="page-header" align="center">SEMESTER REGISTRATION</h1>
      <a  href="semregviewnew.php"  style="float: right;">Summary</a>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <br>
  <div class="table-responsive">

    <div id="data">

    </div></div></div>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
       <form method="post" action="semregeditnew.php">

         <div class="modal-content">
          <div class="modal-header">
           Remarks
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">

          <div data-role="popup" id="myPopup" class="ui-content" style="min-width:300px;">
            <?php
            
            ?>
            
            <div>

              <input class="ui-accessible" type="hidden" name="reg_id" id="reg_id" >
              <input type="hidden" name="classid" id="classid">
              <label for="text" class="ui-hidden-accessible">Message:</label>
              <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter remarks here!"></textarea>
              
            </div>
            
          </div>


        </div>
        <div class="modal-footer">
          <input type="submit" data-inline="true" class="btn btn-primary" value="Send" name="btn_send" id="btn_send">
        </div>
      </div>
    </form>
  </div>
</div>

<!-- /.row -->

<!-- /#wrapper --> 
<!-- </select></div></div></body></html>   -->


<script type="text/javascript">
  $(document).ready(function($) {
    $(document).on('click', '.check-all', function(event) {
      event.preventDefault(); 
      if($(this).attr('now-check') == 'true'){
        $('#bulk-ok-form').find('input[type=checkbox]').prop('checked', false);
        $(this).attr('now-check','false' );
      } else {
        $('#bulk-ok-form').find('input[type=checkbox]').prop('checked', true);
        $(this).attr('now-check','true' );
      }

    });
  });
</script>


<?php
include("../includes/footer.php");
?>
