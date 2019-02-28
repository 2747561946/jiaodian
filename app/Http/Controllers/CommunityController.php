<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\lab;
use App\Models\Community;
use App\Http\Requests\ArtRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Sq_comment;
use App\Models\Sq_zan;
use App\Models\Blog;
use DB;


class CommunityController extends Controller
{
    //
    public function index(Request $req)
    {
       
        $desc = Community::query();
        // 分类查询
        if($cats = $req->input('cats',''))
        {
            $desc->where('cat_id',$cats);
        }

        // 排序查询
        if($order = $req->input('serach',''))
        {
            if($order == 'd_desc'){
                $desc->orderBy('display','desc');
            }else if($order == 'd_asc'){
                $desc->orderBy('display','asc');
            }else if($order == 'c_desc'){
                $desc->orderBy('discuss','desc');
            }else{
                $desc->orderBy('discuss','asc');
            }
        }else{
            $desc->orderBy('id','desc');
        }
        
        // 热门排序
        $hot = DB::table('communities')->orderBy('display','desc')->paginate(3);
        // 标签
        $labs = DB::table('labs')->get();
        // 分类
        $cats = DB::table('cats')->get();
        $comm = $desc->paginate(7);

        // $head = DB::table('communities')->skip(2)->take(9)->get();
        $head = DB::table('communities')->orderBy('id','asc')->paginate(9);
        
        // 轮播
        $lb = $desc->skip(2)->take(3)->get();
        // dd($lb);

        $user  = DB::select('select * from users');
        return view('community', [
            'comm' => $comm,
            'user' => $user,
            'cats' => $cats,
            'hot' => $hot,
            'labs' => $labs,
            'head' => $head,
            'lb' => $lb,
        ]);
    }

    // 社区发表
    public function creat()
    {
        $cats = DB::select('select * from cats');
        $labs = DB::select('select * from labs');

        return view('community.creat', [
            'cats' => $cats,
            'labs' => $labs,
        ]);
    }
    public function store(ArtRequest $req)
    {
        $comm = new Community;
        $comm->title = $req->title;
        
        // 图片
        // $data=$req->input();
        // $comm->logo=$req->file('logo');
        // $name=$comm->logo->getClientOriginalName();//得到图片名；
        // $ext=$comm->logo->getClientOriginalExtension();//得到图片后缀；
        // $fileName=md5(uniqid($name));
        // $fileName=$fileName.'.'.$ext;//生成新的的文件名
        // $bool=\Storage::disk('upload')->put($fileName,file_get_contents($comm->logo->getRealPath()));//
        // $comm->logo=$fileName;//返回文件路径存贮在数据库

        // if(!$bool){
        //         return false;
        // }
        $comm->content = $req->content;
        $comm->cat_id = $req->cat_id;
        $comm->lab_id = $req->lab_id;
        $comm->user_id = session('id');
        
        $comm->save();

        
        // 声明路径名
        $destinationPath = 'upload/community';
        // 取到图片
        $file = $req->file('logo');
        // 获得图片的名称 为了保证不重复 我们加上userid和time
        $file_name = time() . $file->getClientOriginalName();
        // 执行move方法
        $file->move($destinationPath, $file_name);

        // 裁剪图片 生成200x200的缩略图
       //  \Image::make($destinationPath . $file_name)->fit(200)->save();
        // 保存到Community
        // $comm = Community::findOrFail();
        $comm->logo = "/upload/community/".$file_name;
        // dd($comm->logo);
        $comm->save();

        // dd($comm);
        $comm->save();
        return redirect()->route('communityindex');
    }

