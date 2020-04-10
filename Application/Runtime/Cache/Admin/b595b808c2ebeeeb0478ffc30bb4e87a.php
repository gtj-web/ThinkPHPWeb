<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="/Public/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/Public/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/Public/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/Public/Admin/css/admin.css">
  <script src="/Public/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
  <button class="btn btn-default navbar-btn fa fa-bars"></button>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="/src/backstage/profile.php"><i class="fa fa-user"></i>个人中心</a></li>
    <li><a href="/index.php/Admin/Common/leave"><i class="fa fa-sign-out"></i>退出</a></li>
  </ul>
</nav>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>热爱生活</h1>
        <p>人生在世，难免会遇到很多不如意，生活中出现不顺心的事情，不要心怀不满、怨气冲天，也不必耿耿于怀、一蹶不振，是福是祸都得面对，是好是坏都会过去。</p>
        <p><a class="btn btn-primary btn-lg" href="/index.php/Admin/Note/postAdd" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <!-- <li class="list-group-item"><strong>10</strong>篇文章（<strong>2</strong>篇草稿）</li>
              <li class="list-group-item"><strong>6</strong>个分类</li>
              <li class="list-group-item"><strong>5</strong>条评论（<strong>1</strong>条待审核）</li> -->
              <li class="list-group-item"><strong><?php echo ($com); ?></strong>篇文章</li>
              <li class="list-group-item"><strong><?php echo ($mus); ?></strong>首音乐</li>
              <li class="list-group-item"><strong><?php echo ($note); ?></strong>条评论</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div id="main" style="width: 600px;height:400px;"></div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
  <?php $flag='index' ?>
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
      <li><a href="posts.html">所有音乐</a></li>
      <li class="active"><a href="/index.php/Admin/Music/musicAdd">添加音乐</a></li>
      <li><a href="categories.html">分类目录</a></li>
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
  <script src="/Public/vendors/echarts/echarts.min.js"></script>
  <script>NProgress.done()</script>
  <script>
    
    // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        // var option = {
        //     title: {
        //         text: '站长统计'
        //     },
        //     tooltip: {},
        //     legend: {
        //         data:['数量']
        //     },
        //     xAxis: {
        //         data: ["文章","音乐","评论"]
        //     },
        //     yAxis: {},
        //     series: [{
        //         name: '数量',
        //         type: 'bar',
        //         data: [<?php echo $notenum ?>, <?php echo $musicnum ?>, <?php echo $comment ?>]
        //     }]
        // };


        // 饼图
       option = {
          tooltip: {
              trigger: 'item',
              formatter: '{a} <br/>{b}: {c} ({d}%)'
          },
          legend: {
              orient: 'vertical',
              left: 10,
              data: ['文章数量','音乐数量','评论数量']
          },
          series: [
              {
                  name: '访问来源',
                  type: 'pie',
                  radius: ['50%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                      normal: {
                          show: false,
                          position: 'center'
                      },
                      emphasis: {
                          show: true,
                          textStyle: {
                              fontSize: '30',
                              fontWeight: 'bold'
                          }
                      }
                  },
                  labelLine: {
                      normal: {
                          show: false
                      }
                  },
                  data: [
                      {value: <?php echo ($note); ?>, name: '文章数量'},
                      {value:  <?php echo ($mus); ?>, name: '音乐数量'},
                      {value:  <?php echo ($com); ?>, name: '评论数量'},
                      
                  ]
              }
          ]
        }; 

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
  </script>
</body>
</html>