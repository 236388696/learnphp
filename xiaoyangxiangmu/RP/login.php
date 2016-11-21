<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/13
 * Time: 上午10:50
 */
session_start();
//$_SESSION["user"] = "kitty";

//echo $_SESSION["user"];
//var_dump($_COOKIE);
//setcookie(session_name(),session_id(),time()-10000,"/");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        .wrap{
            width: 1000px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }
        .wrap ul{
            width: 100%;
            list-style: none;
            padding: 10px;
            box-sizing: border-box;
        }
        .wrap ul li{
            background-color: #ccc;
            margin-bottom: 20px;
            font-size: 50px;
            width: 20%;
            height: 150px;
            margin: 2%;
            display: inline-block;
            position: relative;
        }
        .wrap ul li img {
            width: 100%;
            height: 100%;
        }
        .wrap ul li .cha{
            font-size: 15px;
            position: absolute;
            top:-12px;
            right:0;
            color: grey;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="#">首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">产品</a></li>
                <li><a href="#">项目</a></li>
                <li><a href="#">关于</a></li>
                <li><a href="#">黄图</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION["user"]) && isset($_SESSION["pass"])){
                    if ( $_SESSION["user"]== "刘小阳"){
                        echo " <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">{$_SESSION['user']} <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\" class='manage'>管理</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"javascript:signOut()\">注销</a></li>
                    </ul>
                </li>" ;
                    }else{echo " <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">{$_SESSION['user']} <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"javascript:signOut()\">注销</a></li>
                    </ul>
                </li>" ;}
                }else{
                    echo "<li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">登录 <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">登录</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"#\" class=''  data-toggle=\"modal\" data-target=\"#myModal1\">注册</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"#\">忘记密码</a></li>
                    </ul>
                </li>";
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               登录
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="post" action="login_api.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">用户名</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user" id="inputEmail3" placeholder="邮箱">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label" >密码</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">登录</button>
                            <button type="submit" class="btn btn-info">返回</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               注册
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="post" action="zhuce_api.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">用户名</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user" id="inputEmail3" placeholder="邮箱">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label" >密码</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">注册</button>
                            <button type="submit" class="btn btn-info">返回</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="wrap" class="wrap">
    <ul>
        <?php
        require_once "common.php";
        $sql = "SELECT * FROM image ";
        $result = mysql_query($sql);
        while ( $row = mysql_fetch_row($result)){
            $id = $row[0];
            $imgPath = $row[1];
            echo "<li><img src='{$imgPath}'>";
            echo "</li>";
        }

        ?>
    </ul>
</div>







<script>
    function signOut() {
        window.location.assign("login_api.php");
    }

    $(".manage").on("click",function () {
        window.location.assign("upload.php");
    })
</script>
</body>
</html>