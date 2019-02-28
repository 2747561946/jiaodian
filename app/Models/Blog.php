<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['title', 'lab_id','cat_id', 'content', 'logo', 'discuss', 'display','zan', 'user_id'];

    public function lab()
    {
        return $this->belongsTo(Lab::class,'lab_id');
    }
}
