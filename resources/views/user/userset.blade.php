@extends('laycomm.main')
@section('title','修改')
@section('content')

<div class="content">
    <div class="wrap">
         <div class="tsm-height"></div>
         <div class="account">
            <form action="{{route('userset',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">

            @csrf

                 <div class="account-title">账户设置</div>
                    <!-- 基本资料 -->
                 <div class="tsm-box">
                      <div class="tsm-title">个人资料
                      </div>
                      <div class="tsm-a" style="display:block;">
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">用户名：</div>
                                         <div class="tsm-a3"><input name="username" type="text" value="{{$user->username}}" class="tsm-text1"></div>
                                   </div>
                                   
                                   <!-- <div class="tsm-a1">
                                         <div class="tsm-a2 fl">性别：</div>
                                         <div class="tsm-a4">
                                             <input type="radio" checked="checked" name="Sex" value="男" >男
                                             <span><input type="radio" name="Sex" value="女" />女</span>
                                         </div>
                                   </div> -->
                                   
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">职业：</div>
                                         <div class="tsm-a3"><input type="text" value="{{$user->job}}" name="job" class="tsm-text1"></div>
                                   </div>
                                   
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">所在城市：</div>
                                         <div class="tsm-a3"><input name="city" value="{{$user->city}}" type="text" class="tsm-text1"></div>
                                   </div>

                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">个人说说：</div>
                                         <div class="tsm-a3"><input name="say" value="{{$user->say}}" type="text" class="tsm-text1"></div>
                                   </div>

                                    
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">头像：</div>
                                         <!-- <div class="tsm-a3">
                                         <input name="logo" type="file" class="tsm-text1">
                                         </div> -->
                                         <div class="tsm-a1">
                                         
                                         <input value="/upload/{{$user->logo}}" type="file" name="logo" id="">
                                     </div>  
                                   </div>
                        </div>
                 </div>
                    <!-- 头像 -->
                 <!-- <div class="tsm-box">
                      <div class="tsm-title">头像
                      </div>
                      <div style="padding-left:140px;" class="">
                                   <div class="tsm-a1">
                                         
                                         <input type="file" name="logo" id="">
                                   </div>                                                                  
                        </div>  
                 </div> -->
                    <!-- 邮箱 -->
                  <div class="tsm-box">
                      <div class="tsm-title">邮箱</div>
                      <div style="padding-left:140px;" class="">
                          
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">邮箱：</div>
                                         <!-- <div class="tsm-c1">{{$user->email}}</div> -->
                                         <input type="text" class="tsm-text1" name="email" value="{{$user->email}}" id="">
                                   </div>
                                   <!-- @if($user->email)
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">新邮箱：</div>
                                         <div class="tsm-a3"><input type="text" class="tsm-text1"></div>
                                   </div>
                                   @endif -->
                                   <!-- <div class="tsm-a1">
                                         <div class="tsm-a2 fl">邮箱密码：</div>
                                         <div class="tsm-a3"><input type="text" class="tsm-text1"></div>
                                   </div> -->
                                   
                                 
                        </div>
                 </div>
                    <!-- 密码 -->
                 <!-- <div class="tsm-box">
                      <div class="tsm-title">密码
                      </div>
                      <div style="padding-left:140px;" class="">
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">当前密码：</div>
                                         <div class="tsm-a3"><input name="password" type="text" class="tsm-text1"></div>
                                   </div>
 
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">新密码：</div>
                                         <div class="tsm-a3"><input name="password" type="text" class="tsm-text1"></div>
                                   </div>
                                   <div class="tsm-a1">
                                         <div class="tsm-a2 fl">确认密码：</div>
                                         <div class="tsm-a3"><input name="password" type="text" class="tsm-text1"></div>
                                   </div>
                                   
                                 
                        </div>  
                 </div> -->
                 
               
                 <div class="tsm-href"><input type="submit" class="tsm-btn" value="保存"></div>

            </form>  
         </div>
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
$(".tsm-title").click(function(){
	  $(this).toggleClass("tsm-t2").parent().siblings().find(".tsm-title").removeClass("tsm-t2"),
	  $(this).next().slideToggle().parent().siblings().find(".tsm-a").slideUp()
})
</script>


</body>
</html>
@endsection
