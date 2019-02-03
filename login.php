<?php
/**
文档说明
Author：白皓天(Haotian Bai)
Goal：构建动态网站(Building Dynamic Websites)
The Document is written for course project, building dynamic websites.

2019.1.31-2019.2.20
 */
/*ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '717398Bht';*/
/*由上面SQL更改数据库的连接--phpstorm*/
session_start();
if(($connection = mysqli_connect("localhost","root","717398Bht","project"))===false) {/*返回link连接数据库*/
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    //check connection
}

if(isset($_POST["user"])&&isset($_POST["pass"])) {
    //prepare sql

    $sql = sprintf("SELECT * FROM login WHERE users='%s' AND pass ='%s'",
        mysqli_real_escape_string($connection,$_POST["user"]),
        mysqli_real_escape_string($connection,$_POST["pass"]));
/*Defence of sql injection attack*///prepare sql

    //execute query
    $result = mysqli_query($connection,$sql);//mixed types

    if($result ===FALSE)
        die("Could not open database");//在用户交互中显得不太友好
    //check whether we found a row
    if(mysqli_num_rows($result)==1)
    {
        //remember that user's logged in
        $_SESSION["authenticated"] = true;
        //redirect user to new page,using absolute path,per
        $host = $_SERVER["HTTP_HOST"];
        /*$path = rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");*/
        header("Location:http://$host/xampp/project/html/homepage.php");
    }
    else{

        header("Location:http://localhost/xampp/project/html/Login Page.html");
    }
    /* URL->http://localhost/xampp/project/php/login.php
     * $_SERVER["HTTP_HOST"]->      localhost
     *$_SERVER["PHP_SELF"]->     /xampp/project/php/login.php
     *rtrim(dirname($_SERVER["PHP_SELF"]),"/\\")       ->/xampp/project/php
     * */
}
?>


