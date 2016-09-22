<?php
 namespace Admin\Model;
/**
 * 会员服务类
 */
use Think\Model;
class AdminModel extends BaseModel {
    /*返回管理员列表*/
    public function getAdminArr(){
        return M()->query("SELECT a.`user_login`,a.`user_phone`,a.`user_nicename`,c.`title`,a.`user_registered` 
			FROM aas_admin_member  a 
			INNER JOIN aas_admin_group c ON a.gid = c.`gid`");

    }
    /* 获取指定用户*/
    public function getByLogin($userlogin){
        $m = M('admin_member');
        $condition= array();
        $condition['user_login'] = $userlogin;
        return $m->where($condition)->find();
    }
    /* 获取指定用户*/
    public function getByPhone($userPhone){
        $m = M('admin_member');
        $condition= array();
        $condition['user_phone'] = $userPhone;
        return $m->where($condition)->find();
    }
    /*新增 */
    public function add($data){
        $m = M('admin_member');
        return $m->add($data);
    }

};
?>