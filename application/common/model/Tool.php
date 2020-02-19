<?php

namespace app\common\model;

use think\Model;

class Tool extends Model
{
   public function getAll() {
       return $this->select();
   }
}
