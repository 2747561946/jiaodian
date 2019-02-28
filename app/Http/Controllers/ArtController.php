<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Cat;
use App\Models\Lab;
use App\Models\Laud;
use App\Http\Requests\ArtRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;


use store;
use DB;
// use App\Http\Requests\Request;

class ArtController extends Controller
{   
    // get    index create store show  edit update destory
    // post
    // put
    // delete
    //文章列表
    public function artlist(Request $req)
    {    


        
        $list = Blog::query();


        if($cats = $req->input('cats','')) {
            $list->where('cat_id',$cats);
        }


        if($order = $req->input('serach','')) {
            if($order == 'd_desc') {
                $list->orderBy('display','desc');
            }else if($order == 'd_asc'){
                $list->orderBy('display','asc');
            }else if($order == 's_desc') {
                $list->orderBy('discuss','desc');
            }else {
                $list->orderBy('discuss','asc');
            }
        }else {
            $list->orderBy('id','asc');
        }
   

        $data = $list->paginate(5);
        // $newArt = $list->orderBy('id','asc')->paginate(3);        
        // 最新文章排序
        $newArt = DB::table('blogs')->orderBy('id','desc')->paginate(3);
        // dd($newArt);
        $todyArt = DB::table('blogs')->orderBy('display','desc')->limit(2)->get();
        // dd($todyArt);
        $cats = DB::select('select * from cats');

        //
        $user = DB::table('users')->get();
        return view('article',[
                'data' => $data,
                'cats' => $cats,
                'newArt' => $newArt,
                'todyArt' => $todyArt,
                'user' => $user,
        ]);
    }

    // 发布文章
    public function art()
    {
        // $cat = new Cat;
        $cats = DB::select('select * from cats');
        // $lab = new Lab;
        $labs = DB::select('select * from labs');
   
        return view('art.add_art', [
            'cats' => $cats,
            'labs' => $labs,
        ]);
    }
    public function doart(ArtRequest $req)
    {
        
        $blog = new Blog;
        $blog->title = $req->title;
        $blog->content = $req->content;
        //   图片
        $data=$req->input();
        $blog->logo=$req->file('logo');
        $name=$blog->logo->getClientOriginalName();//得到图片名；
        $ext=$blog->logo->getClientOriginalExtension();//得到图片后缀；
        $fileName=md5(uniqid($name));
        $fileName=$fileName.'.'.$ext;//生成新的的文件名
        $bool=\Storage::disk('upload')->put($fileName,file_get_contents($blog->logo->getRealPath()));//
        $blog->logo=$fileName;//返回文件路径存贮在数据库

        if(!$bool){
                return false;
        }
        $blog->lab_id = $req->lab_id;
        $blog->cat_id = $req->cat_id;
        $blog->user_id = session('id');
        $blog->save();
// dd($blog);
        return redirect()->route('artlist');
       
    }

    //文章修改 
    public function artedit($id)
    {

        $blog = Blog::find($id);
        // dd($blog);
         // $cat = new Cat;
         $cats = DB::select('select * from cats');
         // $lab = new Lab;
         $labs = DB::select('select * from labs');
        return view('art.edit_art', [
            'cats' => $cats,
            'labs' => $labs,
            'blog' => $blog,
        ]);
    }
    public function doartedit(ArtRequest $req,$id)
    {
        $blog = Blog::find($id);
        $blog->fill( $req->all() );

         //   图片
         $data=$req->input();
         $blog->logo=$req->file('logo');
         $name=$blog->logo->getClientOriginalName();//得到图片名；
         $ext=$blog->logo->getClientOriginalExtension();//得到图片后缀；
         $fileName=md5(uniqid($name));
         $fileName=$fileName.'.'.$ext;//生成新的的文件名
         $bool=\Storage::disk('upload')->put($fileName,file_get_contents($blog->logo->getRealPath()));//
         $blog->logo=$fileName;//返回文件路径存贮在数据库
 
         if(!$bool){
                 return false;
         }

        // dd($blog);
        $blog->save();
        return redirect()->route('porsonlist');
    }

    // 删除文章
    public function artdelete($id)
    {
        Blog::destroy($id);
        return redirect()->route('porsonlist');
    }


    // 文章详情页
    public function artpage($id,Comment $comment)
    {
    


        $blog = DB::table('blogs')->get();
        $data = Blog::where('id',$id)->first();
        $user = DB::table('users')->get();
        // 默认评论
        $comments = $comment->query()->where('blog_id',$id)->orderBy('id','asc')->paginate(5);
        // 最新评论
        // $comment = $comment->query()->where('blog_id',$id)->orderBy('created_at','desc')->paginate(5);
        $comment = Comment::where('blog_id',$id)->orderBy('created_at','desc')->paginate(5);
        // dd($comm);
        $count =DB::select('select display from blogs where id='.$id);
        $a = $count[0]->display+1;
        DB::update('update blogs set display='.$a.' where id='.$id);

        // $lauds = DB::table('lauds')->get();
        // $zanCount = DB::select('select zan from blogs where id='.$id);
        // $b = $zanCount+1;
        // dd($data);

        return view('art.artpage',compact('menu','data','comments','user','comment'));
    }

    // 评论
    public function comment(CommentRequest $req,$id,Blog $blog)
    {   
       
        
        $comment = new Comment;
        $comment->content = $req->content;
        $comment->user_id = session('id');
        $comment->blog_id = $id;
        // dd($comment);
        $comment->save();
        
        $count = $comment->query()->where('blog_id',$id)->count();
       
        DB::update('update blogs set discuss='.$count.' where id='.$id);
    
        return back();
    }
    
    // 删除评论
    public function commdelete($id)
    {
        Comment::destroy($id);
        return back();
    }

    // 点赞
    public function laud(Request $request)
    {   
        $blog_id = $request->input('id');
        
       $user_id = \Session::get('id');
    //    DB::insert('insert into lauds(user_id,blog_id) values('.$user_id.','.$blog_id.')');

        // // 判断是否赞过
        
        $has = Laud::where('user_id',$user_id)
                    ->where('blog_id',$blog_id)
                    ->count();
        // return [
        //     'ret' => $has,
        // ];
        if($has == 0)
        {

            DB::insert('insert into lauds(user_id,blog_id) values('.$user_id.','.$blog_id.')');
            $count = DB::table('lauds')->where('blog_id',$blog_id)->count();
            DB::update('update blogs set zan='.$count.' where id='.$blog_id);
            
            
            return [
                'status' => '1',
                'msg' => '点赞成功',
            ];
        }
        else
        {          
            return [
                'status' => '0',
                'msg' => '你已点过赞',
            ];
        }
  
    }

}
