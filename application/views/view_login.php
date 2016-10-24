<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
      <link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/style_login.css">

       <script type="text/javascript" src="../public/js/jquery-1.12.2.js"></script>
       <script  type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
       <!-- <script type="text/javascript" src="http://localhost/mess/public/js/jquery_validate.js"></script> -->
       <script type="text/javascript" src="../public/js/login.js"></script>

  </head>

 <body>

    <div class="login-page">
  <div class="form">
    <form class="login-form" id="loginForm" method="post" action="/mess/home/login_data">
    <h2 style="text-align: center;">Login</h2>


      <input id="username" type="text" placeholder="username" name="username" value="<?php echo set_value('username'); ?>" />
       <?php echo form_error('username'); ?>

      <input id="password" type="password" placeholder="password" name="password" value="<?php echo set_value('password'); ?>" />
       <?php echo form_error('password'); ?>

        <?php if(isset($msg)){echo $msg;}?>
      <input style="background-color: MediumPurple; color:white" type="submit" name="submit" value="login">
    </form>
  </div>
</body>
</html>
