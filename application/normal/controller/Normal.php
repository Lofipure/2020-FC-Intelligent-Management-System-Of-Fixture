<?php

namespace app\normal\controller;

use think\Controller;

class Normal extends Controller
{
    public function showMainPage($username) {
        $allTool = model('tool')->normalGetAll();
        return view('normal@normal/mainPage',compact('allTool','username'));
    }

    public function lendTool($code,$username) {
        /*return $code;*/
        /*return $_GET['username'];*/
        /*return $username;*/
        if(model('tool')->normalLendTool($code,$username)) {
            $this->success('请求成功，等待初级用户审批','http://localhost:8000/normal/'.$username);
        } else {
            $this->error('请求失败','http://localhost:8000/normal/'.$username);
        }
    }

    public function returnTool($code,$username) {
        if(model('tool')->returnTool($code) && model('ierecord')->updateRecord($code)) {
            $this->success('归还成功','http://localhost:8000/normal/'.$username);
        } else {
            $this->error('归还失败','http://localhost:8000/normal/'.$username);
        }
    }
}
