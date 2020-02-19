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

   public function operatorISubmitRepairApplication($code) {
       $tool = Tool::get(self::where('code','=',$code));
       $tool->repairstatus = 1;
       return $tool->save();
   }

   public function fromCodeGetWorkcell($code) {
       $tool = Tool::get(self::where('code','=',$code));
       return $tool->workcell;
   }
}
