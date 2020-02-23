<?php /*a:1:{s:119:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\manager\view\Manager\allDerecordInWorkcell.html";i:1582357489;}*/ ?>
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
            <th>初审时间</th>
            <th>初审人</th>
            <th>终审时间</th>
            <th>终审人</th>
        </tr>
        <?php foreach($ret as $index => $element): ?>
        <th><?php echo htmlentities($element['toolcode']); ?></th>
        <th><?php echo htmlentities($element['pottime']); ?></th>
        <th><?php echo htmlentities($element['poster']); ?></th>
        <th>
            <?php if($element['handtime']): ?>
            <?php echo htmlentities($element['handtime']); else: ?>
            监管员未初审
            <?php endif; ?>
        </th>
        <th>
            <?php if($element['hander']): ?>
            <?php echo htmlentities($element['hander']); else: ?>
            监管员未初审
            <?php endif; ?>
        </th>
        <th>
            <?php if($element['finalhandtime']): ?>
            <?php echo htmlentities($element['finalhandtime']); else: ?>
            经理未终审
            <?php endif; ?>
        </th>
        <th>
            <?php if($element['finalhander']): ?>
            <?php echo htmlentities($element['finalhander']); else: ?>
            经理未终审
            <?php endif; ?>
        </th>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>