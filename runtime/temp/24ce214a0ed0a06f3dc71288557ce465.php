<?php /*a:1:{s:110:"C:\Another\服创\2020-FC-Intelligent-Management-System-Of-Fixture\application\admin\view\index\loginPage.html";i:1582505004;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/static/css/admin/index/loginPage.css">
</head>
<body>
<div class="container">

    <form action="http://localhost:8000/login" method="post" id="loginForm" class="clearfix">
        <div class="text-center">
            <h2>工夹具管理系统</h2>
            <h3>用户登录</h3>
        </div>
        <div class="form-group col-xs-12">
            <label for="" class="control-label"></label>
            <input type="text" name="username" class="form-control" placeholder="账号">
        </div>
        <div class="form-group col-xs-12">
            <label for="" class="control-label"></label>
            <input type="password" name="password" class="form-control" placeholder="密码">
        </div>
        <div class="col-xs-3"></div>
        <div class="form-group col-xs-6">
            <label for="" class="control-label"></label>
            <input type="submit" value="登录" class="form-control btn btn-info">
        </div>
    </form>
</div>

</body>
</html>