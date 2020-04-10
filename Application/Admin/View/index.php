<?php 
require_once '../../functions.php';

xiu_get_current_user();
// var_dump($_SESSION['user']);
// 获取总文章数量
$notenum = xiu_fetch_one("select count(1) as num from note where deleteM = 0")['num'];
// 获取总音乐数量
$musicnum = xiu_fetch_one("select count(1) as num from musicmes")['num'];
// 获取所有的评论数量
$comment = xiu_fetch_one("select count(1) as num from comment where CommentState = 0")["num"];

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="./css/admin.css">
  <script src="../vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './public/navbar.php' ?>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>热爱生活</h1>
        <p>人生在世，难免会遇到很多不如意，生活中出现不顺心的事情，不要心怀不满、怨气冲天，也不必耿耿于怀、一蹶不振，是福是祸都得面对，是好是坏都会过去。</p>
        <p><a class="btn btn-primary btn-lg" href="post-add.php" role="button">写文章</a></p>
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
              <li class="list-group-item"><strong><?php echo $notenum ?></strong>篇文章</li>
              <li class="list-group-item"><strong><?php echo $musicnum ?></strong>首音乐</li>
              <li class="list-group-item"><strong><?php echo $comment ?></strong>条评论</li>
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
  <?php include './public/sidebar.php' ?>

  <script src="../vendors/jquery/jquery.js"></script>
  <script src="../vendors/bootstrap/js/bootstrap.js"></script>
  <script src="../vendors/echarts/echarts.min.js"></script>
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
                      {value: <?php echo $notenum ?>, name: '文章数量'},
                      {value:  <?php echo $musicnum ?>, name: '音乐数量'},
                      {value:  <?php echo $comment ?>, name: '评论数量'},
                      
                  ]
              }
          ]
        }; 

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
  </script>
</body>
</html>
