<?php

namespace app\common\model;
use think\Model;

class Tool extends Model
{
   public function getAll($workcell) {
       return $this->where('workcell','=',$workcell)->select();
   }

   public function addNewTool($data) {
       return $this->save($data);
   }
}
