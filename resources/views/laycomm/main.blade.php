<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link rel="stylesheet" href="/css/base.css">
<link rel="stylesheet" href="/css/style.css">
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
   

        /* p {
            position:relative;
            line-height:1.4em;
            height:4.2em;
            overflow:hidden;
        }
        p::after {
            content:"...";
             font-weight:bold;
             position:absolute;
             bottom:0;
             right:0;
             padding:0 20px 1px 45px;
         
        } */
/*
        p{
            position: relative; 
        
            overflow: hidden;}
        p::after{
            content: "..."; 
            position: absolute; 
           
       
        }
 */      
    </style>
</head>

<body>


<div class="header">
    <div class="head wrap">
          <div class="logo fl"><a href=""><img src="/images/logo.png"></a></div>
          <div class="head-right fr">
              <div class="head-a fr">
                  @if(Session::get('id'))
                  <div class="head-a5 reg-click fl">

                    <span>
                        {{Session::get('username')}}
                    </span>
                  </div>
                   
                  <a href="{{ route('logout') }}"><div class="head-a5 reg-click fl">退出</div></a>
                  @else
                   <div class="head-a1 fl"><a href=""><img src="/images/tb-a.png"></a></div>
                   <div class="head-a1 fl"><a href=""><img src="/images/tb-b.png"></a></div>
                   <a href="{{ route('login') }}"><div class="head-a3 login-click fl">登录</div></a>
                   <a href="{{ route('register') }}"><div class="head-a4 reg-click fl">注册</div></a>
                @endif
              
              </div>
              <div class="clearfix"></div>
              <div class="nav fr">
                  <ul>
                  <!-- class="nav-cut" -->
                       <li ><a href="{{ route('index') }}">首页</a></li>
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
                       <li><a href="{{ route('communityindex') }}">社区</a></li>
                       <li><a href="{{route('activeIndex')}}">活动</a></li>
                       <!-- <li><a href="active.html">周边</a></li> -->
                       @if(Session::get('id'))
                       <li><a href="{{ route('porsonlist') }}?wen=1">个人</a></li>
                       <!-- <li> <a href="">达人中心</a></li> -->
                       @endif
                      <li> <a href="{{route('darenIndex')}}">达人中心</a></li>
                       
                  
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
    </div>
</div>


<!-- 内容 -->
@yield('content')



<!-- 底部 -->
<div class="footer">
   <div class="wrap">
      <div class="foot">
            <div class="foot-left fl">
                 <a href="">关于我们</a>
                 <a href="">加入我们</a>
                 <a href="contact.html">联系我们</a>
                 <a href="">媒体采访</a>
            </div>
            <div class="foot-c fl"><a href=""><img src="/images/foot-logo.jpg"></a></div>
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

</body>
</html>