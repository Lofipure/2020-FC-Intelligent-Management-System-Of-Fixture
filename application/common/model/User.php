<?php

namespace app\common\model;
use think\Model;

class User extends Model
{
    # 检查用户是否登录
    public function handelLogin($data) {
        $ret = $this->where('username','=',$data['username'])->find();
        if(! $ret) {
            return -1;
        }

        if($ret['password'] != $data['password']) {
            return -1;
        }
        return $ret['role'];
    }

    public function funGetName($data) {
        $ret = $this->where('username','=',$data['username'])->find();
        return $ret['name'];
    }

    public function getAllUser() {
        return $this->select();
    }

    public function addNewUser($data) {
        /*$newUser = new User();
        $newUser->username = $data['username'];
        $newUser->name = $data['name'];
        $newUser->password = $data['password'];
        $newUser->email = $data['email'];
        $newUser->telephone = $data['telephone'];
        $newUser->role = $data['role'];
        $newUser->workcell = $data['workcell'];

        return $newUser->save();*/
        return $this->save($data);
    }

    public function getOne($username) {
        return $this->where('username','=',$username)->find();
    }

    public function modifyUser($data) {
        $user = User::get(self::where('username','=',$data['username']));
        $user->password = $data['password'];
        $user->email = $data['email'];
        $user->telephone = $data['telephone'];
        $user->role = $data['role'];
        $user->workcell = $data['workcell'];

        return $user->save();
    }

    public function deleteUser($username) {
        $user = User::get(self::where('username','=',$username));
        return $user->delete();
    }
}
