
@extends('laycomm.main')
@section('title','个人中心')
@section('content')



<div class="content">
    <div class="col-height"></div>
    <div class="focus-banner">
           <div class="wrap">
                @foreach($user as $v)
                @if($v->id == Session::get('id'))
                    @if($v->logo == null)
                    <div class="focus-a1"><img style="width:150px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg"></div>
                    @else
                    <div class="focus-a1"><img style="width:150px;border-radius:50%;" src="{{$v->logo}}"></div>
                    @endif
                @endif
                @endforeach
                <div class="focus-a2"> <span style="font-size:20px;">
                        {{Session::get('username')}}
                         <!-- <span>设置</span> -->
                    </span></div>
               <div class="focus-a3">
                   <form action="{{ route('porsonlist')}}" method="get">
                            <div style="margin-left:80px;">
                         <a style="color:white;" href="{{ route('porsonlist')}}?wen=1"> <div class="py-a fl">文章 </div> </a>
                         <a href="{{ route('porsonlist')}}?tie=2"> <div class="pyl  fl">帖子 </div> </a>
                          <!-- <div class="py-a fl">关注 500</div> -->
                          <!-- <div class="py-b fl">粉丝 80</div> -->
                          <!-- <div class="py-z fl">设置</div> -->
                          </div>
                    </form>
                </div>
                <div class="focus-a4"></span>
                @foreach($user as $u)
                @if($u->id == Session::get('id'))
                <a style="padding-left:35px;" href="{{ route('userset',['id'=>$u->id])}}">设置</a>
                @endif
                @endforeach
            </div>
           </div>    
    </div>
    
    @if($data ?? null)
    <div class="focus-b-box">
                <div class="focus-list"><div class="focus-title">
                    <span style="color:#999999;font-size:20px;">
                        {{Session::get('username')}} 的文章
                    </span>
                    </div></div>
                <div class="coll-box">
                         <ul class="col-ul">
                             @foreach($data as $v)
                              <li>
                                   <div class="col-list">
                                              <div class="col-a fl"><img src="upload/{{$v->logo}}"></div>
                                              <div class="col-b fl">
                                                    <div class="col-b1">
                                                        <a href="{{ route('artpage',['id'=>$v->id]) }}">{{$v->title}}</a> &nbsp;&nbsp;&nbsp;
                                                        <span style="font-size:12px;">
                                                            <a href="{{ route('artedit',['id'=>$v->id])}}">修改</a>
                                                            <a onclick="return confirm('确定删除吗?')" href="{{ route('artdelete',['id'=>$v->id])}}">删除</a>
                                                        </span>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-b2">

                                                        <!-- <img src="upload/col-b.jpg"> -->
                                                        {{Session::get('username')}}

                                                        <span>{{$v->created_at}}</span></div>
                                                    <div class="col-b3">
                                                        <!-- {!! $v->content !!} -->
                                                        {!! str_limit($v->content, 300,'...') !!}
                                                    </div>
                                              </div>
                                              
                                              <div class="col-c">
                                                    <span><img src="images/col-c1.jpg">{{$v->discuss}}</span>
                                                    <span><img src="images/col-c2.jpg">{{$v->display}}</span>
                                                    <em><img src="images/col-c3.jpg"></em>
                                                    <em><img src="images/col-c4.jpg"></em>
                                                    <em><img src="images/col-c5.jpg"></em>
                                              </div>
                                     </div>         
                              </li>
                              @endforeach
                         </ul>
                     </div>
                {{$data->links()}}
               <!-- <div class="more"><a href="">查看更多>></a></div>        -->
    </div> 
    @elseif($community ??null)
    <div class="focus-b-box">
                <div class="focus-list"><div class="focus-title">
                    <span style="color:#999999;font-size:20px;">
                        {{Session::get('username')}} 的帖子
                    </span>
                    </div></div>
                <div class="coll-box">
                         <ul class="col-ul">
                             @foreach($community as $v)
                              <li>
                                   <div class="col-list">
                                              <div class="col-a fl"><img src="{{$v->logo}}"></div>
                                              <div class="col-b fl">
                                                    <div class="col-b1">
                                                        <a href="{{ route('communitylist',['id'=>$v->id]) }}">{{$v->title}}</a> &nbsp;&nbsp;&nbsp;
                                                        <span style="font-size:12px;">
                                                            <a href="{{ route('communityedit',['id'=>$v->id])}}">修改</a>
                                                            <a onclick="return confirm('确定删除吗?')" href="{{ route('delete',['id'=>$v->id])}}">删除</a>
                                                        </span>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-b2">
                                                        <!-- <img src="upload/col-b.jpg"> -->
                                                    {{Session::get('username')}}
                                                    <span>{{$v->created_at}}</span></div>
                                                    <div class="col-b3">
                                                        <!-- {!! $v->content !!} -->
                                                        {!! str_limit($v->content, 300,'...') !!}
                                                    </div>
                                              </div>
                                              
                                              <div class="col-c">
                                                    <span><img src="images/col-c1.jpg">{{$v->discuss}}</span>
                                                    <span><img src="images/col-c2.jpg">{{$v->display}}</span>
                                                    <em><img src="images/col-c3.jpg"></em>
                                                    <em><img src="images/col-c4.jpg"></em>
                                                    <em><img src="images/col-c5.jpg"></em>
                                              </div>
                                     </div>         
                              </li>
                              @endforeach
                         </ul>
                     </div>
               <!-- <div class="more"><a href="">查看更多>></a></div>        -->

    </div> 
    @endif 

</div>




<!--登录注册弹窗-->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/Action.js"></script>
<script>
         $(".pyl").click(function(){
					     $(this).find(".tbq").slideToggle()
					})
        </script>

</body>
</html>

@endsection
