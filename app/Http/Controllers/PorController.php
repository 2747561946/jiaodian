<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\community;
use App\Models\User;
use DB;

class PorController extends Controller
{
    //
    public function porsonlist()
    {
        
        $userId = session('id');
        $user = DB::table('users')->get();
        $get = isset($_GET['wen']) ? $_GET['wen'] : '';

        if($get)
        {
            $data = Blog::where('user_id',$userId)->paginate(5);
            return view('porson.porsonlist', [
                'data' => $data,
                'user' => $user,
            ]);
            
        }
        else
        {
            $community = Community::where('user_id',$userId)->get();
            return view('porson.porsonlist', [
                'user' => $user,
                'community' => $community,
            ]);
            
            
        }

        // dd($data,$community);
       
    }


    // 修改个人信息
    public function userset($id)
    {
        // $user = DB::table('users')->get();
        // dd($user);
        $user = User::find($id);
        // dd($user);
        return view('user.userset', [
            'user' => $user,
        ]);
    }

    public function douserset(Request $req, $id)
    {
        $user = User::find($id);

        // $user->fill($req->all());
        $user->username = $req->username;
        $user->job = $req->job;
        $user->city = $req->city;
        $user->say = $req->say;
        $user->email = $req->email;
        $user->save();

        $im = str_replace('/','\\',$user->logo);
        // dd($user);
        @unlink('C:\LT\LT\public'.$im);
        
        // C:\LT\LT\public\uploads\1_154348064530a765ee06e07c4a29db1ff4ae4ee5ed.jpg
        // dd(unlink('C:\LT\LT\public\uploads\1_154348121730a765ee06e07c4a29db1ff4ae4ee5ed.jpg'));
       
        // 声明路径名
        $destinationPath = 'uploads/';
        // 取到图片
        $file = $req->file('logo');
        // 获得图片的名称 为了保证不重复 我们加上userid和time
        $file_name = $id . '_' . time() . $file->getClientOriginalName();
        // 执行move方法
        $file->move($destinationPath, $file_name);

        // 裁剪图片 生成200x200的缩略图
        \Image::make($destinationPath . $file_name)->fit(200)->save();
        // 保存到User
        $user = User::findOrFail($id);
        
        $user->logo = "/uploads/".$file_name;


        $user->save();

        
        // return back();
        return redirect()->route('login');
    }
}
