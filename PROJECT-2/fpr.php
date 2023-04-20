<?php
session_start();
$_SESSION['vpf']=$_POST['reqto'];
echo $_SESSION['vpf'];
?>