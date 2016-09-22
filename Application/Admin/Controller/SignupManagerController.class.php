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
        $signupdata = array();
        $signupdata['title'] = $title;
        $signupdata['status'] = "draft";//草稿专题
        $signupdata['begin_date'] = $begin_date;
        $signupdata['end_date'] =$end_date;
        $signupdata['create_date'] = date('Y-m-d H:i:s',time());
        $signupdata['update_date'] = date('Y-m-d H:i:s',time());

        //写入报名主题表
        $signup = D('Signup');
        $signupinfo = $signup->add($signupdata);
        //写入模板
        $html='<form>';
        $html.='<p>姓名<input type="text" name="name"/></p>';
        $html.='<p>手机<input type="text" name="phone"/></p>';
        $html.='<p>小区<input type="text" name="area"/></p>';
        $html.='</form>';
        //写成html文件
        $filedir=APP_PATH.'/Home/View/Signup/';
        $filename="Signup_".$signupinfo.".html";
        $fp=fopen($filedir.$filename,"w");
        fwrite($fp,$html);
        fclose($fp);
        echo "<script>alert('文件写入成功');</script>";

        //更新URL地址和状态
        $signupdataUp['status'] = 'normal';
        $signupdataUp['url'] = 'http://www.test3.cm/?c=Signup&a=detail&menuid='.$signupinfo;
        $signup->updateByID($signupinfo,$signupdataUp);
        $this->display();
	}
}