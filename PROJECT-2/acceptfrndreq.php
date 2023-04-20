<?php
ob_start();
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
$r="insert into friends values('$_SESSION[name]','$_POST[reqto]','friends')";
$q="update friends set status='friends' where user='$_POST[reqto]' and request='$_SESSION[name]'; ";
$e="update friends set status='friends' where user='$_SESSION[name]' and request='$_POST[reqto]'; ";
$conn->query($q);
$conn->query($r);
if($conn){
echo "friends";
}
else{
    echo "processing";
}
?>