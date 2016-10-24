<?php include_once('view_admin_nav.php'); ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
      <link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/style_login.css">
     <!--  <script type="text/javascript" src="http://localhost/mess/public/js/check_username.js"></script> -->
     <script type="text/javascript" src="../public/js/jquery-1.12.2.js"></script>
     <script  type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
     <script type="text/javascript" src="../public/js/check_username.js"></script>
     <script type="text/javascript" src="../public/js/member_registration.js"></script>
  </head>

  <body>

    <div class="login-page">
  <div class="form">
    <form  id="registrationForm" class="login-form" method="post" action="/mess/home/add_member_data">
      <h2 style="text-align: center;">Registration</h2>

      <h5>USERNAME</h5>
      <input id="username" type="text" placeholder="username" name="username" value="<?php echo set_value('username'); ?>"   onBlur="check(this.value)" />
       <div id = "check_username"></div>
       <?php echo form_error('username'); ?>

       <h5>FULLNAME</h5>
       <input id="fullname" type="text" placeholder="fullname" name="fullname" value="<?php echo set_value('fullname'); ?>" />
       <?php echo form_error('fullname'); ?>

       <h5>EMAIL</h5>
       <input id="email" type="email" placeholder="email" name="email" value="<?php echo set_value('email'); ?>" />
       <?php echo form_error('email'); ?>

      <h5>PASSWORD</h5>
      <input id="password" type="password" placeholder="password" name="password"  value="<?php echo set_value('password'); ?>" />
       <?php echo form_error('password'); ?>

       <h5>RE-PASSWORD</h5>
       <input id="repassword" type="password" placeholder="repassword" name="repassword"  value="<?php echo set_value(' repassword'); ?>" />
       <?php echo form_error('repassword'); ?>


       <h5>MOBILE:</h5>
       <input id="mobile" type="text" placeholder="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" />
       <?php echo form_error('mobile'); ?>

        
      <input style="background-color: MediumPurple; color:white" type="submit" name="submit" value="submit">
    </form>
  </div>
</div>     
  </body>
</html>