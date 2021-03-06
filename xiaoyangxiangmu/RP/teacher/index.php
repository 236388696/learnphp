<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/26
 * Time: 上午9:57
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">主页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">产品</a></li>
                <li><a href="#">关于</a></li>
                <li><a href="#">项目</a></li>
                <li class="active"><a href="#">图片</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <?php
                    if (isset($_SESSION["user"])&&isset($_SESSION["pass"])){

                        echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">{$_SESSION['user']}<span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">";
                    if(isset($_SESSION["admin"])) {
                            echo "<li><a href=\"manage.php\">管理</a></li>";
                        }

                    echo " <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">设置</a></li>
                        <li><a href=\"#\">社区</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"javascript:signOut()\">注销</a></li>
                    </ul>";
                    }else{
                        echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">登录<span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">登录</a></li>
                        <li><a href=\"#\">注册</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"#\">忘记密码</a></li>
                    </ul>";
                    }

                    ?>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row">
        <?php
        mysql_connect("localhost","root","");
        mysql_select_db("0503");
        mysql_query("set names utf8");
        $sql = "SELECT * FROM image";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)){
            echo "<div class=\"col-sm-6 col-md-4\">
            <div class=\"thumbnail\">
                <img src='{$row["imgPath"]}' alt=\"...\">
                <div class=\"caption\">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Button</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Button</a></p>
                </div>
            </div>
        </div>";
        }
        ?>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="login_api.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">用户名</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="user">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">密码</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-info">登录</button>
                            <button type="button" class="btn btn-info">重置</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function signOut() {
       window.location.assign("http://localhost/0503/RP/teacher/signOut.php");
    }

    function addCookie(name, value, expires) {
        var date = new Date();
        date.setTime(date.getTime()+expires*24*3600*1000);
        document.cookie = name+"="+value+";expires="+date;
    }
    function getCookie(name) {
        var cookie = document.cookie;
        var cookieArr = cookie.split(";");
        for (var i = 0;i < cookieArr.length;i++){
            var cookies = cookieArr[i].split("=");
            if (cookies[0].trim()==name){
                return cookies[1].trim();
            }
        }
    }
</script>
</body>
</html>
