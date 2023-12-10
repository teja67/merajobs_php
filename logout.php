<?php
session_start();

if(isset($_POST['user_id'])){

    // $_SESSION = array();
    // print_r($_SESSION);
    // echo "before unset";

    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['is_admin']);

    unset($_SESSION);
    header('Location: /merajobs/login.php');
    exit;
}
?>