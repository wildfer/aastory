<?php
namespace Admin\Controller;
use Think\Controller;
class RulesController extends BaseController {
	function index() {
		$this->display("index");
	}
	/*主菜单*/
	function doWork(){
		// $this->assign('leftPid',I('get.menuid'));
		$this->display("Rules/index");
	}
	/*子菜单*/
	function detail(){
		/*获取顶级菜单*/
		// $rule = D('Rules');
		// $this->assign('leftPid',$rule->getTopNavID(I('get.menuid'))['id']);
		// $this->assign('menuid',I('get.menuid'));
		$this->display("Rules/index");
	}

    function indexGroup() {
        /*获取权限列表*/
        $rule = D('Rules');
        $grouplist = $rule->getAdminGroup();
        $this->assign('grouplist',$grouplist);
        $this->display("groupIndex");
    }
	/*增加时初始化菜单*/
	function initAddGroup(){
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
        $this->display("Rules/groupAdd");
    }
    /*增加角色*/
    function addGroup(){
        $data['title'] = I('title');
        if (!empty(I('ids'))) {
            $data['rules'] = implode(',', I('ids'));
        }
        $rule = D('Rules');
        $groupID = $rule->addAdminGroup($data);
       // $this->redirect("Index/index");
        $this->success("增加成功");
    }
}