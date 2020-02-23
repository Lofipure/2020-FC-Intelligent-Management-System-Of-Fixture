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
        $record->firsthander = $username;
        $record->firsthandtime = date('Y-m-d H:i:s');
        return $record->save();
    }
}
