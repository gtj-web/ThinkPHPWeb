<?php 
// 声明命名空间
namespace Admin\Model;
// 引入父类
use Think\Model;
// 声明并且继承父类
class MusicModel extends Model{

	// saveData 上传音乐文件
	public function saveData($post,$file){
		// 判断文件上传成功
		if($file['error'] == '0'){
			// 定义文件上传路径
			$cfg = array(
				'rootPath'      =>  WORKING_PATH . UPLOAD_ROOT_PATH, 
			);
			// 声明类
			$upload = new \Think\Upload($cfg);
			// 开始上传
			$info = $upload -> uploadone($file);
			// dump($info);
			$post['musicRoute'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
			$post['state'] = '0';
			// dump($post);die;

		}
		return $this -> add($post);
	}

	// 修改音乐信息
	public function changeMusic($post,$file){
		// 判断文件上传成功--修改音乐路径
		if($file['error'] == '0'){
			// 定义文件上传路径
			$cfg = array(
				'rootPath'      =>  WORKING_PATH . UPLOAD_ROOT_PATH, 
			);
			// 声明类
			$upload = new \Think\Upload($cfg);
			// 开始上传
			$info = $upload -> uploadone($file);
			// dump($info);  -- 获取文件路径存储到数据库
			$post['musicRoute'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
			
			// dump($post);die;
			

		}
		// 如果用户没有上传文件直接修改
		return $this -> where('id=' . $post['id']) -> save($post);
		
	}

}