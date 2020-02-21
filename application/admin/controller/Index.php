<?php
namespace app\admin\controller;
use app\admin\validate\UserValidate;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public function drawLoginPage() {
        return view('admin@index/loginPage');
    }

    public function handleLogin(Request $request) {
        $data = $request->post();
        $validate = new UserValidate();
        $result = $validate->check($data);

        if($result !== true) {
            $this->error($validate->getError());
        }

        $ret = model('user')->handelLogin($data);
        if($ret != -1) {
            $name = model('user')->funGetName($data);
            $workcell = model('user')->funGetWorkcell($data);

            if($ret == 0) {
                $this->success('登录成功，欢迎管理员：'.$name,'http://localhost:8000/admin');
            } elseif ($ret == 1) {
                $this->success('登录成功，欢迎初级用户：'.$name,'http://localhost:8000/operatori/'.$data['username']);
            } elseif ($ret == 2) {
                $this->success('登录成功，欢迎高级用户：'.$name,'http://localhost:8000/operatorii/'.$data['username']);
            } elseif ($ret == 3) {
                $this->success('登录成功，欢迎监管员：'.$name);
            } elseif($ret == 4) {
                $this->success('登录成功，欢迎Workcell经理：'.$name);
            } else {
                $this->success('登录成功，欢迎普通用户：'.$name,'http://localhost:8000/normal/'.$data['username']);
            }
        } else {
            $this->error('用户名或密码错误，请重新登录。');
        }
    }
}
