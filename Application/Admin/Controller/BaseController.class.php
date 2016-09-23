<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	public $userInfo = null;
	public $uid = null;
	public $order_status = array();
	public function _initialize(){
        $this->init_user();
        $this->initRules();
        $this->initAllrules();
        $this->checkRules();
	}
	//验证用户
	private function init_user() {
        //是否已经登陆
        if(!in_array(ACTION_NAME,explode(',',"login,initLogin,verify"))){
            $this->uid = cookie('aastory_admin_id');
            if ($this->uid) {
                $user = D('Admin');
                $this->userInfo = $user->getByUserByID($this->uid);
                $assign = array(
                    'uid' => $this->uid,
                    'userInfo' => $this->userInfo,
                );
                $this->assign($assign);
            } else {
                $this->redirect("Index/login");
            }
        }
	}
	/*初始化所有菜单*/
	private function initAllrules(){
		$rule = D('Rules');
		$rules = $rule->getrules(0);

		foreach ($rules as $k => $v) {
			$chilrenLV_1 =  $rule->getrules($v['id']);
			if ( $chilrenLV_1 ) {
				foreach ($chilrenLV_1 as $kk => $vv) {
					$chilrenLV_2 = $rule->getrules($vv['id']);
					if ($chilrenLV_2) {
						foreach ($chilrenLV_2 as $kkk => $vvv) {
							$chilrenLV_3 = $rule->getrules($vvv['id']);
							$chilrenLV_2[$kkk]['children'] = $chilrenLV_3;
						}
					}
					$chilrenLV_1[$kk]['children'] = $chilrenLV_2;
				}
			}
			$rules[$k]['children'] = $chilrenLV_1;
		}
		$this->assign('rules',$rules);
	}
	/*组装目前使用的菜单*/
	private function initRules(){
		$rule = D('Rules');
		$this->assign('leftPid',$rule->getTopNavID(I('get.menuid'))['id']);	
		$this->assign('menuid',I('get.menuid'));
	}
	/*核实使用权限*/
    public function checkRules()
    {
        //$this->error('您没有足够的权限','/');
        $rule = D('Rules');
        $groupRules = $rule->getAdminGroupByGid($this->userInfo['gid']);
        /*超级管理员*/
        if ($groupRules['rules']=='ALL'){
            return true;
        }
        $rules = explode(',', $groupRules['rules']);
        $menuid = I('get.menuid');
        //echo "<script>alert('test1'+$menuid));</script>";
        if (empty($menuid)){
            return false;
        }else if (in_array($menuid,$rules)){
            return true;
        }else{
            $this->error('您没有足够的权限','/admin.php');
        }
    }
}
