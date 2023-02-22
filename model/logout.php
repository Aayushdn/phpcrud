<?php
session_start();
unset($_SESSION['userId']);
unset($_SESSION['userRow']);
unset($_SESSION['status']);
session_destroy();
header('Location: "../index.php"');



?>