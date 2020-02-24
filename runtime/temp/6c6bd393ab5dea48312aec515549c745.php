<?php /*a:1:{s:112:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\operatorii\view\operatorii\mainPage.html";i:1582538634;}*/ ?>
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
                <li><a href="http://localhost:8000/operatorii/showRepair/<?php echo htmlentities($workcell); ?>">查看部门夹具的维修记录</a></li>
                <li><a href="http://localhost:8000/operatorii/ierecord/<?php echo htmlentities($workcell); ?>">查看部门夹具的借出记录</a></li>
                <li><a href="http://localhost:8000/">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <table class="table table-hover table-responsive text-center">
        <tr>
            <th>夹具代码</th>
            <th>夹具名称</th>
            <th>所属大类</th>
            <th>夹具模组</th>
            <th>夹具料号</th>
            <th>配备数量</th>
            <th>用途</th>
            <th>保养点检周期</th>
            <th>负责人</th>
            <th>所属工作部</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php foreach($tools as $key => $element): ?>
        <tr>
            <td><?php echo htmlentities($element['code']); ?></td>
            <td><?php echo htmlentities($element['name']); ?></td>
            <td><?php echo htmlentities($element['familyid']); ?></td>
            <td><?php echo htmlentities($element['model']); ?></td>
            <td><?php echo htmlentities($element['partno']); ?></td>
            <td><?php echo htmlentities($element['upl']); ?></td>
            <td><?php echo htmlentities($element['usefor']); ?></td>
            <td><?php echo htmlentities($element['pmperiod']); ?></td>
            <td><?php echo htmlentities($element['owner']); ?></td>
            <td><?php echo htmlentities($element['workcell']); ?></td>
            <td>
                <?php if($element['repairstatus'] == 0): ?>
                正常运转
                <?php elseif($element['repairstatus'] == 1): ?>
                初级管理员提交报修申请
                <?php elseif($element['repairstatus'] == 2): ?>
                正在报修
                <?php endif; ?>
            </td>
            <td>
                <?php if($element['repairstatus'] == 2): ?>
                <a href="http://localhost:8000//operatorii/finishRepair/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-success btn-xs">检修完成</a>
                <?php elseif($element['repairstatus'] == 1): ?>
                <a href="http://localhost:8000/operatorii/handelRepair/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-warning btn-xs">处理报修申请</a>
                <?php elseif($element['repairstatus'] == 0): ?>
                <a href="" class="btn btn-info btn-xs disabled">无需操作</a>
                <?php endif; ?>
                <a href="http://localhost:8000/operatorii/postDestory/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-danger btn-xs">提交报废申请</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>