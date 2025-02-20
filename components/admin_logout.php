<?php 

    include 'connect.php';

    // Expire the cookie
    setcookie('seller_id', '', time() - 3600, '/');

    // Redirect to login page
    header('Location:admin_panel/login.php');
    exit();

?>
