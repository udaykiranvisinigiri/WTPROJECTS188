<?php
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
$conn->query("insert into likes value('$_POST[filename]','$_POST[username]','$_SESSION[name]')");
if($conn){
    $re=$conn->query("select count(*) as likes from likes where photoname='$_POST[filename]';");
    if($re->num_rows>0){
        while($rows=$re->fetch_assoc()){
            echo "<strong>$rows[likes]</strong>";
        }
    }
    else{
        echo "";
    }
}
?>