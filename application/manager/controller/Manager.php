<?php

namespace app\manager\controller;

use think\Controller;

class Manager extends Controller
{
    public function showMainPage($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $data = model('tool')->getAll($workcell);
        return view('manager@Manager/mainPage',compact('data'));
    }
}
