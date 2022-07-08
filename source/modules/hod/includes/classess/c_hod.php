<?php
include("c_subject.php");
include("../includes/connection1.php");
include("../includes/report_errors.php");
$sub=new subject();
/**
 * hod
 */
class hod   
{
    public $user_details;
    public $staff_details;
    public $fname;
    public $hodname;
    public $deptname;
    public $hodid;
    
   public function getinfo()
    {  
        include("../includes/connection1.php");
        $this->hodid="DUMMY1";
        $sql="select * from faculty_details where fid='DUMMY1'";
        $result=$conn->query( $sql );
        while($row = $result->fetch_assoc())
        {
        $this->user_details[]=$row;
        $this->hodname=$row['name'];
        $this->deptname=$row['deptname'];
        }
        return $this->user_details;
    }
 //=========================================================================================================
    public function random_password( $length = 8 ) 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
 //=========================================================================================================
    public function faculty_registration($fid,$name,$deptname,$phoneno,$email)
    {
     include("../includes/connection1.php");
     $this->fid=$fid;
     $this->name=$name;
     $this->deptname=$deptname;
     $this->phoneno=$phoneno;
     $this->email=$email;

     $ch="select * from faculty_details where email='$email'";
    
     $res=$conn->query($ch);
     if ($res->num_rows > 0)
     {  
        $value="Exists_email";
        return $value;
     }
     else{
       $check="select * from faculty_details where fid like '$fid'";
	   $result=$conn->query($check);
	 if ($result->num_rows > 0) 
	 {
		$value="Exists_userid";
        return $value;
     }
     else	
     {

	    $image0 = null;
		// if(!isset( $_FILES['file']))
	    if(!$_FILES['file']['tmp_name']=="")
		$image0 = addslashes(file_get_contents($_FILES['file']['tmp_name']));


	    $sql ="insert into faculty_details(fid,name,deptname,phoneno,email,photo)value('$fid','$name','$deptname','$phoneno','$email',
	    '$image0')";
	

	 if($conn->query($sql)== TRUE) 
	 { 
        $value="added";
		$pass=$this->random_password(8);
		$conn->query("insert into login values('$email','$pass','faculty')") or die(mysql_error());
		$conn->query("insert into faculty_designation values('$fid','faculty')") or die(mysql_error());
		

        $subjectmail="RITSOFT | Login Details";
        $contentmail='
		Your Login Credentials for RITSOFT Account
		Username: '.$email.'
		Password: '.$pass.'
		------------------------
 		Thanking You';
 			
 		mail($email,$subjectmail,$contentmail);

       return $value;
	 }
     }
     }
    }
 //=========================================================================================================   
   public function faculty_viewaddedfaculty($depname)
   { 
     include("../includes/connection1.php");
    $this->depname=$depname;
   
    $sql ="select * from faculty_details where fid not like 'DUMMY%' and deptname ='$depname' ";
    
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc())
    {
    $this->faculty_details[]=$row;
    }
    return $this->faculty_details;
   } 
 //===============================================================================================================
   public function allot_staffadvisor($classid,$fid,$list)
   {
    include("../includes/connection1.php");
    $this->classid=$classid;
    $this->fid=$fid;
    $this->list=$list;
    
    $check="select * from staff_advisor where students_list = '$list' and classid = '$classid' and fid='$fid'"; 
	$result=$conn->query($check);
    if ($result->num_rows > 0)
    {
        $value="already_added";
        return $value;
    }
    else{
        $sql1 ="insert into staff_advisor(classid,fid,students_list)value('$classid','$fid','$list')";
        $ch="select * from faculty_designation where fid='$fid' and designation like '%advisor'";
        $r=$conn->query($ch);
        if ($r->num_rows==0)
        {
         $sql2 =$conn->query("insert into faculty_designation(fid,designation)value('$fid','staff advisor')");
            }
        if($conn->query($sql1))
        {
            $value="added_Successfully";
            return $value;
        } else
             $value="failed";
             return $vaue;        
    }
    // $value="falied";
    // return $value;
   }
//====================================================================================================================
   public function delete_staffadvisor($staffid,$clid)
  {
    include("../includes/connection1.php");
    $this->staffid=$staffid;
    $this->clid=$clid;
    $ch="select * from staff_advisor where fid='$staffid';";
    $r=$conn->query($ch);
    if ($r->num_rows==1)
    {
        $sql2 =$conn->query("delete from faculty_designation where fid='$staffid' and designation like '%advisor';");
    }
    $sql1 ="delete from staff_advisor where fid='$staffid' and classid='$clid';";
    if($conn->query($sql1) == TRUE)
    {
      $value="deleted";
      return $value;
    }
    else {	
		$value="failed";
        return $value;
	}
  }
 //================================================================================================================
    public function addsubject($subid,$name,$classid,$type,$inpass,$inmax,$expass,$exmax,$dept,$co_limit)
    {
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
    
     $sub=new subject();
     $value=$sub->subjuctadd("$subid","$name","$classid","$type","$inpass","$inmax","$expass","$exmax","$dept","$co_limit");
     return $value;
    }
