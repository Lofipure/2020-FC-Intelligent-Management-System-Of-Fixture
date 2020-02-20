<?php

namespace app\common\model;
use think\Model;

class Ierecord extends Model
{
    public function addRecord($username,$code) {
        $record = new ierecord;
        $record->lendpeople = $username;
        $record->outtime = date('Y-m-d H:i:s');
        $record->toolid = $code;
        return $record->save();
    }

    public function updateRecord($code) {
        $record = Tool::get(self::where('toolid','=',$code));
        $record->intime = date('Y-m-d H:i:s');
        return $record->save();
    }

    public function getAllCode() {
        return Ierecord::column('toolid');
    }

    public function fromCodeGetAllInfo($code) {
        $ret = array();
        foreach ($code as $index => $element) {
            array_push($ret,Ierecord::where('toolid','=',$element)->find());
        }
        return $ret;
    }
}
