<?php

namespace app\operatori\controller;

use think\Controller;
use think\Request;

class Operatori extends Controller
{
    public function showMainPage($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $allTool = model('tool')->getAll($workcell);
        return view('operatori@operatori/mainPage',compact('allTool','workcell','username'));
    }

    public function addNew(Request $request) {
        $sta1 = model('tool')->addNewTool($request->post());
        $sta2 = model('addnewrecord')->addNewRecord($request->post());
        return $sta1 && $sta2;
    }

    public function submitRepairApplication($code,$username) {
        model('repairrecord')->operatoriPostRepair($code,$username);
        if(model('tool')->operatorISubmitRepairApplication($code)) {
            $this->success('请求提交成功，等待处理','http://localhost:8000/operatori/'.$username);
        } else {
            $this->error('提交失败，请重新提交','http://localhost:8000/operatori/'.$username);
        }
    }

    public function handelIeStatus($code,$retusername) {
        $username = model('tool')->fromCodeGetNormalUsername($code);
        $lend = model('user')->fromUsernameGetName($username);
        $handelName = model('user')->fromUsernameGetName($retusername);
        //dump($handelName);
        if(model('tool')->handelIeStatus($code) && model('ierecord')->addRecord($lend,$code,$handelName)) {
            $this->success('处理线上工人请求成功','http://localhost:8000/operatori/'.$retusername);
        } else {
            $this->error('处理失败，请重新操作','http://localhost:8000/operatori/'.$retusername);
        }
    }

    public function seeAllRecord($workcell) {
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInIE = model('ierecord')->getAllInfo();
        /*dump($infoInIE);
        dump($codeInWorkcell);*/

        $ret = array();
        foreach ($infoInIE as $index => $item) {
            if(in_array($item['toolid'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        /*dump($ret);*/
        return  view('operatori@operatori/allRecordInWorkcell',compact('ret'));
       /* $recode = array();
        foreach($codeInWorkcell as $index => $element) {
            if(in_array($element,$codeInIE)) {
                array_push($recode,$element);
            }
        }
        $ret = model('ierecord')->fromCodeGetAllInfo($recode);
        return view('operatori@operatori/allRecordInWorkcell',compact('ret'));*/
    }
}
