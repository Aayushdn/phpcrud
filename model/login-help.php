<?php

require './dbConnect.php';
$db = new db();


session_start();
if (isset($_POST['submit'])) {

    // get the data
    $username = $_POST['username'];
    $password = $_POST['password'];


    //This is to prevent from security vulnerability such as SQL injection attacks
   
    $password = mysqli_real_escape_string($db->conn, $password);
    $username = mysqli_real_escape_string($db->conn, $username);
   

    // Construct the SQL statement to check if the user already exists
    $sql = "SELECT * FROM auth WHERE uname = '$username' AND password = '$password'";

    // Execute the SQL statement
    $result = $db->query($sql);
    if ($result -> num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['userId'] = $row['id'];
        $_SESSION['userRow'] = $row;
        header('Location: ../view/dashboard.php');
    }
    else{
        $_SESSION['status'] = array('statusMsg' => 'User not Found Try Again','code' => 400,'page' =>'login');
        header('Location: ../view/login.php');
    }

    // $result = $db -> query($sql);

}
