<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Community;
use DB;
use App\Models\Follow;

use App\Models\User;

class IndexController extends Controller
{
    //
    public function index(Blog $blog,User $user)
    {   
        // 文章推荐
        $blogs1 = DB::table('blogs')->orderBy('display','desc')->paginate(2);
        $blogs2 = DB::table('blogs')->skip(2)->take(3)->get();
        $blogs3 = DB::table('blogs')->skip(6)->take(2)->get();

    //  dd($blogs2);
        // 达人推荐
        $data = DB::table('users')        
        ->leftJoin('blogs',function ($join) {
            $join->on('users.id','=','blogs.user_id');
          
        })
        ->select('users.username','users.id', DB::raw('count(blogs.user_id) as c'))
        ->groupBy('users.id')
        ->groupBy('users.username')
        ->groupBy('blogs.user_id')
        ->orderBy('c','desc')
        ->paginate(5);

        // 帖子推荐
        $comm1 = DB::table('communities')->orderBy('display','desc')->paginate(2);
        $comm2 = DB::table('communities')->skip(3)->take(3)->get();
        // dd($comm);
        // die;
        $user = DB::table('users')->get();
        return view('index',[
            'blogs1' => $blogs1,
            'blogs2' => $blogs2,
            'blogs3' => $blogs3,
            'data' => $data,

            'comm1' => $comm1,
            'comm2' => $comm2,
            'user' => $user
        ]);
    }

// 跳转达人详情页
    public function userpage($id,Request $request,Follow $follow)
    {
        $users = User::find($id);

        $userid = session('id');        
        $fo = $follow->query()->where('user_id',$userid)->where('follow_id',$id)->first();

        // $u = 

        $wen = isset($_GET['wen']) ? $_GET['wen'] : '';
            if($wen) {
                $data = Blog::where('user_id',$id)->paginate(5);
                return view('index.userpage',[
                    'users' => $users,
                    'data' => $data,
                    'fo' => $fo,
                ]);

            }else {
                $community = Community::where('user_id',$id)->paginate(5);
                return view('index.userpage',[
                    'users' => $users,
                    'community' => $community,
                    'fo' => $fo,
                ]);
            }
    }

    // 帖子
    public function userlist($id)
    {
        $users = User::find($id);
        $community = Community::where('user_id',$id)->paginate(5);
        return view('index.userlist', [
            'users' => $users,
            'community' => $community,
        ]);
    }
}
