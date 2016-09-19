<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
		$this->display("Index/login");
	}
	public function initLogin(){
        $this->display("Index/login");
    }
    /*登陆*/
    function login(){


        $data['status']  = true;
        $this->uid = cookie('uid');
        if ($this->uid) {
            $data['status']  = true;
            $this->ajaxreturn($data);
            exit;
        }



        $name=I('name');
        $password=I('password');
        $user = D('Users');
        $userdata = $user->getByUser($name);

        //验证用户名密码
        $memory = 3600*24*7; // 保持记录一个礼拜
        if($userdata && $userdata['user_pass'] == md5($password . '^' . $userdata['user_activation_key'])) {
            cookie('uid',$userdata['id'], $memory);
            cookie('auth', authcode($userdata['id'] . "\t" . $userdata['user_pass'] . "\t" . get_client_ip(). "\t" . 'web', 'ENCODE'), $memory);
                            $data['status']  = false; $data['content'] = '无效的用户名或密码2。';
                $this->ajaxreturn($data);
                exit;
        }else{
            $data['status']  = false;
            $data['content'] = '无效的用户名或密码。';
            $this->ajaxreturn($data);
            exit;
        }
        $this->ajaxreturn($data);
    }
    function logout(){
        cookie('auth', null);
        cookie('uid',null);
        $this->display("Index/index");
    }
    function verify(){
        $config =    array(
            'fontSize'    =>    50,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}