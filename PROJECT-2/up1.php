<?php
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
$e=$_SESSION['name'];
$i=1;
$cap="";
if($_POST['caption']!=""){
    $cap=$_POST['caption'];
}
while(true){
    if(file_exists("uploads/$e$i.jpg")){
        $i++;
    }
    else{
        $targ="uploads/$e$i.jpg";
        if(move_uploaded_file($_FILES['file']['tmp_name'],$targ)){
            $conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
            $q="insert into test values('$e$i.jpg','$e','$cap')";
            $conn->query($q);
            if($conn)
            echo "<center><h1 style='background-color:blue;color:white;' >uploaded successfully</h1></center>";
        }

        break;
    }
}
?>
<!-- <html>
<body onload='n();' >
</body>
<script>
    function n(){
        setTimeout(() => {
            window.location.href='uhome.php';
        }, 5000);
    }
</script>
</html> -->