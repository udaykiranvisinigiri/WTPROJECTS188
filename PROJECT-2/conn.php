<?php
session_start();
    $conn=mysqli_connect('localhost','root','','facebook');
    if($conn){
        $_SESSION['l']="localhost";
    $_SESSION['r']='root';
    $_SESSION['p']='';
    $_SESSION['d']='facebook';
    header('location: home.html');
    }
?>