@extends('laycomm.main')
@section('title','活动')
@section('content')


<div class="content">
    <div class="wrap">
         <div class="tsm-height"></div>
         <div class="act-banner">
             <!-- 996 315 -->
                 <div class="hd">
                      <ul>
                          @foreach($act as $v)
                          <!-- <li style="background:url(upload/{{$v->logo}}) no-repeat center center;height:315px;width:996px;"></li> -->
                         <a href="{{ route('activelist',['id'=>$v->id])}}"><li><img style="width:996px;height:315px;" src="/upload/{{$v->logo}}" alt=""></li></a> 
                          <!-- <li style="background:url(upload/act-banner.jpg) no-repeat center center;height:315px"></li> -->
                          @endforeach
                        </ul>
                 </div>
                 <div class="bd"><ul></ul></div>      
           </div>
           
           <div class="act-a">
           @foreach($active1 as $k => $v)
            @if($k == 0)
                 <div class="act-a1 mr-20 fl">
                           <div class="act-a-img"><img style="width:486px;height:295px;" src="upload/{{$v->logo}}">
                                                  <div class="inside"><div class="ins-a"><a href="{{route('activelist',['id'=>$v->id])}}">查看</a></div></div>
                           </div>
                           <div class="act-a2">{{$v->title}}</div>
                           
                 </div>
             @else    
                 <div class="act-a1 fl">
                           <div class="act-a-img"><img style="width:486px;height:295px;" src="upload/{{$v->logo}}">
                                                 <div class="inside"><div class="ins-a"><a href="{{route('activelist',['id'=>$v->id])}}">查看</a></div></div>
                           </div>
                           <div class="act-a2">{{$v->title}}</div>
                           
                 </div>
                 @endif
             @endforeach
           
           </div>
           <div class="act-b">
                 <ul class="act-ul">
                 @foreach($active as $a)
                      <a href="{{route('activelist',['id'=>$a->id])}}"><li>
                          <div class="act-b1"><img style="width:318px;height:201px;" src="upload/{{$a->logo}}"></div>
                          <div class="act-a2">{{$a->title}}</div>
                      </li></a>
                 @endforeach     
                      <!-- <a href=""><li>
                          <div class="act-b1"><img src="upload/act-b2.jpg"></div>
                          <div class="act-a2">活动主题</div>
                      </li></a>
                      
                      <a href=""><li>
                          <div class="act-b1"><img src="upload/act-b3.jpg"></div>
                          <div class="act-a2">活动主题</div>
                      </li></a>
                      
                      <a href=""><li>
                          <div class="act-b1"><img src="upload/act-b1.jpg"></div>
                          <div class="act-a2">活动主题</div>
                      </li></a>
                      
                      <a href=""><li>
                          <div class="act-b1"><img src="upload/act-b2.jpg"></div>
                          <div class="act-a2">活动主题</div>
                      </li></a>
                      
                      <a href=""><li>
                          <div class="act-b1"><img src="upload/act-b3.jpg"></div>
                          <div class="act-a2">活动主题</div>
                      </li></a>
                       -->
                 </ul>
           </div>
           
           
</div>



<!--登录注册弹窗-->
<


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/Action.js"></script>
<script src="js/jquery.SuperSlide.2.1.1.js"></script>
<script>
   $(".act-banner").slide({
		    titCell: ".bd ul" , 
		    mainCell:".hd ul" , 
	        effect:"fold", 
	        autoPlay:true,
	        autoPage: true, 
		    mouseOverStop:false,
 		    trigger: "click",
		    startFun: function (i) {
                    var curLi = jQuery(".act-banner .bd li").eq(i);
                    if (!!curLi.attr("_src")) {
                        curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
                    }
                }
		 })	
</script>

<script>
$(".act-a-img").hover(function(){
		$(this).find(".inside").stop(true,true).animate({top:0},500);
		},function(){
	        $(this).find(".inside").stop(true,true).animate({top:295},500);
		});	
</script>

<script>
  $(".page a").click(function(){
	  $(this).addClass("page-cut").siblings().removeClass("page-cut")  
	  
	})
</script>

</body>
</html>

@endsection
