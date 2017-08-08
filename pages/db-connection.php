<?php
include_once('config.php');

class DB {
    public $mysqli;
    
    public function connect()
    {
        global $host, $user, $password, $port, $db;        
        $this->mysqli = mysqli_connect($host, $user, $password, $db, $port);
        
        if (mysqli_connect_errno())
        {   
            echo "Error Connecting to DB!";
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function close_db()
    {
        $this->mysqli->close();
    } 
    
    // LOGIN: check if user exists
    public function validate_user_exists($user_email, $user_pwd)
    {          
        $this->connect();
        
        $query_login = "SELECT * FROM 
                            PORTAL_USER, PORTAL_USER_ACCESS
                            WHERE
                            PORTAL_USER.PORTAL_USER_EID = PORTAL_USER_ACCESS.PORTAL_USER_ACCESS_EID
                            AND
                            PORTAL_USER.PORTAL_USER_EMAIL = ?
                            AND
                            PORTAL_USER_ACCESS.PORTAL_USER_ACCESS_PASSWORD = ?
                            AND
                            PORTAL_USER_ACCESS_ACTIVE = 'Y'";
        
        $stmt = $this->mysqli->prepare($query_login);
        $stmt->bind_param("ss", $user_email, $user_pwd);
        $stmt->execute();
        $stmt->store_result();
        $rowNum =    $stmt->num_rows(); 
        $stmt->close();
        
        return $rowNum == 1 ? true : false;
    }
    
    //Increments user login attempt. Returns false if greater than allowed attempts
    public function increment_user_login_attempt($user_email)
    {
        $this->connect(); 
        $query = "UPDATE PORTAL_USER_ACCESS, PORTAL_USER "
                        . "SET PORTAL_USER_ACCESS_FAILED_LOGIN_ATTEMPTS = PORTAL_USER_ACCESS_FAILED_LOGIN_ATTEMPTS + 1 "
                        . "WHERE PORTAL_USER_EMAIL = ? AND PORTAL_USER_ACCESS_EID = PORTAL_USER_EID";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("s", $user_email);
        $stmt->execute(); 
        $stmt->close();
    }
    
    public function get_user_login_attempt($user_email)
    {
        $result = 0;
        $this->connect(); 
        $query = "SELECT PORTAL_USER_ACCESS.PORTAL_USER_ACCESS_FAILED_LOGIN_ATTEMPTS 
                            FROM PORTAL_USER, PORTAL_USER_ACCESS
                            WHERE
                            PORTAL_USER.PORTAL_USER_EID = PORTAL_USER_ACCESS.PORTAL_USER_ACCESS_EID
                            AND
                            PORTAL_USER.PORTAL_USER_EMAIL= ? ";
        
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("s", $user_email);
        $stmt->execute();   
        $stmt->bind_result($num_attempts);
  
        while($stmt->fetch())
        {
            echo $num_attempts . " <br />";
            $result = $num_attempts;
        }
        $stmt->close();        

        return $num_attempts;           
    }
    
}

error_reporting(E_ALL);
ini_set('display_errors', '1');