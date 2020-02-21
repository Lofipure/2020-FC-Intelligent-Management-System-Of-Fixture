<?php

namespace app\common\model;

use think\Model;

class Repairrecord extends Model
{
    public function operatoriPostRepair($code,$username) {
        $record = new Repairrecord;
        $record->toolid = $code;
        $record->posttime = date('Y-m-d H:i:s');
        $record->poster = model('user')->fromUsernameGetName($username);
        return $record->save();
    }

    public function handelRepair($code,$username) {
        $record = Repairrecord::get(self::where('toolid','=',$code)->where('outtime','=',null));
        $record->outtime = date('Y-m-d H:i:s');
        $record->hander = model('user')->fromUsernameGetName($username);
        return $record->save();
    }

    public function finishRepair($code) {
        $record = Repairrecord::get(self::where('toolid','=',$code)->where('intime','=',null));
        $record->intime = date('Y-m-d H:i:s');

        return $record->save();
    }

    public function getAllInfo() {
        return Repairrecord::select();
    }
}
