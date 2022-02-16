<?php 
    //session_start();
    $user =  $GuestObj->getuserbyid($_SESSION['username']);
    $LogObj->savelog($user['Name'],"Logged out","User",$user['CustomerID']);
    session_destroy();
    echo "<script>window.location.href='".$baseUrl."/';</script>";
    exit;
?>