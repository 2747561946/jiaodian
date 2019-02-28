@extends('laycomm.main')
@section('title','达人中心')
@section('content')
<!-- <br><br><br> -->


<div class="content">
    <div class="col-height"></div>
    <div class="focus-banner">
           <div class="wrap">
               @if($users->logo == null)
               <div class="focus-a1"><img style="width:150px;border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg"></div>
               @else
                <div class="focus-a1"><img style="width:150px;border-radius:50%;" src="{{$users->logo}}"></div>
                @endif
                <div class="focus-a2"> <span style="font-size:20px;">
                       {{ $users->username}}
                    </span></div>
               
                          
                <form action="{{ route('userpage',['id'=>$users->id])}}" method="get">
                <div class="focus-a3">
                <!-- <div class="py-a fl"></div> -->
                <div style="margin-left:80px;">
                          <a style="color:white" href="{{ route('userpage',['id'=>$users->id])}}?wen=1"><div class="py-a fl">文章 </div></a>
                          <a href="{{ route('userpage',['id'=>$users->id])}}?tie=2"><div class="pyl  fl">帖子 </div></a>
                          </div>         
                          <!-- <div class="py-b fl"></div> -->
                          <!-- <div class="py-z fl">设置</div> -->
                </div>
                

                </form>
                @if(Session::get('id'))

                <div class="focus-a4">
                    <form action="{{ route('follow') }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{$users->id}}">
                        @if(!$fo)
                        <input style="width:105px;height:25px;background-color:rgba(0,0,0,0);" type="submit"  style="cursor:pointer;" value="+关注">                                                                   
                        @elseif($fo)
                        <span>已关注</span>
                        
                        @endif
                    </form>

                    <!-- <span>
                        |

                    </span><a href="">私信</a> -->
                    </div>

            </div> 
            @else  
            <div class="focus-a4">
                   
                       
                       
            <div class="focus-a4"><span id="follow" >登录加关注</span>
            <!-- <span>|</span><a href="">私信</a> -->
            </div>

                    <!-- <span>
                        |

                    </span>
                    <a href="">私信</a> -->
                    </div>

            </div> 
            @endif
    </div>

    @if($data ?? null)
        <div class="focus-b-box">
                    <div class="focus-list"><div class="focus-title">
                        <span style="color:#999999;font-size:20px;">
                            {{ $users->username}}的文章
                        </span>
                        </div></div>
                    <div class="coll-box">
                            <ul class="col-ul">
                                @foreach($data as $c)
                                <li>
                                    <div class="col-list">
                                                <div class="col-a fl"><img src="/upload/{{$c->logo}}"></div>
                                                <div class="col-b fl">
                                                        <div class="col-b1">
                                                            <a href="{{ route('artpage',['id'=>$c->id])}}">{{ $c->title}}</a> &nbsp;&nbsp;&nbsp;
                                                        
                                                            
                                                        </div>
                                                        
                                                        <div class="col-b2">
                                                            @if($users->logo == null)
                                                            <img style="border-radius:50%;" src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                            @else
                                                            <img style="border-radius:50%;" src="{{$users->logo}}">
                                                            @endif

                                                            {{$users->username}}<span>{{$c->created_at}}</span></div>
                                                        <div class="col-b3"> 
                                                             <!-- {!! $c->content !!} -->
                                                             {!! str_limit($c->content, 300,'...') !!}
                                                            </div>
                                                </div>
                                                
                                                <div class="col-c">
                                                        <span><img src="/images/col-c1.jpg">{{$c->discuss}}</span>
                                                        <span><img src="/images/col-c2.jpg">{{$c->display}}</span>
                                                        <em><img src="/images/col-c3.jpg"></em>
                                                        <em><img src="/images/col-c4.jpg"></em>
                                                        <em><img src="/images/col-c5.jpg"></em>
                                                </div>
                                        </div>         
                                </li>
                                @endforeach
                            </ul>
                            {{$data->appends(['wen' => '1'])->links()}}
                        </div>
                    
                <!-- <div class="more"><a href="">查看更多>></a></div>        -->
        </div>  
    @elseif($community ?? null)
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
                                                    
                                                    <div class="col-b2">
                                                    @if($users->logo == null)
                                                            <img src="/uploads/u=1666256797,972082711&fm=26&gp=0.jpg">
                                                            @else
                                                            <img src="{{$users->logo}}">
                                                            @endif

                                                        {{$users->username}}<span>{{$c->created_at}}</span></div>
                                                    <div class="col-b3">
                                                             <!-- {!! $c->content !!} -->
                                                             {!! str_limit($c->content, 300,'...') !!}
                                                         </div>
                                              </div>
                                            
                                              <div class="col-c">
                                                    <span><img src="/images/col-c1.jpg">{{$c->discuss}}</span>
                                                    <span><img src="/images/col-c2.jpg">{{$c->display}}</span>
                                                    <em><img src="/images/col-c3.jpg"></em>
                                                    <em><img src="/images/col-c4.jpg"></em>
                                                    <em><img src="/images/col-c5.jpg"></em>
                                              </div>
                                     </div>         
                              </li>
                           @endforeach
                         </ul>
                         {{$community->appends(['tie' => '1'])->links()}}
                     </div>
                 
               <!-- <div class="more"><a href="">查看更多>></a></div>        -->
    </div>  
   @endif

</div>

@endsection

<script type="text/javascript" src="/js/jquery.min.js" ></script>
<script>
    $("#follow").click(function(){
        // console.log('547');
        // alert('wadsf')
        $.ajax({
            type:"GET",
            url:"{{route('follow')}}",
            data:"json",
            success:function(data){
               if(!$userid){
                   alert('你还没登录哦')
               }
               else
               {
                   
               }
            }
        })
    });
    
    
</script>


