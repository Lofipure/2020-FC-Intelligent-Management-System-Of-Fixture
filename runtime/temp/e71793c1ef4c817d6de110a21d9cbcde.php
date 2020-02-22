<?php /*a:1:{s:125:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\supervisor\view\Supervisor\allRerecordInWorkcell.html";i:1582337423;}*/ ?>
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
    <table class="table table-hover table-responsive">
        <tr>
            <th>夹具代码</th>
            <th>提交时间</th>
            <th>提交人</th>
            <th>开始报修时间</th>
            <th>完成时间</th>
            <th>操作人</th>
        </tr>
        <?php foreach($ret as $index => $element): ?>
        <tr>
            <td><?php echo htmlentities($element['toolid']); ?></td>
            <td><?php echo htmlentities($element['posttime']); ?></td>
            <td><?php echo htmlentities($element['poster']); ?></td>
            <td>
                <?php if($element['outtime']): ?>
                <?php echo htmlentities($element['outtime']); else: ?>
                高级管理员未处理
                <?php endif; ?>
            </td>
            <td>
                <?php if($element['intime']): ?>
                <?php echo htmlentities($element['intime']); else: ?>
                高级管理员未处理
                <?php endif; ?>
            </td>
            <td>
                <?php if($element['hander']): ?>
                <?php echo htmlentities($element['hander']); else: ?>
                高级管理员未处理
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>