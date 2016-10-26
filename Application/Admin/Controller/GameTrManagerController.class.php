<?php
namespace Admin\Controller;
use Think\Controller;
class GameTrManagerController extends BaseController {
	function index() {
		$gametr = D('GameTr');
        $gametrattr = $gametr->getGameTr();
		$this->assign('gametrattr',$gametrattr);
		$this->display("index");
	}
	function initAdd(){
		$this->display("add");
	}
	function add(){
        $gametr = D('GameTr');
        $prizename = I('prizename');
        $prizeurl = I('prizeurl');
        $num = I('num');
        $prizeangle = I('prizeangle');

        $data = array();
        $data['prizename'] = $prizename;
        $data['prizeurl'] = $prizeurl;
        $data['num'] = $num;
        $data['prizeangle'] = $prizeangle;
        $gametr->add($data);
        $this->display();
	}
}