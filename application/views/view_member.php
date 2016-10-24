<?php include_once('view_member_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Member Home</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mess/public/css/admin_nav.css">
</head>
<body class="member">
 <div class="center">
  <input class="btnProfile" type="button" value="Profile" onclick="location.href='/mess/home/member_profile';"> 
 <!-- <input class="btnProfile" type="button" value="Profile" onclick="member_profile()"> -->
 <br><br>
 <input class="btneditProfile" type="button" value="Edit Profile" onclick="location.href='/mess/home/edit_member_profile';">
 <br><br>
 <input class="btnmealBooking" type="button" value="Meal Booking" onclick="location.href='/mess/home/meal_booking';">
 <br><br>
 <input class="btnshopping" type="button" value="Shopping" onclick="location.href='/mess/home/shopping';">
 <br><br>
 <input class="btnHistory" type="button" value="Current History" onclick="location.href='/mess/home/history';">
 
</div>

</body>
</html>