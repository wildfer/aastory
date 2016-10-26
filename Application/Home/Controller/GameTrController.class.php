<?php
namespace Home\Controller;
use Think\Controller;
class GameTrController extends BaseController {
	function index() {
		$this->display();
	}
    function begin(){

        $lotteryId = I("lotteryId");
        /*根据活动配置抽取奖品*/
        /*返回奖品信息*/








        $data[isGetPrize] = true;//是否获得奖品
        $data[prizeName] = '奖品名称';//奖品名称
        $data[prizeUrl] = "www.baidu.com";//奖品地址
        $data[angle] = 45;//奖品角度
        $data = json_encode($data);
        echo $data;
    }
    /*发送短信*/
    function send_smsverify(){
        $callback = isset($_GET['callback']) ? trim($_GET['callback']) : ''; //jsonp回调参数，必需
        $telnum = I('mobilephone');
        $sms_code=rand(1000,9999);

        $data[telnum] = $telnum;
        $data[sms_template_code] = 'SMS_16095304';
        $data[text] = $sms_code;
        $data[create_date] = date('Y-m-d H:i:s',time());

        $sendSms = D('Sms');
        $sendSms->addSms($data);
        //$arr = array ('telnum'=>$telnum,'sms_code'=>$sms_code);
        $arr = array ('msg'=>'sucess');
        $tmp= json_encode($arr);
        echo $callback . '(' . $tmp .')';  //返回格式，必需
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
    /*创建验证码和用户中奖信息*/
    function createSmsverify(){
        /*插入短信表*/
        $generate_code=rand(1000,9999);
        /*插入奖品用户表*/

    }



}