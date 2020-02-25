<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Paginator;

class Admin extends Controller
{
    public function drawMainPage() {
        $userData = model('user')->getAllUser();
        return view('admin@admin/mainPage',compact('userData'));
    }

    public function addNewUser(Request $request) {
        return model('user')->addNewUser($request->post());
    }

    public function modifyUser($username) {
        $ret = model('user')->getOne($username);
        return view('admin@admin/modifyPage',compact('ret'));
    }

    public function handelModify(Request $request) {
        //dump($request->post());
        $ret = model('user')->modifyUser($request->post());

        if($ret) {
            $this->success('修改成功','http://localhost:8000/admin');
        } else {
            $this->error('修改失败');
        }
    }

    public function deleteUser($username) {
        if (model('user')->deleteUser($username)) {
            $this->success('删除成功','http://localhost:8000/admin');
        } else {
            $this->error('删除失败');
        }
    }
}
