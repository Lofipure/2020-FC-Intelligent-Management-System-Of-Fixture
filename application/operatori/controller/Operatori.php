<?php

namespace app\operatori\controller;

use think\Controller;
use think\Request;

class Operatori extends Controller
{
    public function showMainPage($workcell) {
        $allTool = model('tool')->getAll($workcell);
        return view('operatori@operatori/mainPage',compact('allTool'));
    }

    public function addNew(Request $request) {
        return model('tool')->addNewTool($request->post());

    }

    public function submitRepairApplication($code) {
        $workcell = model('tool')->fromCodeGetWorkcell($code);

        if(model('tool')->operatorISubmitRepairApplication($code)) {
            $this->success('请求提交成功，等待处理','http://localhost:8000/operatori/'.$workcell);
        } else {
          $this->error('提交失败，请重新提交','http://localhost:8000/operatori/'.$workcell);
        }
    }

    public function handelIeStatus($code) {
        $workcell = model('tool')->fromCodeGetWorkcell($code);
        if(model('tool')->handelIeStatus($code)) {
            $this->success('处理线上工人请求成功','http://localhost:8000/operatori/'.$workcell);
        } else {
            $this->error('处理失败，请重新操作','http://localhost:8000/operatori/'.$workcell);
        }
    }
}
