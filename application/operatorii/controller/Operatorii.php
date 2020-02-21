<?php

namespace app\operatorii\controller;

use app\common\model\Tool;
use think\Controller;

class Operatorii extends Controller
{
    public function showMainPage($workcell) {
        $tools = model('tool')->getAll($workcell);
        return view('operatorii@operatorii/mainPage',compact('tools','workcell'));
    }

    public function handelRepair($code) {
        $tool = model('tool')->operatorIIhandelRepair($code);
        $workcell = model('tool')->fromCodeGetWorkcell($code);
        model('repairrecord')->handelRepair($code);
        if($tool) {
            $this->success('处理请求成功','http://localhost:8000/operatorii/'.$workcell);
        } else {
            $this->error('处理请求失败','http://localhost:8000/operatorii/'.$workcell);
        }
    }

    public function finishRepair($code) {
        $tool = model('tool')->finishRepair($code);
        $workcell = model('tool')->fromCodeGetWorkcell($code);
        model('repairrecord')->finishRepair($code);
        if($tool) {
            $this->success('报修完成，返厂使用成功','http://localhost:8000/operatorii/'.$workcell);
        } else {
            $this->error('报修失败','http://localhost:8000/operatorii/'.$workcell);
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
        //dump($ret);
        return view('operatorii@operatorii/allRerecordInWorkcell',compact('ret'));
    }
}
