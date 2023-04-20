<?php
ob_start();
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
?>

<html>
<head>
<link rel="stylesheet" href="gobal.css" >
<style>
    .frienddiv{
        width: 40%;
        height: max-content;
        background-color: blue;
        color: white;
        margin-left: 450px;
        border-radius: 50px;
    }
    .name{
        margin-left: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .addfrndbtn{
        height: 40px;
        width: 100px;
        border:none;
        margin-left: 200px;
        margin-bottom: 10px;
        border-radius: 10px;
        cursor: pointer;
    }
    .frienddiv button{
        cursor: pointer;
    }
</style>
</head>
<body>
    <div style="color: blue;width:84%;background-color:white;"  ><center><h1 style="font-size: 50px;margin-left:35.6%;" >facebook</h1></center><div style="background-color:blue;color:white;width:50px;height:50px;border-radius:50px;position:absolute;top:5px;right:3px;z-index:999" ><center><h1 style="font-size:30px;margin:0;padding-top:6px;" ><?php echo strtoupper("$_SESSION[name]")[0]; ?></h1></center></div></div>
    <div><h1 style="font-size:50px;position:fixed;top:-6px;left:50px;padding:0;margin:0;z-index:-1;color:blue;" >facebook</h1></div>
    <div class="sidebar" id="sidebar" >
        <div style="width: 200px;height: 30px;" >

        </div>
    <form method="post" >
    <a ><button name="home" >Home</button></a>
    <a href="#www.google.com" ><button>message</button></a>
<!--     <a style="position:fixed;bottom:39px;left:55%;height:70px;width:70px;" ><h1 onclick="up();" id="uploadpics" style="background-color:white;color:blue;border-radius:70px;padding-left:30px;padding-bottom:10px;"  >+</h1></a>
 -->    <a href="#www.google.com" ><button style="background-color:rgb(82, 82, 236);color:white;" disabled >Add Friends</button></a>
    <a ><button name='friends' >Friends</button></a>
    <?php
    $reqs="select * from friends where request='$_SESSION[name]' and status='requested'";
    $t=$conn->query($reqs);
    if($t->num_rows>0){
       echo "<a ><button name='requests' >requests<span>*</span></button></a>";
    }
    else{
        echo "<a ><button name='requests' >requests</button></a>";
    }
    ?>
    <a ><button name='profile' >profile</button></a>
    <a ><button name='settings' >settings</button></a>
    <a><button name="logout" >Logout</button></a>
</form>
    <p style="color: white;" >--------------------------------------------------------</p>
    <div>
        <h1 style="color: blue; text-align: center;margin-top: 0px;font-family:none;" >notifications</h1>
        <div id="notification-recived" >
            <a href="#www.google.com" ><button>hari requested to you</button></a>
        </div>
    </div>
</div>
<div style="width: 82%;height: max-content;max-height:max-content;position: absolute;top: 5.5%;right: 30px;z-index:1;" class="img" id="img">
        <?php
            $q="select * from user where name!='$_SESSION[name]';";
            $re=$conn->query($q);
            if($re->num_rows>0){
                while($rows=$re->fetch_assoc()){
                    $e="select * from friends where user='$_SESSION[name]' and request='$rows[name]' and status='friends'";
                    $fr=$conn->query($e);
                    $ss="select * from friends where user='$_SESSION[name]' and request='$rows[name]' and status='requested'";
                    $se=$conn->query($ss);
                    echo "<div class='frienddiv' >";
                    echo "<h1 class='name' >$rows[name]</h1>";
                    echo "<form id='$rows[name]' >";
                    $btn=$rows['name']."btn";
                    echo "<input type='text' value='$rows[name]' name='reqto' hidden >";
                    if($fr->num_rows>0){
                        echo "<input type='submit' class='addfrndbtn' value='unfriend' id='$btn' ' >";
                    }
                    elseif($se->num_rows>0){
                        echo "<input type='submit' class='addfrndbtn' value='requested' id='$btn' ' >";
                    }
                    else{
                    echo "<input type='submit' class='addfrndbtn' value='Add Friend' id='$btn' onclick='add(`$rows[name]`)' >";
                    }
                    echo "<input type='submit' class='addfrndbtn' value='view profile' style='margin-left:50px;' >";
                    echo "</form>";
                    echo "</div>";
                }
            }
        ?>
</div>
</body>
<script>
   function add(n){
        let adf=document.getElementById(n);
        let btn=document.getElementById(`${n}btn`);
        adf.addEventListener('submit',(event)=>{
            event.preventDefault();
            let xhr=new XMLHttpRequest();
            xhr.open('POST','addfriendrequest.php',true);
            xhr.onload=function (e){
            btn.value=xhr.responseText;
            btn.disabled=true;
            }
            let userData=new FormData(adf);
            xhr.send(userData);
        })
    }
</script>
</html>
<?php
if(isset($_POST['home'])){
    header("Location: uhome.php");
}
if(isset($_POST['requests'])){
    header("location: requests.php");
}
if(isset($_POST['logout'])){
    $_SESSION['name']='';
    header("location: conn.php");
}
if($_SESSION['name']==''){
    header("location: conn.php");
}
if(isset($_POST['friends'])){
    header("location: friends.php");
}
if(isset($_POST['profile'])){
    header("location: profile.php");
}
if(isset($_POST['settings'])){
    header("location: settings.php");
}
?>