<?php
// 声明命名空间--为admin目录下的
namespace Admin\Controller;
// use Think\Controller;
class IndexController extends CommonController {
	// 展示页面，展示当前用户信息
    public function index(){
    	// 获取评论数量
    	$com = M('Comment') -> where('CommentState = 0') -> count();
    	// 获取音乐数量
    	$mus = M('musicmes') -> count();
    	// 获取评论数量
    	$note = M('note') -> where('deleteM = 0') -> count();
    	// 分配变量
    	$arr = array(
    		'com' => $com,
    		'mus' => $mus,
    		'note' => $note
    	);
    	// dump($arr);die;
    	$this -> assign($arr);
        // 展示后台首页
        $this -> display();
    }

    

}