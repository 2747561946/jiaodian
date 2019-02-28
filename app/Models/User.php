<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = ['username', 'mobile', 'password','job', 'city','say','logo','email','sex'];

    // 用户关注
    public function user_id(){
        return $this->belongsToMany(self::class,'follows','user_id','follow_id')->withTimestamps();
    }
    // 用户粉丝
    public function follow_id()
    {
        return $this->belongsToMany(self::class,'follows','follow_id','user_id')->withTimestamps();
    }
    // 关注用户
    public function followThisUser($user)
    {
        return $this->user_id()->toggle($user);
    }
}
