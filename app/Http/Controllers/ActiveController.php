<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\Ac_comm;
use App\Http\Requests\CommentRequest;
use DB;

class ActiveController extends Controller
{
    //活动主页
    public function activeIndex(){

        $active1 = DB::table('actives')->paginate(2);        

        $active = DB::table('actives')->skip(2)->take(6)->get();

        // 轮播
        $act = DB::table('actives')->orderBy('id','desc')->paginate(2);
        // dd($active);
        return view('active', [
            'active1' => $active1,            
            'active' => $active,
            'act' => $act
        ]);
    }
    
    // 活动详情
    public function activelist($id)
    {
        $active = Active::find($id);
        $user = DB::table('users')->get();
        // dd($user);
        // 默认评论
        $comm = Ac_comm::query()->where('active_id',$id)->orderBy('id','asc')->paginate(5);
        // 最新评论
        $newComm = Ac_comm::query()->where('active_id',$id)->orderBy('created_at','desc')->paginate(5);
        
        // dd($comm);
        return view('activelist', [
            'active' => $active,
            'user' => $user,
            'comm' => $comm,
            'newComm' => $newComm,
        ]);
    }

    // 活动单页评论
    public function activecomm(CommentRequest $req, $id)
    {
        $comm = new Ac_comm;
        $comm->active_id = $req->id;
        $comm->comment = $req->comment;
        $comm->user_id = session('id');
        // dd($comm);
        $comm -> save();
        // 更新评论
        $count = DB::table('ac_comms')->where('active_id',$id)->count();
        DB::update('update actives set discuss=' .$count. ' where id=' .$id);
        return back();
    }

    // 删除评论
    public function activedelete($id)
    {
        Ac_comm::destroy($id);
        return back();
    }
}
