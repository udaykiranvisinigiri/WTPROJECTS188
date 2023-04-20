<?php
ob_start();
session_start();
$conn=mysqli_connect($_SESSION['l'],$_SESSION['r'],$_SESSION['p'],$_SESSION['d']);
$jpgw="";
?>

<html>
<head>
<link rel="stylesheet" href="gobal.css" >
    <style>
        
        .uimg{
          width:95%;
          height: max-content;
          border:1px solid blue;  
          background-color: blue;
          border-radius: 20px;
          margin: 10px 10px 10px 100px;
          
        }
        .nimg{
            width:1000px;
            height:800px;
            margin-left:130px;
            margin-bottom:10px;
            border-radius: 20px;
            border: 1px white solid;
        }
        button{
            border:none;
            background-color:black;
            color:white;
            cursor: pointer;
            width:max-content;
            height:18px;
            border-radius:5px;
            border:1px solid blue;
            margin-bottom:10px;
        }
        button h3{
            font-size:11px;
            margin:0px;
            padding:0px;
        }
        button:hover{
            color:blue;
        }
        #submit{
            background-color: black;
            cursor: pointer;
            color: white;
        }
        #submit:hover{
            color: blue;
        }
        @keyframes upform{
            from{
                position:fixed;
                top: 100%;
            }
            to{
                position:fixed;
                top: 0%;
            }
        }
        @keyframes upform1{
            from{
                position:fixed;
                top: 0%;
            }
            to{
                position:fixed;
                top: 100%;
            }
        }
        .comments{
            margin-left:200px;
            
        }
        .comment{
            width:300px;
            height: max-content;
            float: right;
            background-color: white;
            margin-right: 10px;
            border-radius: 10px;
        }
        .cmt{
            background-color: blue;
            width: 270px;
            margin-left:10px;
            border-radius: 10px 0px 10px 10px;
            color:white;
        }
        .li{
            border-radius: 10px;
            font-size: 30px;
            border: none;
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
    
    <a href="#www.google.com" ><button name='profile' >profile</button></a>
    <a ><button name='settings'>settings</button></a>
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
<div style="width: 82%;height: max-content;max-height:max-content;position: absolute;top: 5.5%;right: 30px;z-index:-1;" class="img" id="img" onclick="upr()" >
        <center><h1 style="color:blue;font-size:60px;" ><?php echo strtoupper($_SESSION['vpf']); ?>'S POSTS</h1></center>
        <?php
            $re=$conn->query("select * from test where username='$_SESSION[vpf]';");
            if($re->num_rows>0){
                while($rows=$re->fetch_assoc()){
                    $jpg=str_replace(".jpg","",$rows["name"]);
                    $jpgw=$jpg."e";
                    echo "<div class='uimg'>";
                    echo "<span><div class='p' style='background-color:white;width:50px;height:50px;border-radius:50px;margin-left:200px;margin-top:17px;'><center><h1 style='font-size:30px;margin:0;color:blue;padding-top:6px;' >",strtoupper("$rows[username]")[0],"</h1></center></div></span>";
                    echo "<a style='text-decoration:none;cursor:pointer;' href='#' ><h1 style='color:white;margin-top:-3px;margin-left:200px;' >".$rows['username']."</h1></a>";
                    $com=$jpg."com";
                    echo "<div class='comment' >";
                    $cot="select * from comments where user='$jpg';";
                    $cor=$conn->query($cot);
                    if($cor->num_rows>0){
                        echo "<center><h1 style='color:blue;' >Comments</h1></center>";
                    echo "--------------------------------------------------------";
                        while($crows=$cor->fetch_assoc()){
                            echo "<div class='cmt' >";
                            echo "<h3 style='margin:0;margin-right:2px;float:right;' >$crows[comment]</h3>";
                            echo "<br/>";
                            echo "<h6 style='margin:0;margin-left:50%;margin-top:5px;color:yellow;' >comment by $crows[commentto]<h6>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
                    echo "<img class='nimg' src='uploads/$rows[name]' >";
                    echo "<h3 style='color:white;margin-left:140px;' >$rows[capction]</h3>";
                    echo "<div><form id='$jpg' >";
                    echo "
                        <input type='text' name='filename' value='$jpg' hidden>
                        <input type='text' name='username' value='$rows[username]' hidden>";
                        echo "<br/>";
                        $res=$conn->query("select count(*) as likes from likes where photoname='$jpg';");
                        if($res->num_rows>0){
                            while($row=$res->fetch_assoc()){
                                if($row['likes']>0){
                                echo "<span id='$jpgw' style='margin-left:250px;color:white;' ><strong>$row[likes]</strong></span>";
                                }
                                else {
                                    echo "<span id='$jpgw' style='margin-left:250px;color:white;' ><strong></strong></span>";
                                }
                            }
                        }
                        $resu=$conn->query("select * from likes where photoname='$jpg' and liker='$_SESSION[name]';");
                        
                        if($resu->num_rows>0){
                        echo "<input type='button' class='li' style='margin-left:10px;color:white;background-color:red;' value='&#9825;' >";
                        }
                        else{
                    echo "<input class='li' style='margin-left:10px;background-color:blue;color:white;border:none;cursor:pointer;font-size:30px;' type='submit' id='submit$jpg' value='&#9825;' onclick='like(`$jpg`)' >";
                        }
                //echo "<button style='margin-left:500px;' ><h3>share</h3></button>";
                echo "</form>";
                echo "<span><form id='$com' >";
                    echo "<input type='text' name='cfilename' value='$jpg' hidden ><div style='float:left;margin-left:200px;margin-top:-70px;' >";
                    echo "<textarea type='text' name='comment' placeholder='type your comment..' style='margin-left:200px;padding-bottom:40px;border-radius:10px;outline:0;' cols='40' ></textarea></div>";
                    echo "<input onclick='y(`$jpg`)' style='margin-left:10px;background-color:black;color:white;margin-top:-50px;cursor:pointer;' type='submit' value='comment' >";
                    echo "</form></span>";
                    $cj=$jpg."s";
                    echo "<div id='$cj' ></div>";
                echo "</div>";
                echo "</div>";
                
                }
            }
            else{
                $w=strtoupper($_SESSION['vpf']);
                echo "<center><h1 style='width:600px;height:80px;background-color:blue;color:white;padding-top:40px;border-radius:40px;' >THERE ARE NO POSTS BY <span style='border-bottom:1px solid white;' >$w</span> </h1></center>";
            }
        ?>
        <div style="height: 100px;width:100%;background-color:white;" ></div>
</div>
<div style="display:none;position:fixed;top:0%;left:20%;" id="up" >
<div style="width: 400px;height:300px;background-color: rgb(82, 82, 236);border-radius:5px;margin-left:500px;margin-top:300px;" >
<div id="upre" ></div>
<form id="upform" enctype="multipart/form-data" >
    <center><h1 style="color:white;" >upload photos</h1>
    <input type="file" accept=".jpg" name="file" style="margin-top:50px;margin-bottom:1px;" ><br/></center>
    <h4 style="margin: 0px 0px 0px 10px;color:white;" >caption:</h4>
    <center>
    <textarea type="text" name="caption" cols="20" rows="5" style="margin-bottom:40px;" placeholder="enter something...." ></textarea><br/>
    <input type="submit" name="submit1" value="upload pic" id="submit1" onclick="upform()" >
    </center>
</form>
    </div>
</div>
        
</body>
<script>
    function y(re){
        fn=re;
        let com=fn+"com";
        let cm=fn+"s";
    let come=document.getElementById(cm);
    let cform=document.getElementById(com);
    cform.addEventListener("submit",(event)=>{
        event.preventDefault();
        let xhr=new XMLHttpRequest();
        xhr.open('POST','comment.php',true);
        xhr.onload=function(e){
            setTimeout(() => {
        location.reload();
    }, 1000);
        }
        let cdata=new FormData(cform);
        xhr.send(cdata);
    });
    }
    function like(n){
    let jpgw=n+"e";
    let subi="submit"+n;
    console.log(jpgw);
    let ue= document.getElementById(jpgw);
    let formELement=document.getElementById(n);
formELement.addEventListener('submit',(event)=>{
    event.preventDefault();
    let xhr=new XMLHttpRequest();
    xhr.open('POST','add.php',true);
    xhr.onload=function (e){
        ue.innerHTML=xhr.responseText;
    };
    let userData=new FormData(formELement);
    xhr.send(userData);
    let s=document.getElementById(subi);
    s.style.backgroundColor="red";
    s.style.color="white";
    s.disabled=true;
});
}
let m=0;
function up(){
    if(m==0){
        document.getElementById("sidebar").style.opacity=".3";
        document.getElementById("img").style.opacity=".3";
        document.getElementById("up").style.animationName="upform";
        document.getElementById("up").style.animationDuration="2s";
        document.getElementById("up").style.display="inline";
        document.getElementById("upform").style.opacity="1";

    m=1;
    }
    else{
        document.body.style.opacity="1";
        document.getElementById("up").style.animationName="upform1";
        document.getElementById("up").style.animationDuration="4s";
        document.getElementById("sidebar").style.opacity="1";
        document.getElementById("img").style.opacity="1";
        setTimeout(() => {
            document.getElementById("up").style.display="none";
        }, 3000);
        
        m=0;
    }

}
function upr(){
    document.body.style.opacity="1";
        document.getElementById("up").style.animationName="upform1";
        document.getElementById("up").style.animationDuration="4s";
        document.getElementById("sidebar").style.opacity="1";
        document.getElementById("img").style.opacity="1";
        setTimeout(() => {
            document.getElementById("up").style.display="none";
        }, 3000);
        
        m=0;
}
function upform(){
    let upre=document.getElementById("upre");
    let upf=document.getElementById("upform");
    let su=document.getElementById("submit1");
    upf.addEventListener("submit",(event)=>{
        event.preventDefault();
    let xhr=new XMLHttpRequest();
    xhr.open('POST','up1.php',true);
    xhr.onload=function (e){
        upre.innerHTML=xhr.responseText;
    };
    let upData=new FormData(upf);
    xhr.send(upData);
    setTimeout(() => {
        document.getElementById("up").style.display="none";
        location.reload();
    }, 3000);
    });
}
function comment(){
    console.log('fn');
    let com=fn+"com";
    let come=document.getElementById("come").value;
    let cform=document.getElementById(com);
    cform.addEventListener("submit",(event)=>{
        event.preventDefault();
        let xhr=new XMLHttpRequest();
        xhr.open('POST','comment.php',true);
        xhr.onload=function(e){
            come.value=xhr.responseText;
        }
        let cdata=new FormData(cform);
        xhr.send(cdata);
        
    });
}
</script>
</html>
<?php
if(isset($_POST['requests'])){
    header("location: requests.php");
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
if(isset($_POST['settings'])){
    header('location: settings.php');
}
if(isset($_POST['home'])){
    header('location: uhome.php');
}
if(isset($_POST['friends'])){
    header('location: friends.php');
}
if(isset($_POST['profile'])){
    header('location: profile.php');
}
ob_end_flush();
?>