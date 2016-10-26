<?php
 namespace Home\Model;
/**
 * 短信
 */
use Think\Model;
class SmsModel extends BaseModel  {
    public function addSms($data){
        $m = M('sms');
        return $m->add($data);
    }
    public function addSmsResult($data){
        $m = M('sms_result');
        return $m->add($data);
    }

    /**
     * 查询短信
     */
    public function checkSmsVerify($telnum,$verify){
        $m = M('sms_verify');
        $condition['telnum'] = $telnum;
        $condition['verify'] = $verify;
        return $m->where($condition)->find();
    }

};
?>