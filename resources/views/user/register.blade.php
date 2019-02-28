<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>注册</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/common.css" />
		<style>
			form_text_ipt,input {
				background: rgba(255,255,255,0);
			color: black;
			}
		</style>
	</head>
	<body>
		<div class="wrap login_wrap">
			<div class="content">
				
				<div class="logo"></div>
				
				<div class="login_box">	
					
					<div class="login_form">
						<div class="login_title">
							注册
						</div>
	@if($errors->all())
	
		<ul>
			@foreach($errors->all() as $e)
			
			<li>{{$e}}</li>
			@endforeach
		</ul>
	@endif
						<form action="{{ route('register') }}" method="post">
							@csrf
							<div class="form_text_ipt">
								<input name="username" type="text" placeholder="用户名">
							</div>
							<div class="ececk_warning"><span>数据不能为空</span></div>
							
							<div class="form_text_ipt">
								<input name="password" type="password" placeholder="密码">
							</div>
							<div class="ececk_warning"><span>数据不能为空</span></div>
							<div class="form_text_ipt">
								<input name="password_confirmation" type="password" placeholder="重复密码">
							</div>
							<div class="ececk_warning"><span>数据不能为空</span></div>

							<div class="form_text_ipt">
								<input name="mobile" type="text" placeholder="手机号">
							</div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- <button style="background: rgba(255,255,255,0);">发送验证码</button> -->
							<input type="button" style="cursor:pointer" id="btn_send" value="发送验证码">
							<div class="ececk_warning"><span>数据不能为空</span></div>

							<div class="form_text_ipt">
								<input name="mobile_code" type="text" placeholder="验证码">
							</div>
							<div class="ececk_warning"><span>数据不能为空</span></div>
							
							<div class="form_btn">
								<button type="submit">注册</button>
								<!-- <input type="submit" value="注册"> -->
							</div>
							<div class="form_reg_btn">
								<span>已有帐号？</span><a href="{{ route('login') }}">马上登录</a>
							</div>
						</form>
						<div class="other_login">
							<div class="left other_left">
								<span>其它登录方式</span>
							</div>
							<div class="right other_right">
								<a href="#">QQ登录</a>
								<a href="#">微信登录</a>
								<a href="#">微博登录</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<script type="text/javascript" src="js/common.js" ></script>
	</body>
</html>

<script>
var seconds = 60;
var si;
	$("#btn_send").click(function(){
		var mobile = $("input[name=mobile]").val();

		$.ajax({
			type:"GET",
			url:"{{route('sendcode')}}",
			data:{mobile:mobile},  //手机
			success:function(data)
			{
				console.log(data);
				$("#btn_send").attr('disabled',true);
				si = setInterval(function(){
					seconds--;
					if(seconds==0)
					{
						$("#btn_send").attr('disabled',false);
						seconds=60;
						$("#btn_send").val("发送验证码");
						clearInterval(si);
					}
					else
					{
						$("#btn_send").val("还剩"+(seconds));
					}
				},1000);
			}
		});
	});

</script>
