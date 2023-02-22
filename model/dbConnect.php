<?php

// $host = "localhost";
// $username = "root";
// $password = "";

// $conn = new mysqli($host,$username,$password);
// if ($conn -> connect_errno){
//     echo "Connection Failed " . $conn->connect_error;
// }

class db
{
    public $conn;


    function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database= "users";
        $this->conn = new mysqli($host,$username,$password,$database);

        if (mysqli_connect_errno()){
            echo mysqli_connect_error($this->conn);
        }
        else{
            echo "Database succesfully connected";
        }
        
    }

    public function query($sql) {
        // $result = $this->conn->query($sql);
        $result = mysqli_query($this->conn,$sql);
        return $result;
    }
}
