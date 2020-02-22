<?php

namespace app\supervisor\controller;

use think\Controller;

class Supervisor extends Controller
{
    public function showMainPage($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $data = model('tool')->getAll($workcell);
        //dump($data);
        return view('supervisor@Supervisor/mainPage',compact('username','data','workcell'));
    }

    public function seeAllIeRecord($workcell) {
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInIE = model('ierecord')->getAllInfo();

        $ret = array();
        foreach ($infoInIE as $index => $item) {
            if(in_array($item['toolid'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }

        return  view('supervisor@Supervisor/allIeRecordInWorkcell',compact('ret'));
    }

    public function showRepairRecord($workcell) {
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInRE = model('repairrecord')->getAllInfo();
        $ret = array();
        foreach ($infoInRE as $index => $item) {
            if(in_array($item['toolid'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        return view('supervisor@Supervisor/allRerecordInWorkcell',compact('ret'));
    }

    public function trialDestory($code,$username) {
        /*
         * 两件事
         * 1：改变tool中的destory为2
         * 2：destoryrecord中更改记录
         * */
        $sta1 = model('tool')->firstTrialDestory($code);
        $sta2 = model('destoryrecord')->firstTrialDestoryRecord($code,$username);
        if($sta2 && $sta1) {
            $this->success('请求处理成功','http://localhost:8000/supervisor/'.$username);
        } else {
            $this->error('请求处理失败','http://localhost:8000/supervisor/'.$username);
        }
    }

    public function browseDestoryRecord($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $codeInWorkcell = model('tool')->fromWorkcellGetCode($workcell);
        $infoInDe = model('destoryrecord')->getAllInfo();
        $ret = array();

        foreach ($infoInDe as $index => $item) {
            if(in_array($item['toolcode'],$codeInWorkcell)) {
                array_push($ret,$item);
            }
        }
        return view('supervisor@Supervisor/allDerecordInWorkcell',compact('ret'));
    }
}
