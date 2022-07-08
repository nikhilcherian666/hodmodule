<?php 
require_once 'include/report_errors.php';
/**
 * This is a short description of the entire file
 *
 * @author Tomsy Paul <tomsypaul@gmail.com>
  */

/**
 * User
 * 
 * User class is for any User of RITSoft. It can be
 * a Student or a Staff
 */
class User
{
    public $homepage;
    public $header;
    public $sidenav;
    public $footer; 
    public $username;
    public $password;
    public $usertype;
    /**
     * __construct
     *
     * @param  mixed $type
     * @param  mixed $homepage
     * @return void
     */
    public function __construct($type, $homepage, $header, $sidenav, $footer)
    {
        $this->usertype = $type;
        $this->homepage = $homepage;
        $this -> header = $header;
        $this -> sidenav = $sidenav;
        $this->footer=$footer;
    }

    /**
     * Login
     *
     * Login attempt - Returns either Success or Failure followed by a message
     * If failure, 
     *
     * @param mixed $username 
     * @param mixed $password 
     * 
     * @return string 
     */
    public function login($username, $password): string
    {
        include_once 'include/connection.php';
        $sql = "SELECT * FROM login where username = '$username' AND password = '$password';";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of first row
            if ($row = $result->fetch_assoc()) {
                return "Username: " . $row["username"]. "<br> Password: " . $row["password"]. 
                "<br>usertype ". $row["usertype"] . "<br>Login Success!!";
            }
        } else { 
            return "Failure:";  
        }
        close($conn);
    }

}
?>

