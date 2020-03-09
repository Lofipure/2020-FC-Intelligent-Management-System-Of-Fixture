<?php /*a:1:{s:109:"C:\Another\服创\2020-FC-Intelligent-Management-System-Of-Fixture\application\admin\view\admin\mainPage.html";i:1582617778;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/admin/admin/mainPage.css">
</head>
<body>
<!--导航栏组件-->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="" class="navbar-brand">
                工夹具管理系统&nbsp;&nbsp;&nbsp;Admin
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-top: 0">
                <li><a href="" data-toggle="modal" data-target="#registerModal">注册新用户</a></li>
                <li><a href="http://localhost:8000/">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- 注册新用户模态框的设计 -->
<div class="modal fade" tabindex="-1" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4>用户注册</h4>
            </div>
            <div class="modal-body">
                <!-- 注册表单 -->
                <form action="" id="registerForm">
                    <div class="form-group" id="inputUsernameBox">
                        <label for="inputUsername" class="control-label">账号</label>
                        <input type="text" class="form-control" name="username" id="inputUsername">
                    </div>
                    <div class="form-group" id="inputNameBox">
                        <label for="inputName" class="control-label">姓名</label>
                        <input type="text" class="form-control" name="name" id="inputName">
                    </div>
                    <div class="form-group" id="inputPasswordBox">
                        <label for="inputPassword" class="control-label">密码</label>
                        <input type="password" class="form-control" name="password" id="inputPassword">
                    </div>
                    <div class="form-group" id="inputPasswordBoxTwice">
                        <label for="inputPasswordTwice">请再次输入密码</label>
                        <input type="password" class="form-control" id="inputPasswordTwice">
                    </div>
                    <div class="form-group" id="inputEmailBox">
                        <label for="inputEmail" class="control-label">邮箱</label>
                        <input type="email" class="form-control" name="email" id="inputEmail">
                    </div>
                    <div class="form-group" id="inputTelBox">
                        <label for="inputTel" class="control-label">电话号码</label>
                        <input type="tel" class="form-control" name="telephone" id="inputTel">
                    </div>
                    <div class="form-group" id="inputRoleBox">
                        <label for="inputRole" class="control-label">职务</label>
                        <select name="role" id="inputRole" class="form-control ">
                            <option value="-1">请选择职务</option>
                            <option value="0">Admin 管理员</option>
                            <option value="1">OperatorI 初级用户</option>
                            <option value="2">OperatorII 高级用户</option>
                            <option value="3">Supervisor 监管员</option>
                            <option value="4">Manager workcell经理</option>
                            <option value="5">Normal User 普通用户</option>
                        </select>
                    </div>
                    <div class="form-group" id="inputWorkcellBox">
                        <label for="inputWorkcell" class="control-label">部门</label>
                        <input type="text" name="workcell" class="form-control" id="inputWorkcell">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" value="注册" class="btn btn-success" id="submit" disabled="disabled">
            </div>
        </div>
    </div>
</div>
<br>
<!-- Admin 主页 -->
<div class="container">
    <table class="table table-hover table-responsive">
        <tr>
            <th>账号</th>
            <th class="shouldHidden">姓名</th>
            <th>电话号码</th>
            <th class="shouldHidden">邮箱</th>
            <th>职务</th>
            <th>工作部门</th>
            <th>操作</th>
        </tr>
        <?php foreach($userData as $key => $element): ?>
        <tr>
            <td><?php echo htmlentities($element['username']); ?></td>
            <td class="shouldHidden"><?php echo htmlentities($element['name']); ?></td>
            <td><?php echo htmlentities($element['telephone']); ?></td>
            <td class="shouldHidden"><?php echo htmlentities($element['email']); ?></td>
            <td>
                <?php if($element['role'] == 0): ?> 管理员
                <?php elseif($element['role'] == 1): ?> 初级用户
                <?php elseif($element['role'] == 2): ?> 高级用户
                <?php elseif($element['role'] == 3): ?> 监管员
                <?php elseif($element['role'] == 4): ?> Workcell经理
                <?php else: ?> 普通用户
                <?php endif; ?>
            </td>
            <td><?php echo htmlentities($element['workcell']); ?></td>
            <td>
                <a href="http://localhost:8000/admin/modify/<?php echo htmlentities($element['username']); ?>" class="btn btn-warning btn-xs">修改</a>
                <a href="javascript:void(0)" class="btn btn-danger btn-xs"  onclick="del('<?php echo htmlentities($element['username']); ?>')">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<script src="/static/js/admin/admin/mainPage.js"></script>
</body>
</html>