//====================================================================================================================
    public function sub_alloc($classid,$subjectid,$fid,$name,$type)
    {

        $this->classid=$classid;
        $this->subjectid=$subjectid;
        $this->fid=$fid;
        $this->name=$name;
        $this->type=$type;
        
        $sub=new subject();
        $value=$sub->sub_alloced("$classid","$subjectid","$fid","$name","$type");
        return $value;
    }
    //===============================================================================================================
   
    public function fetch_single_faculty_details($staff_id)
    {
       include("../includes/connection1.php");
       $this->$staff_id=$staff_id;
       $sql ="select s.fid,s.name,s.email,s.phoneno,s.deptname,s.photo from faculty_details s where fid='$staff_id'";
       $result = $conn->query($sql);
       if ($result->num_rows == 1)
        {
	       while($row = $result->fetch_assoc())
           {
            $this->staff_details[]=$row;
           }
        }
        return $this->staff_details;
    }
   //==================================================================================================================
     public function faculty_update($staffid,$name,$deptname,$email,$phoneno)
     {
        include("../includes/connection1.php");
       $this->staffid=$staffid;
       $this->name=$name;
       $this->deptname=$deptname;
       $this->email=$email;
       $this->phoneno=$phoneno;
      
       $ch="select * from faculty_details where email='$email' and fid !='$staffid'";
    //    echo "$ch";
       $res=$conn->query($ch);
       if ($res->num_rows > 0)
       {
         $value="exist_email_id";
         return $value;
       }
       else
	   {
		$sql1 ="select email from faculty_details where fid='$staffid'";
		$result = $conn->query($sql1);
		while($row = $result->fetch_assoc()) 
        {
			$pemail= $row['email'];
		}
        if(!$_FILES['file']['tmp_name']=="")
		{
			$photo=addslashes(file_get_contents($_FILES['file']['tmp_name']));
			$sql2 ="update faculty_details set name='$name',deptname='$deptname',email='$email',phoneno='$phoneno', 
			photo='$photo' where fid='$staffid';";
            $sql3 ="update login set username='$email' where username='$pemail'";
		}
        else
		{
			$sql2 ="update faculty_details set name='$name',deptname='$deptname',email='$email',phoneno='$phoneno' where fid='$staffid';";
			$sql3 ="update login set username='$email' where username='$pemail'";
		}
        if($conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE)
        { 
           $value="update";
           return $value;
			  
		}
        else
        { 
            $value="failed";
            return $value;	
		}
      }
     }
   //====================================================================================================================
    public function delete_faculty($staffid)
    {
       include("../includes/connection1.php");
       $this->staffid=$staffid;
       $l="select email from faculty_details where fid='$staffid'";
       $result=$conn->query($l);
       $row=$result->fetch_array();
       $email=$row['email'];
       $sql3 ="delete from login where username='$email'";	 
	   $sql4 ="delete from faculty_details where fid='$staffid'";
       if ($conn->query($sql3)==TRUE && $conn->query($sql4)==TRUE)
        {
            $value="deleted";
            return $value;
	    }
        else
        {
            $value="failed";
            return $value;
        }
    }
 //==================================================================================================================
  
 //===================================================================================================================== 
   public function sub_alloc_edit($subjectid,$staffid,$classid,$oldfid,$type)
   {
    $this->subjectid=$subjectid;
    $this->staffid=$staffid;
    $this->classid=$classid;
    $this->oldfid=$oldfid;
    $this->type=$type;

    $sub=new subject();
    $value=$sub->sub_alloc_update("$subjectid","$staffid","$classid","$oldfid","$type");
    return $value;
   
   }
//=============================================================================================================
    public function sub_alloc_remove($staffid,$classid,$subjectid,$type)
    {
        $this->staffid=$staffid;
        $this->classid=$classid;
        $this->subjectid=$classid;
        $this->type=$type;

        $sub=new subject();
        $value=$sub->sub_alloc_delete("$staffid","$classid","$subjectid","$type");
        return $value;
    }
//================================================================================================================
     public function remove_subject($subjectid,$classid)
     {
        $this->subjectid=$subjectid;
        $this->classid=$classid;
        
        $sub=new subject();
        $value=$sub->delete_subject("$subjectid","$classid");
        return $value;
     }
 //===========================================================================================================================

}
?>