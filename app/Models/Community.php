<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    public $fillable = ['title', 'content','logo','dicuss','display','zan','cat_id','lab_id','user_id'];
}
