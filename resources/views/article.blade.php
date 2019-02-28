@extends('laycomm.main')
@section('title','文章')
@section('content')


<div class="content">
    <div class="wrap">
          <div class="art-height"></div>
          <div class="art-box">
             
                <div class="art-b">
                @foreach($todyArt as $k => $t)
                    @if($k==0)
                    <a href="{{ route('artpage',['id'=>$t->id])}}"><div class="art-b1 mr-30 fl"><img src="upload/{{$t->logo}}">
                                     <div class="art-inside">今日焦点1：{{$t->title}}</div>
                               </div></a>
                    @else
                     <a href="{{ route('artpage',['id'=>$t->id])}}"><div class="art-b1 fl"><img src="upload/{{$t->logo}}">
                                     <div class="art-inside">今日焦点2：{{$t->title}}</div>
                               </div></a>          
                    @endif
                @endforeach
                    
                </div>
                <div class="art-c">
                        <div class="art-fl fl">
                               <div class="ru-title art-title">
                                       <div class="cou-b1"><img src="images/cou-b1.jpg">焦点文章</div>
                                       <div class="ru-a1">
                                       <form id="formdisplay" action="{{ route('artlist') }}">
                                            <select name="serach" id="display">
                                                <option value="">默认</option>
                                                <option @if(@$_GET['serach'] == 'd_desc') selected @endif value="d_desc">浏览量由高到低</option>
                                                <option @if(@$_GET['serach'] == 'd_asc') selected @endif value="d_asc">浏览量由低到高</option>
                                                <option @if(@$_GET['serach'] == 's_desc') selected @endif value="s_desc">评论量由高到低</option>
                                                <option @if(@$_GET['serach'] == 's_asc') selected @endif value="s_asc">评论量由低到高</option>
                                            </select>
                                            
                                       </div>
                                       <div class="ru-a2">
                                                     <select name="cats" id="cats">
                                                     <option value="">默认</option>
                                                     
                                                        @foreach($cats as $c)
                                                     
                                                        <option  @if(@$_GET['cats'] == $c->id) selected @endif  value="{{ $c->id}}">{{ $c->cat_name}}</option>
                                        
                                                        @endforeach
                                                    </select>
                                                    
                                       </div>
                                       </form>
                               </div>
                               <div class="tjk">
                                    <ul class="art-ul">
                                          @foreach($data as $v)
                                         <a href="{{ route('artpage',['id'=>$v->id])}}"><li><div class="art-list">
                                                          <div class="art-d fl"><img src="/upload/{{$v->logo}}"></div>
                                                          <div class="art-e fl">
                                                                <div class="col-b1">{{$v->title}}</div>
                                                                <div class="col-b2">
                                                                <span>
                                                                @foreach($user as $n)
                                                                    @if($v->user_id == $n->id)
                                                                        {{$n->username}}
                                                                    @endif
                                                                @endforeach
                                                                </span>
                                                                
                                                                <span>{{$v->created_at}}</span></div>
                                                                <div class="col-b3">{{$v->content}}</div>
                                                          </div>
                                                          <div class="art-f">
                                                                <span><img src="images/col-c1.jpg">{{$v->discuss}}</span>
                                                                <span><img src="images/col-c2.jpg">{{$v->display}}</span>
                                                                <em><img src="images/col-c3.jpg"></em>
                                                                <em><img src="images/col-c4.jpg"></em>
                                                                <em><img src="images/col-c5.jpg"></em>
                                                          </div>
                                                 </div>
                                                 <div class="art-g"></div>         
                                          </li></a>
                                         @endforeach
                                    </ul>
                               </div>
                               {{ $data->appends(['serach'=>@$_GET['serach'],'cats'=>@$_GET['cats']])->links() }}
                               <!-- <div class="more"><a href="">查看更多>></a></div> -->
                               <!-- <div class="more"><a href="">查看更多>></a></div> -->
<br><br><hr>
<span>
      <!-- {{Session::get('username')}} -->
</span>

                            <!-- <a href="{{ route('doart')}}"><div style="color:rgba(255,125,69,0.5);font-size:20px;"> 点击发表 </div></a> -->
                           

                        
                        </div>
                        
                        <div class="art-fr fr">
@if(Session::get('id'))
                         <a href="{{ route('doart')}}"><div  style="color:rgba(0,0,0,0.5);" class="ru-c1">点击发表文章</div></a>
                         @else
                            <!-- <a href="{{route('login')}}">登录发表</a> -->
                            <a href="{{route('login')}}"><div style="color:rgba(0,0,0,0.5);" class="ru-c1">你还没登录哦(登录发表)</div></a>
                            @endif
                       <div class="ru-c2"><img src="images/cou-b1.jpg">热门标签</div>
                       <div class="ru-c3">
                           <span>恋爱</span>
                           <span>型男</span>
                           <span>美女</span>
                           <span>矛盾</span>
                           <span>矛盾</span>
                           <span>恋爱</span>
                           <span>型男</span>
                           <span>美女</span>
                       </div><br>


                               <div class="post-y art-gg">
                                     <div class="post-y1"><img src="images/cou-b1.jpg">最新文章</div>
                                     <ul>
                                     @foreach($newArt as $c)
                                      <a href="{{ route('artpage',['id'=>$v->id])}}"><li>
                                           <div class="post-y2"><img src="/upload/{{$c->logo}}"></div>
                                           <div class="post-y3">{{ $c->title}}</div>
                                      
                                      </li></a>
                                    @endforeach
                                 </ul>
                               </div>
                               <div class="fish"><a href=""><img src="upload/ru-c1.png"></a></div>
                        </div>
                </div><!--art-c-->
          
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

    $(document).ready(function () {
        $('#display').on('change',function () {
            $('#formdisplay').submit();
        });

        $('#cats').on('change',function () {
            $('#formdisplay').submit();
        })
    });
</script>

@endsection