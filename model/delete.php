<?php

require "./dbConnect.php";
$db =  new db();
session_start();

if ($_SESSION['confirmDelete']){
    $userId = $_SESSION['userId'];
    $sql = "DELETE FROM auth WHERE id = '$userId'";
    $result = $db->query($sql);
    if ($result){
        header('location: ./logout.php');
    } else{
        header('location: ../view/dashboard.php');
    }
}


?>