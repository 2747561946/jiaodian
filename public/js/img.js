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
