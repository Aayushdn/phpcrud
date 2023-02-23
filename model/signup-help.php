<?php

require './dbConnect.php';
$db = new db();


session_start();
echo "i am at signup <br>";
echo isset($_POST['signup']);
if (isset($_POST['email'])) {

    // get the data


    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];
    $status = 'error';

    //This is to prevent from security vulnerability such as SQL injection attacks
    $email = mysqli_real_escape_string($db->conn, $email);
    $password = mysqli_real_escape_string($db->conn, $password);
    $username = mysqli_real_escape_string($db->conn, $username);
    $fname = mysqli_real_escape_string($db->conn, $fname);
    $lname = mysqli_real_escape_string($db->conn, $lname);
    $bio = mysqli_real_escape_string($db->conn, $bio);


    // Construct the SQL statement to check if the user already exists
    $sql = "SELECT * FROM auth WHERE uname = '$username' OR email = '$email'";

    // Execute the SQL statement
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // If the user already exists, display an error message
        echo "<script>alert('User already exists. Please login')</script>";
        echo "<script>window.location.href = '../view/signup.php';</script>";
    } else {

        if (!empty($_FILES["pp"]["name"])) {
            // Get file info 
            $fileName = basename($_FILES["pp"]["name"]);
            print_r($fileName);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {

                $image = $_FILES['pp']['tmp_name'];
                $imgContent = file_get_contents($image);

                // sql query
                $sql = "INSERT INTO auth (id,email,uname,password,fname,lname,bio,image) values('',?,?,?,?,?,?,?)";

                //sql stmt
                $stmt = mysqli_prepare($db->conn, $sql);
                $stmt->bind_param("sssssss", $email, $username, $password, $fname, $lname, $bio, $imgContent);
                mysqli_stmt_execute($stmt);

                // check and redirect
                if (mysqli_stmt_errno($stmt)) {
                    print_r(mysqli_stmt_error($stmt));
                } else {
                    // $_SESSION['status'] = 'Account successfully Created';
                    unset($_SESSION['userId']);
                    $_SESSION['status'] =  array('statusMsg'=>'Account successfully Created','code' => 200);
                    header('Location: ../view/login.php');
                }
            } 
        }
    }



    // $result = $db -> query($sql);

}
