<?php
 namespace Admin\Model;
/**
 * 报名
 */
use Think\Model;
class GameTrModel  {
	public function getGameTr(){
		$m = M('zzz_gametr');
		return $m->select();
	}
    public function add($data){
        $m = M('zzz_gametr');
        return $m->add($data);
    }
};
?>