<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LoginAuth
{

    //需要忽略的
    private $admin_ignore_list = array(
        array('controller' => 'admin', 'method' => 'getValidateCode'),
        array('controller' => 'admin', 'method' => 'index'),
        array('controller' => 'admin', 'method' => 'login')
    );

    private $api_ignore_list = array();

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
    }

    /**
     * @desc 权限过滤器
     */
    public function filter()
    {

        $directory = strtolower(substr($this->CI->router->fetch_directory(), 0, -1));
        $controller = $this->CI->router->fetch_class();
        $function = $this->CI->router->fetch_method();
        switch ($directory){
            case 'admin':
                $this->adminFilter($directory,$controller,$function);
                break;
            default:
                $this->appFilter($directory,$controller,$function);
                break;
        }
        return true;
    }


    protected function adminFilter($directory, $controller, $function)
    {
        foreach ($this->admin_ignore_list as $value) {
            if ($value['controller'] == $controller && $value['method'] == $function) {
                return true;
            }
        }

        $admin = $this->CI->session->userdata(ADMIN_SESS);
        if (empty($admin)) {
            redirect(base_url('admin/admin/index'), '', 301);
        }
        return true;
    }

    protected function appFilter($directory, $controllr, $function)
    {

    }
}

/* End of file login_auth.php */
/* Location: ./application/hooks/login_auth.php */