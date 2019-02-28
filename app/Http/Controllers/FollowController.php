<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    //

    public function follow(Request $req,Follow $follow)
    {       

        $userid = session('id');
        $user_id = $req->user_id;
        $follow->user_id = $userid;
        $follow->follow_id = $user_id;
        $follow->save();
        
        return back();
    }
}
