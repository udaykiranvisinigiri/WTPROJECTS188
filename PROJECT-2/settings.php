<?php
ob_start();
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
?>

<html>
<head>
<link rel="stylesheet" href="gobal.css" >
<style>
    input,.img button{
        margin-top: 30px;
        border: 0px;
        outline: 0;
        outline-style: 0px;
        margin-bottom: 30px;
        background-color: rgb(82, 82, 236);
        border-bottom: 3px solid white;
        color:white;
    }
    .img button:hover{
        background-color: green;
    }
    input:focus{
        background-color: green;
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
    <a><button name="home" >Home</button></a>
    <a href="#www.google.com" ><button>message</button></a>
<!--     <a style="position:fixed;bottom:39px;left:55%;height:70px;width:70px;" ><h1 onclick="up();" id="uploadpics" style="background-color:white;color:blue;border-radius:70px;padding-left:30px;padding-bottom:10px;"  >+</h1></a>
 -->    <a ><button name="addfriends" >Add Friends</button></a>
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
    <a ><button name="profile" >profile</button></a>
    <a href="#www.google.com" ><button style="background-color:rgb(82, 82, 236);color:white;" disabled >settings</button></a>
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
<div style="width: 82%;height: max-content;max-height:max-content;position: absolute;top: 5.5%;right: 30px;z-index:1;" class="img" id="img" >
    <form method="post" >
        <?php
        $q="select * from user where name='$_SESSION[name]';";
        $re=$conn->query($q);
        if($re->num_rows>0){
            while($rows=$re->fetch_assoc()){
                echo "<div style='width:800px;height:max-content;background-color:blue;color:white;margin-left:350px;font-size:40px;border-radius:30px;' >";
                echo "<center>";
                echo "<label for='name'  >Your name:</label>";
                echo "<input type='text'  name='name' value='$_SESSION[name]'style='font-size:40px;' ><br/>";
                echo "</center>";
                echo "</div>";
                echo "<div style='width:800px;height:max-content;background-color:blue;color:white;margin-left:350px;font-size:40px;border-radius:30px;margin-top:40px;' >";
                echo "<center>";
                echo "<label for='name' >Your email:</label>";
                echo "<input type='text'  value='$rows[email]' style='font-size:40px;' name='email' ><br/>";
                echo "</center>";
                echo "</div>";
                echo "<div style='width:800px;height:max-content;background-color:blue;color:white;margin-left:350px;font-size:30px;border-radius:30px;margin-top:40px;' >";
                echo "<center>";
                echo "<label for='name' >Your phone number:</label>";
                echo "<input type='tel' value='$rows[phone]' style='font-size:30px;' pattern='[0-9]{3}[0-9]{3}[0-9]{4}' name='phone' ><br/>";
                echo "</center>";
                echo "</div>";
                echo "<div style='cursor:pointer;width:800px;height:max-content;background-color:blue;color:white;margin-left:350px;font-size:30px;border-radius:30px;margin-top:40px;' >";
                echo "<center>";
                echo "<h2 onclick='check()' >change your password</h2>";
                echo "</center>";
                echo "</div>";
                echo "<div id='password' style='display:none;width:800px;height:max-content;background-color:blue;color:white;margin-left:350px;font-size:30px;border-radius:30px;margin-top:40px;' >";
                echo "<center>";
                echo "<label for='name' >change your password:</label>";
                echo "<input type='password' id='pass' value='$rows[password]' style='font-size:30px;' onkeyup='check1()'  ><br/>";
                echo "</center>";
                echo "</div>";
                echo "<div id='password1' style='display:none;width:800px;height:max-content;background-color:blue;color:white;margin-left:350px;font-size:30px;border-radius:30px;margin-top:40px;' >";
                echo "<center>";
                echo "<label for='name' >re-enter your password:</label>";
                echo "<input type='password' id='pass1' value='$rows[password]' style='font-size:30px;' name='password' onkeyup='check1()' ><br/>";
                echo "</center>";
                echo "</div>";
                echo "<button type='submit' name='updt' style='margin-left:660px;height:60px;border-radius:10px;' id='btn' ><h1>save changes</h1></button>";
            }
        }
        ?>
        </form>
</div>
</body>
<script>
    function check(){
        document.getElementById("password").style.display="block";
        document.getElementById("password1").style.display="block";
    }
    function check1(){
        let x=document.getElementById("pass").value;
        let y=document.getElementById("pass1").value;
        if(x==y){
            document.getElementById("btn").style.display="inline";
        }
        else{
            document.getElementById("btn").style.display="none";
        }
    }
    function sleep(){
        setTimeout(() => {
            window.location.href = "/facebook/home.html";
        }, 2000);
    }
</script>
</html>
<?php
if(isset($_POST['updt'])){
$w="update user set name='$_POST[name]',email='$_POST[email]',phone='$_POST[phone]',password='$_POST[password]' where name='$_SESSION[name]' ";
$conn->query($w);
if($conn){
    echo "<center><h1 style='background-color:green;color:white;' >updated successfully..</h1><center>";
    echo "<script>sleep()</script>";
}
}
if(isset($_POST['requests'])){
    header("location: requests.php");
}
if(isset($_POST['home'])){
    header("location: uhome.php");
}
if(isset($_POST['friends'])){
    header("location: friends.php");
}
if(isset($_POST['addfriends'])){
    header("location: addfriends.php");
}
if(isset($_POST['logout'])){
    $_SESSION['name']='';
    header("location: conn.php");
}
if($_SESSION['name']==''){
    header("location: conn.php");
}
if(isset($_POST['profile'])){
    header("location: profile.php");
}
?>