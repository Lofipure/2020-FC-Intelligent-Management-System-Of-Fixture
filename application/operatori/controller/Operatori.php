<?php

namespace app\operatori\controller;

use think\Controller;
use think\Request;

class Operatori extends Controller
{
    public function showMainPage($workcell) {
        $allTool = model('tool')->getAll($workcell);
        return view('operatori@operatori/mainPage',compact('allTool','workcell'));
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
        $username = model('tool')->fromCodeGetNormalUsername($code);
        if(model('tool')->handelIeStatus($code) && model('ierecord')->addRecord($username,$code)) {
            $this->success('处理线上工人请求成功','http://localhost:8000/operatori/'.$workcell);
        } else {
            $this->error('处理失败，请重新操作','http://localhost:8000/operatori/'.$workcell);
        }
    }

    public function seeAllRecord($workcell) {
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $codeInIE = model('ierecord')->getAllCode();

        $recode = array();
        foreach($codeInWorkcell as $index => $element) {
            if(in_array($element,$codeInIE)) {
                //dump($element);
                array_push($recode,$element);
            }
        }
        //dump($recode);
        $ret = model('ierecord')->fromCodeGetAllInfo($recode);
        //dump($ret);
        return view('operatori@operatori/allRecordInWorkcell',compact('ret'));
    }
}
