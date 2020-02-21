<?php

namespace app\operatorii\controller;

use app\common\model\Tool;
use think\Controller;

class Operatorii extends Controller
{
    public function showMainPage($workcell) {
        $tools = model('tool')->getAll($workcell);
        return view('operatorii@operatorii/mainPage',compact('tools'));
    }

    public function handelRepair($code) {
        $tool = model('tool')->operatorIIhandelRepair($code);
        $workcell = model('tool')->fromCodeGetWorkcell($code);
        if($tool) {
            $this->success('处理请求成功','http://localhost:8000/operatorii/'.$workcell);
        } else {
            $this->error('处理请求失败','http://localhost:8000/operatorii/'.$workcell);
        }
    }

    public function finishRepair($code) {
        $tool = model('tool')->finishRepair($code);
        $workcell = model('tool')->fromCodeGetWorkcell($code);
        if($tool) {
            $this->success('报修完成，返厂使用成功','http://localhost:8000/operatorii/'.$workcell);
        } else {
            $this->error('报修失败','http://localhost:8000/operatorii/'.$workcell);
        }
    }
}
