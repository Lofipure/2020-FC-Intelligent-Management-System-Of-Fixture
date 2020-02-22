<?php

namespace app\operatorii\controller;

use app\common\model\Tool;
use think\Controller;

class Operatorii extends Controller
{
    public function showMainPage($username) {
        $workcell = model('user')->fromUsernameGetWorkcell($username);
        $tools = model('tool')->getAll($workcell);
        return view('operatorii@operatorii/mainPage',compact('tools','workcell','username'));
    }

    public function handelRepair($code,$username) {
        $tool = model('tool')->operatorIIhandelRepair($code);
        /*$workcell = model('tool')->fromCodeGetWorkcell($code);*/
        model('repairrecord')->handelRepair($code,$username);
        if($tool) {
            $this->success('处理请求成功','http://localhost:8000/operatorii/'.$username);
        } else {
            $this->error('处理请求失败','http://localhost:8000/operatorii/'.$username);
        }
    }

    public function finishRepair($code,$username) {
        $tool = model('tool')->finishRepair($code);
        /*$workcell = model('tool')->fromCodeGetWorkcell($code);*/
        model('repairrecord')->finishRepair($code);
        if($tool) {
            $this->success('报修完成，返厂使用成功','http://localhost:8000/operatorii/'.$username);
        } else {
            $this->error('报修失败','http://localhost:8000/operatorii/'.$username);
        }
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

        return  view('operatorii@operatorii/allIeRecordInWorkcell',compact('ret'));
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

        return view('operatorii@operatorii/allRerecordInWorkcell',compact('ret'));
    }

    public function postDestory($code,$username) {
        /*
         * 两件事
         * 1. 改变tool里面的destorystatus 为 1
         * 2. 在destoryrecord 中新增一条记录
         * */
        $sta1 = model('tool')->postDestorystatus($code);
        $sta2 = model('destoryrecord')->addDestoryrecord($code,$username);

        if($sta1 && $sta2) {
            $this->success('提交报废申请成功','http://localhost:8000/operatorii/'.$username);
        } else {
            $this->error('提交失败','http://localhost:8000/operatorii/'.$username);
        }
    }
}
