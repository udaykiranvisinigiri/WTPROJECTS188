<?php
session_start();
$conn=mysqli_connect('localhost','root','','facebook');
if($conn){
        $re=$conn->query("select * from user where email='$_POST[username]' and password='$_POST[password]' ;");
        if($re->num_rows>0){
            while($rows=$re->fetch_assoc()){
                $_SESSION['name']=$rows['name'];
                header("location: uhome.php");
            }
        }
        else{
            header("location: opps.php");
        }
    }

?>