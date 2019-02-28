<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    //
    protected $fillable = ['lab_name'];

    public function blog()
    {
        return $this->hasMay(Blog::class);
    }
}
