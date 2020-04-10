<?php
// 声明命名空间--为admin目录下的
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {

    // 展示登录页
    public function login(){
    	// 判断如果是post请求处理数据--否则展示页面
    	if(IS_POST){
    		$post = I('post.');
    		// dump($post);
    		// 实例化模型
    		$model = M('Users');
    		// 执行查询语句
    		$res = $model -> where("account = '{$post['account']}' and password = '{$post['password']}'") -> find();
    		// dump($res);
    		// 定义session存储用户信息

    		if($res){
    			// 存储用户名
    			session('account',$res['account']);
    			// 存储用户头像
    			session('avatar',$res['avatar']);
    			// 存储用户昵称
    			session('nickname',$res['nickname']);
    			// 存储用户格言
    			session('autograph',$res['autograph']);
    			// dump(session());die;
    			$this -> success('登录成功',U('Index/index'),3);
    		}
    		else{
    			$this -> error('登录失败');
    		}
    	}
    	else{
    		$this -> display();
    	}
    	
    }

    // 获取用户头像地址
    public function getImg(){
    	// 接收数据
    	$post = I('post.name');
    	// 实例化模型
    	$res = M('Users') -> where("account = '{$post}'") -> find();
    	// 当查询到时返回对应的图片地址
    	if($res){
    		echo $res['avatar'];
    	}
    	// 未查到时返回默认图片
    	else{
    		echo '/Public/img/default.png';
    	}
	}
		

}