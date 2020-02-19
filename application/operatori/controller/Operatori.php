<?php

namespace app\operatori\controller;

use think\Controller;
use think\Request;

class Operatori extends Controller
{
    public function showMainPage($workcell) {
        $allTool = model('tool')->getAll($workcell);
        //dump($allTool);
        return view('operatori@operatori/mainPage',compact('allTool'));
    }

    public function addNew(Request $request) {
        //return $request->post();

        return model('tool')->addNewTool($request->post());

    }
}
