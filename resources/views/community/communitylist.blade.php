@extends('laycomm.main')
@section('title','论坛详情')
@section('content')

<div class="content">
    <div class="wrap">
            <div class="art-height"></div>
            <div class="post">
                   <div class="post-fl fl">
                         <div class="post-a1">{{$list->title}}</div>

                         <div class="post-a2">

                             <!-- shuiguodaren -->
                    @foreach($user as $u) 
                        @if($list->user_id == $u->id)
                         <a class="post-a2" href="{{ route('userpage',['id'=>$u->id])}}?tie=2">   {{$u->username}} </a>
                        @endif
                    @endforeach
                                
                             <span>{{$list->created_at}}</span>
                                               <div class="col-c">
                                                    <span id="zan" style="cursor:pointer;"><img src="/images/menu-a1.jpg"> <i id="number">{{$list->zan }}</i>  </span>
                                                    <span><img src="/images/col-c1.jpg">{{$list->discuss}}</span>
                                                    <span><img src="/images/col-c2.jpg">{{$list->display}}</span>
                                                    <em><img src="/images/col-c3.jpg"></em>
                                                    <em><img src="/images/col-c4.jpg"></em>
                                                    <em><img src="/images/col-c5.jpg"></em>
                                                </div>
                         </div>
                         <div class="post-a3">
                             @foreach($lab as $b)
                                @if($list->lab_id == $b->id)
                                    <span>{{$b->lab_name}}</span>
                                @endif
                             @endforeach
                         </div>
                         <div class="post-a4"><img style="width:679px;height:409px;" src="{{$list->logo}}"></div>
                         <div class="post-b">
                             {!! $list->content !!}
                         </div>
                       
                         <div class="det-b">
                                 <div class="det-title"><img src="/images/cou-b1.jpg">在线评论</div>
                            @if(Session::get('id'))
                            <form action="{{ route('communityComment',['id'=>$list->id])}}" method="post">
                                    @csrf
                                 <div class="det-b1">
                                    <textarea name="comment" id="" cols="50" rows="10"></textarea>
                                 </div>
                                 <div class="det-b3"><input style="cursor:pointer;" type="submit" class="det-btn" value="发表"></div>
                             @else                                 
                            </form>
                                <hr>
                                 <a class="post-a2" style="font-size:20px;" href="{{ route('login')}}">登录</a>发表评论
                            @endif
                    <hr>
                          </div>
                         <div class="skt">
                 <div class="skt-title">
                       <span style="cursor:pointer;" class="skt-cut">默认评论</span><em>|</em><span style="cursor:pointer;">最新评论</span>
                 </div>
                 <div class="skt-tab">

                 <!-- 默认评论 -->
                          <div class="skt-btm">
                               <ul class="skt-ul">
                                   @foreach($sq_comment as $c)
                                     <li>

                                        @foreach($user as $r)
                                        @if($c->user_id == $r->id)                                                                                     
                                                <div class="skt-a1">
                                                    @if($r->logo == null)
                                                    <img style="border-radius:50%" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                    @else
                                                    <img style="border-radius:50%" src="{{$r->logo}}">
                                                    @endif
                                                                                        
                                            {{ $r->username}}  
                                        @endif
                                        @endforeach
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                            
                                            
                                            {{$c->created_at}}
                                            <div class="menu"><a href=""><img src="/images/menu.jpg">
                                           @if($c->user_id == Session::get('id'))
                                          <a onclick="return confirm('确认删除吗')" href="{{ route('commentdelete',['id'=>$c->id])}}"> 删除 </a>
                                           @endif
                                       
                                        </a></div></div>
                                            <div class="skt-a2">{{$c->comment}}</div>
                                            <div class="skt-a3"><a href=""><img src="/upload/det-b.jpg">我要点评</a>
                                                    <!-- <div class="menu-a">
                                                        <img src="/images/menu-a1.jpg">0
                                                        <span><img src="/images/menu-a2.jpg">0</span>
                                                    </div> -->
                                            </div>
                                     </li> 
                                     @endforeach
                                    
                               </ul>
                               <!-- <div class="skt-more"><a href="">查看更多</a></div> -->
                               {{$sq_comment->links()}}
                          </div>
                    <!-- 最新评论   -->
                          <div class="skt-btm hide">
                               

                                <ul class="skt-ul">
                                   @foreach($comm as $c)
                                     <li>

                                        @foreach($user as $r)
                                        @if($c->user_id == $r->id)                                                                                     
                                                <div class="skt-a1">
                                                    @if($r->logo == null)
                                                    <img style="border-radius:50%" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                    @else
                                                    <img style="border-radius:50%" src="{{$r->logo}}">
                                                    @endif
                                                                                        
                                            {{ $r->username}}  
                                        @endif
                                        @endforeach
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                            
                                            
                                            {{$c->created_at}}
                                            <div class="menu"><a href=""><img src="/images/menu.jpg">
                                           @if($c->user_id == Session::get('id'))
                                          <a onclick="return confirm('确认删除吗')" href="{{ route('commentdelete',['id'=>$c->id])}}"> 删除 </a>
                                           @endif
                                       
                                        </a></div></div>
                                            <div class="skt-a2">{{$c->comment}}</div>
                                            <div class="skt-a3"><a href=""><img src="/upload/det-b.jpg">我要点评</a>
                                                    <!-- <div class="menu-a">
                                                        <img src="/images/menu-a1.jpg">0
                                                        <span><img src="/images/menu-a2.jpg">0</span>
                                                    </div> -->
                                            </div>
                                     </li> 
                                     @endforeach
                                    
                               </ul>
                               {{$comm->links()}}

                          </div>
                 </div>
           </div>      
                   </div><!--post-fl-->
                   <div class="post-fr fr">
                           <div class="post-r">
                               @foreach($user as $n)
                                    @if($list->user_id == $n->id)
                                        @if($n->logo == null)
                                        <div class="post-r1"><img style="width:200px;height:200px;margin-left:20px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg"></div>
                                        <br>
                                        @else
                                        <div class="post-r1"><img style="margin-left:20px;border-radius:50%;" src="{{$n->logo}}"></div>
                                        <br>
                                        @endif
                                    <a href="{{ route('userpage',['id'=>$n->id])}}?tie=2"><div class="post-r2">{{$n->username}}</div></a>

                                   <div class="post-r3">{{$n->say}}</div>
                                   <!-- <div class="post-r4"><a href="">+关注</a><span>|</span><a href="">私信</a></div> -->
                                   @endif
                                   @endforeach
                           </div>
                           <div class="post-t"><a href=""><img src="/upload/post-a3.jpg"></a></div>

                           <div class="post-y">
                                 <div class="post-y1"><img src="/images/cou-b1.jpg">推荐帖子</div>
                                 <ul>
                                     @foreach($lists as $t)
                                   
                                      <a href=""><li>
                                           <div class="post-y2"><img src="{{$t->logo}}"></div>
                                           <div class="post-y3">{{$t->title}}</div>
                                      
                                      </li></a>
                                      @endforeach
           
                                 </ul>
                           </div>

                   </div>
            </div>
    </div>      
</div>




<!--登录注册弹窗-->


<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/Action.js"></script>
<script>
    $(".skt-title span").click(function(){
		 $(this).addClass("skt-cut").siblings().removeClass("skt-cut"),
		 $(".skt-tab .skt-btm").hide().eq($(".skt-title span").index(this)).show()
    })
</script>
</body>
</html>

<script src="/js/jquery.min.js"></script>
<script>

    $(document).ready(function(){

        $("#zan").click(function(){
            var id = '{{ $list->id }}';
            $.ajax({
                type:"GET",
                url:"/communityZan",
                data:{
                    id:id
                },
                success:function(data)
                {
                    // alert(data.msg);
                    if(data.status==0)
                    {
                        alert(data.msg);
                    }
                    else
                    {
                        alert(data.msg);
                        $("#number").html( 1*$("#number").html() +1 );
                    }
                }
            })
        })

    });


</script>
@endsection
