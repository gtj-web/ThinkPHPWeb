<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>所有音乐</title>
  <link rel="stylesheet" href="/Public/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/Public/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/Public/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/Public/Admin/css/admin.css">
  <link rel="stylesheet" href="/Public/Admin/css/base.css">
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
        <h1>所有音乐</h1>
        <a href="/index.php/Admin/Music/musicAdd" class="btn btn-primary btn-xs">添加音乐</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <!-- <form class="form-inline">
          <select name="" class="form-control input-sm">
            <option value="">所有分类</option>
            <option value="">未分类</option>
          </select>
          <select name="" class="form-control input-sm">
            <option value="">所有状态</option>
            <option value="">草稿</option>
            <option value="">已发布</option>
          </select>
          <button class="btn btn-default btn-sm">筛选</button>
        </form> -->
        <ul class="pagination pull-right">
          <div class="pagin-list">
            <?php echo ($show); ?>
          </div>
          
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>编号</th>
            <th class="text-center">歌曲名</th>
            <th class="text-center">歌手名</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
            <td class="text-center"><input type="checkbox"></td>
            <td><?php echo ($item["id"]); ?></td>
            <td class="text-center"><?php echo ($item["song"]); ?></td>
            <td class="text-center"><?php echo ($item["singer"]); ?></td>
            <?php if($item["state"] == 0): ?><td class="text-center" style="color: green">展示</td>
              <td class="text-center">
                <a href="/index.php/Admin/Music/musicEdit/id/<?php echo ($item["id"]); ?>" class="btn btn-info btn-xs">编辑</a>
                <a href="delete/id/<?php echo ($item["id"]); ?>/flag/0" class="btn btn-danger btn-xs">删除</a>
            </td>
            <?php else: ?>
              <td class="text-center" style="color: red">隐藏</td>
              <td class="text-center">
                <a href="delete/id/<?php echo ($item["id"]); ?>/flag/1" class="btn btn-success btn-xs">展示</a>
            </td><?php endif; ?>
            
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          
        </tbody>
      </table>
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
</body>
</html>