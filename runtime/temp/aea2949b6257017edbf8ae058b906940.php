<?php /*a:1:{s:106:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\manager\view\Manager\mainPage.html";i:1582428767;}*/ ?>
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
                设备正常运转
                <?php elseif($element['destorystatus'] == 1): ?>
                高级用户提出报废申请，监管员初审中
                <?php elseif($element['destorystatus'] == 2): ?>
                监管员初审完成，等待您处理
                <?php endif; ?>
                <br>
            </td>
            <td>
                <?php if($element['destorystatus'] == 2): ?>
                <a href="http://localhost:8000/manger/destory/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-success btn-xs">执行操作</a>
                <?php else: ?>
                <a href="" class="btn btn-success btn-xs disabled">无需操作</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<script type="text/javascript">
</script>
</body>
</html>