<?php

namespace app\manager\controller;

use think\Controller;

class Manager extends Controller
{
    public function showMainPage($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $data = model('tool')->getAll($workcell);
        return view('manager@Manager/mainPage',compact('data','username'));
    }

    public function destoryTool($code,$username) {
        $sta1 = model('tool')->managerFinalDestory($code);
        $sta2 = model('destoryrecord')->finalTrialDestoryRecord($code,$username);

        if($sta2 && $sta1) {
            $this->success('销毁成功','http://localhost:8000/manager/'.$username);
        } else {
            $this->error('销毁失败','http://localhost:8000/manager/'.$username);
        }
    }
}
