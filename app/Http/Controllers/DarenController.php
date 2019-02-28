<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use DB;
class DarenController extends Controller
{
    //
    public function darenIndex()
    {
        $user = DB::table('users')->get();
        // dd($user);

        return view('daren', [
            'user' => $user,
        ]);
    }
}
