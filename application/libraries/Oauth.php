<?php
class Oauth
{
    /**
     * combineURL
     * 拼接url
     * @param string $baseURL   基于的url
     * @param array  $keysArr   参数列表数组
     * @return string           返回拼接的url
     */

    private $APIMap;

    private $REDIS_PRE = "THIRDLOGIN:";
    private $REDIS_TIME = 300;
    private $LoginUrl = H5_HOST."/app/views/passport/login.html";

    public function debug($msg,$open=false)
    {
        if($open){
            $DEBUG = TRUE;
        }else{
            $DEBUG = FALSE;
        }
        if($DEBUG){
            echo("<br>|");
            var_dump($msg);
            echo("=>".microtime()."|<br>");
        }
    }

    public function dealWithOutput($result){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Max-Age: 3628800');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE,OPTIONS');
        header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        header("content-type:application/json");
        //返回json
        $json = json_encode($result);
        echo $json;
        exit();
    }

    public function __construct() {
        $this->redis = new Redis();
        $this->redis->connect(REDIS_HOST,REDIS_PORT);
        /*以下部分为获取第三方qq登陆资料*/
        //初始化APIMap
        /*
         * 加#表示非必须，无则不传入url(url中不会出现该参数)， "key" => "val" 表示key如果没有定义则使用默认值val
         * 规则 array( baseUrl, argListArr, method)
         */
        $this->APIMap = array(
            /*                       qzone                    */
            "add_blog" => array(
                "https://graph.qq.com/blog/add_one_blog",
                array("title", "format" => "json", "content" => null),
                "POST"
            ),
            "add_topic" => array(
                "https://graph.qq.com/shuoshuo/add_topic",
                array("richtype","richval","con","#lbs_nm","#lbs_x","#lbs_y","format" => "json", "#third_source"),
                "POST"
            ),
            "get_user_info" => array(
                "https://graph.qq.com/user/get_user_info",
                array("format" => "json"),
                "GET"
            ),
            "add_one_blog" => array(
                "https://graph.qq.com/blog/add_one_blog",
                array("title", "content", "format" => "json"),
                "GET"
            ),
            "add_album" => array(
                "https://graph.qq.com/photo/add_album",
                array("albumname", "#albumdesc", "#priv", "format" => "json"),
                "POST"
            ),
            "upload_pic" => array(
                "https://graph.qq.com/photo/upload_pic",
                array("picture", "#photodesc", "#title", "#albumid", "#mobile", "#x", "#y", "#needfeed", "#successnum", "#picnum", "format" => "json"),
                "POST"
            ),
            "list_album" => array(
                "https://graph.qq.com/photo/list_album",
                array("format" => "json")
            ),
            "add_share" => array(
                "https://graph.qq.com/share/add_share",
                array("title", "url", "#comment","#summary","#images","format" => "json","#type","#playurl","#nswb","site","fromurl"),
                "POST"
            ),
            "check_page_fans" => array(
                "https://graph.qq.com/user/check_page_fans",
                array("page_id" => "314416946","format" => "json")
            ),
            /*                    wblog                             */

            "add_t" => array(
                "https://graph.qq.com/t/add_t",
                array("format" => "json", "content","#clientip","#longitude","#compatibleflag"),
                "POST"
            ),
            "add_pic_t" => array(
                "https://graph.qq.com/t/add_pic_t",
                array("content", "pic", "format" => "json", "#clientip", "#longitude", "#latitude", "#syncflag", "#compatiblefalg"),
                "POST"
            ),
            "del_t" => array(
                "https://graph.qq.com/t/del_t",
                array("id", "format" => "json"),
                "POST"
            ),
            "get_repost_list" => array(
                "https://graph.qq.com/t/get_repost_list",
                array("flag", "rootid", "pageflag", "pagetime", "reqnum", "twitterid", "format" => "json")
            ),
            "get_info" => array(
                "https://graph.qq.com/user/get_info",
                array("format" => "json")
            ),
            "get_other_info" => array(
                "https://graph.qq.com/user/get_other_info",
                array("format" => "json", "#name", "fopenid")
            ),
            "get_fanslist" => array(
                "https://graph.qq.com/relation/get_fanslist",
                array("format" => "json", "reqnum", "startindex", "#mode", "#install", "#sex")
            ),
            "get_idollist" => array(
                "https://graph.qq.com/relation/get_idollist",
                array("format" => "json", "reqnum", "startindex", "#mode", "#install")
            ),
            "add_idol" => array(
                "https://graph.qq.com/relation/add_idol",
                array("format" => "json", "#name-1", "#fopenids-1"),
                "POST"
            ),
            "del_idol" => array(
                "https://graph.qq.com/relation/del_idol",
                array("format" => "json", "#name-1", "#fopenid-1"),
                "POST"
            ),
            /*                           pay                          */

            "get_tenpay_addr" => array(
                "https://graph.qq.com/cft_info/get_tenpay_addr",
                array("ver" => 1,"limit" => 5,"offset" => 0,"format" => "json")
            )
        );
    }

    public function __destruct()
    {
        $this->redis->close();
    }

    /**
     * Oauth公共登陆函数
     * @param $type
     * @param $callback_url
     */
    public function qq_login($type="qq",$callback_url="")
    {
        $CI = &get_instance();
        $CI->config->load('third_login');

        $source = isset($_GET['source'])?$_GET['source']:"";

        if( ! isMobile())
        {
            $setting = $CI->config->item($type."_pc");
        }
        if( ! $setting){
            $setting = $CI->config->item($type);
        }

        $appid = $setting[0]['appid'];
        if( ! $callback_url){
            $callback = $setting[0]['callback'];
        }
        $scope = '';
        foreach ($setting[1] as $key=>$val)
        {
            if($val === '1')
            {
                $scope .= $key . ',';
            }
        }
        $scope = trim(rtrim($scope,','));
        //-------生成唯一随机串防CSRF攻击
        $state = md5(uniqid(rand(), TRUE))."|".$source;
        $this->redis->setex($this->REDIS_PRE.strtoupper($type).":".$state,$this->REDIS_TIME,"1");
        //-------构造请求参数列表
        $keysArr = array(
            "response_type" => "code",
            "client_id" => $appid,
            "redirect_uri" => urlencode($callback),
            "state" => $state,
            "scope" => $scope,
        );
        $login_url =  $this->combineURL($setting[0]['GET_AUTH_CODE_URL'], $keysArr);
        header("Location:$login_url");
    }

    /**
     * wechat的callback回调方法
     */
    public function qq_callback($type="qq")
    {
        $CI = &get_instance();
        $CI->config->load('third_login');

        $state = $_GET['state'];
        $code = $_GET['code'];

        if( ! isMobile())
        {
            $setting = $CI->config->item($type."_pc");
        }
        if( ! $setting){
            $setting = $CI->config->item($type);
        }
        //--------验证state防止CSRF攻击
        if(!$state or $this->redis->get($this->REDIS_PRE.strtoupper($type).":".$state) != "1"){
            $this->debug($type.'第三方登陆失败,state.');
            //redirect($this->loginUrl,'location',301);
            exit($type);
        }
        //-------请求参数列表
        $keysArr = array(
            "grant_type" => "authorization_code",
            "client_id" => $setting[0]['appid'],//wechat->appid,//client_id
            "client_secret" => $setting[0]['appkey'],//client_secret
            "code" => $code,
            "redirect_uri" => urlencode($setting[0]['callback']),
        );
        //------构造请求access_token的url
        $token_url = $this->combineURL($setting[0]['GET_ACCESS_TOKEN_URL'], $keysArr);
        $response = $this->get_contents($token_url);

        $params = [];
        parse_str($response,$params);
        $access_token = V($params,"access_token");

        if( ! $access_token)
        {
            var_dump($response);
            echo("<br>");
            //var_dump($keysArr);
            echo("<br>");
            echo("第三方登陆失败.inGetToken<br>".__LINE__."<br>");
            $this->debug("第三方登陆失败".__LINE__);
            exit();
        }else{
            $this->debug("第三方登陆成功".__LINE__);
        }
        $this->redis->setex($this->REDIS_PRE.strtoupper($type).":ACCESS_TOKEN:".$state,$this->REDIS_TIME,$access_token);
        $this->debug(__LINE__);

        $openid_info= $this->qq_get_openid($type);
        $openid= V($openid_info,"openid");

        if( ! $openid)
        {
            echo("第三方登陆失败.inGetOpenId<br>".__LINE__."<br>");
            exit();
        }else{
            $user_info = $this->qq_get_userinfo($type,$openid);
        }

        if( ! $user_info)
        {
            echo("第三方登陆失败.inGetUserInfo<br>".__LINE__."<br>");
            exit();
        }

        $this->debug(__LINE__);
        $user['openid'] = $openid;
        $user['access_token'] = $access_token;
        $user['image'] = isset($user_info["figureurl_qq_2"])?$user_info["figureurl_qq_2"]:"";
        $user['type'] = strtoupper($type);
        $user['nickname'] = isset($user_info["nickname"])?$user_info["nickname"]:"";

        $this->debug(__LINE__);
        $CI->load->model("User_model","user_model");
        $this->debug(__LINE__);
        $result = $CI->user_model->ThirdLogin($user);
        $this->debug(__LINE__);
        $this->dealWithOutput($result);
    }

    /**
     * 公共的获取openid函数
     * @param $type
     * @return mixed
     */
    public function qq_get_openid($type="qq")
    {
        $this->debug(__LINE__);
        $CI = &get_instance();
        $CI->config->load('third_login');
        $setting = $CI->config->item($type);

        $code = $_GET['code'];
        $state = $_GET['state'];

        //-------请求参数列表
        $keysArr = array(
            "access_token" => $this->redis->get($this->REDIS_PRE.strtoupper($type).":"."ACCESS_TOKEN:".$state)
        );
        $this->debug(__LINE__);
        $graph_url = $this->combineURL($setting[0]['GET_OPENID_URL'], $keysArr);
        $this->debug(__LINE__);
        $response = $this->get_contents($graph_url);
        $this->debug(__LINE__);
        //----检测错误是否发生
        if(strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos -1);
        }
        $this->debug(__LINE__);
        $user = json_decode($response,TRUE);
        $this->debug(__LINE__);
        $this->debug($user);
        $this->debug(__LINE__);
        //------记录openid
        $this->debug(__LINE__);
        return $user;
    }

    /**
     * 公共的获取openid函数
     * @param $type
     * @return mixed
     */
    public function qq_get_userinfo($type="qq",$openid)
    {
        $this->debug(__LINE__);
        $CI = &get_instance();
        $CI->config->load('third_login');
        $setting = $CI->config->item($type);

        $code = $_GET['code'];
        $state = $_GET['state'];

        //-------请求参数列表
        $keysArr = array(
            "access_token"           => $this->redis->get($this->REDIS_PRE.strtoupper($type).":"."ACCESS_TOKEN:".$state),
            "oauth_consumer_key"     => $setting[0]['appid'],
            "openid"                 => $openid,
        );
        $this->debug(__LINE__);
        $graph_url = $this->combineURL($setting[0]['GET_USER_INFO_URL'], $keysArr);
        $this->debug(__LINE__);
        $response = $this->get_contents($graph_url);
        $this->debug(__LINE__);
        //----检测错误是否发生
        if(strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos -1);
        }
        $this->debug(__LINE__);
        $user = json_decode($response,TRUE);
        $this->debug(__LINE__);
        $this->debug($user);
        $this->debug(__LINE__);
        return $user;
    }

    /**
     * Oauth公共登陆函数
     * @param $type
     * @param $callback_url
     */
    public function wechat_login($type="wechat",$callback_url="")
    {
        $CI = &get_instance();
        $CI->config->load('third_login');

        $source = isset($_GET['source'])?$_GET['source']:"";

        if( ! isMobile())
        {
            $setting = $CI->config->item($type."_pc");
        }
        if( ! $setting){
            $setting = $CI->config->item($type);
        }

        $appid = $setting[0]['appid'];
        if( ! $callback_url){
            $callback = $setting[0]['callback'];
        }
        $scope = '';
        foreach ($setting[1] as $key=>$val)
        {
            if($val === '1')
            {
                $scope .= $key . ',';
            }
        }
        $scope = trim(rtrim($scope,','));
        //-------生成唯一随机串防CSRF攻击
        $state = md5(uniqid(rand(), TRUE))."|".$source;
        $this->redis->setex($this->REDIS_PRE.strtoupper($type).":".$state,$this->REDIS_TIME,"1");
        //-------构造请求参数列表
        $keysArr = array(
            "appid" => $appid,
            "redirect_uri" => urlencode($callback),
            "response_type" => "code",
            "scope" => $scope,
            "state" => $state,
        );
        $login_url =  $this->combineURL($setting[0]['GET_AUTH_CODE_URL'], $keysArr);
        header("Location:$login_url");
    }

    /**
     * wechat的callback回调方法
     */
    public function wechat_callback($type="wechat")
    {
        $CI = &get_instance();
        $CI->config->load('third_login');

        $state = $_GET['state'];
        $code = $_GET['code'];

        if( ! isMobile())
        {
            $setting = $CI->config->item($type."_pc");
        }
        if( ! $setting){
            $setting = $CI->config->item($type);
        }
        //--------验证state防止CSRF攻击
        if(!$state or $this->redis->get($this->REDIS_PRE.strtoupper($type).":".$state) != "1"){
            $this->debug($type.'第三方登陆失败,state.');
            //redirect($this->loginUrl,'location',301);
            exit($type);
        }
        //-------请求参数列表
        $keysArr = array(
            "grant_type" => "authorization_code",
            "appid" => $setting[0]['appid'],//wechat->appid,//client_id
            "secret" => $setting[0]['appkey'],//client_secret
            "redirect_uri" => urlencode($setting[0]['callback']),
            "code" => $code
        );
        //------构造请求access_token的url
        $token_url = $this->combineURL($setting[0]['GET_ACCESS_TOKEN_URL'], $keysArr);
        $response = $this->get_contents($token_url);
        $params = json_decode($response,TRUE);
        $access_token = $params["access_token"];
        if( ! $access_token)
        {
            var_dump($response);
            echo("<br>");
            //var_dump($keysArr);
            echo("<br>");
            echo("第三方登陆失败.inGetToken<br>".__LINE__."<br>");
            $this->debug("第三方登陆失败".__LINE__);
            exit();
        }else{
            $this->debug("第三方登陆成功".__LINE__);
        }
        $this->redis->setex($this->REDIS_PRE.strtoupper($type).":ACCESS_TOKEN:".$state,$this->REDIS_TIME,$access_token);
        $this->debug(__LINE__);

        $unionid = V($params,"unionid");
        if( ! $unionid)
        {
            echo("第三方登陆失败.inGetUnionid<br>");
            $this->debug("第三方登陆失败".__LINE__);
            exit();
        }
        if(isset($params["openid"]))
        {
            $this->redis->setex($this->REDIS_PRE.strtoupper($type).":OPENID:".$state,$this->REDIS_TIME,$params['openid']);
        }
        $user_info= $this->wechat_get_userinfo($type);

        $this->debug(__LINE__);
        $user['openid'] = $unionid;
        $user['access_token'] = $access_token;
        $user['image'] = isset($user_info["headimgurl"])?$user_info["headimgurl"]:"";
        $user['type'] = strtoupper($type);
        $user['nickname'] = isset($user_info["nickname"])?$user_info["nickname"]:"";

        $this->debug(__LINE__);
        $CI->load->model("User_model","user_model");
        $this->debug(__LINE__);
        $result = $CI->user_model->ThirdLogin($user);
        $this->debug(__LINE__);
        $this->dealWithOutput($result);
    }

    /**
     * 公共的获取openid函数
     * @param $type
     * @return mixed
     */
    public function wechat_get_userinfo($type="wechat")
    {
        $this->debug(__LINE__);
        $CI = &get_instance();
        $CI->config->load('third_login');
        $setting = $CI->config->item($type);

        $state = $_GET['state'];
        $code = $_GET['code'];

        //-------请求参数列表
        $keysArr = array(
            "access_token" => $this->redis->get($this->REDIS_PRE.strtoupper($type).":"."ACCESS_TOKEN:".$state),
        );
        if($type=="wechat")
        {
            $keysArr['openid'] = $this->redis->get($this->REDIS_PRE.strtoupper($type).":OPENID:".$state);
        }
        $this->debug(__LINE__);
        $graph_url = $this->combineURL($setting[0]['GET_USERINFO_URL'], $keysArr);
        $this->debug(__LINE__);
        $response = $this->get_contents($graph_url);
        $this->debug(__LINE__);
        //----检测错误是否发生
        if(strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos -1);
        }
        $this->debug(__LINE__);
        $user = json_decode($response,TRUE);
        $this->debug($user);
        $this->debug(__LINE__);
        return $user;
    }

    /**
     * Oauth公共登陆函数
     * @param $type
     * @param $callback_url
     */
    public function sina_login($type="sina",$callback_url="")
    {
        $CI = &get_instance();
        $CI->config->load('third_login');

        $source = isset($_GET['source'])?$_GET['source']:"";

        if( ! isMobile())
        {
            $setting = $CI->config->item($type."_pc");
        }
        if( ! $setting){
            $setting = $CI->config->item($type);
        }

        $appid = $setting[0]['appid'];
        if( ! $callback_url){
            $callback = $setting[0]['callback'];
        }
        $scope = '';
        foreach ($setting[1] as $key=>$val)
        {
            if($val === '1')
            {
                $scope .= $key . ',';
            }
        }
        $scope = trim(rtrim($scope,','));
        //-------生成唯一随机串防CSRF攻击
        $state = md5(uniqid(rand(), TRUE))."|".$source;
        $this->redis->setex($this->REDIS_PRE.strtoupper($type).":".$state,$this->REDIS_TIME,"1");
        //-------构造请求参数列表
        $keysArr = array(
            "response_type" => "code",
            "client_id" => $appid,
            "redirect_uri" => urlencode($callback),
            "state" => $state,
            "scope" => $scope,
        );
        $login_url =  $this->combineURL($setting[0]['GET_AUTH_CODE_URL'], $keysArr);
        header("Location:$login_url");
    }

    /**
     * wechat的callback回调方法
     */
    public function sina_callback($type="sina")
    {
        $DEBUG = FALSE;
        $CI = &get_instance();
        $CI->config->load('third_login');

        $state = $_GET['state'];
        $code = $_GET['code'];

        //--------验证state防止CSRF攻击
        if(!$state or $this->redis->get($this->REDIS_PRE.strtoupper($type).":".$state) != "1"){
            $this->debug($type.'第三方登陆失败,state.');
            //redirect($this->loginUrl,'location',301);
            exit($type);
        }

        if( ! isMobile())
        {
            $setting = $CI->config->item($type."_pc");
        }
        if( ! $setting){
            $setting = $CI->config->item($type);
        }

        $this->debug(__LINE__,$DEBUG);
        $CI->load->library("SinaThirdLogin","SINA");
        $this->debug(__LINE__,$DEBUG);
        if ($code) {
            $keys = array();
            $keys['client_id'] = $setting[0]['appid'];
            $keys['client_secret'] = $setting[0]['appkey'];
            $keys['grant_type'] = "authorization_code";
            $keys['code'] = $code;
            $keys['redirect_uri'] = $setting[0]['callback'];

            $this->debug(__LINE__,$DEBUG);
            $response = $this->oAuthRequest($setting[0]['GET_ACCESS_TOKEN_URL'], 'POST', $keys);

            $token = json_decode($response, true);

            if ( is_array($token) && !isset($token['error']) ) {
                //$this->access_token = $token['access_token'];
                //$this->refresh_token = $token['refresh_token'];
                $access_token =  $token['access_token'];
                $uid = $token['uid'];
                $this->redis->setex($this->REDIS_PRE.strtoupper($type).":ACCESS_TOKEN:".$state,$this->REDIS_TIME,$access_token);
            }
            $this->debug(__LINE__,$DEBUG);
        }else{
            echo("第三方登陆失败.inNoCodeFound<br>".__LINE__."<br>");
            $this->debug("第三方登陆失败".__LINE__);
            exit();
        }
        $this->debug(__LINE__,$DEBUG);

        if( ! $access_token)
        {
            //var_dump($keysArr);
            echo("<br>");
            echo("第三方登陆失败.inGetToken<br>".__LINE__."<br>");
            $this->debug("第三方登陆失败".__LINE__);
            exit();
        }else{
            $this->debug("第三方登陆成功".__LINE__);
        }
        $this->debug(__LINE__);

        if(isset($token["uid"]))
        {
            $this->redis->setex($this->REDIS_PRE.strtoupper($type).":OPENID:".$state,$this->REDIS_TIME,$token['uid']);
        }

        $user_info= $this->sina_get_userinfo($type);

        $this->debug($user_info);

        $user['openid'] = $access_token;
        $user['access_token'] = $uid;
        $user['image'] = isset($user_info["avatar_large"])?$user_info["avatar_large"]:"";
        $user['type'] = strtoupper($type);
        $user['nickname'] = isset($user_info["screen_name"])?$user_info["screen_name"]:$uid;

        $this->debug(__LINE__);
        $CI->load->model("User_model","user_model");
        $this->debug(__LINE__);
        $result = $CI->user_model->ThirdLogin($user);
        $this->debug(__LINE__);
        $this->dealWithOutput($result);
    }

    /**
     * 公共的获取openid函数
     * @param $type
     * @return mixed
     */
    public function sina_get_userinfo($type="sina")
    {
        $this->debug(__LINE__);
        $CI = &get_instance();
        $CI->config->load('third_login');
        $setting = $CI->config->item($type);

        $state = $_GET['state'];
        $code = $_GET['code'];

        //-------请求参数列表
        $keysArr = array(
            "access_token" => $this->redis->get($this->REDIS_PRE.strtoupper($type).":"."ACCESS_TOKEN:".$state),
            "uid"=> $this->redis->get($this->REDIS_PRE.strtoupper($type).":OPENID:".$state)
        );
        $this->debug($keysArr);
        $response = $this->oAuthRequest($setting[0]['GET_USERINFO_URL'], 'GET', $keysArr);
        $this->debug(__LINE__);
        //----检测错误是否发生
        if(strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos -1);
        }
        $this->debug(__LINE__);
        $user = json_decode($response,TRUE);
        $this->debug($user);
        $this->debug(__LINE__);
        return $user;
    }

    /**
     * 公共的获取openid函数
     * @param $type
     * @return mixed
     */
    public function get_openid($type)
    {
        $this->debug(__LINE__);
        $CI = &get_instance();
        $CI->config->load('third_login');
        $setting = $CI->config->item($type);

        $code = $_GET['code'];
        $state = $_GET['state'];

        //-------请求参数列表
        $keysArr = array(
            "access_token" => $this->redis->get($this->REDIS_PRE.strtoupper($type).":"."ACCESS_TOKEN:".$state)
        );
        $this->debug(__LINE__);
        if($type=="qq"){
            $graph_url = $this->combineURL($setting[0]['GET_OPENID_URL'], $keysArr);
        }
        else{
            $graph_url = $this->combineURL($setting[0]['GET_USERINFO_URL'], $keysArr);
        }
        $this->debug(__LINE__);
        $response = $this->get_contents($graph_url);
        $this->debug(__LINE__);
        //----检测错误是否发生
        if(strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos -1);
        }
        $this->debug(__LINE__);
        $user = json_decode($response);
        $this->debug(__LINE__);
        $this->debug($user);
        $this->debug(__LINE__);
        //------记录openid
        $this->debug(__LINE__);
        return $user;
    }

    /**
     * 公共的退出登录函数
     * @param $type
     */
    public function logout($type)
    {

    }

    /**
     * 检测是否登陆
     * @param $type,[qq,wechat,sina...]
     * @return string
     */
    public function check_login($type)
    {
        $state = $_GET['state'];
        $redis_state = $this->redis->get($this->REDIS_PRE.strtoupper($type).":".$state);
        if($state && $redis_state && $redis_state == "1")
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
    }

    //组合URL
    public function combineURL($baseURL,$keysArr){
        $combined = $baseURL."?";
        $valueArr = array();

        foreach($keysArr as $key => $val){
            $valueArr[] = "$key=$val";
        }

        $keyStr = implode("&",$valueArr);
        $combined .= ($keyStr);

        return $combined;
    }

    /**
     * get_contents
     * 服务器通过get请求获得内容
     * @param string $url       请求的url,拼接后的
     * @return string           请求返回的内容
     */
    public function get_contents($url)
    {
        if (ini_get("allow_url_fopen") == "1") {
            $response = file_get_contents($url);
        }else{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_POST,1);
            $response =  curl_exec($ch);
            curl_close($ch);
        }

        //-------请求为空
        if(empty($response)){
            echo '第三方登陆失败,inGetContents';
            //redirect($this->LoginUrl,'location',301);
            exit();
        }
        return $response;
    }

    /**
     * _call
     * 魔术方法，做api调用转发
     * @param string $name    调用的方法名称
     * @param array $arg      参数列表数组
     * @since 5.0
     * @return array          返加调用结果数组
     */
    public function __call($name,$arg){
        //如果APIMap不存在相应的api
        if(empty($this->APIMap[$name])){
            echo '获取资料出错,找不到：'.$name;
            //redirect($this->LoginUrl,'location',301);
            exit();
        }

        //从APIMap获取api相应参数
        $baseUrl = $this->APIMap[$name][0];
        $argsList = $this->APIMap[$name][1];
        $method = isset($this->APIMap[$name][2]) ? $this->APIMap[$name][2] : "GET";

        if(empty($arg)){
            $arg[0] = null;
        }

        //对于get_tenpay_addr，特殊处理，php json_decode对\xA312此类字符支持不好
        if($name != "get_tenpay_addr"){
            $response = json_decode($this->_applyAPI($arg[0], $argsList, $baseUrl, $method));
            $responseArr = $this->objToArr($response);
        }else{
            $responseArr = $this->simple_json_parser($this->_applyAPI($arg[0], $argsList, $baseUrl, $method));
        }


        //检查返回ret判断api是否成功调用
        if($responseArr['ret'] == 0){
            return $responseArr;
        }else{
            echo "<script>alert('第三方登陆失败')</script>";
            redirect('/','location',301);
        }

    }

    //调用相应api
    private function _applyAPI($arr, $argsList, $baseUrl, $method){
        $pre = "#";
        $keysArr = $this->keysArr;

        $optionArgList = array();//一些多项选填参数必选一的情形
        foreach($argsList as $key => $val){
            $tmpKey = $key;
            $tmpVal = $val;

            if(!is_string($key)){
                $tmpKey = $val;

                if(strpos($val,$pre) === 0){
                    $tmpVal = $pre;
                    $tmpKey = substr($tmpKey,1);
                    if(preg_match("/-(\d$)/", $tmpKey, $res)){
                        $tmpKey = str_replace($res[0], "", $tmpKey);
                        $optionArgList[$res[1]][] = $tmpKey;
                    }
                }else{
                    $tmpVal = null;
                }
            }

            //-----如果没有设置相应的参数
            if(!isset($arr[$tmpKey]) || $arr[$tmpKey] === ""){

                if($tmpVal == $pre){//则使用默认的值
                    continue;
                }else if($tmpVal){
                    $arr[$tmpKey] = $tmpVal;
                }else{
                    if($v = $_FILES[$tmpKey]){

                        $filename = dirname($v['tmp_name'])."/".$v['name'];
                        move_uploaded_file($v['tmp_name'], $filename);
                        $arr[$tmpKey] = "@$filename";

                    }else{
                        $this->error->showError("api调用参数错误","未传入参数$tmpKey");
                    }
                }
            }

            $keysArr[$tmpKey] = $arr[$tmpKey];
        }
        //检查选填参数必填一的情形
        foreach($optionArgList as $val){
            $n = 0;
            foreach($val as $v){
                if(in_array($v, array_keys($keysArr))){
                    $n ++;
                }
            }

            if(! $n){
                $str = implode(",",$val);
                $this->error->showError("api调用参数错误",$str."必填一个");
            }
        }

        if($method == "POST"){
            if($baseUrl == "https://graph.qq.com/blog/add_one_blog") $response = $this->urlUtils->post($baseUrl, $keysArr, 1);
            else $response = $this->urlUtils->post($baseUrl, $keysArr, 0);
        }else if($method == "GET"){
            $response = $this->urlUtils->get($baseUrl, $keysArr);
        }

        return $response;

    }

    //php 对象到数组转换
    private function objToArr($obj){
        if(!is_object($obj) && !is_array($obj)) {
            return $obj;
        }
        $arr = array();
        foreach($obj as $k => $v){
            $arr[$k] = $this->objToArr($v);
        }
        return $arr;
    }

    //简单实现json到php数组转换功能
    private function simple_json_parser($json){
        $json = str_replace("{","",str_replace("}","", $json));
        $jsonValue = explode(",", $json);
        $arr = array();
        foreach($jsonValue as $v){
            $jValue = explode(":", $v);
            $arr[str_replace('"',"", $jValue[0])] = (str_replace('"', "", $jValue[1]));
        }
        return $arr;
    }

    private function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
        {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }



    /**
     * Format and sign an OAuth / API request
     *
     * @return string
     * @ignore
     */
    function oAuthRequest($url, $method, $parameters, $multi = false) {

        if (strrpos($url, 'http://') !== 0 && strrpos($url, 'https://') !== 0) {
            $url = "{$this->host}{$url}.{$this->format}";
        }

        switch ($method) {
            case 'GET':
                $url = $url . '?' . http_build_query($parameters);
                return $this->http($url, 'GET');
            default:
                $headers = array();
                if (!$multi && (is_array($parameters) || is_object($parameters)) ) {
                    $body = http_build_query($parameters);
                } else {
                    $body = $this->build_http_query_multi($parameters);
                    $headers[] = "Content-Type: multipart/form-data; boundary=" . $this->boundary;
                }
                //var_dump($body);echo("<br>");var_dump($headers);echo("<br>");var_dump($url);echo("<br>");exit();
                return $this->http($url, $method, $body, $headers);
        }
    }

    /**
     * Make an HTTP request
     *
     * @return string API results
     * @ignore
     */
    function http($url, $method, $postfields = NULL, $headers = array()) {
        $this->http_info = array();
        $ci = curl_init();
        /* Curl settings */
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ci, CURLOPT_USERAGENT, $this->useragent);
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout);
        curl_setopt($ci, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_ENCODING, "");
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);
        if (version_compare(phpversion(), '5.4.0', '<')) {
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 1);
        } else {
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 2);
        }
        curl_setopt($ci, CURLOPT_HEADERFUNCTION, array($this, 'getHeader'));
        curl_setopt($ci, CURLOPT_HEADER, FALSE);

        switch ($method) {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                if (!empty($postfields)) {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
                    $this->postdata = $postfields;
                }
                break;
            case 'DELETE':
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if (!empty($postfields)) {
                    $url = "{$url}?{$postfields}";
                }
        }

        if ( isset($this->access_token) && $this->access_token )
            $headers[] = "Authorization: OAuth2 ".$this->access_token;

        if ( !empty($this->remote_ip) ) {
            if ( defined('SAE_ACCESSKEY') ) {
                $headers[] = "SaeRemoteIP: " . $this->remote_ip;
            } else {
                $headers[] = "API-RemoteIP: " . $this->remote_ip;
            }
        } else {
            if ( !defined('SAE_ACCESSKEY') ) {
                $headers[] = "API-RemoteIP: " . $_SERVER['REMOTE_ADDR'];
            }
        }
        curl_setopt($ci, CURLOPT_URL, $url );
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

        $response = curl_exec($ci);
        $this->http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        $this->http_info = array_merge($this->http_info, curl_getinfo($ci));
        $this->url = $url;

        if ($this->debug) {
            echo "=====post data======\r\n";
            var_dump($postfields);

            echo "=====headers======\r\n";
            print_r($headers);

            echo '=====request info====='."\r\n";
            print_r( curl_getinfo($ci) );

            echo '=====response====='."\r\n";
            print_r( $response );
        }
        curl_close ($ci);
        return $response;
    }

    /**
     * Get the header info to store.
     *
     * @return int
     * @ignore
     */
    function getHeader($ch, $header) {
        $i = strpos($header, ':');
        if (!empty($i)) {
            $key = str_replace('-', '_', strtolower(substr($header, 0, $i)));
            $value = trim(substr($header, $i + 2));
            $this->http_header[$key] = $value;
        }
        return strlen($header);
    }

    /**
     * @ignore
     */
    public static function build_http_query_multi($params) {
        if (!$params) return '';

        uksort($params, 'strcmp');

        $pairs = array();

        self::$boundary = $boundary = uniqid('------------------');
        $MPboundary = '--'.$boundary;
        $endMPboundary = $MPboundary. '--';
        $multipartbody = '';

        foreach ($params as $parameter => $value) {

            if( in_array($parameter, array('pic', 'image')) && $value{0} == '@' ) {
                $url = ltrim( $value, '@' );
                $content = file_get_contents( $url );
                $array = explode( '?', basename( $url ) );
                $filename = $array[0];

                $multipartbody .= $MPboundary . "\r\n";
                $multipartbody .= 'Content-Disposition: form-data; name="' . $parameter . '"; filename="' . $filename . '"'. "\r\n";
                $multipartbody .= "Content-Type: image/unknown\r\n\r\n";
                $multipartbody .= $content. "\r\n";
            } else {
                $multipartbody .= $MPboundary . "\r\n";
                $multipartbody .= 'content-disposition: form-data; name="' . $parameter . "\"\r\n\r\n";
                $multipartbody .= $value."\r\n";
            }

        }

        $multipartbody .= $endMPboundary;
        return $multipartbody;
    }

}