<?php
class AdminModel extends Model{
    public function model(){
        $user = $this->select('users')->where('username','example')->all();
        return $user;
    }
}
