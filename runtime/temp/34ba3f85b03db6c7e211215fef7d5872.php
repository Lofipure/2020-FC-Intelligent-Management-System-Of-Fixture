<?php /*a:1:{s:104:"C:\Another\2020-FC-Intelligent-Management-System-Of-Fixture\application\normal\view\normal\mainPage.html";i:1582617220;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/manager/mainPage.css">
</head>
<body>
<!--allTool-->
<!--<h1>普通用户界面</h1>-->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="" class="navbar-brand">
                工夹具管理系统&nbsp;&nbsp;&nbsp;User
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-top: 0">
                <li><a href="http://localhost:8000/">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <table class="table table-responsive table-hover">
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