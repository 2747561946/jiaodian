@extends('laycomm.main')

@section('title','活动详情')

@section('content')

<div class="content">
    <div class="wrap">
          <div class="tsm-height"></div>
          <div class="det">
              <!-- <a href="">退出</a> -->
                 <div class="det-fl fl"><img style="width:598px;height:340px;" src="/upload/{{$active->logo}}"></div>
                 <div class="det-fr fl" >
                       <div class="det-r1">活动主题：{{$active->title}} </div>
                       <div class="det-r2">主办单位：{{$active->host}}</div>
                       <div class="det-r2">活动时间：{{$active->time}}</div>
                       <div class="det-r2">活动地点：{{$active->place}}</div>
                       <div class="det-r2">活动费用：{{$active->price}}元</div>
                       <div class="det-r2">活动期数：第{{$active->few}}期</div>
                       <!-- <div class="det-r2">退出</div> -->
                       <div class="det-r3"><a onclick="alert('活动仅供参考')" href="">我要报名</a></div>
                 </div>
          </div> 
          <a style="padding-top:15px;" class="det-r2" href="{{route('activeIndex')}}">退出</a>
          
          <div class="det-a">
                 <div class="det-title"><img src="/images/det-c.jpg">活动介绍</div>

              <p>  {{$active->content}}  </p>
          </div> 
          
           <div class="det-b">
                 <div class="det-title"><img src="/images/det-c.jpg">在线评论</div>

@if(Session::get('id'))
<form action="{{route('activecomm',['id'=>$active->id])}}" method="get">
                 <div class="det-b1">
                      <textarea name="comment" id="" cols="30" rows="10"></textarea>
                 </div>

                 <div class="det-b3"><input style="cursor:pointer" type="submit" class="det-btn" value="发表"></div>
</form>
@else

<a href="{{ route('login')}}">登录</a>
@endif

           </div>
           
           <div class="skt">
                 <div class="skt-title">
                       <span style="cursor:pointer;" class="skt-cut">默认评论</span><em>|</em><span style="cursor:pointer;" >最新评论</span>
                 </div>
                 <div class="skt-tab">

                 <!-- 默认评论 -->
                          <div class="skt-btm">
                               <ul class="skt-ul">
                               @foreach($comm as $c)
                                     <li>
                                            <div class="skt-a1">
                                            
                                            @foreach($user as $u)
                                                @if($c->user_id == $u->id)
                                                    @if($u->logo == null)
                                                    <img style="border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                    @else
                                                    <img style="border-radius:50%;" src="{{$u->logo}}">
                                                    @endif
                                                    {{$u->username}}
                                                @endif
                                            @endforeach
                                            &nbsp;&nbsp;&nbsp;
                                            &nbsp;
                                            {{$c->created_at}}
                                            <div class="menu"><a href=""><img src="/images/menu.jpg">
                                            @if($c->user_id == Session::get('id'))
                                            <a onclick="return confirm('确认删除吗?')" href="{{route('activedelete',['id'=>$c->id])}}">删除</a>
                                            @endif
                                            </a></div></div>
                                            <div class="skt-a2">{{$c->comment}}</div>
                                            <div class="skt-a3"><a href=""><img src="/upload/det-b.jpg">我要点评</a>
                                                    <!-- <div class="menu-a"><img src="/images/menu-a1.jpg">0
                                                                        <span><img src="/images/menu-a2.jpg">0</span></div> -->
                                            </div>
                                     </li> 
                                @endforeach    
                                      
                               </ul>
                               <!-- <div class="skt-more"><a href="">查看更多</a></div> -->
                          </div>
                      <!-- 最新评论 -->
                          <div class="skt-btm hide">
                               
                          <ul class="skt-ul">
                               @foreach($newComm as $c)
                                     <li>
                                            <div class="skt-a1">
                                            
                                            @foreach($user as $u)
                                                @if($c->user_id == $u->id)
                                                    @if($u->logo == null)
                                                    <img style="border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                    @else
                                                    <img style="border-radius:50%;" src="{{$u->logo}}">
                                                    @endif
                                                    {{$u->username}}
                                                @endif
                                            @endforeach
                                            &nbsp;&nbsp;&nbsp;
                                            &nbsp;
                                            {{$c->created_at}}
                                            <div class="menu"><a href=""><img src="/images/menu.jpg">
                                            @if($c->user_id == Session::get('id'))
                                            <a onclick="return confirm('确认删除吗?')" href="{{route('activedelete',['id'=>$c->id])}}">删除</a>
                                            @endif
                                            </a></div></div>
                                            <div class="skt-a2">{{$c->comment}}</div>
                                            <div class="skt-a3"><a href=""><img src="/upload/det-b.jpg">我要点评</a>
                                                    <!-- <div class="menu-a"><img src="/images/menu-a1.jpg">0
                                                                        <span><img src="/images/menu-a2.jpg">0</span></div> -->
                                            </div>
                                     </li> 
                                @endforeach    

                          </div>
                 </div>
           </div>      
    </div> 
</div>




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

@endsection
