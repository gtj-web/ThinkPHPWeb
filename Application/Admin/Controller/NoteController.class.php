<?php 
// 声明命名空间
namespace Admin\Controller;
// 引入父类
// use Think\Controller;

/**
 * 
 */
class NoteController extends CommonController
{
	// 展示界面添加文章页
	public function postAdd(){
		// 判断是否是post提交，是则处理数据--不是则展示界面
		if(IS_POST){
			// 接受数据
			$post = I('post.');
			// 设置时间
			$post['publishTime'] = date('Y-m-d H:i:s',time());
			// 设置点击次数
			$post['clickNum'] = 0;
			// 设置删除状态
			$post['deleteM'] = 0;
			// dump($post);
			// 实例化对象
			$model = M('Note');
			// 执行添加函数
			$res = $model -> add($post);
			// dump($res);die;
			if($res){
				$this -> success('添加成功',U('postList'),2);
			}
			else{
				$this -> error('添加失败');
			}

		}
		else{
			$this -> display();
		}
		
	}

	// 展示文章列表页
	public function postList(){
		// 实例化对象
		$model = M('note');
		//分页第一步：查询总数
		$count = $model -> count();
		// 分页第二步:实例化分页类，传递相关参数
		$page = new \Think\Page($count,10);//第一个参数是总数量，第二个是展示几个
		// 分页第三步：可选步骤定义提示文字
		$page -> rollPage = 3;//分页栏，每页显示三个
		$page -> lastSuffix = false; // 最后一页是否显示总页数--不显示
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('first','首页');
		$page -> setConfig('last','末页');
		// 分页第四步：使用show方法生成url--html字符串
		$show = $page -> show();
		// 分页第五步：展示数据
		$data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
		// 分页第六步：传递给模板
		$this -> assign('show',$show);
		$this -> assign('data',$data);
		// 展示页面
		$this -> display();

	}

	// 删除方法
	public function delete(){
		// 接收参数
		$id = I('get.id');
		$flag = I('get.flag');
		dump($flag);
		// 实例化模型进行假删除
		$model = M('note');
		// 判断用户点击的是删除还是展示按钮
		if($flag==0){
			$data['deleteM'] = 1;
		}
		else{
			$data['deleteM'] = 0;
		}
		
		$res = $model -> where("id = $id") -> save($data);
		// dump($res);die;
		if($res){
			// 前天跳转界面
			$url = U("Note/postList");
			echo "<script>window.location.href='$url'</script>";
			// echo "<script>window.location.href='$url'</script>";
		}

	}

	// 编辑方法
	public function postEdit(){
		// 判断是否是post提交-是则处理数据-不是则展示当前页面-及对应数据
		if(IS_POST){
			// 获取数据
			$post = I('post.');
			$id = I('get.id');
			// dump($id);die;
			// 更新时间
			$post['publish'] = date('Y-m-d H:i:s',time());
			// 实例化模型
			$res = M('note') -> where("id = $id") -> save($post);
			if($res){
				$this -> success('修改成功',U('Note/postList'));
			}
			else{
				$this -> error('修改失败');
			}
		}
		else{
			// 接收数据
			$id = I('get.id');
			dump($id);
			// 获取当前数据
			$data = M('note') -> find($id);

			// dump($data);die;
			// 分配变量
			$this -> assign('data',$data);
			$this -> display();
		}
		
	}


	
}