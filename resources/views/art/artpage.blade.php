@extends('laycomm.main')

@section('title','文章详情')

@section('content')
<div class="content">
    <div class="wrap">
            <div class="tsm-height"></div>
            
            <div class="post">
                   <div class="post-fl fl">
                       
                         <div class="post-a1">{{$data->title}}</div> <a href="{{ route('artlist')}}">退出</a>
                         <div class="post-a2">

                        @foreach($user as $n)
                        @if($data->user_id == $n->id)
                        <a class="post-a2" href="{{ route('userpage',['id'=>$n->id])}}?wen=1"> {{$n->username}}</a>
                        @endif
                        @endforeach
                         <span>{{$data->created_at}}</span>
                                               <div class="col-c">
                                                    <span><img src="/images/col-c1.jpg">{{$data->discuss}}</span>
                                                    <span><img src="/images/col-c2.jpg">{{ $data->display}}</span>
                                                   
                                                    <span id="zan" style=" cursor:pointer;"><img src="/images/menu-a1.jpg"> <i id="number">{{$data->zan}}</i> </span>
                                                  
                                                    <em><img src="/images/col-c3.jpg"></em>
                                                    <em><img src="/images/col-c4.jpg"></em>
                                                    <em><img src="/images/col-c5.jpg"></em>
                                                </div>
                         </div>
                         <div class="post-a4"><img style="width:679px;" src="/upload/{{$data->logo}}"></div>
                         <div class="post-b">
                               {{$data->content}}
                         </div>
                         
                         
                         <div class="det-b">
                                 <div class="det-title"><img src="/images/cou-b1.jpg">在线评论</div><br><br>
 @if(Session::get('id'))                                
                            <form action="{{ route('comment',['id'=>$data->id])}}" method="post">

                                @csrf
                                
                                <textarea name="content" id="" cols="50" rows="10"></textarea>
                                <br><br>
                                <input style="cursor:pointer;" class="det-btn" type="submit" value="提交">

                                      @else
       
                            </form>

     <a style="font-size:20px;" href="{{ route('login') }}">登录</a>发表评论
  @endif

                         </div>
                    <div class="skt">
                 <div class="skt-title">
                       <span style="cursor:pointer" class="skt-cut">默认评论</span><em>|</em><span style="cursor:pointer">最新评论</span>
                 </div>
                 <div class="skt-tab">

                 <!-- 默认评论 -->
                          <div class="skt-btm">
                               <ul class="skt-ul">
                                   @foreach($comments as $comm)
                                     <li>
                                            <div class="skt-a1">                                                                                             
                                                @foreach($user as $u)
                                                @if($comm->user_id == $u->id)
                                                    @if($u->logo == null)
                                                    <img style="border-radius:50%" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                    @else
                                                    <img style="border-radius:50%" src="{{$u->logo}}">
                                                    @endif
                                                    {{$u->username}}
                                                @endif
                                                @endforeach  

                                                <span style="margin-left:20px;"> {{$comm->created_at}} </span> 
                                                <div class="menu"><img src="/images/menu.jpg">

                                                @if($comm->user_id == Session::get('id'))
                                                <a onclick="return confirm('确认删除吗')" href="{{ route('commdelete',['id'=>$comm->id])}}"> 删除 </a>
                                                @endif     

                                                </div></div>
                                            <div class="skt-a2">{{ $comm->content}}</div>
                                            <div class="skt-a3"><a href=""><img src="/upload/det-b.jpg">我要点评</a>
                                                    <!-- <div class="menu-a">
                                                        <img src="/images/menu-a1.jpg">0
                                                    <span><img src="/images/menu-a2.jpg">0</span>
                                                </div> -->
                                            </div>
                                     </li> 
                                   @endforeach
                               </ul>
                               <div class="skt-more">
                                   {{ $comments->render()}}
                               </div>
                          </div>
                      <!-- 最新评论 -->
                          <div class="skt-btm hide">                               
                          @foreach($comment as $comm)                        
                                <ul class="skt-ul">                                
                                     <li>
                                            <div class="skt-a1">
                                                @foreach($user as $v)
                                                @if($comm->user_id == $v->id)

                                                     @if($v->logo == null)
                                                    <img style="border-radius:50%" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                    @else
                                                    <img style="border-radius:50%" src="{{$v->logo}}">
                                                    @endif

                                                {{$v->username}}
                                                @endif
                                                @endforeach
                                               
                                            <span style="margin-left:15px;">{{$comm->created_at}}</span>
                                                <div class="menu"><img src="/images/menu.jpg">
                                                @if($comm->user_id == Session::get('id') )
                                                <a @click="return confirm('确认删除吗')" href="{{route('commdelete',['id'=>$comm->id])}}">删除</a>
                                                @endif
                                            </div></div>
                                            <div class="skt-a2">{{ $comm->content}}</div>
                                            <div class="skt-a3"><a href=""><img src="/upload/det-b.jpg">我要点评</a>
                                                    <!-- <div class="menu-a">
                                                        <img src="/images/menu-a1.jpg">0
                                                    <span><img src="/images/menu-a2.jpg">0</span>
                                                </div> -->
                                            </div>
                                     </li>                                  
                               </ul>
                               @endforeach
                          </div>
                          
                 </div>
           </div> 
           
                   </div><!--post-fl-->
                   <div class="post-fr fr">
                           <div class="art-a"><a href=""><img src="/upload/art-a.jpg"></a></div>
                           <div class="post-t"><a href=""><img src="/upload/post-a3.jpg"></a></div>
                          
                   </div>
            </div>
    </div>      
</div>


<!-- 底部 -->


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
    
    $("#zan").click(function () {
    var id = '{{  $data->id }}';
        $.ajax({
            type: 'GET',
            url: '/laud',
            data:{
                id:id
            },
            success:function(data) {
                // console.log(data)
                // alert(data.msg);
                if(data.status==0 )
                {
                    $("#zan").attr("disabled",true);
                    alert(data.msg);
                }
                else
                {
                    alert(data.msg);
                    $("#number").html( 1*$("#number").html() +1);
                }

                // if(data.status==1)
                // {
                //     alert(data.msg);
                //         $("#number").html( 1*$("#number").html() +1);

                // }
            }
        })
    })

    
     
});
</script>

@endsection
