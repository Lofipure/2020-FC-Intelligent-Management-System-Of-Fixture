<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function alert_success($msg = '',$url = '',$time = 3) {
    $str = '<script type="text/javascript" src="/static/js/jquery.js"></script><script type="text/javascript" src="/static/layer/layer.js"></script>';
    $str.='<script>
        $(function(){
            layer.msg("'.$msg.'",{icon:"6",time:'.($time*2000).'});
            setTimeout(function(){
                   self.parent.location.href="'.$url.'"
            },2000)
        });
    </script>';
    return $str;
}

function alert_error($msg='',$time=3){
    $str = '<script type="text/javascript" src="/static/js/jquery.js"></script><script type="text/javascript" src="/static/layer/layer.js"></script>';
    $str.='<script>
        $(function(){
            layer.msg("'.$msg.'",{icon:"5",time:'.($time*2000).'});
            setTimeout(function(){
                   window.history.go(-1);
            },2000)
        });
    </script>';
    return $str;
}