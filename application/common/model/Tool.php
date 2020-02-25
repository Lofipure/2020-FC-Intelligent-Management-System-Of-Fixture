<?php

namespace app\common\model;
use think\Model;

class Tool extends Model
{
    public function normalGetAll() {
        return $this->where('buystatus','=',2)
            ->where('destorystatus','=',0)
            ->where('repairstatus','=',0)
            ->select();
    }

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

   public function handelIeStatus($code) {
       $tool = Tool::get(self::where('code','=',$code));
       $tool->IEstatus = 2;
       return $tool->save();
   }

   public function normalLendTool($code,$username) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->IEstatus = 1;
        $tool->IEnormal = $username;
        return $tool->save();
   }

   public function returnTool($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->IEstatus = 0;
        $tool->IEnormal = -1;
        return $tool->save();
   }

   public function fromCodeGetNormalUsername($code) {
        $tool = Tool::get(self::where('code','=',$code));
        return $tool->IEnormal;
   }

   public function fromWorkcellGetCode($workcell) {
        return Tool::where('workcell','=',$workcell)->column('code');
   }

   public function operatorIIhandelRepair($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->repairstatus = 2;
        return $tool->save();
   }

   public function finishRepair($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->repairstatus = 0;
        return $tool->save();
   }

   public function postDestorystatus($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->destorystatus = 1;
        return $tool->save();
   }

   public function firstTrialDestory($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->destorystatus = 2;
        return $tool->save();
   }

   public function supervisorHandelAdd($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->buystatus = 1;
        return $tool->save();
   }

   public function managerFinalDestory($code) {
        /*$tool = Tool::get(self::where('code','=',$code));
        return $tool->delete();*/
        return Tool::destroy(self::where('code','=',$code));
   }

   public function managerFinalAdd($code) {
        $tool = Tool::get(self::where('code','=',$code));
        $tool->buystatus = 2;
        return $tool->save();
   }
}
