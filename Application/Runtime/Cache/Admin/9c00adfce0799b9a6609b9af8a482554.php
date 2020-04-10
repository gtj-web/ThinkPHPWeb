<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>添加音乐</title>
  <link rel="stylesheet" href="/Public/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/Public/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/Public/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/Public/Admin/css/admin.css">
  <script src="/Public/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './public/navbar.php' ?>
    <nav class="navbar">
  <button class="btn btn-default navbar-btn fa fa-bars"></button>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="/src/backstage/profile.php"><i class="fa fa-user"></i>个人中心</a></li>
    <li><a href="/index.php/Admin/Common/leave"><i class="fa fa-sign-out"></i>退出</a></li>
  </ul>
</nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>添加目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(isset($error)): ?>
      <div class="alert <?php echo $error=='添加音乐成功' ? 'alert-success' : 'alert-info' ?>">
        <strong><?php echo $error ?></strong>
      </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="post" enctype="multipart/form-data">
            <h2>添加音乐</h2>
            <div class="form-group">
              <label for="song">歌的名称</label>
              <input id="song" class="form-control" name="song" type="text" placeholder="音乐名称">
            </div>
            <div class="form-group">
              <label for="singer">歌手名</label>
              <input id="singer" class="form-control" name="singer" type="text" placeholder="歌手名">
            </div>
            <div class="form-group">
              <label for="music">上传音乐</label>
              <input id="music" class="form-control" name="music" type="file">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">添加</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

   <?php include './public/sidebar.php' ?>
  <div class="aside">
<div class="profile">
  <img class="avatar" src="<?php echo ($avatar); ?>">
  <h3 class="name"><?php echo ($nickname); ?></h3>
</div>
<ul class="nav">
  
  <li>
    <a href="/index.php/Admin/Index/index"><i class="fa fa-dashboard"></i>仪表盘</a>
  </li>
  <li>
    <a href="#menu-posts" data-toggle="collapse" class="collapsed">
      <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
    </a>
    <ul id="menu-posts" class="collapse">
      <li><a href="/index.php/Admin/Note/postList">所有文章</a></li>
      <li class="active"><a href="/index.php/Admin/Note/postAdd">写文章</a></li>
      <!-- <li><a href="categories.html">分类目录</a></li> -->
    </ul>
  </li>
  <li>
    <a href="#menu-music" data-toggle="collapse" class="collapsed">
      <i class="fa fa-music"></i>音乐<i class="fa fa-angle-right"></i>
    </a>
    <ul id="menu-music" class="collapse">
      <li><a href="/index.php/Admin/Music/musicList">所有音乐</a></li>
      <li class="active"><a href="/index.php/Admin/Music/musicAdd">添加音乐</a></li>
      <!-- <li><a href="categories.html">分类目录</a></li> -->
    </ul>
  </li>
  <li>
    <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
  </li>
  <li>
    <a href="users.html"><i class="fa fa-users"></i>用户</a>
  </li>
  <li>
    <a href="#menu-settings" class="collapsed" data-toggle="collapse">
      <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
    </a>
    <ul id="menu-settings" class="collapse">
      <li><a href="nav-menus.html">导航菜单</a></li>
      <li><a href="slides.html">图片轮播</a></li>
      <li><a href="settings.html">网站设置</a></li>
    </ul>
  </li>
</ul>
</div>
  <script src="/Public/vendors/jquery/jquery.js"></script>
  <script src="/Public/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
    $(function(){
      // 提交表单
      $('.btn').on('click',function(){
        $('form').submit();
      })
    });
  </script>
</body>
</html>