<?php /*a:1:{s:104:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\admin\view\admin\modifyPage.html";i:1582523010;}*/ ?>
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
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="" class="navbar-brand">
                工夹具管理系统
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-top: 0">
                <li><a href="http://localhost:8000/admin">返回</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2><?php echo htmlentities($ret['name']); ?>信息修改</h2>
    <form action="http://localhost:8000/admin/handelModify" class="form form-horizontal" method="post">
        <div class="form-group has-success">
            <label for="" class="control-label">用户名</label>
            <input type="text" name="username" value="<?php echo htmlentities($ret['username']); ?>" readonly class="form-control">
        </div>
        <div class="form-group has-success">
            <label for="" class="control-label">姓名</label>
            <input type="text" name="name" value="<?php echo htmlentities($ret['name']); ?>" readonly class="form-control">
        </div>
        <div class="form-group" id="inputPasswordBox">
            <label for="inputPassword" class="control-label">密码</label>
            <input type="password" name="password" class="form-control" id="inputPassword">
        </div>
        <div class="form-group" id="inputPasswordTwiceBox">
            <label for="inputPasswordTwice" class="control-label">请再次输入密码</label>
            <input type="password" class="form-control" id="inputPasswordTwice">
        </div>
        <div class="form-group" id="inputTelBox">
            <label for="inputTel" class="control-label">电话号码</label>
            <input type="tel" class="form-control" placeholder="<?php echo htmlentities($ret['telephone']); ?>" name="telephone" id="inputTel">
        </div>
        <div class="form-group" id="inputEmailBox">
            <label for="inputEmail" class="control-label">邮箱</label>
            <input type="email" class="form-control" placeholder="<?php echo htmlentities($ret['email']); ?>" name="email" id="inputEmail">
        </div>
        <div class="form-group" id="inputWorkcellBox">
            <label for="inputWorkcell" class="control-label">部门</label>
            <input type="text" class="form-control" placeholder="<?php echo htmlentities($ret['workcell']); ?>" name="workcell" id="inputWorkcell">
        </div>
        <div class="form-group" id="inputRoleBox">
            <label for="inputRole" class="control-label">职务</label>
            <select name="role" id="inputRole" class="form-control">
                <option value="<?php echo htmlentities($ret['role']); ?>">
                    <?php if($ret['role'] == 0): ?> 管理员
                    <?php elseif($ret['role'] == 1): ?> 初级用户
                    <?php elseif($ret['role'] == 2): ?> 高级用户
                    <?php elseif($ret['role'] == 3): ?> 监管员
                    <?php elseif($ret['role'] == 4): ?> Workcell经理
                    <?php else: ?> 普通用户
                    <?php endif; ?>
                </option>
                <option value="0">Admin 管理员</option>
                <option value="1">OperatorI 初级用户</option>
                <option value="2">OperatorII 高级用户</option>
                <option value="3">Supervisor 监管员</option>
                <option value="4">Manager workcell经理</option>
                <option value="5">Normal User 普通用户</option>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="control-label"></label>
            <input type="submit" value="修改" class="btn btn-success" id="submit">
        </div>
    </form>
</div>
<script src="/static/js/admin/admin/modifyPage.js"></script>
</body>
</html>