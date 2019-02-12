
<!--文档说明
Author：白皓天(Haotian Bai)
Goal：构建动态网站(Building Dynamic Websites)
The Document is written for course project, building dynamic websites.

2019.1.31-2019.2.20
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="../css/diy.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
if(isset($_SESSION["authenticated"]))
if($_SESSION["authenticated"]==false)
    echo("<script>alert('用户名和密码不匹配！请重新输入');</script>");
?>

<div class="header" >
    <div class="header_audio">
        <audio  controls >
                <source src="../audio/Lana%20Del%20Rey%20-%20Young%20And%20Beautiful.mp3" type="audio/mpeg"/>
        </audio>
    </div>
</div>
<div class="bg_img" style="background-image:url(../img/photo.jpg);"></div>
<div class="container">
 <div id="content">
<form action="login.php" method="post">

    <p style="font-size: 25px;margin-left: 50px"> 登录</p>
    <p><label for="user">用户名</label></p><input name="user" type="text" id="user"/>
    <p><label for="pass">密码</label></p><input name="pass" type="text" id="pass"/>

    <div id="button">
        <input type="submit" id="btn" value="登录"  style=" margin-left: 50px;
    margin-top: 30px;"/>
    </div>


</form>
 </div>
</div>
</body>
</html>