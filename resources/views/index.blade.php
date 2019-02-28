@extends('laycomm.main')

@section('title','焦点学院')

@section('content')


<div class="content">
    <div class="idx-banner">
            <div class="fullSlide">
                   <div class="box">
                        <ul>
                           <li style="background:url(upload/ban.jpg) no-repeat center center;">
                                  <a href="javascript:;"></a></li>
                           <li  >
                           <img width="1200" height="601" src="/upload/banc.jpg" alt="">
                                  <a href="javascript:;"></a></li>
                           <li >
                           <img width="1200" height="601" src="/upload/bana.jpg" alt="">
                                  <a href="javascript:;"></a></li>
                        </ul>
                    </div>
                    <div class="hbox">
                        <ul></ul>
                    </div> 
            </div>
    </div>
    
    <div class="wrap">
          <div class="cont-box">
               <div class="cont-a fl">
                     <div class="cont-a1"><a href="">新手上路</a><span>|</span><a href="">官方Q群</a><span>|</span><a href="">官方Q群</a></div>
                     <div class="cont-a1"><a href="">新手上路</a><span>|</span><a href="">官方Q群</a><span>|</span><a href="">官方Q群</a></div>
               </div>
               
               <div class="cont-b fl">
                      <div class="cont-b1">
                          <input type="text" class="cont-text fl" value="">
                          <input type="button" class="cont-btn fl">
                      </div>
                      <div class="cont-b2">热门搜索：分手  女孩  恋爱心理  约会</div>
               </div>
               
               <div class="cont-c fr">
                  <div class="cont-c1 fl">课程咨询<a href=""><img src="images/QQ.jpg"></a><a href=""><img src="images/QQ.jpg"></a></div>
                  <div class="cont-c2 fr"></div>
               </div>
        </div> 
        <div class="kg-box"> 
   <div class="kg-title">
    <span style="font-size:20px;"> 论坛文章推荐 </span>
   </div>           




                @foreach($blogs1 as $k=>$v)
                @if($k==0)
                <div class="kg"> 
                    <a href="{{route('artpage',['id'=>$v->id])}}">
                    <div class="kg-a fl"> 
                    <div class="kg-a2 fl"> 
                    <div class="kg-a3">
                        {{$v->title}}。
                    </div>
                    <div class="kg-a4">
                        @foreach($user as $u)
                        @if($v->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
                    </div>
                    <div style="margin-bottom:10px;" class="kg-a5">
                        发表于 {{$v->created_at}}
                    </div>
                    <p>
                    <!-- {{$v->content}} -->
                    </p>
                    <div class="kg-a6"> 
                        <span><img src="images/col-c1.jpg" />{{$v->discuss}}</span> 
                        <span><img src="images/col-c2.jpg" />{{$v->display}}</span> 
                        <em><img src="images/col-c3.jpg" /></em> 
                        <em><img src="images/col-c4.jpg" /></em> 
                        <em><img src="images/col-c5.jpg" /></em> 
                    </div> 
                    <div class="kg-y">
                        <img src="images/kg-y.png" />
                    </div> 
                    </div> 
                    <div class="kg-a1 fl">
                    <img style="width:199px;height:199px;" src="upload/{{$v->logo}}" />
                    </div> 
                    </div></a> 
                    @else
                    <div class="kg-b fl"> 
                    <a href="{{route('artpage',['id'=>$v->id])}}">
                    <div class="kg-c1 fl">
                    <img style="width:199px;height:199px;" src="upload/{{$v->logo}}" />
                    </div> 
                   
                    <div class="kg-a2 fl"> 
                    <div class="kg-a3">
                        {{$v->title}}。
                    </div> 
                    <div class="kg-a4">
                        @foreach($user as $u)
                        @if($v->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
                    </div> 
                    <div class="kg-a5">
                        发表于 {{$v->created_at}}
                    </div> 
                    <div class="kg-a6"> 
                        <span><img src="images/col-c1.jpg" />{{$v->discuss}}</span> 
                        <span><img src="images/col-c2.jpg" />{{$v->display}}</span> 
                        <em><img src="images/col-c3.jpg" /></em> 
                        <em><img src="images/col-c4.jpg" /></em> 
                        <em><img src="images/col-c5.jpg" /></em> 
                    </div> 
                    <div class="kg-t">
                        <img src="images/kg-t.png" />
                    </div> 
                    </div></a> 
                    <a href="">
                    <div class="kg-c2 fl">
                    <img src="upload/kg-a5.jpg" />
                    </div></a> 
                    </div> 
                </div> 
                @endif
                @endforeach


@foreach($blogs2 as $k=>$v)
@if($k == 0)
                <div class="kg"> 
                    <a href="{{route('artpage',['id'=>$v->id])}}">
                    <div class="kg-a fl"> 
                    <div class="kg-a1 fl">
                    <img style="width:199px;height:199px;" src="upload/{{$v->logo}}" />
                    </div> 
                    <div class="kg-a2 fl"> 
                    <div class="kg-a3">
                        {{$v->title}}。
                    </div> 
                    <div class="kg-a4">
                        @foreach($user as $u)
                        @if($v->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
                    </div> 
                    <div class="kg-a5">
                        发表于 {{$v->created_at}}
                    </div> 
                    <div class="kg-a6"> 
                        <span><img src="images/col-c1.jpg" />{{$v->discuss}}</span> 
                        <span><img src="images/col-c2.jpg" />{{$v->display}}</span> 
                        <em><img src="images/col-c3.jpg" /></em> 
                        <em><img src="images/col-c4.jpg" /></em> 
                        <em><img src="images/col-c5.jpg" /></em> 
                    </div> 
                    <div class="kg-t">
                        <img src="images/kg-t.png" />
                    </div> 
                    </div> 
                    </div></a>
 @elseif($k == 1)                   
                    
                    <a href="{{route('artpage',['id'=>$v->id])}}">
                    <div class="kg-a fl"> 
                    <div class="kg-a2 fl"> 
                    <div class="kg-a3">
                        {{$v->title}}
                    </div> 
                    <div class="kg-a4">
                        @foreach($user as $u)
                        @if($v->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
                    </div> 
                    <div class="kg-a5">
                        发表于 {{$v->created_at}}
                    </div> 
                    <div class="kg-a6"> 
                        <span><img src="images/col-c1.jpg" />{{$v->discuss}}</span> 
                        <span><img src="images/col-c2.jpg" />{{$v->display}}</span> 
                        <em><img src="images/col-c3.jpg" /></em> 
                        <em><img src="images/col-c4.jpg" /></em> 
                        <em><img src="images/col-c5.jpg" /></em> 
                    </div> 
                    <div class="kg-y">
                        <img src="images/kg-y.png" />
                    </div> 
                    </div> 
                    <div class="kg-a1 fl">
                    <img style="width:199px;height:199px;" src="upload/{{$v->logo}}" />
                    </div> 
                    </div></a> 

@else
                    <a href="{{route('artpage',['id'=>$v->id])}}">
                    <div class="kg-a2 fl"> 
                    <div class="kg-a3">
                    {{$v->title}}
                    </div> 
                    <div class="kg-a4">
                        @foreach($user as $u)
                        @if($v->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
                    </div> 
                    <div class="kg-a5">
                    发表于 {{$v->created_at}}
                    </div> 
                    <div class="kg-a6"> 
                    <span><img src="images/col-c1.jpg" />{{$v->discuss}}</span> 
                    <span><img src="images/col-c2.jpg" />{{$v->display}}</span> 
                    <em><img src="images/col-c3.jpg" /></em> 
                    <em><img src="images/col-c4.jpg" /></em> 
                    <em><img src="images/col-c5.jpg" /></em> 
                    </div> 
                    <div class="kg-y">
                    <img src="images/kg-y.png" />
                    </div> 
                    </div></a> 
                </div> 
                @endif
@endforeach
                   
   

@foreach($blogs3 as $k=>$v)  
      @if($k==0)      
     
                 <div class="kg">
              <a href="{{route('artpage',['id'=>$v->id])}}"><div class="kg-b fl">
                    <div class="kg-a2 fl">
                         <div class="kg-a3">{{$v->title}}。</div>
                         <div class="kg-a4">
                            @foreach($user as $u)
                            @if($v->user_id == $u->id)
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                                @endif
                            @endforeach
                            </div>
                         <div class="kg-a5">发表于 {{$v->created_at}}</div>
                         <div class="kg-a6">
                                    <span><img src="images/col-c1.jpg">{{$v->discuss}}</span>
                                    <span><img src="images/col-c2.jpg">{{$v->display}}</span>
                                    <em><img src="images/col-c3.jpg"></em>
                                    <em><img src="images/col-c4.jpg"></em>
                                    <em><img src="images/col-c5.jpg"></em>
                         </div>
                         <div class="kg-y"><img src="images/kg-y.png"></div>
                    </div>
                    <div class="kg-b1 fl"><img style="width:402px;height:200px;" src="upload/{{$v->logo}}"></div>
               </div></a>
          @else
               <a href="{{route('artpage',['id'=>$v->id])}}"><div class="kg-a fl">
                    <div class="kg-a2 fl">
                         <div class="kg-a3">{{$v->title}}。</div>
                         <div class="kg-a4">
                            @foreach($user as $u)
                            @if($v->user_id == $u->id)
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                                @endif
                            @endforeach
                            </div>
                         <div class="kg-a5">发表于 {{$v->created_at}}</div>
                         <div class="kg-a6">
                                    <span><img src="images/col-c1.jpg">{{$v->discuss}}</span>
                                    <span><img src="images/col-c2.jpg">{{$v->display}}</span>
                                    <em><img src="images/col-c3.jpg"></em>
                                    <em><img src="images/col-c4.jpg"></em>
                                    <em><img src="images/col-c5.jpg"></em>
                         </div>
                         <div class="kg-y"><img src="images/kg-y.png"></div>
                    </div>
                    <div class="kg-a1 fl"><img style="width:199px;height:199px;" src="upload/{{$v->logo}}"></div>
               </div></a>
               
               
        
            @endif
   @endforeach        
              
  </div>
          
          <div class="rng-box">
              <div class="kg-title">达人推荐</div>
              <ul class="rng-ul">
              @foreach($data as $u)

                    <li>
                        <div class="rng-a act-ul">
                          
                           <a href="{{ route('userpage',['id'=>$u->id])}}?wen=1">
                                <div><span style="color:red;">{{$u->username}}</span></div> 
                                <!-- u=1666256797,972082711&fm=26&gp=0.jpg -->

                                
                                @foreach($user as $v)
                                @if($u->username == $v->username)
                                    @if($v->logo == null)
                                    <!-- <img style="width:180px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg"><br> -->
                                    <!-- <div style="width:180px;border-radius:50%;" class="act-b1 act-a-img">
                                    <div class="inside"></div> -->
                                    <img style="width:180px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                    @else
                                    <!-- <div style="width:180px;border-radius:50%;" class="act-b1 act-a-img">
                                    <div class="inside"></div> -->
                                    <img style="width:180px;border-radius:50%;" src="{{$v->logo}}"><br>
                                    @endif
                                @endif
                                @endforeach
                           </a>
                           
                         </div>
                    
                       <div class="rng-b">
                           <!-- <a href=""><img src="images/more.jpg"></a> -->
                        </div>
                    </li>
                    
                    @endforeach
                
              </ul>
          </div>

  <div class="kg-box"> 
   <div class="kg-title">
    论坛文章推荐
   </div> 


@foreach($comm1 as $k => $c)
@if($k == 0)
   <div class="kg"> 
    <a href="{{route('communitylist',['id'=>$c->id])}}">
     <div class="kg-a fl"> 
      <div class="kg-a2 fl"> 
       <div class="kg-a3">
        {{$c->title}}
       </div> 
       <div class="kg-a4">
       @foreach($user as $u)
                        @if($c->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
       </div> 
       <div class="kg-a5">
        发表于 {{$c->created_at}}
       </div> 
       <!-- {!! $c->content !!} -->
       <div class="kg-a6"> 
        <span><img src="images/col-c1.jpg" />{{$c->discuss}}</span> 
        <span><img src="images/col-c2.jpg" />{{$c->display}}</span> 
        <em><img src="images/col-c3.jpg" /></em> 
        <em><img src="images/col-c4.jpg" /></em> 
        <em><img src="images/col-c5.jpg" /></em> 
       </div> 
       <div class="kg-y">
        <img src="images/kg-y.png" />
       </div> 
      </div> 
      <div class="kg-a1 fl">
       <img style="width:199px;height:199px;" src="{{$c->logo}}" />
      </div> 
     </div></a> 
     @else
    <div class="kg-b fl"> 
     <a href="{{route('communitylist',['id'=>$c->id])}}">
      <div class="kg-c1 fl">
       <img style="width:199px;height:199px;" src="{{$c->logo}}" />
      </div> 
      <div class="kg-a2 fl"> 
       <div class="kg-a3">
        {{$c->title}}
       </div> 
       <div class="kg-a4">
             @foreach($user as $u)
                        @if($c->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
       </div> 
       <div class="kg-a5">
        发表于 {{$c->created_at}}
       </div> 
       <!-- {!! $c->content !!} -->
       <div class="kg-a6"> 
        <span><img src="images/col-c1.jpg" />{{$c->discuss}}</span> 
        <span><img src="images/col-c2.jpg" />{{$c->display}}</span> 
        <em><img src="images/col-c3.jpg" /></em> 
        <em><img src="images/col-c4.jpg" /></em> 
        <em><img src="images/col-c5.jpg" /></em> 
       </div> 
       <div class="kg-t">
        <img src="images/kg-t.png" />
       </div> 
      </div></a> 
     <a href="">
      <div class="kg-c2 fl">
       <img src="upload/kg-a5.jpg" />
      </div></a> 
    </div> 
   </div> 
@endif
@endforeach


@foreach($comm2 as $k => $c)
@if($k == 0)
   <div class="kg"> 
    <a href="{{route('communitylist',['id'=>$c->id])}}">
     <div class="kg-a fl"> 
      <div class="kg-a1 fl">
      <img style="width:199px;height:199px;" src="{{$c->logo}}" />
       <!-- <img src="upload/kg-a5.jpg" /> -->
      </div> 
      <div class="kg-a2 fl"> 
       <div class="kg-a3">
        {{$c->title}}
       </div> 
       <div class="kg-a4">
       @foreach($user as $u)
                        @if($c->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
       </div> 
       <div class="kg-a5">
        发表于 {{$c->created_at}}
       </div> 
       <!-- {!! $c->content !!} -->
       <div class="kg-a6"> 
        <span><img src="images/col-c1.jpg" />{{$c->discuss}}</span> 
        <span><img src="images/col-c2.jpg" />{{$c->display}}</span> 
        <em><img src="images/col-c3.jpg" /></em> 
        <em><img src="images/col-c4.jpg" /></em> 
        <em><img src="images/col-c5.jpg" /></em> 
       </div> 
       <div class="kg-t">
        <img src="images/kg-t.png" />
       </div> 
      </div> 
     </div></a> 

@elseif($k==1)
    <a href="{{route('communitylist',['id'=>$c->id])}}">
     <div class="kg-a fl"> 
      <div class="kg-a2 fl"> 
       <div class="kg-a3">
       {{ $c->title}}
       </div> 
       <div class="kg-a4">
       @foreach($user as $u)
                        @if($c->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
       </div> 
       <div class="kg-a5">
        发表于 {{$c->created_at}}
       </div> 
       <!-- str_limit($value, $limit = 100, $end = '...')
       $value = str_limit('The PHP framework for web artisans.', 7); -->
           <!-- {!! str_limit( $c->content, 300 , '...') !!}  -->
           <!-- {!! str_limit($c->content, 300,'...') !!} -->
       <!-- {!! $c->content !!} -->
       <div class="kg-a6"> 
        <span><img src="images/col-c1.jpg" />{{$c->discuss}}</span> 
        <span><img src="images/col-c2.jpg" />{{$c->display}}</span> 
        <em><img src="images/col-c3.jpg" /></em> 
        <em><img src="images/col-c4.jpg" /></em> 
        <em><img src="images/col-c5.jpg" /></em> 
       </div> 
       <div class="kg-y">
        <img src="images/kg-y.png" />
       </div> 
      </div> 
      <div class="kg-a1 fl">
       <img style="width:199px;height:199px;" src="{{$c->logo}}" />
       <!-- <img src="upload/kg-a6.jpg" /> -->
      </div> 
     </div></a> 
@else

    <a href="{{route('communitylist',['id'=>$c->id])}}">
     <div class="kg-a2 fl"> 
      <div class="kg-a3">
       {{$c->title}}
      </div> 
      <div class="kg-a4">
      @foreach($user as $u)
                        @if($c->user_id == $u->id)
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$u->username}}</span>
                            @endif
                        @endforeach
      </div> 
      <div class="kg-a5">
       发表于 {{$c->created_at}}
     
      </div> 
      <p >
      {!! str_limit($c->content, 300,'...') !!}
       </p>
       <div style="margin-top:45px;">
        <span><img src="images/col-c1.jpg" />&nbsp;&nbsp; {{$c->discuss}}</span> &nbsp;&nbsp;
        <span><img src="images/col-c2.jpg" />&nbsp;&nbsp;{{$c->display}}</span> &nbsp;&nbsp;
        <em><img src="images/col-c3.jpg" /></em> &nbsp;&nbsp;
        <em><img src="images/col-c4.jpg" /></em> &nbsp;&nbsp;
        <em><img src="images/col-c5.jpg" /></em> &nbsp;&nbsp;
       </div>
      <div class="kg-y">
       <img src="images/kg-y.png" />
      </div> 
     </div></a> 
   </div> 
@endif
@endforeach


  </div>

                 
          </div> 
          
          <div class="idx-btm"><a href=""><img src="upload/act-f.jpg"></a></div>
    </div><!--wrap-->  
</div>



<!--底部-->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.SuperSlide.2.1.1.js"></script>
<script src="js/Action.js"></script>

<script type="text/javascript">
$(function(){
var nav=$(".header"); //得到导航对象
var win=$(window); //得到窗口对象
var sc=$(document);//得到document文档对象。
win.scroll(function(){
  if(sc.scrollTop()>=580){
    nav.addClass("head-cut"); 
   $(".head-cut").fadeIn(500); 
  }else{
   nav.removeClass("head-cut");
   $(".head-cut").fadeOut(500);
  }
})  
})
</script>
<script type="text/javascript">
  $(function ($) {
            $(".fullSlide").slide({
                titCell: ".hbox ul",
                mainCell: ".box ul",
                effect: "fold",
				mouseOverStop:false,
                autoPlay: true,
                autoPage: true,
                trigger: "click",
                startFun: function (i) {
                    var curLi = jQuery(".fullSlide .bd li").eq(i);
                    if (!!curLi.attr("_src")) {
                        curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
                    }
                }
            });
          
        });
      
</script>
</body>
</html>

<script>
$(".act-a-img").hover(function(){
		$(this).find(".inside").stop(true,true).animate({top:0},500);
		},function(){
	        $(this).find(".inside").stop(true,true).animate({top:295},500);
		});	
</script>
@endsection