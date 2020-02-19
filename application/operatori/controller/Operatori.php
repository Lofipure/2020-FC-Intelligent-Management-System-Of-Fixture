<?php

namespace app\operatori\controller;

use think\Controller;

class Operatori extends Controller
{
    public function showMainPage() {
        $allTool = model('tool')->getAll();
        //dump($allTool);
        return view('operatori@operatori/mainPage',compact('allTool'));
    }
}
