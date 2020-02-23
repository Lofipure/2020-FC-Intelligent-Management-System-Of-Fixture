<?php /*a:1:{s:112:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\supervisor\view\Supervisor\mainPage.html";i:1582422404;}*/ ?>
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
<div class="container">
    <br>
    <a href="http://localhost:8000/supervisor/ierecord/<?php echo htmlentities($workcell); ?>" class="btn btn-success btn-xs">查看部门夹具进出库记录</a>
    <a href="http://localhost:8000/supervisor/rerecord/<?php echo htmlentities($workcell); ?>" class="btn btn-success btn-xs">查看部门夹具报修记录</a>
    <a href="http://localhost:8000/supervisor/browseDestoryRecord/<?php echo htmlentities($username); ?>" class="btn btn-success btn-xs">查看部门夹具报废记录</a>
    <br><br>
    <table class="table-responsive table table-hover">
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
        <?php foreach($data as $index =>  $element): ?>
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
                <?php if($element['destorystatus'] == 0): ?>
                无需操作
                <?php elseif($element['destorystatus'] == 1): ?>
                高级用户发出报废请求
                <?php else: ?>
                已经完成初审
                <?php endif; ?>
                <br>
                <?php if($element['buystatus'] == 0): ?>
                初级管理员已经提交申请，请您审核
                <?php elseif($element['buystatus'] == 1): ?>
                审核成功，等待经理终审
                <?php else: ?>
                通过审核，投入运营
                <?php endif; ?>
            </td>
            <td>
                <?php if($element['destorystatus'] == 0): ?>
                <a href="" class="btn btn-info btn-xs disabled">无需操作</a>
                <?php elseif($element['destorystatus'] == 1): ?>
                <a href="http://localhost:8000/supervisor/trialDestory/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-danger btn-xs">初审请求</a>
                <?php else: ?>
                <a href="" class="btn btn-success btn-xs disabled">初审完成无需操作</a>
                <?php endif; ?>
                <br>
                <?php if($element['buystatus'] == 0): ?>
                <!--初级管理员已经提交申请，请您审核-->
                <a href="http://localhost:8000/supervisor/handelAdd/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-success btn-xs">同意审核</a>
                <?php elseif($element['buystatus'] == 1): ?>
                <!--审核成功，等待经理终审-->
                <a href="" class="btn btn-success btn-xs disabled">审核完成，无需操作</a>
                <?php else: ?>
                <!--通过审核，投入运营-->
                <a href="" class="btn btn-success btn-xs disabled">正在运营</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>