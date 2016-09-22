<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
		$this->display("Index/index");
	}
    /*登陆*/
    function login(){
        $name=I('name');
        $password=I('password');
        $user = D('Admin');
        if (!$name){
            $this->display("Index/login");
            exit;
        }
        $userdata = $user->getByLogin($name);
        //验证用户名密码
        //$memory = 3600*24*7; // 保持记录一个礼拜
        if($userdata && $userdata['user_pass'] == md5($password . '^' . $userdata['user_activation_key'])) {
            cookie('aastory_admin_id',$userdata['id']);
            cookie('astory_admin_auth', authcode($userdata['id'] . "\t" . $userdata['user_pass'] . "\t" . get_client_ip(). "\t" . 'web', 'ENCODE'));

            $userInfo = $user->getByUserByID($userdata['id']);
            $this->uid = $userdata['id'];
            $assign = array(
                'uid' =>$userdata['id'],
                'userInfo' => $userInfo,
            );
            $this->assign($assign);
            //$this->success('登录成功', 'Index/index');
            //$this->redirect("");
            $this->redirect('Index/index');
        }else{
            $this->assign('errormsg','无效的用户');
            $this->display("Index/login");
        }
    }
    function logout(){
        cookie('astory_admin_auth', null);
        cookie('aastory_admin_id',null);
        $this->display("Index/login");
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