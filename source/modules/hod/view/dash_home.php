<?php
include("../includes/header.php");
include("../includes/connection1.php");
include("../includes/report_errors.php");
include("../includes/sidenav.php");
//include("../includes/classess/c_hod.php");
$_SESSION['fid']="DUMMY1";
$obj=new hod;
$r=$obj->getinfo(); 
foreach($r as $row)
{
    $_SESSION['fname']=$row["name"];  
    $_SESSION['depname']=$row["deptname"];
    
}

?>
  
        
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span style="font-weight:bold;">Welcome 
                        <?php
                         $fname=$_SESSION['fname'];
                         $fid=$_SESSION['depname'];
                         echo $fname;
                         //echo $fid;
                        //echo $_SESSION['fid'];
                          
                        ?>
                        <br>
                    </span></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
  
            <!-- /.row -->
            <div class="row">
                
                 
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-table fa-fw fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    </div>
                                    <div>Student Search</div>
                                </div>
                            </div>
                        </div>
                        <a href="student_search.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-table fa-fw fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Attendance View</div>
                                </div>
                            </div>
                        </div><!--hod_subjectwiseview.php-->
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            

            
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-fw fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        // $re=mysql_query("select subjectid from subject_class where classid='$classid'");
                //while($d=mysql_fetch_array($re))
                //{
//                    $subjectid=$d["subjectid"];
                   
  //              }
    //            $rel=mysql_query("select distinct(studid)from sessional_marks where classid='$classid' and status='Verified by staff advisor' order by(studid)");
           
      //      $r2=mysql_num_rows($rel);
        //                                 echo $r2;
            ?>

                                    </div>
                                    <div>Sessional Marks Verification</div>
                                </div>
                            </div>
                        </div>
                        <a href="sess_verification.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
             
               
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-fw fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Certificate</div>
                                </div>
                            </div>
                        </div>
                        <a href="Certificate code/search_form.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            <!-- /.row -->
          
                    <!-- /.panel -->
                   
                        <!-- /.panel-body -->
                      
                        <!-- /.panel-footer -->
                  </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
        </div>
    
            <!-- /.row -->
        <!-- /#page-wrapper -->


    <!-- /#wrapper -->   
<?php
    //include("includes/footer.php");
?>