<?php
session_start();
    $_SESSION['l']="localhost";
    $_SESSION['r']='root';
    $_SESSION['p']='';
    $_SESSION['d']='facebook';
    $conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
    if($conn){
        $q="insert into user values('$_POST[name]','$_POST[email]','$_POST[phoneno]','$_POST[passwords]');";
        $conn->query($q);   
        if($conn){
            echo "<script>alert('sign up is successfull');</script>";
            header("location: home.html");
        }
    }
?>