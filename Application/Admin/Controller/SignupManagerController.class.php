<?php
namespace Admin\Controller;
use Think\Controller;
class SignupManagerController extends BaseController {
	function index() {
		$signup = D('Signup');
		$signupArr = $signup->getsignupArr();
		$this->assign('signupArr',$signupArr);
		$this->display("index");
	}
	function initAdd(){
		$this->display("add");
	}
    function check(){
        $signup_title=I('signup_title');

        $data['status']  = true;
        $data['content'] = $signup_title;
        $this->ajaxreturn($data);
    }
	function add(){
        $title = I('signup_title');
	    $begin_date = I('begin_date');
        $end_date = I('begin_date');
        $user_select = I('username_select');
        $user_need = I('username_need');
        $phone_select = I('phone_select');
        $phone_need = I('phone_need');



        var_dump($title);
        var_dump($begin_date);
        var_dump($user_select);
        var_dump($user_need);
        var_dump($phone_select);
        var_dump($phone_need);
        var_dump(date('Y-m-d H:i:s',time()));



        $signupdata = array();
        $signupdata['signup_title'] = I('signup_title');
        $signupdata['begin_date'] = I('begin_date');
        $signupdata['end_date'] = I('end_date');
        $signupdata['create_date'] = date('Y-m-d H:i:s',time());
        $signupdata['update_date'] = date('Y-m-d H:i:s',time());

        //写入报名主题表
//        $signup = D('Signup');
//        $signupinfo = $signup->add($signupdata);

        //写入模板

        $html='<form>';
        $html.='<p>姓名<input type="text" name="name"/></p>';
        $html.='<p>手机<input type="text" name="phone"/></p>';
        $html.='<p>小区<input type="text" name="area"/></p>';
        $html.='</form>';



//        //判断今天的文件夹是否存在
//        if (!is_dir(getdatetime())) {
//            //如果不存在就建立
//            mkdir(getdatetime(),0777);
//        }

//写成html文件
        $filedir="";
        $filename="eeeeeeeeee.html";
        $fp=fopen("E:\aaaaaaaaaaa.html","w");
        fwrite($fp,$html);
        fclose($fp);
        echo "<script>alert('文件写入成功');</script>";


        $this->display();
//
//		$signup = D('Signup');
//		/*插入用户表*/
//		$signupdata= array();
//        $signupdata['signup_title'] = I('signup_title');
////        $signupdata['username_select'] = I('username_select');
////        $signupdata['username_need'] = I('username_need');
////        $signupdata['phone_select'] = I('phone_select');
////        $signupdata['phone_need'] = I('phone_need');
//
//        $signupdata['begin_date'] = I('begin_date');
//        $signupdata['end_date'] = I('end_date');
//        $signupdata['create_date'] = date('Y-m-d H:i:s',time());
//        $signupdata['update_date'] = date('Y-m-d H:i:s',time());
//
//		$userinfo = $signup->add($signupdata);
//		//插入用户附加属性
//		$usermetadata = array();
//		$usermetadata['user_id'] = $userinfo;
//		$usermetadata['meta_key'] = 'admin_group_admin';//管理员属性
//		$usermetadata['meta_value'] = I('groupgid');
//		$user->addmeta($usermetadata);
//
//		$adminArr = $user->getAdminArr();
//		$this->assign('adminArr',$adminArr);
//		$this->redirect("index", array('menuid'=>I('get.menuid')));
	}
}