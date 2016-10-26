<?php
namespace Home\Controller;
use Think\Controller;
class SignupController extends BaseController {
    function sendSms($telnum,$template,$param)
    {
        import('Vendor.taobao-sdk-PHP-sms.TopSdk', '', '.php');
		$AliDaYuAppKey = C('ALIDAYU_API_APPKEY');
		$AliDaYuSecret = C('ALIDAYU_API_SECRET');

        $c = new \TopClient;
        $c->appkey = $AliDaYuAppKey;
        $c->secretKey = $AliDaYuSecret;
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        //$req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("签名测试");
        //$req->setSmsParam("{\"code\":\"1234\"}");
        //$req->setSmsParam($param);
        $req->setSmsParam(json_encode($param));
        $req->setRecNum($telnum);
        $req->setSmsTemplateCode($template);
        $resp = $c->execute($req);

        $sms = D('Sms');
        $data['telnum']=$telnum;
        $data['sms_template_code']=$template;
        $data['text']=json_encode($param);
        $data['status']='0';
        $data['msg']=$resp;
        $data['create_date']= date('Y-m-d H:i:s',time());
        $sms->addSmsResult($data);

    }
    function index() {
		$this->display("index");
	}
    function detail() {
        $menuid=I('get.menuid');
        $this->display("Signup_".$menuid);
    }
	/*报名*/
    function add(){
        $user = D('Users');
        if ($user->getByLoginAll()){
            $this->error("用户已经存在");
        }
        if ($user->getByPhone()){
            $this->error("号码已经被使用");
        }
        /*插入用户表*/
        $userdata= array();
        $userdata['user_login'] = I('user_login');
        $userdata['user_phone'] = I('user_phone');
        $userdata['user_nicename'] = I('realname');
        $userdata['user_email'] = I('email');

        if(I('pass')) {
            $userdata['user_activation_key'] = substr(md5(I('pass') . time()), 5, 5);
            $userdata['user_pass'] = md5(I('pass') . '^' . $userdata['user_activation_key']);
        }
        $userdata['user_registered'] = date('Y-m-d H:i:s',time());

        $userinfo = $user->add($userdata);
        //插入用户附加属性
        $usermetadata = array();
        $usermetadata['user_id'] = $userinfo;
        $usermetadata['meta_key'] = 'admin_group_admin';//管理员属性
        $usermetadata['meta_value'] = I('groupgid');
        $user->addmeta($usermetadata);

        $adminArr = $user->getAdminArr();
        $this->assign('adminArr',$adminArr);
        $this->redirect("index", array('menuid'=>I('get.menuid')));
    }

    /*发送短信*/
    function sendSmsverify(){
        $telnum = I('phone');
        $sms_code=rand(1000,9999);
        $param = array("code" => ''.$sms_code);
        $this->sendSms(''.$telnum, 'SMS_16095304',$param);
        //sendSms($telnum, 'SMS_16095304',$sms_code);

        $this->ajaxreturn();
        exit;
        //$this->ajaxreturn();
    }
    /*验证手机短信,并更新结果用户*/
    function checkSmsverify(){
        $callback = isset($_GET['callback']) ? trim($_GET['callback']) : ''; //jsonp回调参数，必需
        $telnum = I('mobilephone');
        $mobilecode = I('mobilecode');
        $checkSms = D('Sms');
        //验证码错误
        if($checkSms->checkSmsVerify($telnum,$mobilecode)){
            $arr = array ('msg'=>'sucess');
        }else{
            $arr = array ('msg'=>'error');
        }
        $jsonResult= json_encode($arr);
        echo $callback . '(' . $jsonResult .')';  //返回格式，必需
    }
	
}