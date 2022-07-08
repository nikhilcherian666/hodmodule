<?php

/**
 * subject
 */
 class subject
{
    public $Subject_id;
    public $Subject_title; 
//---------------------------------------------------------------------------------------------------------------
    public function subjuctadd($subid,$name,$classid,$type,$inpass,$inmax,$expass,$exmax,$dept,$co_limit)
    {   include("../includes/connection1.php");
   
     $this->subid=$subid;
     $this->name=$name;
     $this->classid=$classid;
     $this->type=$type;
     $this->inpass=$inpass;
     $this->inmax=$inmax;
     $this->expass=$expass;
     $this->exmax=$exmax;
     $this->dept=$dept;
     $this->co_limit=$co_limit;
     
     $check="select * from subject_class where subjectid ='$subid' and classid='$classid'";
     
     $result=$conn->query($check);
     if ($result->num_rows > 0)
     {

    $value="already_added";
    return $value;
     }
     else
     {
         //for global electives
     if($type == 'ELECTIVEG')
     {
     if ($dept == 'CIVIL')
     { 
         $apendstr =  "CEGLOBAL";
     }
     if ($dept == 'COMPUTER APPLICATIONS')
     { 
         $apendstr =  "MCAGLOBAL";
     }
     if ($dept == 'MECHANICAL')
     { 
         $apendstr =  "MEGLOBAL";
     }
     if ($dept == 'COMPUTER SCIENCE')
     { 
         $apendstr =  "CSGLOBAL";
     }
     if ($dept == 'ELECTRONICS AND COMMUNICATION')
     { 
         $apendstr =  "ECGLOBAL";
     }
     if ($dept == 'ARCHITECTURE')
     { 
         $apendstr =  "ARCHGLOBAL";
     }
     if ($dept == 'ELECTRICAL AND ELECTRONICS')
     { 
         $apendstr =  "EEGLOBAL";
     }
 
         $type = "ELECTIVE"; // type is again set as elective for global electives. to avoid changes in other modules.
         $lastch = substr($subid,-8); //extract last 8 characters from subjectid
         if($lastch!=$apendstr) // check whether the appended string is already added.
         {
         $subid = "${subid}${apendstr}";  //if not append the string at the end of subkect id , to make subject id unique in the case of global elective.
         }
     }

     $sql ="insert into subject_class(subjectid,subject_title,classid,type,internal_passmark,internal_mark,external_pass_mark,external_mark)value('$subid','$name','$classid','$type','$inpass','$inmax','$expass','$exmax')";
		if($conn->query($sql)== TRUE) 
        {  
            $value="true";
            return $value;
            for($i=1;$i<=$co_limit;$i++)
            {
                $co_code = $_POST['co_code'.$i];
				$co_description = $_POST['co_description'.$i];
			
				$sql1 = $conn->query( "insert into course_outcome(co_code,subject_id,co_description,status)VALUES ('$co_code','$subid','$co_description','$status')");
			
            }
            echo "<script type=\"text/javascript\"> alert(\"Subject Added Successfully\");
            location.replace(\"../view/addsubject_index.php\");
            </script>";
        }
         else{
           echo" <script type=\"text/javascript\"> alert(\"Failed\");
		location.replace(\"../view/addsubject_index.php\");
        </script>";
         }
    }
   }
  //----------------------------------------------------------------------------------------------------------------------------------
    
    public function sub_alloced($classid,$subjectid,$fid,$name,$type)
    {
        include("../includes/connection1.php");
        $this->classid=$classid;
        $this->subjectid=$subjectid;
        $this->fid=$fid;
        $this->name=$name;
        $this->type=$type;
        
        $l=$conn->query("select * from subject_allocation where classid='$classid' and subjectid='$subjectid' and fid='$fid'");
		if ($l->num_rows ==1)
        {
            $value="Already_allotted";
            return $value;
           
        }
        if ($type=='main')
        {
            $l=$conn->query("select * from subject_allocation where classid='$classid' and subjectid='$subjectid' and type='$type'");
            if ($l->num_rows==0)
            {
                $sql ="insert into subject_allocation(classid,subjectid,fid,type) value('$classid','$subjectid','$fid','$type')";
                if($conn->query($sql) == TRUE)
                {
                    $value="Subject_allotted";
                    return $value;
                }
                else
                {
                    $value="Already_allotted";
                    return $value;
                }
            }
             else
             {
                echo "<script>alert('Main Faculty already exists.You can add sub faculty for this subject')</script>";
                echo "<script>window.location.href='../view/subject_allocation.php\'</script>";
             }
        }  
         else
         {
            $sql ="insert into subject_allocation(classid,subjectid,fid,type) value('$classid','$subjectid','$fid','$type')";
            if($conn->query($sql) == TRUE)
            {
                $value="Subject_allotted";
                return $value;
            }
            else
            {
               echo " <script type=\"text/javascript\"> alert(\"Already Subject allocated\");
  		        location.replace(\"../view/subject_allocation.php\");
 	            </script> ";
            }
         }
        }
//-----------------------------------------------------------------------------------------------------------------
    public function sub_alloc_update($subjectid,$staffid,$classid,$oldfid,$type)
    {
        include("../includes/connection1.php");
        $this->subjectid=$subjectid;
        $this->staffid=$staffid;
        $this->classid=$classid;
        $this->oldfid=$oldfid;
        $this->type=$type;

        if($type=="main")
        {   
            $l=$conn->query("select * from subject_allocation where classid='$classid' and subjectid='$subjectid' and fid='$staffid' and type='main'") ;
            
            if ($l->num_rows >0)
            {
                if($conn->query("update subject_allocation set fid='$staffid',type='$type' where classid='$classid' and subjectid='$subjectid' and fid='$oldfid'") ==TRUE)
                {
                   $value="updated";
                   return $value;
                }
                else{
                   echo "<script>alert('Subject Allocation Failure')</script>";
                   echo "<script>window.location.href='../view/sub_alloc_view.php'</script>";
                }
            }
            else
            {
                $l=$conn->query("select * from subject_allocation where classid='$classid' and subjectid='$subjectid' and fid!='$staffid' and type='main'");
                if ($l->num_rows>0) 
                {
                    $value="only_one_main_faculty";
                    return $value;
                    die();
                }
            }

            if($conn->query("update subject_allocation set fid='$staffid', type='$type' where classid='$classid' and subjectid='$subjectid' and fid='$oldfid'"))
	        {
		     $value="updated";
             return $value;
           
            }
	        else{
		      echo "<script>alert('Subject Allocation Failure')</script>";
	          echo "<script>window.location.href='../view/sub_alloc_view.php'</script>";
            }
       
       
        }

        else 
        {
            if($conn->query("update subject_allocation set fid='$staffid', type='$type' where classid='$classid' and subjectid='$subjectid' and fid='$oldfid'"))
            {
             $value="updated";
             return $value;
            }
            else{
		      echo "<script>alert('Subject Allocation Failure')</script>";
	          echo "<script>window.location.href='../view/sub_alloc_view.php'</script>";
            }
            }  
    }
 //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------  
        public function sub_alloc_delete($staffid,$classid,$subjectid,$type)
        {
            include("../includes/connection1.php");
            $this->staffid=$staffid;
            $this->classid=$classid;
            $this->subjectid=$classid;
            $this->type=$type;

            $sql ="delete from subject_allocation where fid='$staffid'and classid='$classid' and subjectid='$subjectid' and type='$type';";
            if ($conn->query($sql)==TRUE)
            {
                $value="deleted";
                return $value;
            }
            else {
                # code...
                return false;
            }
        }
 //--------------------------------------------------------------------------------------------------------------------------------------------------------------
       public function delete_subject($subjectid,$classid)
       {
        include("../includes/connection1.php");
        $this->subjectid=$subjectid;
        $this->classid=$classid;

        $sql ="delete from subject_class where subjectid='$subjectid' and classid='$classid';";

        if ($conn->query($sql)==TRUE)
        {
            $conn->query("DELETE FROM elective_student where sub_code='$subjectid' and stud_id in (select studid from current_class where classid='$classid')");
            //$value="deleted";
            return "deleted";
        }
        else {
            # code...
            return "failed";

        }
       }
 //----------------------------------------------------------------------------------------------------------------------------------------------------------------
 

}


