<?php

namespace app\common\model;

use think\Model;

class Addnewrecord extends Model
{
    public function addNewRecord($data) {
        $record = new Addnewrecord;
        $record->poster = $data['poster'];
        $record->toolcode = $data['code'];
        $record->posttime = date('Y-m-d H:i:s');

        return $record->save();
    }

    public function firstTrialAddNew($code,$username) {
        $record = Addnewrecord::get(self::where('toolcode','=',$code)->where('firsthandtime','=',NULL));
        $record->firsthander = model('user')->fromUsernameGetName($username);
        $record->firsthandtime = date('Y-m-d H:i:s');
        return $record->save();
    }

    public function getAllInfo() {
        return Addnewrecord::select();
    }

    public function managerFinalAdd($code,$username) {
        $record = Addnewrecord::get(self::where('toolcode','=',$code)->where('finalhandtime','=',NULL));
        $record->finalhandtime = date('Y-m-d H:i:s');
        $record->finalhander = model('user')->fromUsernameGetName($username);
        return $record->save();
    }
}
