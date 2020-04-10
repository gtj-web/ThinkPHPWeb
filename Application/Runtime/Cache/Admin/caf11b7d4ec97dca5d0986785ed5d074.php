<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>写文章</title>
  <link rel="stylesheet" href="/Public/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/Public/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/Public/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/Public/Admin/css/admin.css">
  <link rel="stylesheet" href="/Public/vendors/editor.md-master/css/editormd.css">
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
        <h1>写文章</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(isset($error)): ?>
      <div class="alert <?php echo $error==='提交成功' ? 'alert-success' : 'alert-danger' ?>">
        <strong><?php echo $error ?></strong>
      </div>
      <?php endif; ?>
      <!-- 不写action提交给自己 -->
      <form class="row" action="" method="post">
        <div class="col-md-12">
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
          </div>
          <div class="form-group">
            <label for="content">内容</label>
            <div id="test-editor" name="content">
                <textarea style="display:none;" name="content"></textarea>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-warning btn-lg btn-block">提交</button>
          </div>
        </div>
      </form>
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
  <script src="/Public/vendors/editor.md-master/lib/marked.min.js"></script>
  <script src="/Public/vendors/editor.md-master/lib/prettify.min.js"></script>
  <script src="/Public/vendors/editor.md-master/lib/raphael.min.js"></script>
  <script src="/Public/vendors/editor.md-master/lib/underscore.min.js"></script>
  <script src="/Public/vendors/editor.md-master/lib/sequence-diagram.min.js"></script>
  <script src="/Public/vendors/editor.md-master/lib/flowchart.min.js"></script>
  <script src="/Public/vendors/editor.md-master/lib/jquery.flowchart.min.js"></script>
  <script src="/Public/vendors/editor.md-master/editormd.js"></script>
  <script>
     $(function() {
          var editor = editormd("test-editor", {
              // width  : "100%",
              // height : "100%",
              path   : "/Public/vendors/editor.md-master/lib/",
              width: "90%",
              height: 540,
              theme : "dark", //主题
              // path: "editor.md-master/lib/" // 这里我的html文件和editor.md-master文件位置如下图
              saveHTMLToTextarea : true//这个配置，方便post提交html源码表单，保存 HTML 到 Textarea它关乎后端是否可以获取到值
          });

          // 提交表单
          $('.btn').on('click',function(){
            $('form').submit();
          })
      });

  </script>
  <script>NProgress.done()</script>
</body>
</html>