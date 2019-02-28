<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            文章修改
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form action="{{ route('doartedit',['id'=>$blog->id]) }}" class="layui-form layui-form-pane" method="post" enctype="multipart/form-data">
            @csrf
                <div class="layui-form-item">
                    <label for="L_title" class="layui-form-label">
                        标题
                    </label>
                    <div class="layui-input-block">
                        <input type="text" value="{{$blog->title}}" id="L_title" name="title" required lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_title" class="layui-form-label">
                        图片
                    </label>
                    <div class="layui-input-block">&nbsp;
                        <!-- <input type="file" id="L_title" name="logo" required lay-verify="title"
                        autocomplete="off" class="preview"> -->
                        <td><input class="preview" value="/upload/{{$blog->logo}}" name="logo" id="" type="file"></td>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <div class="layui-input-block">
                        <textarea id="L_content" name="content" 
                        placeholder="请输入内容" class="layui-textarea fly-editor" style="height: 260px;">{{$blog->content}}</textarea>
                    </div>
                    <label for="L_content" class="layui-form-label" style="top: -2px;">
                       内容
                    </label>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">
                            选择标签
                        </label>
                        <div class="layui-input-block">
                            <select lay-verify="required" name="lab_id">
                                <option>
                                </option>
                                @foreach($labs as $v)
                               <option value="{{$v->id}}">{{$v->lab_name}}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">
                            所属分类
                        </label>
                        <div class="layui-input-block">
                            <select lay-verify="required" name="cat_id">
                                <option>
                                </option>
                                @foreach($cats as $v)
                                <option value="{{$v->id}}">{{$v->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                
                <div class="layui-form-item">
                    <!-- <button class="layui-btn" lay-filter="add" lay-submit>
                        立即发布
                    </button> -->
                    <input class="layui-btn" lay-filter="add" type="submit" value="立即发白">
                </div>
            </form>
        </div>
        <script src="/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/js/x-layui.js" charset="utf-8">
        </script>
   
        <script>
            layui.use(['form','layer','layedit'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer
              ,layedit = layui.layedit;


                layedit.set({
                  uploadImage: {
                    url: "./upimg.json" //接口url
                    ,
                    type: 'post' //默认post
                    
                  }
                })
  
            //创建一个编辑器
          editIndex = layedit.build('L_content');
            
              

              //监听提交
              form.on('submit(add)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
              
              
            });
        </script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>

</html>
<script src="/js/img.js" charset="utf-8"></script>
<script>
/*
$(".preview").change(function(){
    // 获取选择的图片
    var file = this.files[0];
    var str = getObjectUrl(file);
    $(this).prev('.before').remove();

    $(this).before("<div class='before'><img src='"+str+"' width='120' height='120'></div>");
});

// 把图片转成一个字符串
function getObjectUrl(file) {
    var url = null;
    if (window.createObjectURL != undefined) {
        url = window.createObjectURL(file)
    } else if (window.URL != undefined) {
        url = window.URL.createObjectURL(file)
    } else if (window.webkitURL != undefined) {
        url = window.webkitURL.createObjectURL(file)
    }
    return url
}
*/
</script>