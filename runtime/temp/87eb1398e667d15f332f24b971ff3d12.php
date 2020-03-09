<?php /*a:1:{s:126:"C:\Another\服创\2020-FC-Intelligent-Management-System-Of-Fixture\application\manager\view\Manager\allIeRecordInWorkcell.html";i:1582337408;}*/ ?>
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
            <th>借出时间</th>
            <th>归还时间</th>
            <th>使用人</th>
            <th>操作人</th>
        </tr>
        <?php foreach($ret as $index => $element): ?>
        <tr>
            <td><?php echo htmlentities($element['toolid']); ?></td>
            <td><?php echo htmlentities($element['outtime']); ?></td>
            <td>
                <?php if($element['intime']): ?>
                <?php echo htmlentities($element['intime']); else: ?>
                未归还
                <?php endif; ?>
            </td>
            <td><?php echo htmlentities($element['lendpeople']); ?></td>
            <td><?php echo htmlentities($element['operator']); ?></td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>
</body>
</html>