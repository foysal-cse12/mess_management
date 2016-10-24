<?php include_once('view_admin_nav.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">  
  
   
	
</head>
<body class="admin">
<div class="center">
  <input class="btnaddMember" type="button"  value="Add Member" onclick="location.href='/mess/home/add_member';">
  <br><br>
  <input class="btnmemberList" type="button" value="Member List" onclick="location.href='/mess/home/member_list';">
  <br><br>
  <input class="btntodaymealList" type="button"  value="Member List For Today's Meal" onclick="location.href='/mess/home/member_list_meal';">
  <br><br>
  
 <input class="btncHistoryadmin" type="button" value="Current History" onclick="location.href='/mess/home/history_admin';">
  <br><br>
  <br><br>
</div>
</body>
</html>