var Common=(function(doc,win,lib){
    return{
        //常用正则
        regExp:{
          phone:/^(13[0-9]|15[0-9]|17[0-9]|18[0-9]|14[0-9])[0-9]{8}$/,
          passreg:/^\S{6,15}$/,
          email:/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/,
          zh:/[\u4E00-\u9FA5\uF900-\uFA2D]{2,10}/,
          eh:/^[A-Za-z]+$/,
          num:/^[0-9]*$/,
          integer:/^[0-9]*[1-9][0-9]*$/        //正整数，不包含的正整数
        },
        config:{
            device_type:'PC',
            time_stamp:new Date().getTime()
        },
        error_token:'2003',
        dataType:'json',
        timeout:8000,//5000毫秒
        //ip:'http://192.168.1.5:8090',//接口
        //fill_ip:'http://192.168.1.5:8099/complete/info',//查看/填写信息
        //预上线
        //ip:/www\.lanmao\.cn/.test(window.location.hostname)?'http://api2.cattour.cn':'http://api2.cattrip.net',
        ip:"",
        fill_ip:"",
        apiAgent:"",
        //:/\.net/.test(window.location.hostname)?'http://www.cattrip.net/complete/info':'http://www.lanmao.cn/complete/info',
        //apiAgent:/\.net/.test(window.location.hostname)?"http://pc.cattrip.net":"http://www.lanmao.cn",

        //线上
        /*ip:'http://api2.cattour.cn',
        fill_ip:'http://www.lanmao.cn/complete/info',
        apiAgent:"http://www.lanmao.cn",*/
        pcurl:"",
        h5url:"",
        init:function(){
           // this.lanmao_history();
            //this.isuseJsonp();
            //this.setDeviceId();
            //this.clear_time_out();
            //this.ajaxSetting();
        },

        domain:function(){
          var d=window.location.hostname;
          var i=d.indexOf('.');
          var n=d.substring(i+1,d.length);
          return n;
        },
        getRefer:function(){
          var r=document.referrer;
          //跳转处理
          var arr=[/weixin\.cattrip\.net/i,/www\.cattour\.cn/i,/www\.cattrip\.net/i,/complete\/info/i,/login\/register/i,/login\/callBackPass/i];
          if(r==""){
            return '/index.html';
          }
          else{
            var t=false;
            for(var i=0;i<arr.length;i++){
              var v=arr[i];
              t=v.test(r);
              if(t||t==undefined){
                t=true;
                break;
              }
            }
            if(t){
              return '/index.html';
            }
            else{
              return r;
            }
          }
        },
        isPc:function(m,p){
          var sUserAgent = navigator.userAgent.toLowerCase();
          var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
          var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
          var bIsMidp = sUserAgent.match(/midp/i) == "midp";
          var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
          var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
          var bIsAndroid = sUserAgent.match(/android/i) == "android";
          var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
          var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
          if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
              //Mobile
            if(m){
                window.location.href=m;
            }
            return false;
          }else{
              //pc
              return true;
          }
        },
        whichBrowser:function(){
          var Sys = {};
          var ua = navigator.userAgent.toLowerCase();
          var s;
          (s = ua.match(/rv:([\d.]+)\) like gecko/)) ? Sys.ie = s[1] :
          (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
          (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
          (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
          (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
          (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;
          return Sys;
        },
        ajaxSetting:function(ele){
            var _this=this;
            if(ele==undefined){
                ele=document;
            }
            //全局ajax
            $.ajaxSetup({
                timeout:_this.timeout
                // beforeSend:function(xhr){
                //   xhr.setRequestHeader('Accept',
                //     "alication/json, text/javascript, */*; q=0.01;appVersion:3.3.0")
                // }
                // beforeSend: function(xhr){xhr.setRequestHeader('appVersion', '1212');}
            });
            $(ele).ajaxSuccess(function(evt, request, settings){
                if(request.responseJSON!=undefined){
                    if(request.responseJSON.error_code==_this.error_token){
                        _this.goLoginPage();
                    }
                }
             });
            //全局ajax_error
            $(ele).ajaxError(function(jqXHR, textStatus, errorMsg){
                _this.ajaxErrorAction(jqXHR, textStatus, errorMsg);
            });
        },
        ajaxErrorAction:function(jqXHR, textStatus, errorMsg){
            // console.log(textStatus.statusText);
            //console.log(textStatus);
            //console.log(errorMsg);
        },
        goLoginPageAction:function(error_code){
            if(error_code==this.error_token){
                store.remove('userInfo');
                this.goLoginPage();
                return true;
            }
            else{
              return false;
            }
        },
        goLoginPage:function(){
            window.location.href="/views/login/login.html";
            return false;
        },
        isuseJsonp:function(){
          var Sys=this.whichBrowser();
          if (parseInt(Sys.ie)<10){
            this.dataType='jsonp';
          }
        },
        clear_time_out:function(){
            var domain=decodeURIComponent($.cookie('domain'));
            if(domain==undefined||domain!=this.ip){
                this.clearUinfo_device();
            }
        },
        clearUinfo_device:function(){
            if(store.get("userInfo")!=undefined){
                store.remove("userInfo");
                store.remove("device_id");
                $.removeCookie('domain', { path: '/' });
            }
        },
        existCookies:function(name){
            var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
            if(arr=document.cookie.match(reg))
                return unescape(arr[2]);
            else
                return null;
        },
        isWechat:function(){
          return window.navigator.userAgent.indexOf("MicroMessenger")>-1;
        },
        update_common_parames:function(){
          this.config.time_stamp=this.set_time_stamp();
          this.config.token=this.set_time_token(this.config.time_stamp);
        },
        set_time_stamp:function(){
          return new Date().getTime();
        },
        isJsonData:function(data){
          if(typeof(data) == "object"&&Object.prototype.toString.call(data).toLowerCase() == "[object object]" && !data.length){

            //json非字符,true
            return data;
          }
          else{
            //普通字符
            return JSON.parse(data);
          }
        },
        set_time_token:function(str){
          /*alert(str);*/
          var u=JSON.parse(store.get("userInfo"));
          if(u){
             return $.md5(str+Base64.decode(Base64.decode(u.token)));
          }
        },
        getDeviceId:function(){
            return store.get("device_id");
        },
        isLogin:function(){
            if(store.get("userInfo")){
                return true;
            }
            return false;
        },
        goLogin:function(){
          if(!this.isLogin()){
            window.location.href='/views/login/login.html';
            return false;
          }
        },
        clearInfo:function(){
            if(store.get("userInfo")){
                $.removeCookie('time_out', { path: '/' });
                $.removeCookie('domain', { path: '/' });
            }
        },
        getQueryString:function(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
        },
        getQueryString_decodeURIComponent:function(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return decodeURIComponent(r[2]);
            return null;
        },
        getQueryString_decodeURI:function(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return decodeURI(r[2]);
            return null;
        },
        lanmao_history:function(g){
            var _this=this;
            //使用：Common.lanmao_history(0);
            var late = {
                storage : {},
                isinit : 0,
                maxnum : 10,
                key : 'lanmao_history',
                _init:function(){
                    if (late.isinit === 1) {
                        return true;
                    } else if (late.isinit === 0 && window.localStorage) {
                        late.isinit = 1;
                        late.storage = window.localStorage;
                        return true;
                    } else {
                        return false;
                    }
                },

                get:function(){
                    if(late._init()){
                        var data = late.storage.getItem(late.key);
                        return JSON.parse(data);
                    }else{
                        return false;
                    }
                },

                set:function(value){
                    if(late._init()){
                        var data = late.storage.getItem(late.key);
                        data = JSON.parse(data);
                        if(data === null){
                            data = [];
                        }
                        if (data.length === 10) {
                            data.shift();
                        }
                        data.push(value);
                        data = JSON.stringify(data);
                        late.storage.setItem(late.key, data);
                        return true;
                    }else{
                        return false;
                    }
                }
            };

            var b = true;
            //地址过滤
            var filter_out = [];
            filter_out.push(/\/views\/login\/.*/);
            filter_out.push(/\/Third\/.*/);
            for(var i in filter_out){
                var res =filter_out[i].exec(window.location.href);
                if(res != null){
                    b = false;
                    break;
                }
            }
            //记录地址
            if(b){
                var href = window.location.href;
                late.set(href);
            }
            //返回记录
            if(g != undefined)
            {
                var each = late.get();
                if(!each)return _this.homeurl;
                var each_length = each.length;
                if(each_length == 0)
                {
                    return _this.homeurl;
                }
                var res = each[each_length - g - 1];
                if(res == undefined)
                {
                    return _this.homeurl;
                }
                return res;
            }
        },
        setDeviceId:function(){
            var _this=this;
            var flag=false;
            if(store.get("device_id")==undefined){
                flag=true;
            }
            else{
              if(store.get("userInfo")){
                var uf=JSON.parse(store.get("userInfo"));
                if(uf){
                  this.config.user_id=uf.user_id;
                  if($.md5){
                    /*ceshi*/
                    /*alert(this.config.time_stamp);
                    alert(uf.token);
                    alert(this.config.time_stamp+Base64.decode(Base64.decode(uf.token)));*/
                    /*ceshi*/
                    this.config.token=$.md5(this.config.time_stamp+Base64.decode(Base64.decode(uf.token)));
                    /*alert(this.config.token);*/
                  }
                }
              }

              if(store.get("device_id")!=undefined){
                var de_id=store.get("device_id");
                this.config.device_id=de_id;
              }
            }
            if(flag){
              $.ajax({
                  url:Common.ip+'/Device/getDeviceId',
                  data:{device_type:_this.config.device_type},
                  dataType:_this.dataType,
                  timeout:4000,
                  success:function(data){
                      store.set("device_id",data.device_id);
                  }
              });
            }
        }
    }
})(document,window,window.lib || (window.lib = {}));
Common.init();
/*非法token处理，调到登录页*/
function tokenAction(data){
    var error_true=Common.goLoginPageAction(data.error_code);
    if(!error_true){
        alert(data.error_msg);
    }
}
//统计onclick延迟统计
function delayClick(e, o, dt, tjcb){
    var t, target = o.target, h = o.href;
    if(!target || target == '_self'){
        !!tjcb && tjcb();
        if(h){
            t = setTimeout(function(){
                clearTimeout(t);
                location.href = h;
                return true;
            }, dt);
            if(e && e.preventDefault){
                e.preventDefault();
            }else{
                window.event.returnValue = false;
            }
            return false;
        }
    }
}
//点击通用统计代码
$("body").on("click",'[data-analyze]',function() {
  var label = $(this).data("track");
  _hmt.push(['_trackEvent',label,'click']);
});
//占位图
function whenError(a){
    a.onerror=null;
    a.src='/public/images/product/showbox_empty_small.png';
}
function whenErrorLarge(a){
    a.onerror=null;
    a.src='/public/images/product/showbox_empty.png';
}
function whenErrorMid(a){
    a.onerror=null;
    a.src='/public/images/product/showbox_empty_mid.png';
}

//公共的函数集群
var Toolfun = {
  //显示重新加载
  showError:function(ele,dom){
    if(!ele) return false;
    if(ele.destroy&&typeof ele.destroy =="function"){
      ele.destroy(); 
    }
    ele = new Loading({
      dom:dom,
      height:300,
      imgurl:"/public/images/icon/refresh.png",
      flag:"refreshing"
    });
  }
};