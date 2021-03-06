<?php /*a:1:{s:81:"C:\Users\王子恒\Desktop\fc-reload\application\normal\view\normal\mainPage.html";i:1582168959;}*/ ?>
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
<!--allTool-->
<!--<h1>普通用户界面</h1>-->
<br>
<div class="container">
    <table class="table table-responsive table-hover">
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
            <th>当前状态</th>
            <th>操作</th>
        </tr>
        <?php foreach($allTool as $key => $element): ?>
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
                <?php if($element['IEstatus'] == 0): ?>
                可借
                <?php elseif($element['IEstatus'] == 1): if($element['IEnormal'] == $username): ?>
                    等待审核
                    <?php else: ?>
                    其他用户正在操作
                    <?php endif; else: if($element['IEnormal'] == $username): ?>
                    等待您归还
                    <?php else: ?>
                    不可借
                    <?php endif; ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if($element['IEstatus'] == 2): if($element['IEnormal'] == $username): ?>
                        <a href="http://localhost:8000/normal/returntool/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-warning btn-xs">归还</a>
                    <?php else: ?>
                        <a href="" class="btn disabled btn-danger btn-xs">不可操作</a>
                    <?php endif; elseif($element['IEstatus'] == 0): ?>
                <a href="http://localhost:8000/normal/lend/<?php echo htmlentities($element['code']); ?>/<?php echo htmlentities($username); ?>" class="btn btn-success btn-xs">请求使用</a>
                <?php else: ?>
                <a href="" class="btn disabled btn-xs btn-danger">不可操作</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>