<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    public $fillable = ['user_id', 'follow_id'];
    public $timestamps = false;
}
