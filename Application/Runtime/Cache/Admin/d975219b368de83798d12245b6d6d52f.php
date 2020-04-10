<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>登录</title>
  <link rel="stylesheet" href="/Public/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap" action="" method="post">
      <img class="avatar" src="/Public/img/default.png">
      <!-- 有错误信息时展示 -->
      <?php if(isset($error)): ?>
        <div class="alert alert-danger">
          <strong><?php echo $error ?></strong>
        </div>
      <?php endif; ?>
      <div class="form-group">
        <label for="account" class="sr-only">账号</label>
        <input id="account" type="account" class="form-control" name="account" placeholder="账号" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="密码">
      </div>
      <button class="btn btn-primary btn-block">登 录</button>
    </form>
  </div>
  <script src="/Public/vendors/jquery/jquery.min.js"></script>
  <script>
    
      $(function(){
        // 提交form表单
        $('.btn').on('click',function(){
          $('form').submit();
        })


        // 为输入用户名注册失去焦点事件
        $('#account').on('blur',function(){
          console.log('失去焦点');
          // 获取用户输入的值
          var value = $(this).val();
          // 如果为空就跳出，不在继续执行
          if(!value) return;
          // 输出
          // console.log(value);
          // 发送ajax请求获取头像地址
          $.ajax({
            url:'Login/getImg',
            type:'get',
            data:{name:value},
            success:function(data){
              console.log(data);
              // 先将图片淡出 --- 隐藏图片
              $('.avatar').fadeOut(function(){
                // 等到 淡出完成后 执行onload然后设置图片的src
                $(this).on('load',function(){
                  // 等到图片完全加载完成之后，在显示图片
                  $(this).fadeIn(1500);
                }).attr('src',data);
              });

            }
          })
        });
      });
  </script>
</body>
</html>