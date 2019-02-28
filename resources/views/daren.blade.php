@extends('laycomm.main')
@section('title','大人中学')
@section('content')


<div class="content">
    <div class="wrap">
         <div class="tsm-height"></div>
       
           <div class="act-b">
                 <ul class="act-ul">
                     @foreach($user as $u)
                      <a href="{{route('userpage',['id'=>$u->id])}}?wen=1"><li>
                            @if($u->logo == null)
                            <div style="width:200px;height:200px;border-radius:50%;" class="act-b1 act-a-img">
                        <div class="inside"></div>
                          <img style="width:200px;height:200px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">

                          @else
                        <div style="width:200px;height:200px;border-radius:50%;" class="act-b1 act-a-img">
                        <div class="inside"></div>
                          <img style="width:200px;height:200px;border-radius:50%;" src="{{$u->logo}}">
                          
                          @endif
                        </div>
                          <div class="act-a2">
                              <span style="margin-left:78px;">
                              <!-- margin:0 auto -->
                              {{$u->username}}
                              </span>
                          </div>
                        <div>{{$u->say}}</div>

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
           
         
<!--            
            <div class="page m-48">
                         <a href="" class="page-cut">1</a>
                         <a href="">2</a>
                         <a href="">》</a>
            </div> -->
            
            <div class="act-e"><a href=""><img src="upload/act-f.jpg"></a></div>
    </div> 
</div>



<!--登录注册弹窗-->





<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/Action.js"></script>
<script src="js/jquery.SuperSlide.2.1.1.js"></script>
<!-- <script>
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
</script> -->

<script>
$(".act-a-img").hover(function(){
		$(this).find(".inside").stop(true,true).animate({top:0},500);
		},function(){
	        $(this).find(".inside").stop(true,true).animate({top:295},500);
		});	
</script>

<!-- <script>
  $(".page a").click(function(){
	  $(this).addClass("page-cut").siblings().removeClass("page-cut")  
	  
	})
</script> -->

</body>
</html>

@endsection
