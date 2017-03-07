init();
function init() {
	if (!store.enabled) {
		alert('您的浏览器不支持本地存储，请退出无痕模式, 或使用其他浏览器！')
		return;
	}
}
Common.config.code=Common.getQueryString('code');
Common.config.state=Common.getQueryString('state');
$.ajax({
    url:Common.ip+$("#url").val(),
    data:Common.config,
    dataType:Common.dataType,
    timeout:0,
    success:function(data){
        delete Common.config.code;
        delete Common.config.state;
        if(data.error_code=='0000'){
        	var userInfo=data.data;

            //js过滤emoji表情
            userInfo.nickname=filteremoji(userInfo.nickname);

			var domain=$.cookie('domain');
			$.removeCookie('domain', { path: '/' });
			$.cookie('domain',encodeURIComponent(Common.ip), { expires: 1,path: '/'});

            if(!third_pc){
                window.localStorage.removeItem("userInfo");
                window.localStorage.setItem("userInfo",JSON.stringify(userInfo));
                window.location.href=Common.lanmao_history(0);
            }
            else{
                store.remove("userInfo");
                store.set("userInfo",JSON.stringify(userInfo));
                window.location.href=Common.lanmao_history(0);
            }

        }
        else{
            alert(data.error_msg);
        }
    }
});
function filteremoji(str){
    var ranges = [
        '\ud83c[\udf00-\udfff]',
        '\ud83d[\udc00-\ude4f]',
        '\ud83d[\ude80-\udeff]'
    ];
    var emojireg =str;
    emojireg = emojireg.replace(new RegExp(ranges.join('|'), 'g'), '?');
    return emojireg;
}