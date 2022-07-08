<!-- /side nav -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
                           <!-- <li class="sidebar-search">
                          <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                           /input-group 
                       </li>-->
                       <li>
                        <a href="dash_home.php"><i class="fa fa-user fa-fw"></i>
                            <?php
                            include("report_errors.php");
                            //session_start();
                            include("classess/c_hod.php");
                            include("connection1.php");
                            $obj=new hod();
                            $obj->getinfo();
                           //$fname=$_SESSION['fname'];
                            
                           
                            
                               echo ($obj->hodname); 
                                                
                            ?>                        
                            
                        </a>
                    </li>                        

                    <li>                        
                        <a href="#"><i class=" fa fa-edit fa-fw"></i>FACULTY<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../view/addfacultyindex.php">Registration</a>
                            </li>
                            <li>
                                <a href="../view/viewaddstaffindex.php">View Faculty Details</a>
                            </li>
                            

                        </ul>
                    </li>
                    <li>                        
                        <a href="#"><i class=" fa fa-edit fa-fw"></i>STAFF ADVISOR<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../view/addstaffadvisor_index.php">Allot Staff Advisor</a>
                            </li>
                            <li>
                                <a href="../view/viewstaffadvisor.php">View Staff Advisor</a>
                            </li> 

                        </ul>
                    </li>

                    
                    <li>                        
                        <a href="#"><i class=" fa fa-edit fa-fw"></i>SUBJECT<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../view/addsubject_index.php">Add Subject</a>
                            </li>  
                            <li>
                                <a href="../view/subject_view.php">View Subjects</a>
                            </li>                                
                            <li>
                                <a href="../view/subject_allocation.php">Allocate Subject</a>                                    
                            </li> 

                            <li>
                                <a href="../view/sub_alloc_view.php">View Subject Allocation</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="student_search.php"><i class="fa fa-search fa-fw"></i>STUDENT SEARCH</a>
                    </li>
                    <li>
                        <a href="../view/sem_registration.php"><i class="fa fa-table fa-fw"></i>STUDENT SEMESTER REGISTRATON</a>
                    </li>

                    
					
					    <li>
                   	<a href="#"><i class="fa fa-align-justify"></i> ATTENDANCE</a>

                   	<ul class="nav nav-second-level">
					                   		<!-- <li>
                   			<a href="hod_hour_edit.php">Edit Hour</a>
                   		</li> -->

                   		<li>
                   			<a href="sub_attendanceview.php">View</a>
                   		</li>

                   	</ul>

                   </li>
					
					
					
					
					
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i>SESSIONAL MARKS VERIFICATION</a>
                    </li>

                    <li>
                        <!-- <a href="mark.php"><i class="fa fa-table fa-fw"></i>UNIVERSITY MARK</a> -->
                    </li>

                    <li>                        
                        <a href="#"><i class="fa fa-table fa-fw"></i>FEEDBACK<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../view/view_all_feedback.php">View All FeedBack</a>
                            </li>
                            <li>
                                <a href="../view/controll_feedback.php">Control Feedback Status</a>
                            </li>
							 <li>
                                <a href="../view/feedback_count.php">View feedback Count</a> 
                            </li>

                            <li>
                                <a href="clear_feedback.php">Clear feedback </a> 
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="parent_complaint.php"><i class="fa fa-table fa-fw"></i> PARENT COMPLAINT </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i>BONAFIDE CERTIFICATE </a>
                    </li>
                   
                               
                    
                    
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
<!-- Bootstrap Core JavaScript -->

<script src="../dash/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- ===================================================== bootstrap datepicker ======================================================================= -->

<link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js" charset="UTF-8"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../dash/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../dash/vendor/raphael/raphael.min.js"></script>

    <script src="../dash/vendor/morrisjs/morris.min.js"></script>
    <script src="../dash/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dash/dist/js/sb-admin-2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>


