<?php

namespace app\manager\controller;

use app\common\model\User;
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

    public function addNewTool($code,$username) {
        $sta1 = model('tool')->managerFinalAdd($code);
        $sta2 = model('addnewrecord')->managerFinalAdd($code,$username);
    }

    public function showDestoryRecord($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInDe = model('destoryrecord')->getAllInfo();
        $ret = array();

        foreach ($infoInDe as $index => $item) {
            if(in_array($item['toolcode'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        return view('manager@Manager/allDerecordInWorkcell',compact('ret'));
    }

    public function showAddRecord($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInAd = model('addnewrecord')->getAllInfo();
        $ret = array();

        foreach ($infoInAd as $index => $item) {
            if(in_array($item['toolcode'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        return view('manager@Manager/allAddRecordInWorkcell',compact('ret'));
    }

    public function showIeRecord($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInIE = model('ierecord')->getAllInfo();

        $ret = array();
        foreach ($infoInIE as $index => $item) {
            if(in_array($item['toolid'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        return  view('manager@Manager/allIeRecordInWorkcell',compact('ret'));
    }

    public function showRequireRecord($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInRE = model('repairrecord')->getAllInfo();
        $ret = array();
        foreach ($infoInRE as $index => $item) {
            if(in_array($item['toolid'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        return view('manager@Manager/allRerecordInWorkcell',compact('ret'));
    }
}
