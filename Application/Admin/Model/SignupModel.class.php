<?php
 namespace Admin\Model;
/**
 * 报名
 */
use Think\Model;
class SignupModel  {
  	/*获取报名列表*/
	public function getsignupArr(){
		$m = M('signup');
		return $m->order('id ')->select();
	}
    /**
     * 新增
     */
    public function add($data){
        $m = M('signup');
        return $m->add($data);
    }

    /**
     * 更新
     */
    public function updateByID($signupid,$data){
        $m = M('signup');
        $condition['id'] = $signupid;
        return $m->where($condition)->setField($data);
    }
};
?>