<?php /*a:1:{s:110:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\operatori\view\operatori\mainPage.html";i:1582591746;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/operatori/mainPage.css">
</head>
<body>
<!--导航栏设计-->
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
                <li><a href="" data-toggle="modal" data-target="#addModel">提交采购入库申请</a></li>
                <li><a href="http://localhost:8000/operatori/seeAllRecord/<?php echo htmlentities($workcell); ?>">查看本部门的借出记录</a></li>
                <!--<li><a href="" data-toggle="modal" data-target="#registerModal">注册新用户</a></li>-->
                <li><a href="http://localhost:8000/">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- 初级用户提价申请模态框 -->
<div class="modal fade" tabindex="-1" id="addModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4>请求进购新夹具</h4>
            </div>
            <div class="modal-body">
                <form action="" id="addForm">
                    <div class="form-group">
                        <label for="">夹具代码</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">夹具名称</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">所属大类</label>
                        <input type="text" name="familyid" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">夹具模组</label>
                        <input type="text" name="model" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">夹具料号</label>
                        <input type="text" class="form-control" name="partno">
                    </div>
                    <div class="form-group">
                        <label for="">配备数量</label>
                        <input type="text" class="form-control" name="upl">
                    </div>
                    <div class="form-group">
                        <label for="">夹具用途</label>
                        <input type="text" class="form-control" name="usefor">
                    </div>
                    <div class=form-group>
                        <label for="">保养点检周期</label>
                        <input type="text" class="form-control" name="pmperiod">
                    </div>
                    <div class="form-group">
                        <label for="">负责人</label>
                        <input type="text" name="owner" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">所属工作部</label>
                        <input type="text" name="workcell" class="form-control">
                        <input type="hidden" name="poster" value="<?php echo htmlentities($username); ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" value="发送请求" class="btn btn-success" id="submit">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-hover table-responsive text-center">
        <tr>
            <th>夹具代码</th>
            <th>夹具名称</th>
            <th>所属大类</th>
            <th>夹具模组</th>
            <th>夹具料号</th>
            <th class="shouldHidden">配备数量</th>
            <th>用途</th>
            <th class="shouldHidden">保养点检周期</th>
            <th class="shouldHidden">负责人</th>
            <th class="shouldHidden">所属工作部</th>
            <th>当前状态</th>
            <th>操作</th>
        </tr>
        <!--$allTool-->
        <?php foreach($allTool as $key => $element): ?>
        <tr>
            <td><?php echo htmlentities($element['code']); ?></td>
            <td><?php echo htmlentities($element['name']); ?></td>
            <td><?php echo htmlentities($element['familyid']); ?></td>
            <td><?php echo htmlentities($element['model']); ?></td>
            <td><?php echo htmlentities($element['partno']); ?></td>
            <td class="shouldHidden"><?php echo htmlentities($element['upl']); ?></td>
            <td><?php echo htmlentities($element['usefor']); ?></td>
            <td class="shouldHidden"><?php echo htmlentities($element['pmperiod']); ?></td>
            <td class="shouldHidden"><?php echo htmlentities($element['owner']); ?></td>
            <td class="shouldHidden"><?php echo htmlentities($element['workcell']); ?></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        当前状态 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="status">
                        <li>
                            进出库:
                            <?php if($element['IEstatus'] == 1): ?>
                            线上工人请求
                            <?php elseif($element['IEstatus'] == 2): ?>
                            等待归还
                            <?php else: ?>
                            可借
                            <?php endif; ?>
                        </li>
                        <li>
                            报修:
                            <?php if($element['repairstatus'] == 0): ?>
                            可以请求
                            <?php elseif($element['repairstatus'] == 1): ?>
                            已提交请求
                            <?php endif; ?>
                        </li>
                        <li>
                            状态:
                            <?php if($element['buystatus'] == 0): ?>
                            已经发出请求
                            <?php elseif($element['buystatus'] == 1): ?>
                            初审请求
                            <?php elseif($element['buystatus'] == 2): ?>
                            正常使用
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        执行操作 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="operate">
                        <li>
                            <?php if($element['IEstatus'] == 1): ?>
                            <a href="http://localhost:8000/operatori/handelApp/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>">同意申请</a><br>
                            <?php elseif($element['IEstatus'] == 2): ?>
                            <a href="" class="disabled">无需操作</a><br>
                            <?php else: ?>
                            <a href="" class="disabled">无需操作</a><br>
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php if($element['repairstatus'] == 0): ?>
                            <a href="http://localhost:8000/operatori/submitApp/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>">提交报修申请</a><br>
                            <?php elseif($element['repairstatus'] == 1): ?>
                            <a href="" class="disabled">无需操作</a><br>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<script type="text/javascript">
    $("#submit").click(function () {
        let data = $("#addForm").serializeArray();

        $.ajax({
            type: 'post',
            url: 'http://localhost:8000/operatori/addNew',
            data: data,
            dataType: 'text',
            success: function (e) {
                console.log(e);
                alert('请求发送成功，等待审核中');
                location.reload();
            },
            error: function () {
                alert('请求发送失败');
            },
            async: true
        });
    });
</script>
</body>
</html>