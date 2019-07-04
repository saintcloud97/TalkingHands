<?php
/**
* 
*/
//require "db_connected.php";
class DbOperations {
    private $con;
    
    function __construct() {
        
        require_once dirname(__FILE__).'/db_connected.php';
        $db = new DbConnect();
        $this->con = $db->connect();
    }
    
    public function userLogin($username,$pass) {
        $xyz=0;

    //table anem :users://db name:alphabets
        $password = md5($pass);
        $uname=$username;
        $con=mysqli_connect("localhost","root","","db");
    // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sql="SELECT * FROM users WHERE username='$uname' AND password='$password' ";

        if ($result=mysqli_query($con,$sql)) {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($result)) {
                return true;
                $xyz++;
            }
            if($xyz==0) {
                return false;
            }
            // Free result set
            mysqli_free_result($result);
        }

        mysqli_close($con);


    }

    public function getUserByUserName($email) {
        $stm = $this->con->prepare("SELECT * FROM users WHERE email = ?");
        $stm->bind_param("s",$email);
        $stm->execute();
       return $stm->get_result()->fetch_assoc(); 
    }

    
    public function createUser($email,$pass, $user, $first, $last){
        $passwd = md5($pass);
 
        $mysqli = new mysqli("localhost", "root", "", "db");
 
        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
 
        // Attempt insert query execution
        $sql = "INSERT INTO users (email, password, Username, Firstname, Lastname) VALUES ('$email', '$passwd', '$user', '$first', '$last')";
        if($mysqli->query($sql) === true){
            return true; 
        } else{
            return false; 
        }
 
        // Close connection
        $mysqli->close();

    }


    public function changePassword($email,$pass){
        $password = md5($pass);
 
        $mysqli = new mysqli("localhost", "root", "", "db");
 
        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
 
        // Attempt insert query execution
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        if($mysqli->query($sql) === true){
            return true; 
        } else{
            return false; 
        }
 
        // Close connection
        $mysqli->close();

    }



}