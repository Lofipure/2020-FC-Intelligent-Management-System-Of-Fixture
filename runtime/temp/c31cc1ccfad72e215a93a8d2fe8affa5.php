<?php /*a:1:{s:120:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\manager\view\Manager\allAddRecordInWorkcell.html";i:1582424920;}*/ ?>
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
    <table class="table-hover table table-responsive">
        <tr>
            <th>夹具代码</th>
            <th>提交者</th>
            <th>提交时间</th>
            <th>初审者</th>
            <th>初审时间</th>
            <th>终审者</th>
            <th>终审时间</th>
        </tr>
        <?php foreach($ret as $index => $item): ?>
        <th><?php echo htmlentities($item['toolcode']); ?></th>
        <th><?php echo htmlentities($item['poster']); ?></th>
        <th><?php echo htmlentities($item['posttime']); ?></th>
        <th><?php echo htmlentities($item['firsthander']); ?></th>
        <th><?php echo htmlentities($item['firsthandtime']); ?></th>
        <th><?php echo htmlentities($item['finalhander']); ?></th>
        <th><?php echo htmlentities($item['finalhandtime']); ?></th>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>