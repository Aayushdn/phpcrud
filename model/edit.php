<?php

require "./dbConnect.php";
$db = new db();
session_start();

if (isset($_POST['editedBio'])) {

    $editedBio = $_POST['editedBio'];
    $userId = $_SESSION['userId'];
    $sql = "UPDATE auth SET bio='$editedBio' WHERE id = '$userId'";
    $result = $db->query($sql);
    if ($result){

        $_SESSION['userRow']['bio'] = $editedBio;
        header('Location: ../view/dashboard.php');
    }
}
