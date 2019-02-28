<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>社区</title>
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/style.css">
<style>
        .pagination{display:inline-block;padding-left:0;margin-left: 40%;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px
			12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}
			.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>
			li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagin
			ation>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;
				cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color: #fff ;border-color:#ddd}
			.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>
			li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.paginationlg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px
			10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottomright-radius:3px}.pager{padding-left:0;margin:20px
			0;text-align:center;list-style:none}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:focus,.pagerli>a:hover{text-decoration:none;background-color:#eee}
			.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;cursor:not-allowed;background-color:#fff}
   
    </style>
</head>

<body>
<div class="head-box">
    <div class="head wrap">
          <div class="logo fl">
          <a href=""><img src="images/logo.png"></a>
          </div>
          <div class="head-right fr">
              <div class="head-a fr">
                   <div class="hgt fl">
                   <!-- <img src="images/hgt.png"> -->
                         <div class="hgt-top">
                             <input type="text" class="hgt-text">
                         </div>
                   </div>
                   <div class="tbt fl">
                   @foreach($user as $v)
                   @if($v->id == Session::get('id'))
                        @if($v->logo == null)
                        <img style="margin-top:-12px;width:48px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                        @else
                        <img src="{{$v->logo}}">
                        @endif
                   @endif
                   @endforeach
                        <div class="hgt-btm">
                             <a href="collection.html">我的主页</a>
                             <a href="">消息</a>
                             <a href="">我的关注</a>
                             <a href="account.html">帐号设置</a>
                             <a href="">退出</a>
                        </div>
                   </div>
              
              </div>
              <div class="clearfix"></div>
              <div class="nav fr">
                  <ul>
                       <li><a href="{{route('index')}}">首页</a></li>
                       <li><a href="{{ route('artlist') }}">文章</a>
                           <!-- <div class="sub-nav">
                                <div class="bich-top"></div>
                                 <div class="bich">
                                     <a href="">服饰</a>
                                     <a href="">美食</a>
                                     <a href="">出行</a>
                                     <a href="">约会</a>
                                 </div>
                           
                           </div> -->
                       </li>
                       <li class="nav-cut"><a href="{{route('communityindex')}}">社区</a></li>
                       <li><a href="{{route('activeIndex')}}">活动</a></li>
                       <!-- <li><a href="active.html">周边</a></li> -->
                       @if(Session::get('id'))
                       <li><a href="{{ route('porsonlist') }}?wen=1">个人</a></li>
                       @endif
                       <li><a href="{{ route('darenIndex')}}">达人中心</a></li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
    </div>
</div>

<div class="content">
    <div class="wrap">
          <div class="art-height"></div>
          <div class="community">
               <div class="com-fl fl">
                       <div class="hd">
                          <ul>
                            @foreach($lb as $b)
                              <!-- <li style="background:url(upload/{{$b->logo}}) no-repeat center center;width:421px;height:289px">

                            </li> -->
                           <a href="{{  route('communitylist',['id'=>$b->id])}}"> <li><img style="width:421px;height:289px;" src="{{$b->logo}}" alt=""></li> </a>
                            @endforeach
                            </ul>
                       </div>
                       <div class="bd"><ul></ul></div> 
               </div>
               <div class="com-fr fr">
                       <div class="com-a">
                            <div class="com-a1">圣诞节，总该对喜欢的姑娘做些什么吧？</div>
                            <div class="com-a2">又是一年的圣诞节，看着朋友圈里秀恩爱的男男女女，闻着大街上充满荷尔蒙的味道，自己也忍不住对喜欢的姑娘做些什么。 可是，能做什么？ 今年的平安夜和圣诞节都在工<a href="">[查看全文]</a></div>
                       </div>
                       <div class="com-b">
                           @foreach($head as $a)
                            <div class="com-b1">{{$a->title}} &nbsp;&nbsp;[{{$a->discuss}}次回复 / {{$a->display}}次浏览]
                                @foreach($user as $s)
                                @if($a->user_id == $s->id)
                                <span>{{$s->username}}</span>
                                @endif
                                @endforeach
                            </div>
                            @endforeach
                            <!-- <div class="com-b1">教學帖-聊天[1次回复 / 2236次浏览] <span>Shinnystory</span></div>
                            <div class="com-b1">《中国把妹故事》第二十二章干了这杯失身酒[1次回复 / 2462次浏览] <span>Shinnystory</span></div>
                            <div class="com-b1">抛弃惯例，利用魅力自然把妹[2次回复 / 3449次浏览]<span>Shinnystory</span></div>
                             -->
                           
                       </div> 
               </div>
          </div>
          
          <div class="ru">
                <div class="ru-fl fl">
                        <div class="ru-a">
                               <div class="ru-title">
                                       <div class="cou-b1"><img src="images/cou-b1.jpg">社区分享</div>
                                       <div class="ru-a1">
                                           <form id="formserach" action="{{route('communityindex')}}">
                                             <!-- <div class="sort">排序</div> -->
                                             <select name="serach" id="serach">
                                                <option value="">默认 </option>
                                                <option @if(@$_GET['serach'] == 'd_desc') selected @endif value="d_desc">浏览量↓</option>
                                                <option @if(@$_GET['serach'] == 'd_asc') selected @endif value="d_asc">浏览量↑</option>
                                                <option @if(@$_GET['serach'] == 'c_desc') selected @endif value="c_desc">评论量↓</option>
                                                <option @if(@$_GET['serach'] == 'c_asc') selected @endif value="c_asc">浏览量↑</option>
                                             </select>
                                             
                                       </div>
                                       <div class="ru-a2">
                                             <!-- <div class="dropdown"> -->
                                                    <select name="cats" id="cats">
                                                        <option value="">默认</option>
                                                        @foreach($cats as $c) 
                                                        <option @if(@$_GET['cats'] == $c->id ) selected @endif value="{{$c->id}}">{{$c->cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                             <!-- </div> -->
                                       </div>
                                       </form>
                               </div>
                         </div>
                         <div class="ru-b">
                                <ul>
                                    @foreach($comm as $v)
                                      <a href="{{ route('communitylist',['id'=>$v->id])}}"><li>
                                           <div class="wt-fl fl">
                                                @foreach($user as $u)
                                                    @if($v->user_id == $u->id)
                                                    
                                                 <div class="wt-a1">
                                                    @if($u->logo == null)
                                                    <img style="border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg"></div>
                                                    
                                                    @else
                                                    <img style="border-radius:50%;" src="{{$u->logo}}"></div>
                                                    @endif
                                                 <div class="wt-a2">{{ $u->username}}</div>
                                                 @endif
                                                 @endforeach
                                           </div>
                                           <div class="wt-fr fl">
                                                  <div class="wt-r1"><span>帖子分类</span>{{$v->title}}<em>New</em></div>
                                                  <div class="wt-r2">评论（{{$v->discuss}}） 丨  阅读（{{$v->display}}） 丨  {{ $v->created_at}}</div>
                                                  
                                           </div>
                                      </li></a>
                                     @endforeach
                                      
                                </ul><br><br><br>
                                <!-- <div class="skt-more com-more"><a href="">查看更多</a></div> -->
                                {{$comm->links()}}
                         </div>       
                </div><!--ru-fl--> 
                
                <div class="ru-fr fr">
                @if(Session::get('id'))
                    
                      <a href="{{ route('communitycreat')}}"><div class="ru-c1">发表帖子</div></a> 
                    @else
                        <a href="{{ route('login')}}"><div class="ru-c1">你还没登录哦</div></a>
                @endif
                       <div class="ru-c2"><img src="images/cou-b1.jpg">热门标签</div>
                       <div class="ru-c3">
                           @foreach($labs as $b)
                           <span>{{$b->lab_name}}</span>
                           @endforeach
                       </div>
                       <div class="ru-c2"><img src="images/cou-b1.jpg">热门帖子</div>
                       <div class="ru-c4">
                           @foreach($hot as $h)
                            <div class="ru-c5">
                                   <div class="ru-d fl">热</div>
                                   <div class="ru-e fl">
                                       <div class="ru-e1">{{$h->title}}</div>
                                        @foreach($user as $u)
                                        @if($h->user_id == $u->id)
                                       <div class="ru-e2">
                                            @if($u->logo == null)
                                            <img style="border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">                                            
                                            @else
                                            <img style="border-radius:50%;" src="{{$u->logo}}">
                                            @endif
                                       {{$u->username}}
                                        @endif
                                        @endforeach
                                       <br>
                                       <span>{{$h->created_at}}</span></div>
                                   </div>
                            </div>
                            @endforeach
                            
                       </div>
                       <div class="ru-c6"><a href=""><img src="upload/ru-c1.png"></a></div>
                </div>
          </div><!--ru-->
    </div> 
</div>

<div class="footer">
   <div class="wrap">
      <div class="foot">
            <div class="foot-left fl">
                 <a href="">关于我们</a>
                 <a href="">加入我们</a>
                 <a href="contact.html">联系我们</a>
                 <a href="">媒体采访</a>
            </div>
            <div class="foot-c fl"><a href=""><img src="images/foot-logo.jpg"></a></div>
            <div class="foot-right fr">
                 <a href="">同城活动</a>
                 <a href="">课程资讯</a>
                 <a href="">最新发布</a>
                 <a href="">热门文章</a>
            </div>
       </div> 
       <div class="foot-btm">网页制作by云邦</div>    
   </div>
</div>


<!--登录注册弹窗-->
<div class="mask"></div>
<div class="login">
    <div class="login-title">
        <div class="login-a">登录</div>
        <div class="login-b"></div>
        <div class="login-c close">x</div>
    </div>
    <div class="login-btm">
        <div class="login-d"><input type="text" class="login-text" placeholder="注册时填写的邮箱"></div>
        <div class="login-d"><input type="password" class="login-pas" placeholder="密码"></div>
        <div class="login-d"><input type="button" class="login-btn" placeholder="登录"></div>
        <div class="login-f">
             <a href="">忘记密码</a>
             <span>还没有焦点账号?><a href="javascript:;" class="reg-href">点击注册</a></span>
        </div>
    </div>
</div>

<div class="reg">
    <div class="login-title">
        <div class="login-a">注册</div>
        <div class="login-b"></div>
        <div class="login-c close">x</div>
    </div>
    <div class="login-btm">
        <div class="login-d"><input type="text" class="login-text" placeholder="邮箱/手机号"></div>
        <div class="login-d"><input type="password" class="login-pas" placeholder="密码"></div>
        <div class="login-d"><input type="button" class="login-btn" placeholder="注册"></div>
        <div class="login-f">
             <a href="">忘记密码</a>
        </div>
    </div>
</div>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/Action.js"></script>
<script src="js/jquery.SuperSlide.2.1.1.js"></script>
<script>
   $(".com-fl").slide({
		    titCell: ".bd ul" , 
		    mainCell:".hd ul" , 
	        effect:"fold", 
	        autoPlay:true,
	        autoPage: true, 
		    mouseOverStop:false,
 		    trigger: "click",
		    startFun: function (i) {
                    var curLi = jQuery(".com-fl .bd li").eq(i);
                    if (!!curLi.attr("_src")) {
                        curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
                    }
                }
		 })	
</script>
<script>
   $(".sort").click(function(){
	   $(this).toggleClass("sort-cut")  
	})
</script>
<script>
   $(".dropdown").bind({
	    click: function () {
	        $(this).find(".droplist").stop().slideDown();
	    },
	    mouseleave: function () {
	        $(this).find(".droplist").hide();
	    }
	});
	$(".dropdown .droplist li").click(function () {
	    $(this).parents(".dropdown").children("span").text($(this).text());
	    $(this).parents(".droplist").hide().attr("data-value", $(this).attr("data-id"));
	});
</script>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#serach").on('change',function(){
            $("#formserach").submit();
        });
        
        $("#cats").on('change',function(){
            $("#formserach").submit();
        });
    })

</script>
