<?php

namespace app\common\model;

use think\Model;

class Destoryrecord extends Model
{
    public function addDestoryrecord($code,$username) {
        $record = new Destoryrecord;
        $record->pottime = date('Y-m-d H:i:s');
        $record->poster = model('user')->fromUsernameGetName($username);
        $record->toolcode = $code;
        return $record->save();
    }

    public function firstTrialDestoryRecord($code,$username) {
        $record = Destoryrecord::get(self::where('toolcode','=',$code)->where('handtime','=',NULL));
        //$record = Destoryrecord::where('toolcode','=',$code)->where('handtime','=',NULL);
        $record->hander = model('user')->fromUsernameGetName($username);
        $record->handtime = date('Y-m-d H:i:s');

        return $record->save();
    }
}
