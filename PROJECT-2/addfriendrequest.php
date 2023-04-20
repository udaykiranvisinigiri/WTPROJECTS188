<?php
ob_start();
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
if($conn){
    $q="insert into friends values('$_SESSION[name]','$_POST[reqto]','requested')";
    
    $conn->query($q);
    
    if($conn){
    echo "requested";
    }
    else{
        echo "requesting..";
    }
}
?>