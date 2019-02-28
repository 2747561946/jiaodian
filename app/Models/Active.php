<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    //
    protected $fillable = ['title', 'host', 'time', 'place', 'price', 'few', 'logo', 'content'];
}
