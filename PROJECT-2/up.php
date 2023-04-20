<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="gobal.css" >
</head>
<body>
<div style="color: blue;width:84%;background-color:white;"  ><center><h1 style="font-size: 50px;margin-left:35.6%;margin-top:0px;" >facebook</h1></center><div style="background-color:blue;color:white;width:50px;height:50px;border-radius:50px;position:absolute;top:5px;right:3px;z-index:999" ><center><h1 style="font-size:30px;margin:0;padding-top:6px;" ><?php echo strtoupper("$_SESSION[name]")[0]; ?></h1></center></div></div>
    <div><h1 style="font-size:50px;position:fixed;top:-6px;left:50px;padding:0;margin:0;z-index:-1;color:blue;" >facebook</h1></div>
    <div class="sidebar" >
        <div style="width: 200px;height: 60px;" >

        </div>
    <form method="post" >
    <a><button name="uname" >Home</button></a>
    <a href="#www.google.com" ><button>message</button></a>
    <a><button name="upload_redict" >upload pics</button></a>
    <a href="#www.google.com" ><button>about</button></a>
    <a href="#www.google.com" ><button>profile</button></a>
    <a href="#www.google.com" ><button>settings</button></a>
</form>
    <p style="color: white;" >--------------------------------------------------------</p>
    <div>
    <h1 style="color: blue; text-align: center;margin-top: 0px;font-family:none;" >notifications</h1>
        <div id="notification-recived" >
            <a href="#www.google.com" ><button>hari requested to you</button></a>
        </div>
    </div>
</div>
<div style="width: 84%;height: 100vh;background-color: aliceblue;position: absolute;top: 5.5%;right: 0%;" >
<div style="width: 400px;height:300px;background-color: rgb(82, 82, 236);border-radius:5px;margin-left:500px;margin-top:300px;" >
<form method="post"  enctype="multipart/form-data" action="up1.php" >
    <center><h1 style="color:white;" >upload photos</h1>
    <input type="file" accept=".jpg" name="file" style="margin-top:70px;margin-bottom:40px;" ><br/>
    <input type="submit" name="submit" value="upload pic" >
    </center>
</form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['uname'])){
    header('location: uhome.php');
}
?>