    // 修改
    public function communityedit($id)
    {
        // dd('dsdf');
        $community = Community::find($id);
        // dd($community);

        $cats = DB::select('select * from cats');
        $labs = DB::select('select * from labs');

        return view('community.edit', [
            'community' => $community,
            'cats' => $cats,
            'labs' => $labs
        ]);
    }
    public function communityupdate(ArtRequest $req, $id)
    {
        $community = Community::find($id);

        $im = str_replace('/','\\',$community->logo);
        @unlink('C:\LT\LT\public'.$im);
   
        $community->fill( $req->all() );

        $community->save();
        // 图片


        
        // dd(unlink('C:\LT\LT\public'.$community->logo));
        
        $community = Community::find($id);        
         // 声明路径名
         $destinationPath = 'upload/community';
         // 取到图片
         $file = $req->file('logo');
         // 获得图片的名称 为了保证不重复 我们加上userid和time
         $file_name = time() . $file->getClientOriginalName();
         // 执行move方法
         $file->move($destinationPath, $file_name);

         // 裁剪图片 生成200x200的缩略图
        //  \Image::make($destinationPath . $file_name)->fit(200)->save();
         // 保存到Community
           
         $community->logo = "/upload/community/".$file_name;

       
        //  dd($community->logo);
         $community->save();


         
        //  return redirect()->route('communityIndex');
         return redirect()->route('porsonlist');
    }

    // 删除
    public function delete($id)
    {
        Community::destroy($id);
        return back();
    }


    // 详情
    public function communitylist($id)
    {

        $lists = DB::table('communities')->orderBy('display','desc')->paginate(4);
        // $tuijian = DB::table('communities')->where('display','desc')->paginate(5);
        $list = Community::where('id',$id)->first();
        $user = DB::select('select * from users');
        $lab = DB::select('select * from labs');
        // 默认评论
        $sq_comment = DB::table('sq_comments')->where('sq_blog_id',$id)->orderBy('id','asc')->paginate(5);

        // 最新评论
        $comm = Sq_comment::where('sq_blog_id',$id)->orderBy('created_at','desc')->paginate(5);
        // 浏览量
        $displayCount = DB::select('select * from communities where id=' .$id);
        $display = $displayCount[0]->display+1;
        DB::update('update communities set display=' . $display . ' where id = ' .$id);

        // 文章数量
        // $artCount = DB::table('users')
        //         ->leftJoin('blogs',function($join){
        //                 $join->on('users.id','=','blogs.user_id');
        //             })
        //         // ->select('users.username', DB::raw('count(blogs.user_id)'))
        //         ->count();
        //         dd($artCount);
        return view('community.communitylist', [
            'list' => $list,
            'user' => $user,
            'lab' => $lab,
            'sq_comment' => $sq_comment,
            'comm' => $comm,
            'lists' => $lists,
        ]);
    }

    // 社区评论
    public function communityComment(CommentRequest $req, $id)
    {
      
        $comment = new Sq_comment;
        $comment->sq_blog_id = $req->id;
        $comment->comment = $req->comment;
        $comment->user_id = session('id');
        // dd($comment);

        $comment->save();

        $count = DB::table('sq_comments')->where('sq_blog_id',$id)->count();
        DB::update('update communities set discuss= ' . $count . ' where id = ' . $id);
        // dd($count);
        return back();
    }
    // 删除评论
    public function commentdelete($id)
    {
        Sq_comment::destroy($id);
        // return redirect()->route('community');
        return back();
    }

    // 社区点赞
    public function communityZan(Request $req)
    {
        $sq_blog_id = $req->input('id');
        $user_id = \Session::get('id'); 
        // var_dump($sq_blog_id);
            //    DB::insert('insert into lauds(user_id,blog_id) values('.$user_id.','.$blog_id.')');

        // return [
        //     'msg' => '点赞成',
        // ];

        $has = Sq_zan::where('sq_blog_id',$sq_blog_id)
                     ->where('user_id',$user_id)
                     ->count();
        

        // var_dump($has);
        if($has==0)
        {
            DB::insert('insert into sq_zans(sq_blog_id,user_id) values('.$sq_blog_id.','.$user_id.')');
            $count = DB::table('sq_zans')->where('sq_blog_id',$sq_blog_id)->count();
            DB::update('update communities set zan='.$count.' where id=' . $sq_blog_id);


            return [
                'status' => '1',
                'msg' => '点赞成功',
            ];
            
        }
        else
        {
            return [
                'status' => '0',
                'msg' => '你已经点赞过',
            ];
        }
    }


}
