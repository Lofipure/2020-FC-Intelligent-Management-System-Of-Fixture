<?php /*a:1:{s:102:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\admin\view\admin\mainPage.html";i:1582043590;}*/ ?>
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
                    <div class="form-group">
                        <label for="">账号</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="">姓名</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">密码</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">请再次输入密码</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">邮箱</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">电话号码</label>
                        <input type="tel" class="form-control" name="telephone">
                    </div>
                    <div class="form-group">
                        <label for="">职务</label>
                        <select name="role" id="" class="form-control ">
                            <option value="-1">请选择职务</option>
                            <option value="0">Admin 管理员</option>
                            <option value="1">OperatorI 初级用户</option>
                            <option value="2">OperatorII 高级用户</option>
                            <option value="3">Supervisor 监管员</option>
                            <option value="4">Manager workcell经理</option>
                            <option value="5">Normal User 普通用户</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">部门</label>
                        <input type="text" name="workcell" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" value="注册" class="btn btn-success" id="submit">
            </div>
        </div>
    </div>
</div>
<br>
<!-- Admin 主页 -->
<div class="container">
    <input type="button" value="注册新用户" class="btn btn-success" data-toggle="modal" data-target="#registerModal">
    <table class="table table-hover table-responsive">
        <tr>
            <th>账号</th>
            <th>姓名</th>
            <th>电话号码</th>
            <th>邮箱</th>
            <th>职务</th>
            <th>工作部门</th>
            <th>操作</th>
        </tr>
        <?php foreach($userData as $key => $element): ?>
        <tr>
            <td><?php echo htmlentities($element['username']); ?></td>
            <td><?php echo htmlentities($element['name']); ?></td>
            <td><?php echo htmlentities($element['telephone']); ?></td>
            <td><?php echo htmlentities($element['email']); ?></td>
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
                <!--http://localhost:8000/admin/delete/<?php echo htmlentities($element['username']); ?>-->
                <a href="http://localhost:8000/admin/modify/<?php echo htmlentities($element['username']); ?>" class="btn btn-warning btn-xs">修改</a>
                <a href="javascript:void(0)" class="btn btn-danger btn-xs"  onclick="del('<?php echo htmlentities($element['username']); ?>')">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
<script type="text/javascript">
    $("#submit").click(function () {
        let data = $("#registerForm").serializeArray();
        console.log(data);
        $.ajax({
            type: 'post',
            url: 'http://localhost:8000/admin/addNew',
            data: data,
            dataType: 'text',
            success: function (e) {
                console.log(e);
                alert('注册成功');
                location.reload();
            },
            error: function () {
                alert('注册失败');
            },
            async: true
        });
    });
    function del(data) {
        //console.log(data);
        let status = window.confirm("确定要删除"+data+"吗");
        if(status == true) {
            location.href = "http://localhost:8000/admin/delete/"+data;
        }
    }
</script>
</body>
</html>