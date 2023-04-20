<?php
ob_start();
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
$conn->query("insert into comments values('$_POST[cfilename]','$_SESSION[name]','$_POST[comment]')");
if($conn){
echo $_POST['comment'];
}
?>