<?php

namespace app\common\model;
use think\Model;

class Ierecord extends Model
{
    public function addRecord($username,$code,$operator) {
        $record = new ierecord;
        $record->lendpeople = $username;
        $record->outtime = date('Y-m-d H:i:s');
        $record->toolid = $code;
        $record->operator = $operator;
        return $record->save();
    }

    public function updateRecord($code) {
        //$record = Tool::get(self::where('toolid','=',$code));
        $record = Ierecord::get(self::where('toolid','=',$code)->where('intime','=',NULL));
        //$record = $this->where('toolid','=',$code)->where('intime','<>',NULL)->select();
        $record->intime = date('Y-m-d H:i:s');
        return $record->save();

    }

    public function getAllInfo() {
        return Ierecord::select();
    }

    public function fromCodeGetAllInfo($code) {
        $ret = array();
        foreach ($code as $index => $element) {
            array_push($ret,Ierecord::where('toolid','=',$element)->find());
        }
        return $ret;
    }
}
