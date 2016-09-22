<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController {
	function index() {
		$user = D('Admin');
		$adminArr = $user->getAdminArr();
		$this->assign('adminArr',$adminArr);
		$this->display("index");
	}
	function initAdd(){
		$rule = D('Rules');
		/*获取权限列表*/
		$grouplist = $rule->getAdminGroup();
		$this->assign('grouplist',$grouplist);
		$this->display("add");
	}
	function add(){
        $userlogin=I('user_login');
        $userPhone=I('user_phone');
        $gid = I('groupgid');
        $usernicename=I('realname');
        $pass=I('pass');
        /*插入管理员表*/
        $user = D('Admin');
		if ($user->getByLogin($userlogin)){
			$this->error("用户已经存在");	
		}
		if ($user->getByPhone($userPhone)){
			$this->error("号码已经被使用");	
		}
		/*插入用户表*/
		$userdata= array();
		$userdata['user_login'] =$userlogin;
		$userdata['user_phone'] = $userPhone;
		$userdata['user_nicename'] = $usernicename;
        $userdata['gid'] = $gid;

		if(I('pass')) {
			$userdata['user_activation_key'] = substr(md5($pass . time()), 5, 5);
			$userdata['user_pass'] = md5($pass . '^' . $userdata['user_activation_key']);
		}
		$userdata['user_registered'] = date('Y-m-d H:i:s',time());
		$userinfo = $user->add($userdata);

		$adminArr = $user->getAdminArr();
		$this->assign('adminArr',$adminArr);
		$this->redirect("index", array('menuid'=>I('get.menuid')));
	}
}