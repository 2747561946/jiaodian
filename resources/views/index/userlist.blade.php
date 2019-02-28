<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>焦点学苑</title>
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
   
    </style>
</head>

<body>
<div class="head-box">
    <div class="head wrap">
          <div class="logo fl"><a href=""><img src="/images/logo.png"></a></div>
          <div class="head-right fr">
              <div class="head-a fr">
                   <div class="hgt fl"><img src="/images/hgt.png">
                         <div class="hgt-top">
                             <input type="text" class="hgt-text">
                         </div>
                   </div>
                   <div class="head-a1 fl"><a href=""><img src="/images/tb-a.png"></a></div>
                   <div class="head-a1 fl"><a href=""><img src="/images/tb-b.png"></a></div>
                   <a href="{{ route('login') }}"><div class="head-a3 login-click fl">登录</div></a>
                   <div class="head-a4 reg-click fl">注册</div>
              
              </div>
              <div class="clearfix"></div>
              <div class="nav fr">
                  <ul>
                       <li><a href="{{ route('index') }}">首页</a></li>
                       <li><a href="{{ route('artlist') }}">文章</a>
                           <div class="sub-nav">
                                <div class="bich-top"></div>
                                 <div class="bich">
                                     <a href="">服饰</a>
                                     <a href="">美食</a>
                                     <a href="">出行</a>
                                     <a href="">约会</a>
                                 </div>
                           
                           </div>
                       </li>
                       <li><a href="community.html">社区</a></li>
                       <li><a href="course.html">课程</a></li>
                       <li><a href="active.html">活动</a></li>
                       <li class="nav-cut"><a href="{{ route('porsonlist') }}">个人中心</a></li>
                  
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
    </div>
</div>


<div class="content">
    <div class="col-height"></div>
    <div class="focus-banner">
           <div class="wrap">
                <div class="focus-a1"><img src="/upload/focus-a2.png"></div>
                <div class="focus-a2"> <span style="font-size:20px;">
                       {{ $users->username}}
                    </span></div>
               <div class="focus-a3">
                          
                          
                          <a style="color:white" href="{{ route('userpage',['id'=>$users->id])}}"><div class="py-a fl">文章 20</div></a>
                          <a href="{{ route('userlist',['id'=>$users->id])}}"><div class="pyl  fl">帖子 500
                             
                          </div></a>
                          <div class="py-a fl">粉丝 500</div>
                          <div class="py-b fl">收藏 80</div>
                          <!-- <div class="py-z fl">设置</div> -->
                </div>
                <div class="focus-a4"><a href="">+关注</a><span>|</span><a href="">私信</a></div>
           </div>    
    </div>
    
    <div class="focus-b-box">
                <div class="focus-list"><div class="focus-title">
                    <span style="color:#999999;font-size:20px;">
                         {{ $users->username}}的帖子
                    </span>
                    </div></div>
                <div class="coll-box">
                         <ul class="col-ul">
                          @foreach($community as $c)
                              <li>
                                   <div class="col-list">
                                              <div class="col-a fl"><img src="/upload/{{$c->logo}}"></div>
                                              <div class="col-b fl">
                                                    <div class="col-b1">
                                                        <a href="">{{$c->title}}</a> &nbsp;&nbsp;&nbsp;
                                                       
                                                        
                                                    </div>
                                                    
                                                    <div class="col-b2"><img src="/upload/col-b.jpg">{{$users->username}}<span>{{$c->created_at}}</span></div>
                                                    <div class="col-b3"> </div>
                                              </div>
                                            
                                              <div class="col-c">
                                                    <span><img src="/images/col-c1.jpg">0</span>
                                                    <span><img src="/images/col-c2.jpg">3</span>
                                                    <em><img src="/images/col-c3.jpg"></em>
                                                    <em><img src="/images/col-c4.jpg"></em>
                                                    <em><img src="/images/col-c5.jpg"></em>
                                              </div>
                                     </div>         
                              </li>
                           @endforeach
                         </ul>
                     </div>
                 
               <!-- <div class="more"><a href="">查看更多>></a></div>        -->
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
<script>
         $(".pyl").click(function(){
					     $(this).find(".tbq").slideToggle()
					})
        </script>

</body>
</html>
