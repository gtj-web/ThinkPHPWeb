<?php 
// 声明命名空间
namespace Admin\Controller;

/**
 * 继承公共类，需要验证用户登录
 */
class MusicController extends CommonController
{  
	// 展示音乐添加页面 
	public function musicAdd(){
		// 判断是否是post请求
		if(IS_POST){
			// 接收post请求数据
			$post = I('post.');
			// 实例化模型
			$model = D('music');
			// 实例化模型
			dump($_FILES['music']);
			$res = $model -> saveData($post,$_FILES['music']);
			
			if($res){
				$this -> success('上传成功',U('musicList'));
			}
			else{
				$this -> error('上传失败');
			}
		}
		else{
			$this -> display();
		}
		
	}

	// 展示音乐列表页
	public function musicList(){

		// 实例化模型
		$model = M('Music');
		// 分页第一步：查询总数
		$count = $model -> count();
		// 分页第二步：实例化分页类，传递参数
		$page = new \Think\Page($count,3);//第一个参数是总数，第二个是展示几个
		// 分页第三步：可选步骤，定义提示文字
		$page -> rollPage = 3;// 分页栏每页显示的页数
		$page -> lastSuffix = false; // 最后一页是否显示总页数--不显示
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('first','首页');
		$page -> setConfig('last','末页');
		// 分页第四步：使用show方法生成url
		$show = $page -> show();
		// 分页第五步：展示数据；
		$data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
		// dump($data);die;
		// 分页第六步：传递给模板
		$this -> assign('show',$show);
		$this -> assign('data',$data);
		// 分页第七步：展示模板
		$this -> display();
	}

	// 编辑音乐信息
	public function musicEdit(){
		// 判断是否为post请求
		if(IS_POST){
			// 接收数据
			$post = I('post.');
			// 实例化对象
			$model = D('music');
			// dump($post);
			// dump($_FILES['music']);

			// 修改
			$res = $model -> changeMusic($post,$_FILES['music']);
			// dump($res);die;
			if($res){
				$this -> success('修改成功',U('Music/musicList'));
			}
			else{
				$this -> error('修改失败');
			}
		}
		else{
			// 实例化对象
			$model = M('music');
			// 查询数据
			$data = $model -> find(I('get.id'));
			// 分配变量
			$this -> assign('data',$data);
			$this -> display();
		}
	}
	
}