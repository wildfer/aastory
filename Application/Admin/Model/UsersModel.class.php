<?php
 namespace Admin\Model;
/**
 * 会员服务类
 */
use Think\Model;
class UsersModel extends BaseModel {
		 /**
	  * 获取指定对象
	  */
     public function getByLogin(){
	 	$m = M('users');
	 	$condition= array();
	 	$condition['user_login'] = I('user_login');
		$condition['user_status'] = 0;
		return $m->where($condition)->find();
	 }

	/**
	  * 获取指定对象
	  */
     public function getByLoginAll(){
	 	$m = M('users');
	 	$condition= array();
	 	$condition['user_login'] = I('user_login');
		return $m->where($condition)->find();
	 }
	 /**
	  * 获取指定对象
	  */
     public function getByPhone(){
	 	$m = M('users');
	 	$condition= array();
	 	$condition['user_phone'] = I('user_phone');
		return $m->where($condition)->find();
	 }
    /**
	  * 新增
	  */
	 public function add($data){
	 	$m = M('users');
		return $m->add($data);
	 } 
	 /**
	  * 新增属性
	  */
	 public function addmeta($data){
	 	$m = M('usermeta');
		return $m->add($data);
	 }
	 /*返回管理员列表*/
	 public function getAdminArr(){
	 	return M()->query("SELECT a.`user_login`,a.`user_phone`,a.`user_nicename`,a.`user_email`,c.`title`,a.`user_registered` 
			FROM aas_users  a 
			INNER JOIN aas_usermeta b ON  b.meta_key = 'admin_group_admin' AND a.id = b.`user_id`
			INNER JOIN aas_admin_group c ON b.`meta_value` = c.`gid`");
		
	 }

    /**
     * 获取用户
     */
    public function getByUserByID($userID=0){
        $m = M('users');
        $condition= array();
        $condition['id'] = $userID;
        return $m->where($condition)->find();
    }
    /**
     * 获取用户
     */
    public function getByUser($user=0){
        $m = M('users');
        $condition= array();
        $condition['user_login'] = $user;
        return $m->where($condition)->find();
    }
};
?>