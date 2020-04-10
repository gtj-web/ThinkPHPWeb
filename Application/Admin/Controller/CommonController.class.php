<?php 
// 命名空间
namespace Admin\Controller;
// 引入父类
use Think\Controller;

/**
 * 
 */
class CommonController extends Controller
{
	
	// 使用thinkPHP封装的构造函数，不需要构造父类
	// 构造方法
	// public function __construct(){
	// 	// 构造父类
	// 	parent::__construct();
	// 	echo '你好世界';
	// }

	// ThinkPHP提供
	public function _initialize(){
		// 先判断session是否存在
		if(empty(session('account'))){
			// 不存在则跳转界面
			// echo '清先登录';
			// 前端跳转页面
	    	$url = U('Login/login');
	    	// 直接输出js字符串
	    	echo "<script>window.location.href='$url'</script>";
			// $this -> error('请先登录',U('Login/login'),2);
		}
		else{
			// 传输用户信息
	    	// 分配变量
	    	$arr = array(
	    		'avatar' => session('avatar'),
	    		'nickname' => session('nickname'),
	    	);
	    	// dump($arr);die;
	    	$this -> assign($arr);
		}
	}

	// 退出功能
    public function leave(){
    	// 删除session
    	session(null);
    	// 跳转界面
    	$this -> success('退出成功',U('Login/login'));


    }
}